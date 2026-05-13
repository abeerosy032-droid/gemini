@props(['tag'])
<a href="{{ route('posts.archive', ['tag' => $tag->slug]) }}"
   class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
    #{{ $tag->name }}
</a>