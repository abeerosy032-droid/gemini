@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="max-w-3xl mx-auto">
        <!-- صورة المقالة -->
        @if($post->featured_image)
            <img src="{{ Storage::url($post->featured_image) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-64 md:h-96 object-cover rounded-xl mb-8">
        @endif

        <!-- معلومات المقالة -->
        <header class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
            <div class="flex items-center gap-4 text-sm text-gray-500">
                <span>✍️ {{ $post->user->name }}</span>
                <span>📅 {{ $post->published_at?->format('d F Y') }}</span>
            </div>

            @if($post->tags->isNotEmpty())
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach($post->tags as $tag)
                        <x-tag-badge :tag="$tag" />
                    @endforeach
                </div>
            @endif
        </header>

        <!-- محتوى المقالة -->
        <div class="prose prose-lg max-w-none">
            {!! $post->body !!}
        </div>

        <div class="mt-12 pt-6 border-t">
            <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 text-sm">
                ← العودة للأرشيف
            </a>
        </div>
    </article>
@endsection
