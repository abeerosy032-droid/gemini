@extends('layouts.app')

@section('title', 'لوحة التحكم — المقالات')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">لوحة التحكم</h1>
        <a href="{{ route('dashboard.posts.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
            + مقال جديد
        </a>
    </div>

    <!-- التنبيهات -->
    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif
    @if(session('error'))
        <x-alert type="error">{{ session('error') }}</x-alert>
    @endif

    <!-- جدول المقالات -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="text-right px-4 py-3">العنوان</th>
                    <th class="text-right px-4 py-3">الحالة</th>
                    <th class="text-right px-4 py-3">الكاتب</th>
                    <th class="text-right px-4 py-3">تاريخ النشر</th>
                    <th class="text-right px-4 py-3">إجراءات</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <a href="{{ route('dashboard.posts.show', $post) }}"
                               class="text-indigo-600 hover:underline font-medium">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @if($post->status === 'published')
                                <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">منشور</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">مسودة</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $post->user->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $post->published_at?->format('Y-m-d') ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('dashboard.posts.edit', $post) }}"
                                   class="text-blue-600 hover:text-blue-800 text-sm">تعديل</a>

                                @can('delete', $post)
                                    <form method="POST" action="{{ route('dashboard.posts.destroy', $post) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')"
                                                class="text-red-500 hover:text-red-700 text-sm">
                                            حذف
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($posts->isEmpty())
            <div class="text-center py-12 text-gray-400">
                <p>لا توجد مقالات بعد. أنشئ أول مقال!</p>
            </div>
        @endif
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
