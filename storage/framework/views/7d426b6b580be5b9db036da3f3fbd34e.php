<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="description" content="تعرف على جامعة <?php echo e($university->name_ar); ?> في مدينة <?php echo e($university->city); ?>، <?php echo e($university->type == 'public' ? 'جامعة حكومية' : 'جامعة خاصة'); ?> في تركيا">
    <meta name="keywords" content="<?php echo e($university->name_ar); ?>, <?php echo e($university->city); ?>, دراسة في تركيا, الجامعات التركية">
    <meta name="author" content="الهلال للاستشارات التعليمية">
    <meta name="robots" content="index, follow">
    
    <meta property="og:title" content="<?php echo e($university->name_ar); ?> | الهلال للاستشارات التعليمية">
    <meta property="og:description" content="جامعة <?php echo e($university->name_ar); ?> - <?php echo e($university->type == 'public' ? 'جامعة حكومية' : 'جامعة خاصة'); ?> في تركيا">
    <meta property="og:image" content="<?php echo e(asset('storage/' . $university->logo)); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:type" content="website">
    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <title><?php echo e($university->name_ar); ?> - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .stat-card {
            transition: all 0.3s ease;
            background: white;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .tab-active {
            background-color: #eab308;
            color: white;
            border-bottom: 3px solid #eab308;
        }

        .tab-inactive {
            background-color: #f3f4f6;
            color: #4b5563;
            border-bottom: 3px solid transparent;
        }

        .tab-inactive:hover {
            background-color: #e5e7eb;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">

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
    <div class="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-12 mt-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Logo -->
                <div class="w-32 h-32 bg-white rounded-2xl shadow-xl overflow-hidden flex-shrink-0 border-4 border-yellow-500">
                    <?php if($university->logo): ?>
                        <img src="<?php echo e(asset('storage/' . $university->logo)); ?>" alt="<?php echo e($university->name_ar); ?>"  loading="lazy"
                            class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-gradient-to-br from-yellow-500 to-yellow-600 flex items-center justify-center">
                            <span class="text-white text-3xl font-bold"><?php echo e(mb_substr($university->name_ar, 0, 2)); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex-1 text-center md:text-right">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-3"><?php echo e($university->name_ar); ?></h1>
                    <p class="text-gray-300 text-lg mb-4"><?php echo e($university->name_tr); ?></p>
                    <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                        <span class="px-4 py-1.5 bg-yellow-500 text-white rounded-full text-sm font-semibold shadow-lg">
                            <?php echo e($university->type == 'public' ? '🏛️ جامعة حكومية' : '🏢 جامعة خاصة'); ?>

                        </span>
                        <span class="px-4 py-1.5 bg-white/20 text-white rounded-full text-sm font-semibold backdrop-blur-sm">
                            📍 <?php echo e($university->city); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-10">

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12 animate-fadeUp">
            <div class="stat-card bg-white rounded-2xl shadow-md p-5 text-center border-b-4 border-yellow-500 hover:shadow-xl transition">
                <div class="text-3xl mb-2">📊</div>
                <p class="text-2xl font-bold text-gray-800"><?php echo e($university->rank_local ?? '—'); ?></p>
                <p class="text-gray-500 text-sm mt-1">الترتيب المحلي</p>
            </div>
            <div class="stat-card bg-white rounded-2xl shadow-md p-5 text-center border-b-4 border-yellow-500 hover:shadow-xl transition">
                <div class="text-3xl mb-2">🏙️</div>
                <p class="text-2xl font-bold text-gray-800"><?php echo e($university->city); ?></p>
                <p class="text-gray-500 text-sm mt-1">المدينة</p>
            </div>
            <div class="stat-card bg-white rounded-2xl shadow-md p-5 text-center border-b-4 border-yellow-500 hover:shadow-xl transition">
               <div class="text-3xl mb-2">🌐</div>
    <p class="text-2xl font-bold text-gray-800 text-sm">
        <?php
            $langs = is_array($university->languages) ? $university->languages : json_decode($university->languages, true);
            $langMap = [
                'turkish' => 'تركي',
                'english' => 'إنجليزي',
                'arabic' => 'عربي',
                'german' => 'ألماني',
                'french' => 'فرنسي',
                'spanish' => 'إسباني',
                'italian' => 'إيطالي',
                'russian' => 'روسي',
                'chinese' => 'صيني',
            ];
            $langText = '';
            if (is_array($langs)) {
                $langNames = array_map(function ($l) use ($langMap) {
                    return $langMap[$l] ?? $l;
                }, array_slice($langs, 0, 3));
                $langText = implode(' - ', $langNames);
                if (count($langs) > 3) {
                    $langText .= ' +' . (count($langs) - 3);
                }
            }
            echo $langText ?: 'تركي - إنجليزي';
        ?>
    </p>
    <p class="text-gray-500 text-sm mt-1">لغات التدريس</p>

            </div>
            <div class="stat-card bg-white rounded-2xl shadow-md p-5 text-center border-b-4 border-yellow-500 hover:shadow-xl transition">
                <div class="text-3xl mb-2">🌍</div>
                <?php if($university->website): ?>
                    <a href="<?php echo e($university->website); ?>" target="_blank"
                        class="text-blue-600 text-sm hover:underline font-medium">زيارة الموقع</a>
                <?php else: ?>
                    <p class="text-gray-400">—</p>
                <?php endif; ?>
                <p class="text-gray-500 text-sm mt-1">الموقع الإلكتروني</p>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
            <!-- Tab Headers -->
            <div class="flex flex-wrap border-b border-gray-200 bg-gray-50">
                <button onclick="showTab('about')" id="tabAbout"
                    class="tab-active px-6 py-3 font-semibold transition rounded-t-lg"> عن الجامعة</button>
                <button onclick="showTab('specialties')" id="tabSpecialties"
                    class="tab-inactive px-6 py-3 font-semibold transition rounded-t-lg"> تخصصات الجامعة</button>
                <button onclick="showTab('admissions')" id="tabAdmissions"
                    class="tab-inactive px-6 py-3 font-semibold transition rounded-t-lg"> المفاضلات</button>
                <button onclick="showTab('postgraduateQuotas')" id="tabPostgraduateQuotas"
                    class="tab-inactive px-6 py-3 font-semibold transition"> مفاضلات الدراسات العليا</button>
                <button onclick="showTab('video')" id="tabVideo"
                    class="tab-inactive px-6 py-3 font-semibold transition rounded-t-lg"> فيديو تعريفي</button>
                <button onclick="showTab('gallery')" id="tabGallery"
                    class="tab-inactive px-6 py-3 font-semibold transition rounded-t-lg"> معرض الصور</button>
        
<?php if($university->type == 'private'): ?>
    <button onclick="showTab('programs')" id="tabPrograms" class="tab-inactive px-6 py-3 font-semibold transition rounded-t-lg">
        برامج الدراسات العليا 
    </button>
<?php endif; ?>

            </div>

            <!-- Tab 1: عن الجامعة -->
            <div id="aboutTab" class="p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="w-8 h-1 bg-yellow-500 rounded-full"></span>
                            نبذة عن الجامعة
                        </h2>
                        <p class="text-gray-600 leading-relaxed text-justify">
                            <?php echo e($university->description ?? 'لا يوجد وصف متاح حالياً'); ?>

                        </p>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 shadow-inner">
                        <h3 class="font-bold text-gray-800 mb-4 text-lg flex items-center gap-2">
                            <span class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center text-white text-xs">i</span>
                            معلومات سريعة
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-500">🏷️ النوع</span>
                                <span class="text-gray-800 font-semibold"><?php echo e($university->type == 'public' ? 'حكومية' : 'خاصة'); ?></span>
                            </div>
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-500">📍 المدينة</span>
                                <span class="text-gray-800 font-semibold"><?php echo e($university->city); ?></span>
                            </div>
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-500">📊 الترتيب المحلي</span>
                                <span class="text-gray-800 font-semibold"><?php echo e($university->rank_local ?? 'غير محدد'); ?></span>
                            </div>
                            <?php if($university->website): ?>
                                <div class="flex justify-between items-center pt-1">
                                    <span class="text-gray-500">🌐 الموقع</span>
                                    <a href="<?php echo e($university->website); ?>" target="_blank"
                                        class="text-yellow-600 hover:underline text-sm">زيارة الموقع</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 2: تخصصات الجامعة -->
            <div id="specialtiesTab" class="p-6 hidden">
                <div class="flex justify-center gap-4 mb-8">
                    <button id="btnColleges" onclick="showSpecialtyType('colleges')"
                        class="tab-active px-8 py-2 rounded-xl font-semibold transition shadow-md">🏛️ الكليات</button>
                    <button id="btnInstitutes" onclick="showSpecialtyType('institutes')"
                        class="tab-inactive px-8 py-2 rounded-xl font-semibold transition shadow-md">📚 المعاهد</button>
                </div>

                <!-- الكليات -->
                <div id="collegesSection">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php $__currentLoopData = $university->colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition hover:border-yellow-200">
                                <div class="flex justify-between items-start flex-wrap gap-2">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="font-bold text-gray-800 text-lg"><?php echo e($college->name_ar); ?></span>
                                            <?php if($college->pivot->language): ?>
                                                <?php
                                                    $languageMap = [
                                                        'turkish' => ['class' => 'bg-red-100 text-red-700', 'name' => '🇹🇷 تركي'],
                                                        'english' => ['class' => 'bg-blue-100 text-blue-700', 'name' => '🇬🇧 إنجليزي'],
                                                        'arabic' => ['class' => 'bg-green-100 text-green-700', 'name' => '🇸🇦 عربي'],
                                                        'russian' => ['class' => 'bg-purple-100 text-purple-700', 'name' => '🇷🇺 روسي'],
                                                        'chinese' => ['class' => 'bg-orange-100 text-orange-700', 'name' => '🇨🇳 صيني'],
                                                    ];
                                                    $lang = $languageMap[$college->pivot->language] ?? ['class' => 'bg-gray-100 text-gray-700', 'name' => $college->pivot->language];
                                                ?>
                                                <span class="text-xs px-2 py-1 rounded-full <?php echo e($lang['class']); ?>">
                                                    <?php echo e($lang['name']); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($college->majors->count() > 0): ?>
                                            <div class="mt-3 flex flex-wrap gap-2">
                                                <?php $__currentLoopData = $college->majors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $major): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-lg text-xs">
                                                        <?php echo e($major->name_ar); ?>

                                                    </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($university->type == 'private' && !empty($college->pivot->fee)): ?>
                                        <div class="bg-green-50 px-3 py-1.5 rounded-xl text-center min-w-[90px]">
                                            <span class="text-green-700 font-bold text-sm"><?php echo e(number_format($college->pivot->fee)); ?> $</span>
                                            <span class="text-green-500 text-xs block">سنوياً</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- المعاهد -->
                <div id="institutesSection" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php $__currentLoopData = $university->institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition hover:border-yellow-200">
                                <div class="flex justify-between items-start flex-wrap gap-2">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="font-bold text-gray-800 text-lg"><?php echo e($institute->name_ar); ?></span>
                                            <?php if($institute->pivot->language): ?>
                                                <?php
                                                    $languageMap = [
                                                        'turkish' => ['class' => 'bg-red-100 text-red-700', 'name' => '🇹🇷 تركي'],
                                                        'english' => ['class' => 'bg-blue-100 text-blue-700', 'name' => '🇬🇧 إنجليزي'],
                                                        'arabic' => ['class' => 'bg-green-100 text-green-700', 'name' => '🇸🇦 عربي'],
                                                        'russian' => ['class' => 'bg-purple-100 text-purple-700', 'name' => '🇷🇺 روسي'],
                                                        'chinese' => ['class' => 'bg-orange-100 text-orange-700', 'name' => '🇨🇳 صيني'],
                                                    ];
                                                    $lang = $languageMap[$institute->pivot->language] ?? ['class' => 'bg-gray-100 text-gray-700', 'name' => $institute->pivot->language];
                                                ?>
                                                <span class="text-xs px-2 py-1 rounded-full <?php echo e($lang['class']); ?>">
                                                    <?php echo e($lang['name']); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if($university->type == 'private' && !empty($institute->pivot->fee)): ?>
                                        <div class="bg-green-50 px-3 py-1.5 rounded-xl text-center min-w-[90px]">
                                            <span class="text-green-700 font-bold text-sm"><?php echo e(number_format($institute->pivot->fee)); ?> $</span>
                                            <span class="text-green-500 text-xs block">سنوياً</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Tab 3: المفاضلات والتسجيل -->
            <div id="admissionsTab" class="p-6 hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
                    <span>📅</span> المفاضلات والتسجيل
                </h2>
                <?php if(isset($university->quotas) && $university->quotas->count() > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $university->quotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-5 border-r-4 border-yellow-500 hover:shadow-md transition">
                                <div class="flex flex-wrap justify-between items-center mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-gray-800 text-lg">المفاضلة <?php echo e($quota->competition_number); ?></span>
                                        <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full"><?php echo e($quota->application_method); ?></span>
                                    </div>
                                    <?php if($quota->local_rank && $quota->local_rank != '**'): ?>
                                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">📊 الترتيب: <?php echo e($quota->local_rank); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div><span class="text-gray-500 block text-xs">📅 بدء التسجيل</span><span class="font-semibold"><?php echo e(\Carbon\Carbon::parse($quota->registration_start)->format('d/m/Y')); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">⏰ انتهاء التسجيل</span><span class="font-semibold text-red-600"><?php echo e(\Carbon\Carbon::parse($quota->registration_end)->format('d/m/Y')); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">📊 النتائج</span><span><?php echo e($quota->results_date ? \Carbon\Carbon::parse($quota->results_date)->format('d/m/Y') : '—'); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">📜 الشهادات المقبولة</span>
                                        <div class="flex flex-wrap gap-1 mt-1">
                                            <?php
                                                $certs = is_string($quota->accepted_certificates) ? json_decode($quota->accepted_certificates, true) : $quota->accepted_certificates;
                                                if (is_array($certs)) {
                                                    foreach ($certs as $cert) {
                                                        echo '<span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full text-xs">' . trim($cert) . '</span>';
                                                    }
                                                } else {
                                                    echo '<span class="text-gray-500">' . ($quota->accepted_certificates ?? '—') . '</span>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($quota->details): ?>
                                    <div class="mt-3 pt-2 border-t border-gray-100 text-sm text-gray-500">📋 <?php echo e($quota->details); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="bg-yellow-50 rounded-xl p-8 text-center border-r-4 border-yellow-500">
                        <p class="text-yellow-800">لا توجد مفاضلات مسجلة لهذه الجامعة حالياً</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tab 4: المفاضلات الدراسات العليا -->
            <div id="postgraduateQuotasTab" class="p-6 hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
                    <span>🎓</span> المفاضلات والتسجيل (دراسات عليا)
                </h2>
                <?php if(isset($university->postgraduateQuotas) && $university->postgraduateQuotas->count() > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $university->postgraduateQuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-5 border-r-4 border-yellow-500 hover:shadow-md transition">
                                <div class="flex flex-wrap justify-between items-center mb-3">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-gray-800 text-lg">المفاضلة <?php echo e($quota->competition_number); ?></span>
                                        <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full"><?php echo e($quota->application_method); ?></span>
                                    </div>
                                    <?php if($quota->local_rank && $quota->local_rank != '**'): ?>
                                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">📊 الترتيب: <?php echo e($quota->local_rank); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if($quota->institute): ?>
                                    <div class="mb-3">
                                        <span class="text-xs text-gray-500">المعهد / البرنامج:</span>
                                        <span class="text-sm font-semibold text-gray-700 mr-2"><?php echo e($quota->institute); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div><span class="text-gray-500 block text-xs">📅 بدء التسجيل</span><span class="font-semibold"><?php echo e(\Carbon\Carbon::parse($quota->registration_start)->format('d/m/Y')); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">⏰ انتهاء التسجيل</span><span class="font-semibold text-red-600"><?php echo e(\Carbon\Carbon::parse($quota->registration_end)->format('d/m/Y')); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">📊 النتائج</span><span><?php echo e($quota->results_date ? \Carbon\Carbon::parse($quota->results_date)->format('d/m/Y') : '—'); ?></span></div>
                                    <div><span class="text-gray-500 block text-xs">📜 الشهادات المقبولة</span>
                                        <div class="flex flex-wrap gap-1 mt-1">
                                            <?php
                                                $certs = is_string($quota->accepted_certificates) ? json_decode($quota->accepted_certificates, true) : $quota->accepted_certificates;
                                                if (is_array($certs)) {
                                                    foreach ($certs as $cert) {
                                                        echo '<span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full text-xs">' . trim($cert) . '</span>';
                                                    }
                                                } else {
                                                    echo '<span class="text-gray-500">' . ($quota->accepted_certificates ?? '—') . '</span>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($quota->details): ?>
                                    <div class="mt-3 pt-2 border-t border-gray-100 text-sm text-gray-500">📋 <?php echo e($quota->details); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="bg-yellow-50 rounded-xl p-8 text-center border-r-4 border-yellow-500">
                        <p class="text-yellow-800">لا توجد مفاضلات دراسات عليا مسجلة لهذه الجامعة حالياً</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tab 5: فيديو تعريفي -->
            <div id="videoTab" class="p-6 hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
                    <span>🎥</span> الفيديو التعريفي للجامعة
                </h2>
                <?php if($university->video_url): ?>
                    <div class="rounded-2xl overflow-hidden shadow-xl">
                        <iframe class="w-full aspect-video" src="<?php echo e($university->video_url); ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-100 rounded-2xl p-12 text-center">
                        <div class="text-6xl mb-4">🎬</div>
                        <p class="text-gray-500">لا يوجد فيديو تعريفي لهذه الجامعة حالياً</p>
                    </div>
                <?php endif; ?>
            </div>

<!-- Tab 6: معرض الصور -->
<div id="galleryTab" class="p-6 hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
        <span>🖼️</span> معرض الصور
    </h2>
    <?php if($university->images && $university->images != 'null' && $university->images != '[]'): ?>
        <?php 
            $images = is_array($university->images) ? $university->images : json_decode($university->images, true);
        ?>
        <?php if(is_array($images) && count($images) > 0): ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
             <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="relative group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer aspect-square"
         onclick="openLightbox(<?php echo e($index); ?>)">  
        <img src="<?php echo e(asset('storage/' . $image)); ?>"  loading="lazy"
             alt="<?php echo e($university->name_ar); ?>"
             class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
            </svg>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="bg-gray-50 rounded-xl p-12 text-center border-2 border-dashed border-gray-200">
                <div class="text-6xl mb-4">🖼️</div>
                <p class="text-gray-500 text-lg">لا توجد صور لهذه الجامعة حالياً</p>
                <p class="text-gray-400 text-sm mt-2">سيتم إضافة الصور قريباً</p>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="bg-gray-50 rounded-xl p-12 text-center border-2 border-dashed border-gray-200">
            <div class="text-6xl mb-4">🖼️</div>
            <p class="text-gray-500 text-lg">لا توجد صور لهذه الجامعة حالياً</p>
            <p class="text-gray-400 text-sm mt-2">سيتم إضافة الصور قريباً</p>
        </div>
    <?php endif; ?>
</div>
<!-- Tab 7: البرامج الدراسية -->
<?php if($university->type == 'private'): ?>

<div id="programsTab" class="p-6 hidden">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
        <span>🎓</span> برامج الدراسات العليا
    </h2>
    
    <?php if($university->type == 'private'): ?>
        <?php
            $masterPrograms = $university->programs->where('level', 'master')->where('is_active', true);
            $phdPrograms = $university->programs->where('level', 'phd')->where('is_active', true);
        ?>
        
        <!-- أزرار التبديل بين الماجستير والدكتوراه -->
        <div class="flex justify-center gap-4 mb-8">
            <button id="btnMaster" onclick="showProgramType('master')"
                class="tab-active px-8 py-2 rounded-xl font-semibold transition shadow-md">
                📖 ماجستير
            </button>
            <button id="btnPhd" onclick="showProgramType('phd')"
                class="tab-inactive px-8 py-2 rounded-xl font-semibold transition shadow-md">
                📚 دكتوراه
            </button>
        </div>
        
        <!-- برامج الماجستير -->
        <div id="masterSection">
            <?php if($masterPrograms->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php $__currentLoopData = $masterPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-4 border-r-4 border-yellow-500 hover:shadow-md transition">
                            <h4 class="font-bold text-gray-800"><?php echo e($program->program_name_ar); ?></h4>
                            <?php if($program->program_name_tr): ?>
                                <p class="text-xs text-gray-500"><?php echo e($program->program_name_tr); ?></p>
                            <?php endif; ?>
                            <div class="flex flex-wrap gap-3 mt-2 text-sm">
                                <?php if($program->language): ?>
                                    <span class="text-gray-600">🌐 
                                        <?php switch($program->language):
                                            case ('turkish'): ?> تركي <?php break; ?>
                                            <?php case ('english'): ?> إنجليزي <?php break; ?>
                                            <?php case ('arabic'): ?> عربي <?php break; ?>
                                            <?php default: ?> <?php echo e($program->language); ?>

                                        <?php endswitch; ?>
                                    </span>
                                <?php endif; ?>
                                <?php if($program->duration): ?>
                                    <span class="text-gray-600">⏱️ <?php echo e($program->duration); ?> سنوات</span>
                                <?php endif; ?>
                                <?php if($program->fee): ?>
                                    <span class="text-green-600 font-semibold"> <?php echo e(number_format($program->fee)); ?> $</span>
                                <?php endif; ?>
                            </div>
                            <?php if($program->description): ?>
                                <p class="text-xs text-gray-500 mt-2"><?php echo e($program->description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="bg-yellow-50 rounded-xl p-8 text-center border-r-4 border-yellow-500">
                    <div class="text-4xl mb-3">📖</div>
                    <p class="text-yellow-800">لا توجد برامج ماجستير مسجلة لهذه الجامعة حالياً</p>
                    <p class="text-yellow-600 text-sm mt-2">سيتم إضافة البرامج قريباً</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- برامج الدكتوراه -->
        <div id="phdSection" class="hidden">
            <?php if($phdPrograms->count() > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php $__currentLoopData = $phdPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-4 border-r-4 border-yellow-500 hover:shadow-md transition">
                            <h4 class="font-bold text-gray-800"><?php echo e($program->program_name_ar); ?></h4>
                            <?php if($program->program_name_tr): ?>
                                <p class="text-xs text-gray-500"><?php echo e($program->program_name_tr); ?></p>
                            <?php endif; ?>
                            <div class="flex flex-wrap gap-3 mt-2 text-sm">
                                <?php if($program->language): ?>
                                    <span class="text-gray-600">🌐 
                                        <?php switch($program->language):
                                            case ('turkish'): ?> تركي <?php break; ?>
                                            <?php case ('english'): ?> إنجليزي <?php break; ?>
                                            <?php case ('arabic'): ?> عربي <?php break; ?>
                                            <?php default: ?> <?php echo e($program->language); ?>

                                        <?php endswitch; ?>
                                    </span>
                                <?php endif; ?>
                                <?php if($program->duration): ?>
                                    <span class="text-gray-600">⏱️ <?php echo e($program->duration); ?> سنوات</span>
                                <?php endif; ?>
                                <?php if($program->fee): ?>
                                    <span class="text-green-600 font-semibold"> <?php echo e(number_format($program->fee)); ?> $</span>
                                <?php endif; ?>
                            </div>
                            <?php if($program->description): ?>
                                <p class="text-xs text-gray-500 mt-2"><?php echo e($program->description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="bg-yellow-50 rounded-xl p-8 text-center border-r-4 border-yellow-500">
                    <div class="text-4xl mb-3">📚</div>
                    <p class="text-yellow-800">لا توجد برامج دكتوراه مسجلة لهذه الجامعة حالياً</p>
                    <p class="text-yellow-600 text-sm mt-2">سيتم إضافة البرامج قريباً</p>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="bg-blue-50 rounded-xl p-8 text-center border-r-4 border-blue-500">
            <div class="text-4xl mb-3">🏛️</div>
            <p class="text-blue-800 text-lg">هذه الجامعة حكومية</p>
            <p class="text-blue-600 text-sm mt-2">برامج الدراسات العليا متاحة فقط للجامعات الخاصة</p>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>
        <!-- Related Universities -->
        <?php
            $otherUniversities = App\Models\University::where('id', '!=', $university->id)->limit(3)->get();
        ?>
        <?php if($otherUniversities->count() > 0): ?>
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center flex items-center justify-center gap-2">
                    <span>🎓</span> جامعات أخرى قد تهمك
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $otherUniversities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('universities.show', $other->id)); ?>"
                            class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="p-4 flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex-shrink-0">
                                    <?php if($other->logo): ?>
                                        <img src="<?php echo e(asset('storage/' . $other->logo)); ?>"  loading="lazy" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                                            <span class="text-white text-sm font-bold"><?php echo e(mb_substr($other->name_ar, 0, 2)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 group-hover:text-yellow-600 transition"><?php echo e($other->name_ar); ?></h3>
                                    <p class="text-xs text-gray-500"><?php echo e($other->city); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; <?php echo e(date('Y')); ?> الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

       <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function showProgramType(type) {
    const masterSection = document.getElementById('masterSection');
    const phdSection = document.getElementById('phdSection');
    const btnMaster = document.getElementById('btnMaster');
    const btnPhd = document.getElementById('btnPhd');
    
    if (type === 'master') {
        masterSection.classList.remove('hidden');
        phdSection.classList.add('hidden');
        btnMaster.classList.remove('tab-inactive');
        btnMaster.classList.add('tab-active');
        btnPhd.classList.remove('tab-active');
        btnPhd.classList.add('tab-inactive');
    } else {
        masterSection.classList.add('hidden');
        phdSection.classList.remove('hidden');
        btnPhd.classList.remove('tab-inactive');
        btnPhd.classList.add('tab-active');
        btnMaster.classList.remove('tab-active');
        btnMaster.classList.add('tab-inactive');
    }
}
        // تمرير الصور إلى JavaScript (يجب أن يكون قبل تعريف الدوال)
        window.galleryImages = <?php echo json_encode($images ?? [], 15, 512) ?>;
        
        // Show Tab function
        function showTab(tab) {
            const tabs = ['about', 'specialties', 'admissions', 'postgraduateQuotas', 'video', 'gallery','programs'];
            tabs.forEach(t => {
                const tabEl = document.getElementById(t + 'Tab');
                const btnEl = document.getElementById('tab' + t.charAt(0).toUpperCase() + t.slice(1));
                if (tabEl) tabEl.classList.add('hidden');
                if (btnEl) {
                    btnEl.classList.remove('tab-active');
                    btnEl.classList.add('tab-inactive');
                }
            });
            const activeTab = document.getElementById(tab + 'Tab');
            const activeBtn = document.getElementById('tab' + tab.charAt(0).toUpperCase() + tab.slice(1));
            if (activeTab) activeTab.classList.remove('hidden');
            if (activeBtn) {
                activeBtn.classList.remove('tab-inactive');
                activeBtn.classList.add('tab-active');
            }
        }

        // Show Specialty Type function
        function showSpecialtyType(type) {
            const collegesSection = document.getElementById('collegesSection');
            const institutesSection = document.getElementById('institutesSection');
            const btnColleges = document.getElementById('btnColleges');
            const btnInstitutes = document.getElementById('btnInstitutes');

            if (collegesSection) collegesSection.classList.toggle('hidden', type !== 'colleges');
            if (institutesSection) institutesSection.classList.toggle('hidden', type !== 'institutes');
            if (btnColleges) {
                btnColleges.classList.toggle('tab-active', type === 'colleges');
                btnColleges.classList.toggle('tab-inactive', type !== 'colleges');
            }
            if (btnInstitutes) {
                btnInstitutes.classList.toggle('tab-active', type === 'institutes');
                btnInstitutes.classList.toggle('tab-inactive', type !== 'institutes');
            }
        }

        // Lightbox function
        function openLightbox(clickedIndex) {
            const images = window.galleryImages || [];
            if (images.length === 0) return;
            
            const lightbox = document.createElement('div');
            lightbox.id = 'lightbox';
            lightbox.className = 'fixed inset-0 bg-black/95 z-50 hidden flex-col items-center justify-center';
            lightbox.innerHTML = `
                <div class="relative w-full h-full flex items-center justify-center">
                    <button onclick="window.closeLightbox()" class="absolute top-4 right-4 text-white text-3xl hover:text-yellow-500 transition z-10">&times;</button>
                    <div class="swiper lightbox-swiper w-full h-full">
                        <div class="swiper-wrapper" id="lightbox-wrapper"></div>
                        <div class="swiper-button-next !text-white !bg-black/50 !w-10 !h-10 rounded-full"></div>
                        <div class="swiper-button-prev !text-white !bg-black/50 !w-10 !h-10 rounded-full"></div>
                        <div class="swiper-pagination !bottom-4"></div>
                    </div>
                </div>
            `;
            document.body.appendChild(lightbox);
            
            const wrapper = document.getElementById('lightbox-wrapper');
            wrapper.innerHTML = '';
            
            images.forEach(src => {
                const slide = document.createElement('div');
                slide.className = 'swiper-slide flex items-center justify-center';
                slide.innerHTML = `
                    <div class="w-full h-full flex items-center justify-center p-8">
                        <img src="/storage/${src}"  loading="lazy"
                             class="max-w-[90vw] max-h-[90vh] w-auto h-auto object-contain rounded-lg shadow-2xl">
                    </div>
                `;
                wrapper.appendChild(slide);
            });
            
            setTimeout(() => {
                new Swiper('.lightbox-swiper', {
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    initialSlide: parseInt(clickedIndex),
                });
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
            }, 100);
            
            document.body.style.overflow = 'hidden';
        }

        // Close Lightbox function
        window.closeLightbox = function() {
            const lightbox = document.getElementById('lightbox');
            if (lightbox) {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                setTimeout(() => lightbox.remove(), 300);
            }
            document.body.style.overflow = '';
        }

        // Close with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.closeLightbox();
            }
        });
    </script>
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
</html><?php /**PATH C:\laragon\www\testProject\resources\views/universities/show.blade.php ENDPATH**/ ?>