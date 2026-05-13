<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini — المشاريع</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap');
        body { font-family: 'Tajawal', sans-serif; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(16,185,129,0.2); }
    </style>
</head>
<body class="bg-[#0a0a1a] text-white min-h-screen">

    <!-- Nav -->
    <nav class="border-b border-white/5 bg-[#0a0a1a]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-gray-400 hover:text-white transition text-sm">→ الرئيسية</a>
            <div class="flex items-center gap-3">
                <span class="text-2xl">💎</span>
                <h1 class="text-xl font-bold text-emerald-300">Gemini</h1>
                <span class="text-xs text-gray-600">by Google DeepMind</span>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="max-w-6xl mx-auto px-6 pt-10 pb-8">
        <div class="bg-gradient-to-l from-emerald-500/10 to-teal-500/10 border border-emerald-500/20 rounded-2xl p-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="text-6xl">💎</div>
                <div class="text-center md:text-right">
                    <h2 class="text-2xl font-bold text-emerald-300">Gemini</h2>
                    <p class="text-gray-400 mt-1">نموذج Google DeepMind — مُقيّم عبر مشاريع برمجية حقيقية</p>
                </div>
                <div class="md:mr-auto flex gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-emerald-400">6</div>
                        <div class="text-xs text-gray-500">مشروع</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-400">✅</div>
                        <div class="text-xs text-gray-500">مكتمل</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div class="max-w-6xl mx-auto px-6 pb-20">
        <h3 class="text-lg font-bold text-gray-300 mb-6">المشاريع</h3>

        <div class="space-y-6">
            <!-- Project 14: SVG Infographic Dashboard -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6 mb-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 14</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">لوحة إنفوجرافيك SVG تفاعلية</h4>
                            <p class="text-sm text-gray-500 mt-1">لوحة بيانات مرسومة بالكامل بـ SVG مع تفاعل وحركة باستخدام Vanilla JS وبدون أي مكتبات إضافية.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">SVG</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">CSS Animation</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vanilla JS</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Donut Chart متفاعل</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Bar Chart متحرك</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Line Chart متدرج</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Map SVG تفاعلية</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Tooltip ذكي لا يخرج عن الشاشة</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Legend تفاعلي يخفي العناصر</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-project14-viewer.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🌍 معاينة الإنفوجرافيك
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 13: Developer Portfolio -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6 mb-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 13</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">صفحة ملف شخصي لمطوّر (Portfolio)</h4>
                            <p class="text-sm text-gray-500 mt-1">صفحة شخصية تفاعلية تختبر جودة التصميم والـ Micro-animations والمؤشر المخصص.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">HTML5</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">CSS3</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vanilla JS</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">SVG Animations</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Hero مع Avatar متحرك SVG</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> About مع Progress Bars</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Timeline رأسي للخبرات</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Custom Cursor مع Trailing Effect</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Contact Form Validation</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-eval/portfolio/index.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🌍 معاينة الـ Portfolio
                        </a>
                    </div>
                </div>
            </div>

            <!-- New QA Dashboard -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mb-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">جديد</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">لوحة تقييم الأسئلة والأجوبة (QA)</h4>
                            <p class="text-sm text-gray-500 mt-1">واجهة حية لعرض المحادثات والأسئلة والردود لتقييم أداء Gemini</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-eval/" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            📊 فتح لوحة التقييم الحية
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 1: Blog -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 1</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">منظومة نشر مقالات مع لوحة تحكم</h4>
                            <p class="text-sm text-gray-500 mt-1">مدوّنة متكاملة بلوحة تحكم للكُتّاب — Laravel 11 + Blade + Policies</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Laravel 11</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Blade</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Eloquent</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Policies</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Middleware</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Form Requests</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Tailwind</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> CRUD كامل</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Validation</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Gates & Policies</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Middleware مخصص</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Pagination</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> فلترة وسوم</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> رفع صور</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Blade Components</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Responsive</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/blog" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🌍 معاينة الموقع
                        </a>
                        <a href="/dashboard/posts" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            ⚙️ لوحة التحكم
                        </a>
                        <a href="/project1-viewer.html" class="inline-flex items-center gap-2 bg-white/5 hover:bg-white/10 text-gray-300 px-5 py-2.5 rounded-xl text-sm font-medium transition border border-white/10" target="_blank">
                            📁 عرض الكود
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 2: Restaurant UML -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 2</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">مخطط Use Case لنظام مطعم</h4>
                            <p class="text-sm text-gray-500 mt-1">تحليل النظام وتصميم مخطط Use Case مع كود PlantUML والصورة المولدة</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">PlantUML</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">System Analysis</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">UML Design</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> تحليل النظام والأدوار</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> رسم حالات الاستخدام (Use Cases)</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> كتابة كود PlantUML</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> توليد صورة ديناميكية للمخطط</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-files/uml/" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            📊 عرض المخطط والكود
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 3: React + Laravel Task Manager -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 3</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">تطبيق إدارة مهام — Laravel API + React</h4>
                            <p class="text-sm text-gray-500 mt-1">تطبيق مفصول (Headless) للواجهة والخلفية مع Optimistic UI و الاختبارات.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Laravel API</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">React</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vite</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Axios</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Sanctum</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Pest/PHPUnit</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Laravel REST API Resources</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> React Hooks (useReducer)</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Rate Limiting & Auth</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Optimistic UI Updates</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Filtering Parameters</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Dark Mode (localStorage)</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 5 API Feature Tests</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Error Handling (Toasts)</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-files/react-app/" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            ⚛️ فتح تطبيق React
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 11: Fashion Store -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 11</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">متجر أزياء متكامل — Vue 3 + Tailwind</h4>
                            <p class="text-sm text-gray-500 mt-1">متجر أزياء متكامل يقيس جودة التصميم والـ UX مع فلاتر حية وعربة تسوق وتأثيرات بصرية ممتازة.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vue 3</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Tailwind CSS</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Bootstrap Icons</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Composition API</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> فلاتر متعددة ونطاق سعر وتصنيف</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> سلة تسوق (Cart Drawer) جانبية وخطوات دفع</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> نافذة عرض سريع (Quick View) متقدمة</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> حركات وتأثيرات انسيابية (Transitions)</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-project11.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🌍 معاينة متجر الأزياء
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 9: Quiz Game -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 9</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">لعبة الاختبار التعليمي (Quiz Game)</h4>
                            <p class="text-sm text-gray-500 mt-1">لعبة تفاعلية باستخدام HTML/CSS/JS خالص تتضمن مؤقت وتأثيرات حركية وتقييم فوري.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">HTML5</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">CSS3</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vanilla JS</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">canvas-confetti</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">localStorage</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 10 أسئلة مخلطة عشوائياً</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Timer عكسي 30 ثانية</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> CSS Slide Animation</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> تلوين فوري وتقييم للإجابات</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> مراجعة تفصيلية للإجابات</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Confetti وحفظ أعلى نتيجة</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/gemini-project9/index.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🎮 تشغيل اللعبة
                        </a>
                    </div>
                </div>
            </div>

            <!-- Project 6: Vanilla JS Weather Dashboard -->
            <div class="card-hover bg-[#0d1f1a] border border-emerald-500/10 rounded-2xl overflow-hidden mt-6">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 6</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                            </div>
                            <h4 class="text-xl font-bold text-white">لوحة الطقس العالمية — Vanilla JS</h4>
                            <p class="text-sm text-gray-500 mt-1">لوحة طقس تفاعلية تعرض بيانات حية من OpenWeatherMap باستخدام Vanilla JS و ES6 Modules.</p>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vanilla JS</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">ES6 Modules</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">OpenWeatherMap API</span>
                        <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Chart.js</span>
                    </div>

                    <!-- Features Checklist -->
                    <div class="grid grid-cols-2 gap-2 mb-6">
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Modular ES6 (بدون bundler)</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> تبديل C/F فوري (رياضياً)</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Geolocation Fallback</div>
                        <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Dynamic Backgrounds</div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="/project6/index.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition" target="_blank">
                            🌍 معاينة التطبيق
                        </a>
                        <a href="/project6-viewer.html" class="inline-flex items-center gap-2 bg-white/5 hover:bg-white/10 text-gray-300 px-5 py-2.5 rounded-xl text-sm font-medium transition border border-white/10" target="_blank">
                            📁 عرض الكود
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="border-t border-white/5 py-6 text-center text-sm text-gray-600">
        <a href="/" class="hover:text-gray-400 transition">→ العودة للرئيسية</a>
    </footer>

</body>
</html>
