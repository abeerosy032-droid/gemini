<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أرشيف المقالات</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8 font-sans">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold mb-8 text-center">أرشيف المقالات</h1>

        @if(session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">لا توجد مقالات لعرضها.</div>
            @endforelse
        </div>

        <div class="mt-8">
            <!-- الـ Pagination الخاص بـ Laravel مع Tailwind -->
            {{ $posts->links() }}
        </div>
    </div>
</body>
</html>