<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'المدونة')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- شريط التنقل -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">📝 المدونة</a>
            <div class="flex items-center gap-4">
                @auth
                    @can('access-dashboard')
                        <a href="{{ route('dashboard.posts.index') }}" class="text-sm text-gray-600 hover:text-indigo-600">
                            لوحة التحكم
                        </a>
                    @endcan
                    <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700">خروج</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-800">دخول</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- المحتوى الرئيسي -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- التذييل -->
    <footer class="border-t mt-16 py-6 text-center text-sm text-gray-400">
        <p>&copy; {{ now()->year }} المدونة. جميع الحقوق محفوظة.</p>
    </footer>

    @stack('scripts')
</body>
</html>
