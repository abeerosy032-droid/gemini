<div class="p-4 mb-4 text-sm rounded-lg border {{ $colorClass }}" role="alert">
    <span class="font-medium">{{ ucfirst($type) }}!</span> {{ $message ?? $slot }}
</div>