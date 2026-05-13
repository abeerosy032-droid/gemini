@props(['tag', 'filter' => false])

@php
    $isActive = $filter && request('tag') === $tag->slug;
@endphp

@if($filter)
    <a href="{{ request()->fullUrlWithQuery(['tag' => $tag->slug]) }}"
       class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-colors
              {{ $isActive
                  ? 'bg-indigo-600 text-white'
                  : 'bg-indigo-50 text-indigo-700 hover:bg-indigo-100' }}">
        {{ $tag->name }}
        <span class="mr-1 text-[10px] opacity-60">({{ $tag->posts_count ?? $tag->posts->count() }})</span>
    </a>
@else
    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
        {{ $tag->name }}
    </span>
@endif
