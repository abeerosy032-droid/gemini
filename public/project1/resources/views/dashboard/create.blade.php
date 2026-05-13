@extends('layouts.app')

@section('title', 'إنشاء مقال جديد')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">إنشاء مقال جديد</h1>

        @if($errors->any())
            <x-alert type="error">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif

        <form method="POST" action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data"
              class="bg-white rounded-xl shadow-sm border p-6 space-y-5">
            @csrf

            <!-- العنوان -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">العنوان</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       required>
            </div>

            <!-- الرابط -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">الرابط (اختياري)</label>
                <input type="text" name="slug" id="slug"
                       value="{{ old('slug') }}"
                       placeholder="يُنشأ تلقائياً من العنوان"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                       dir="ltr">
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- المحتوى -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-1">المحتوى</label>
                <textarea name="body" id="body" rows="10"
                          class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                          required>{{ old('body') }}</textarea>
            </div>

            <!-- الصورة البارزة -->
            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">الصورة البارزة</label>
                <input type="file" name="featured_image" id="featured_image"
                       accept="image/jpeg,image/png,image/webp,image/gif"
                       class="w-full border rounded-lg px-3 py-2 text-sm text-gray-500
                              file:mr-4 file:py-1 file:px-3 file:rounded file:border-0
                              file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100">
                <p class="text-xs text-gray-400 mt-1">JPEG, PNG, WebP, GIF — حتى 2MB</p>
            </div>

            <!-- الحالة -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">الحالة</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="status" value="draft"
                               {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}>
                        <span class="text-sm">مسودة</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="status" value="published"
                               {{ old('status') === 'published' ? 'checked' : '' }}>
                        <span class="text-sm">نشر</span>
                    </label>
                </div>
            </div>

            <!-- تاريخ النشر -->
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">تاريخ النشر (اختياري)</label>
                <input type="datetime-local" name="published_at" id="published_at"
                       value="{{ old('published_at') }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- الوسوم -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">الوسوم</label>
                <div class="flex flex-wrap gap-3">
                    @foreach($tags as $tag)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                   {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                            <span class="text-sm">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- أزرار -->
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    حفظ المقال
                </button>
                <a href="{{ route('dashboard.posts.index') }}"
                   class="border px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
@endsection
