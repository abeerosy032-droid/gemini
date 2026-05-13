@extends('layouts.app')

@section('title', 'أرشيف المقالات')

@section('content')
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- الشريط الجانبي — الوسوم -->
        <aside class="lg:w-64 shrink-0">
            <div class="bg-white rounded-xl shadow-sm border p-4">
                <h3 class="font-bold text-gray-700 mb-3">الوسوم</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ url('/') }}"
                       class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-colors
                              {{ !request('tag') ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        الكل
                    </a>
                    @foreach($tags as $tag)
                        <x-tag-badge :tag="$tag" :filter="true" />
                    @endforeach
                </div>
            </div>
        </aside>

        <!-- قائمة المقالات -->
        <div class="flex-1">
            @if($posts->isEmpty())
                <div class="text-center py-20 text-gray-400">
                    <p class="text-4xl mb-4">📭</p>
                    <p>لا توجد مقالات بعد</p>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
