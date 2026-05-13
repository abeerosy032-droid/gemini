@props(['post'])

<article class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-md transition-shadow">
    @if($post->featured_image)
        <a href="{{ route('posts.show', $post) }}">
            <img src="{{ Storage::url($post->featured_image) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-48 object-cover"
                 loading="lazy">
        </a>
    @endif

    <div class="p-5">
        <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
            <span>{{ $post->user->name }}</span>
            <span>•</span>
            <time>{{ $post->published_at?->format('d M Y') }}</time>
        </div>

        <a href="{{ route('posts.show', $post) }}" class="block">
            <h2 class="text-lg font-bold text-gray-900 hover:text-indigo-600 transition-colors mb-2">
                {{ $post->title }}
            </h2>
        </a>

        <p class="text-sm text-gray-600 leading-relaxed mb-4">
            {{ $post->excerpt }}
        </p>

        @if($post->tags->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($post->tags as $tag)
                    <x-tag-badge :tag="$tag" />
                @endforeach
            </div>
        @endif
    </div>
</article>
