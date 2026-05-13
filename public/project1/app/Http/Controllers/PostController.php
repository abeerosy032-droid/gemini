<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * أرشيف المقالات المنشورة — واجهة عامة
     * Pagination: 10 مقالات لكل صفحة
     * فلترة حسب الوسوم
     */
    public function index()
    {
        $query = Post::with(['user', 'tags'])
                     ->published()
                     ->latest('published_at');

        // فلترة حسب الوسوم
        if (request()->filled('tag')) {
            $query->whereHas('tags', function ($q) {
                $q->where('slug', request('tag'));
            });
        }

        $posts = $query->paginate(10);
        $tags = Tag::withCount('posts')->get();

        return view('posts.index', compact('posts', 'tags'));
    }

    /**
     * عرض مقال واحد
     */
    public function show(Post $post)
    {
        // لو المقال مسودة، فقط الكاتب أو الأدمن يشوفه
        if ($post->status !== 'published' && (!auth()->check() || (!auth()->user()->isAdmin() && auth()->id() !== $post->user_id))) {
            abort(404);
        }

        $post->load(['user', 'tags']);

        return view('posts.show', compact('post'));
    }

    /**
     * لوحة التحكم — قائمة المقالات
     */
    public function dashboard()
    {
        $query = Post::with(['user', 'tags'])
                     ->latest();

        // المحرر يرى مقالاته فقط
        if (auth()->user()->isEditor()) {
            $query->where('user_id', auth()->id());
        }

        $posts = $query->paginate(15);
        $tags = Tag::all();

        return view('dashboard.posts', compact('posts', 'tags'));
    }

    /**
     * نموذج إنشاء مقال جديد
     */
    public function create()
    {
        $tags = Tag::all();
        return view('dashboard.create', compact('tags'));
    }

    /**
     * حفظ مقال جديد
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        // رفع الصورة إلى storage/app/public
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')
                           ->store('posts', 'public');
            $data['featured_image'] = $path;
        }

        $post = Post::create($data);

        // ربط الوسوم
        if ($request->filled('tags')) {
            $post->tags()->attach($request->input('tags'));
        }

        return redirect()
            ->route('dashboard.posts.show', $post)
            ->with('success', 'تم إنشاء المقال بنجاح');
    }

    /**
     * نموذج تعديل مقال
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        $tags = Tag::all();
        $post->load('tags');

        return view('dashboard.edit', compact('post', 'tags'));
    }

    /**
     * تحديث مقال
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $request->validated();

        // رفع صورة جديدة وحذف القديمة
        if ($request->hasFile('featured_image')) {
            // حذف الصورة القديمة إن وجدت
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $path = $request->file('featured_image')
                           ->store('posts', 'public');
            $data['featured_image'] = $path;
        }

        $post->update($data);

        // تحديث الوسوم (sync = إزالة القديمة + إضافة الجديدة)
        $post->tags()->sync($request->input('tags', []));

        return redirect()
            ->route('dashboard.posts.show', $post)
            ->with('success', 'تم تحديث المقال بنجاح');
    }

    /**
     * حذف مقال
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        // حذف الصورة من التخزين
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()
            ->route('dashboard.posts.index')
            ->with('success', 'تم حذف المقال بنجاح');
    }
}
