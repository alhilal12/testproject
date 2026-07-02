<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="قائمة بجميع الجامعات التركية الحكومية والخاصة. استعرض أفضل الجامعات في تركيا">
    <meta name="keywords" content="قائمة الجامعات التركية, أفضل الجامعات في تركيا">
    <meta property="og:title" content="جميع الجامعات التركية">
    <meta property="og:description" content="استعرض جميع الجامعات التركية">
    <title>الجامعات التركية - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-animate {
            animation: slideUp 0.6s ease-out forwards;
        }

        .card-animate:nth-child(1) {
            animation-delay: 0s;
        }

        .card-animate:nth-child(2) {
            animation-delay: 0.1s;
        }

        .card-animate:nth-child(3) {
            animation-delay: 0.2s;
        }

        .card-animate:nth-child(4) {
            animation-delay: 0.3s;
        }

        .card-animate:nth-child(5) {
            animation-delay: 0.4s;
        }

        .card-animate:nth-child(6) {
            animation-delay: 0.5s;
        }

        .card-animate:nth-child(7) {
            animation-delay: 0.6s;
        }

        .card-animate:nth-child(8) {
            animation-delay: 0.7s;
        }

        .card-animate:nth-child(9) {
            animation-delay: 0.8s;
        }

        .dark {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .dark .bg-white {
            background-color: #2d3748 !important;
        }

        .dark .text-gray-800 {
            color: #e2e8f0 !important;
        }

        .dark .border-gray-200 {
            border-color: #4a5568 !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 mt-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">الجامعات التركية</h1>
            <p class="text-gray-300 text-lg">اكتشف أفضل الجامعات في تركيا وابدأ رحلتك الأكاديمية معنا</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen py-12">
        <div class="container mx-auto px-4">

            <!-- Filters Section -->
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-12 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    البحث والتصفية المتقدم
                </h2>

                <form action="<?php echo e(route('universities.index')); ?>" method="GET" id="filterForm">
                    <!-- الصف الأول: اسم الجامعة + نوع الجامعة + المدينة -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
                        <!-- البحث بالاسم (دعم البحث الجزئي) -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">🏫 اسم الجامعة</label>
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                                placeholder="اكتب اسم الجامعة (مثال: اسطنبول)"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                            <p class="text-xs text-gray-400 mt-1">يمكنك البحث بجزء من الاسم</p>
                        </div>

                        <!-- نوع الجامعة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">🏷️ نوع الجامعة</label>
                            <select name="type"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                                <option value="">الكل</option>
                                <option value="public" <?php echo e(request('type') == 'public' ? 'selected' : ''); ?>>🏛️ حكومية
                                </option>
                                <option value="private" <?php echo e(request('type') == 'private' ? 'selected' : ''); ?>>🏢 خاصة
                                </option>
                            </select>
                        </div>

                        <!-- المدينة (مع دعم البحث الجزئي) -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">📍 المدينة</label>
                            <input type="text" name="city" value="<?php echo e(request('city')); ?>"
                                placeholder="اكتب اسم المدينة (مثال: اسطنبول)" list="citySuggestions"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                            <datalist id="citySuggestions">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($city); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                            <p class="text-xs text-gray-400 mt-1">يمكنك البحث بجزء من الاسم أو الاختيار من القائمة</p>
                        </div>
                    </div>

                    <!-- الصف الثاني: لغة الدراسة + الكلية + المعهد -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                        <!-- لغة الدراسة -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">🌐 لغة الدراسة</label>
                            <div
                                class="flex flex-wrap gap-2 p-3 bg-gray-50 rounded-xl border border-gray-200 max-h-32 overflow-y-auto">
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="turkish" <?php echo e(in_array('turkish', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇹🇷 تركية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="english" <?php echo e(in_array('english', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇬🇧 إنجليزية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="arabic" <?php echo e(in_array('arabic', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇸🇦 عربية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="german" <?php echo e(in_array('german', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇩🇪 ألمانية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="french" <?php echo e(in_array('french', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇫🇷 فرنسية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="spanish" <?php echo e(in_array('spanish', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇪🇸 إسبانية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="italian" <?php echo e(in_array('italian', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇮🇹 إيطالية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="russian" <?php echo e(in_array('russian', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">🇷🇺 روسية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="russian" <?php echo e(in_array('russian', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm"> KRكوريا</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="russian" <?php echo e(in_array('russian', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">CH صينية</span>
                                </label>
                                <label
                                    class="flex items-center gap-1.5 cursor-pointer hover:bg-yellow-50 px-2 py-1 rounded transition">
                                    <input type="checkbox" name="language[]" value="russian" <?php echo e(in_array('russian', (array) request('language', [])) ? 'checked' : ''); ?>

                                        class="rounded border-gray-300 text-yellow-500">
                                    <span class="text-sm">AM أرمينية </span>
                                </label>
                            </div>
                        </div>

                        <!-- الكلية (مع دعم البحث الجزئي) -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">🎓 الكلية</label>
                            <input type="text" name="college" value="<?php echo e(request('college')); ?>"
                                placeholder="اكتب اسم الكلية" list="collegeSuggestions"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                            <datalist id="collegeSuggestions">
                                <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($college->name_ar); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                            <p class="text-xs text-gray-400 mt-1">يمكنك البحث بجزء من الاسم</p>
                        </div>

                        <!-- المعهد (مع دعم البحث الجزئي) -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">📚 المعهد</label>
                            <input type="text" name="institute" value="<?php echo e(request('institute')); ?>"
                                placeholder="اكتب اسم المعهد" list="instituteSuggestions"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                            <datalist id="instituteSuggestions">
                                <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($institute->name_ar); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                            <p class="text-xs text-gray-400 mt-1">يمكنك البحث بجزء من الاسم</p>
                        </div>
                    </div>

                    <!-- الصف الثالث: الترتيب + عدد النتائج -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                        <!-- الترتيب -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">📊 الترتيب حسب</label>
                            <select name="sort"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                                <option value="rank_local" <?php echo e(request('sort') == 'rank_local' ? 'selected' : ''); ?>>📈
                                    الترتيب المحلي</option>
                                <option value="name_ar" <?php echo e(request('sort') == 'name_ar' ? 'selected' : ''); ?>>🔤 الاسم
                                    (أ-ي)</option>
                            </select>
                        </div>

                        <!-- عدد النتائج -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2 text-sm">🔢 عدد النتائج</label>
                            <select name="per_page"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 focus:outline-none transition">
                                <option value="12" <?php echo e(request('per_page') == '12' ? 'selected' : ''); ?>>12 جامعة</option>
                                <option value="24" <?php echo e(request('per_page') == '24' ? 'selected' : ''); ?>>24 جامعة</option>
                                <option value="48" <?php echo e(request('per_page') == '48' ? 'selected' : ''); ?>>48 جامعة</option>
                                <option value="all" <?php echo e(request('per_page') == 'all' ? 'selected' : ''); ?>>جميع الجامعات
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- أزرار الإجراء -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-md hover:shadow-lg">
                            🔍 بحث
                        </button>
                        <a href="<?php echo e(route('universities.index')); ?>"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl text-center transition duration-300 border border-gray-200">
                            🔄 إعادة تعيين
                        </a>
                    </div>
                </form>
            </div>

            <!-- JavaScript for Filter Enhancements (Auto-complete & Filter Removal) -->
            <script>
                // بيانات التخصصات المقترحة (يمكنك توسيع هذه القائمة)
                const suggestedMajors = [
                    'الطب البشري', 'طب الأسنان', 'الصيدلة', 'التمريض',
                    'الهندسة المدنية', 'الهندسة المعمارية', 'الهندسة الميكانيكية', 'الهندسة الكهربائية', 'الهندسة الصناعية', 'الهندسة الكيميائية',
                    'علوم الحاسوب', 'هندسة البرمجيات', 'الأمن السيبراني', 'الذكاء الاصطناعي',
                    'إدارة الأعمال', 'المحاسبة', 'التسويق', 'الاقتصاد', 'التمويل',
                    'العلاقات الدولية', 'العلوم السياسية', 'علم النفس', 'علم الاجتماع',
                    'الإعلام والاتصال', 'الصحافة', 'العلاقات العامة',
                    'اللغات', 'الترجمة', 'الأدب العربي', 'الأدب الإنجليزي',
                    'الفنون الجميلة', 'التصميم الجرافيكي'
                ];

                const majorInput = document.getElementById('majorSearch');
                const suggestionsDiv = document.getElementById('majorSuggestions');

                if (majorInput && suggestionsDiv) {
                    majorInput.addEventListener('input', function () {
                        const query = this.value.toLowerCase();
                        if (query.length < 2) {
                            suggestionsDiv.classList.add('hidden');
                            return;
                        }

                        const filtered = suggestedMajors.filter(major =>
                            major.toLowerCase().includes(query)
                        );

                        if (filtered.length > 0) {
                            suggestionsDiv.innerHTML = filtered.map(major =>
                                `<div class="px-4 py-2 hover:bg-yellow-50 cursor-pointer border-b border-gray-100 last:border-0">${major}</div>`
                            ).join('');

                            suggestionsDiv.classList.remove('hidden');

                            // إضافة حدث النقر على الاقتراحات
                            suggestionsDiv.querySelectorAll('div').forEach(div => {
                                div.addEventListener('click', function () {
                                    majorInput.value = this.textContent;
                                    suggestionsDiv.classList.add('hidden');
                                });
                            });
                        } else {
                            suggestionsDiv.classList.add('hidden');
                        }
                    });

                    // إخفاء الاقتراحات عند النقر خارجها
                    document.addEventListener('click', function (e) {
                        if (!majorInput.contains(e.target) && !suggestionsDiv.contains(e.target)) {
                            suggestionsDiv.classList.add('hidden');
                        }
                    });
                }

                // دالة لإزالة فلتر معين وتحديث الصفحة
                function removeFilter(param) {
                    const url = new URL(window.location.href);
                    url.searchParams.delete(param);
                    window.location.href = url.toString();
                }

                // عرض الفلاتر النشطة وتحديثها تلقائياً
                document.addEventListener('DOMContentLoaded', function () {
                    // إضافة تأثيرات بصرية على الفلاتر
                    const selects = document.querySelectorAll('select');
                    selects.forEach(select => {
                        if (select.value) {
                            select.style.borderColor = '#EAB308';
                            select.style.backgroundColor = '#FEFCE8';
                        }

                        select.addEventListener('change', function () {
                            if (this.value) {
                                this.style.borderColor = '#EAB308';
                                this.style.backgroundColor = '#FEFCE8';
                            } else {
                                this.style.borderColor = '#D1D5DB';
                                this.style.backgroundColor = 'white';
                            }
                        });
                    });
                });
                document.addEventListener('DOMContentLoaded', function () {
                    const toggle = document.getElementById('darkModeToggle');
                    const icon = document.getElementById('darkModeIcon');

                    if (localStorage.getItem('darkMode') === 'true') {
                        document.documentElement.classList.add('dark');
                        if (icon) icon.textContent = '☀️';
                    }

                    if (toggle) {
                        toggle.addEventListener('click', function () {
                            const isDark = document.documentElement.classList.toggle('dark');
                            localStorage.setItem('darkMode', isDark);
                            if (icon) icon.textContent = isDark ? '☀️' : '🌙';
                        });
                    }
                });
            </script>

            <style>
                /* تحسين مظهر الفلاتر عند التحديد */
                select option:checked {
                    background-color: #EAB308;
                    color: white;
                }

                /* تحسين مظهر حقل البحث عن التخصص */
                #majorSearch:focus {
                    border-color: #EAB308;
                    box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.1);
                }
            </style>
            <!-- Universities Grid -->
            <?php if($universities->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

                            <!-- Logo Circle (دائري، خلفية بيضاء) -->
                            <div class="flex justify-center pt-6 pb-2 bg-white">
                                <div class="relative group">
                                    <div
                                        class="w-24 h-24 rounded-full bg-white shadow-md overflow-hidden flex items-center justify-center border-2 border-gray-100">
                                        <?php if($university->logo): ?>
                                            <img src="<?php echo e(asset('storage/' . $university->logo)); ?>" loading="lazy"
                                                alt="<?php echo e($university->name_ar); ?>"
                                                class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                        <?php else: ?>
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center">
                                                <span
                                                    class="text-white text-xl font-bold"><?php echo e(mb_substr($university->name_ar, 0, 2)); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Type Badge (أسفل الشعار مباشرة) -->
                                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                                        <span
                                            class="px-2 py-0.5 rounded-full text-white text-xs font-bold shadow-md <?php echo e($university->type == 'public' ? 'bg-blue-500' : 'bg-purple-500'); ?>">
                                            <?php echo e($university->type == 'public' ? '🏛️ حكومية' : '🏢 خاصة'); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Content -->
                            <div class="p-4 pt-6">
                                <!-- University Name -->
                                <h3 class="text-md font-bold text-gray-800 text-center line-clamp-2 leading-tight">
                                    <?php echo e($university->name_ar); ?>

                                </h3>
                                <p class="text-gray-500 text-xs text-center mt-1"><?php echo e($university->name_tr); ?></p>

                                <!-- Divider -->
                                <div class="border-t border-gray-100 my-3"></div>

                                <!-- City & Rank in one line -->
                                <div class="flex justify-center items-center gap-3 text-xs text-gray-500 mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span><?php echo e($university->city); ?></span>
                                    </div>
                                    <?php if($university->rank_local): ?>
                                        <div class="flex items-center gap-1">
                                            <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <span>#<?php echo e($university->rank_local); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Languages Badges (مختصرة) -->
                                <?php
                                    $langs = is_array($university->languages) ? $university->languages : json_decode($university->languages, true);
                                    $langMap = ['turkish' => '🇹🇷', 'english' => '🇬🇧', 'arabic' => '🇸🇦', 'german' => '🇩🇪', 'french' => '🇫🇷', 'spanish' => '🇪🇸', 'italian' => '🇮🇹', 'russian' => '🇷🇺'];
                                ?>
                                <?php if(is_array($langs) && count($langs) > 0): ?>
                                    <div class="flex justify-center gap-1 mb-3">
                                        <?php $__currentLoopData = array_slice($langs, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span
                                                class="text-xs bg-gray-100 rounded-full px-2 py-0.5"><?php echo e($langMap[$lang] ?? substr($lang, 0, 2)); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 mt-2">
                                    <a href="<?php echo e(route('universities.show', $university->id)); ?>"
                                        class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1.5 px-3 rounded-lg text-xs text-center transition duration-300">
                                        التفاصيل
                                    </a>
                                    <?php if($university->website): ?>
                                        <a href="<?php echo e($university->website); ?>" target="_blank"
                                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-1.5 px-3 rounded-lg text-xs text-center transition duration-300">
                                            🌐 الموقع
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mb-12">
                    <?php echo e($universities->appends(request()->all())->links()); ?>

                </div>
            <?php else: ?>
                <!-- No Results -->
                <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                    <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">لم يتم العثور على جامعات</h3>
                    <p class="text-gray-600 mb-6">جرب تغيير معايير البحث والتصفية</p>
                    <a href="<?php echo e(route('universities.index')); ?>"
                        class="inline-block bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-2 px-6 rounded-lg transition">
                        إعادة تعيين الفلاتر
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2026 الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
    <?php if (isset($component)) { $__componentOriginal67d5d5978c3922da5619d6ebcc86c174 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67d5d5978c3922da5619d6ebcc86c174 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.floating-whatsapp','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('floating-whatsapp'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67d5d5978c3922da5619d6ebcc86c174)): ?>
<?php $attributes = $__attributesOriginal67d5d5978c3922da5619d6ebcc86c174; ?>
<?php unset($__attributesOriginal67d5d5978c3922da5619d6ebcc86c174); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67d5d5978c3922da5619d6ebcc86c174)): ?>
<?php $component = $__componentOriginal67d5d5978c3922da5619d6ebcc86c174; ?>
<?php unset($__componentOriginal67d5d5978c3922da5619d6ebcc86c174); ?>
<?php endif; ?>
</body>

</html><?php /**PATH C:\Users\DELL\Desktop\testproject-master\testproject-master\resources\views/universities/index.blade.php ENDPATH**/ ?>