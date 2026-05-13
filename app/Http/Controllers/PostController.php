<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller {

    // صفحة الأرشيف مع Pagination وفلترة Tags
    public function archive(Request $request) {
        $query = Post::with(['user', 'tags'])->where('status', 'published');
        
        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }
        
        $posts = $query->latest('published_at')->paginate(10);
        return view('posts.archive', compact('posts'));
    }

    public function index() {
        Gate::authorize('viewAny', Post::class);
        $posts = Post::with('user')->latest()->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    public function store(StorePostRequest $request) {
        Gate::authorize('create', Post::class);
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        // 3. الفهم الصحيح لرفع الصور إلى storage/app/public باستخدام القرص 'public'
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create($validated);
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }
        return redirect()->route('dashboard.posts.index')->with('success', 'تم إنشاء المقال بنجاح.');
    }

    public function update(UpdatePostRequest $request, Post $post) {
        Gate::authorize('update', $post);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update($validated);
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }
        return redirect()->route('dashboard.posts.index')->with('success', 'تم تعديل المقال بنجاح.');
    }

    public function destroy(Post $post) {
        Gate::authorize('delete', $post);
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('success', 'تم حذف المقال بنجاح.');
    }
}