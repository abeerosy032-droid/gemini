@props(['post'])
<div class="border rounded-lg overflow-hidden shadow-sm bg-white hover:shadow-md transition">
    @if($post->featured_image)
        <!-- استخدام Storage::url() لعرض الصورة -->
        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">لا توجد صورة</div>
    @endif
    <div class="p-4">
        <div class="flex gap-2 mb-2">
            @foreach($post->tags as $tag)
                <x-tag-badge :tag="$tag" />
            @endforeach
        </div>
        <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
        <p class="text-gray-600 mb-4">{{ Str::limit($post->body, 100) }}</p>
        <div class="text-sm text-gray-500 flex justify-between items-center">
            <span>الكاتب: {{ $post->user->name ?? 'غير معروف' }}</span>
            <span>{{ $post->published_at?->format('M d, Y') ?? 'مسودة' }}</span>
        </div>
    </div>
</div>