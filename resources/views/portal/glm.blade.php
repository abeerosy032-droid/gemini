<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLM-5.1 — المشاريع</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap');
        body { font-family: 'Tajawal', sans-serif; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(99,102,241,0.2); }
    </style>
</head>
<body class="bg-[#0a0a1a] text-white min-h-screen">

    <!-- Nav -->
    <nav class="border-b border-white/5 bg-[#0a0a1a]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-gray-400 hover:text-white transition text-sm">→ الرئيسية</a>
            <div class="flex items-center gap-3">
                <span class="text-2xl">🧠</span>
                <h1 class="text-xl font-bold text-indigo-300">GLM-5.1</h1>
                <span class="text-xs text-gray-600">by Zhipu AI</span>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="max-w-6xl mx-auto px-6 pt-10 pb-8">
        <div class="bg-gradient-to-l from-indigo-500/10 to-purple-500/10 border border-indigo-500/20 rounded-2xl p-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="text-6xl">🧠</div>
                <div class="text-center md:text-right">
                    <h2 class="text-2xl font-bold text-indigo-300">GLM-5.1</h2>
                    <p class="text-gray-400 mt-1">نموذج لغوي من Zhipu AI / THUDM — مُقيّم عبر مشاريع برمجية حقيقية</p>
                </div>
                <div class="md:mr-auto flex gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-400">8</div>
                        <div class="text-xs text-gray-500">مشروع</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-indigo-400">18</div>
                        <div class="text-xs text-gray-500">ملف</div>
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
            <!-- Project 1: Blog -->
            <div class="card-hover bg-[#12122a] border border-indigo-500/10 rounded-2xl overflow-hidden">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-indigo-500/20 text-indigo-300">مشروع 1</span>
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
                        <a href="/blog.html" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                            🌐 معاينة الموقع
                        </a>
                        <a href="/project1-viewer.html" class="inline-flex items-center gap-2 bg-white/5 hover:bg-white/10 text-gray-300 px-5 py-2.5 rounded-xl text-sm font-medium transition border border-white/10">
                            📁 عرض الكود
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Project 2: UML -->
        <div class="card-hover bg-[#12122a] border border-purple-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-300">مشروع 2</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">مخطط Use Case — نظام إدارة مطعم Laravel</h4>
                        <p class="text-sm text-gray-500 mt-1">تصميم PlantUML كامل مع 4 ممثلين و20 Use Case و6 حزم</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">PlantUML</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">UML 2.0</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Use Case Diagram</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Laravel Restaurant</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 4 Actors</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 20 Use Cases</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 6 Packages</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Include</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Extend</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> PNG + SVG</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm-uml-page.html" class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        📊 عرض المخطط
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!-- Project 3: Task Manager -->
        <div class="card-hover bg-[#12122a] border border-blue-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-300">مشروع 3</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">تطبيق إدارة مهام — Laravel API + React</h4>
                        <p class="text-sm text-gray-500 mt-1">REST API كامل مع Sanctum + واجهة React + TypeScript مع Optimistic UI</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Laravel 11</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">React + TS</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Sanctum</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vite</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Optimistic UI</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Dark Mode</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">PHPUnit</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 6 API Endpoints</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> API Resources</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Sanctum Auth</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Filtering + Search</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Rate Limiting</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> 5 Unit Tests</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> useReducer</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Optimistic UI</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> useTasks Hook</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Toast Errors</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Dark Mode</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> TypeScript</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm-taskapp.html" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🚀 تجربة التطبيق
                    </a>
                    <a href="/glm-project3.html" class="inline-flex items-center gap-2 bg-white/5 hover:bg-white/10 text-gray-300 px-5 py-2.5 rounded-xl text-sm font-medium transition border border-white/10">
                        📁 عرض الكود
                    </a>
                </div>
            </div>
        </div>

        <!-- Project 6: Weather Dashboard -->
        <div class="card-hover bg-[#12122a] border border-orange-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-orange-500/20 text-orange-300">مشروع 4</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">لوحة الطقس العالمية — Open-Meteo API</h4>
                        <p class="text-sm text-gray-500 mt-1">بيانات حية + Chart.js + خلفية ديناميكية + Vanilla JS</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Open-Meteo API</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Chart.js</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vanilla JS</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Geolocation</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">CSS Gradients</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> بحث بمدينة</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Geolocation GPS</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> حالة راهنة</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> توقع 5 أيام</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Chart 24 ساعة</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> °C / °F فوري</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> خلفية ديناميكية</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> آخر 5 مدن</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Error handling</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm-weather.html" class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🌤️ تجربة التطبيق
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!-- Project 5: Fashion Store -->
        <div class="card-hover bg-[#12122a] border border-pink-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-pink-500/20 text-pink-300">مشروع 5</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">متجر أزياء — Vue 3 + Tailwind + Bootstrap Icons</h4>
                        <p class="text-sm text-gray-500 mt-1">واجهة متجر أزياء احترافية تقيس جودة التصميم والـ UX</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Vue 3</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Composition API</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Pinia</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Tailwind CSS</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Bootstrap Icons</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Transitions</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Grid + فلتر متعدد</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Hover zoom + badges</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Quick View modal</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Wishlist toggle</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Cart Drawer slide-in</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Checkout 3 خطوات</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Price Range slider</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Transitions & Animations</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-green-400">✓</span> Lorem Picsum</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm5-fashion-store.html" class="inline-flex items-center gap-2 bg-pink-600 hover:bg-pink-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🛍️ معاينة المتجر
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!-- Project 6: Q&A Evaluation -->
        <div class="card-hover bg-[#12122a] border border-cyan-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-cyan-500/20 text-cyan-300">مشروع 6</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">🆕 جاري</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">مختبر أسئلة وأجوبة — تقييم GLM-5.1</h4>
                        <p class="text-sm text-gray-500 mt-1">إرسال أسئلة متنوعة وعرض إجابات النموذج مباشرة مع تقييم الأداء</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Q&A تفاعلي</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">تصنيف ذكي</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">إحصائيات حية</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">تحديث فوري</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> تصنيف تلقائي</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> تقييم إجابات</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> إحصائيات حية</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> فلترة بتصنيف</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> حفظ تلقائي</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-cyan-400">✓</span> تصميم عربي</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm-qa-eval.html" class="inline-flex items-center gap-2 bg-cyan-600 hover:bg-cyan-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🧪 مختبر الأسئلة
                    </a>
                </div>
            </div>
        </div>
    </div>

        <!-- Project 7: Portfolio -->
        <div class="card-hover bg-[#12122a] border border-emerald-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/20 text-emerald-300">مشروع 7</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">صفحة Portfolio شخصية — تصميم إبداعي</h4>
                        <p class="text-sm text-gray-500 mt-1">صفحة ملف شخصي احترافية مع Hero متحرك + Skills + Projects + Timeline + Contact Form</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">HTML/CSS/JS</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Custom Cursor</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Micro-animations</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Google Fonts</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Form Validation</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Avatar SVG متحرك</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Skills بـ progress bars</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Projects grid (4)</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Vertical timeline</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Contact form validation</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Custom cursor + trail</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Scroll animations</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Inter + Space Grotesk</span>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-emerald-400">✓</span> Responsive design</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm-portfolio.html" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🎨 معاينة Portfolio
                    </a>
                </div>
            </div>
        </div>

        <!-- Project 16: 3D Globe -->
        <div class="card-hover bg-[#12122a] border border-teal-500/10 rounded-2xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-teal-500/20 text-teal-300">مشروع 16</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">مكتمل ✅</span>
                        </div>
                        <h4 class="text-xl font-bold text-white">كرة الأرض ثلاثية الأبعاد — Three.js</h4>
                        <p class="text-sm text-gray-500 mt-1">تجسيم تفاعلي للكرة الأرضية مع بيانات جغرافية + Atmosphere Shader + Night/Day Toggle</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Three.js r165+</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">OrbitControls</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">ShaderMaterial</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Raycaster</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">BufferGeometry</span>
                    <span class="px-2 py-1 rounded-lg text-xs bg-white/5 text-gray-400">Touch Events</span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-6">
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> دوران بالـ drag</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> دوران تلقائي + توقف عند hover</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> 5 نقاط مُضاءة للمدن</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Labels عند hover</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Atmosphere shader واقعي</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Stars background</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Night/Day toggle</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Raycaster دقيق</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> Mobile touch support</div>
                    <div class="flex items-center gap-2 text-sm text-gray-400"><span class="text-teal-400">✓</span> تعليقات واضحة للـ textures</div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="/glm5-project16-globe.html" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        🌍 تجربة الكرة الأرضية
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="border-t border-white/5 py-6 text-center text-sm text-gray-600">
        <a href="/" class="hover:text-gray-400 transition">→ العودة للرئيسية</a>
    </footer>

</body>
</html>
