<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="قائمة بالجامعات التركية المعترف بها في الدول العربية. تعرف على الجامعات المعتمدة في السعودية، مصر، الأردن، الإمارات، الكويت، قطر، والعراق">
<meta name="keywords" content="الجامعات المعترف بها في السعودية, الجامعات المعترف بها في مصر, الجامعات المعترف بها في الأردن, الجامعات التركية المعترف بها, شهادات معترف بها">
<meta property="og:title" content="الجامعات التركية المعترف بها | الهلال للاستشارات التعليمية">
<meta property="og:description" content="اكتشف الجامعات التركية المعترف بها في مختلف الدول العربية">
<meta property="og:image" content="<?php echo e(asset('images/logo.png')); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<link rel="canonical" href="<?php echo e(url()->current()); ?>">

<?php if(request('country')): ?>
    <meta name="description" content="الجامعات التركية المعترف بها في <?php echo e($countries->where('country_code', request('country'))->first()->country_name_ar ?? 'هذه الدولة'); ?> - قائمة محدثة">
<?php endif; ?>
    <title>الجامعات المعترف بها - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .dropdown-content.open {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-50">

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

    <div class="container mx-auto px-4 py-8">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">🌍 الجامعات المعترف بها</h1>
            <p class="text-gray-500">تعرف على الجامعات المعترف بها في مختلف الدول</p>
        </div>

        <!-- Filter by Country -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-8">
            <form method="GET" class="flex flex-wrap gap-4 items-center">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-semibold mb-1">اختر الدولة</label>
                    <select name="country" class="w-full px-4 py-2 border rounded-lg">
                        <option value="">جميع الدول</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->country_code); ?>" <?php echo e(request('country') == $country->country_code ? 'selected' : ''); ?>>
                                <?php echo e($country->country_name_ar); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg">بحث</button>
                    <a href="<?php echo e(route('universities.recognitions')); ?>" class="bg-gray-200 px-4 py-2 rounded-lg mr-2">إعادة تعيين</a>
                </div>
            </form>
        </div>

        <!-- Universities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php $__empty_1 = true; $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                    
                    <!-- Card Body -->
                    <div class="p-4">
                        <!-- Logo & Name -->
                        <div class="flex items-center gap-3 mb-3">
                            <?php if($university->logo): ?>
                                <img src="<?php echo e(asset('storage/' . $university->logo)); ?>"  loading="lazy" class="w-10 h-10 rounded-full object-cover">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold text-sm">
                                    <?php echo e(mb_substr($university->name_ar, 0, 2)); ?>

                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="font-bold text-gray-800"><?php echo e($university->name_ar); ?></h3>
                                <p class="text-xs text-gray-500">📍 <?php echo e($university->city); ?></p>
                            </div>
                        </div>
                        
                        <!-- Dropdown for Countries -->
                        <?php
                            $recognitions = $university->recognitions;
                        ?>
                        <?php if($recognitions->count() > 0): ?>
                            <div class="mt-3">
                                <button onclick="toggleDropdown(<?php echo e($index); ?>)" 
                                        class="w-full flex items-center justify-between px-3 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg transition text-sm text-gray-600">
                                    <span class="flex items-center gap-2">
                                        <span>🌍</span>
                                        <span>الدول المعترف بها</span>
                                        <span class="text-xs bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded-full"><?php echo e($recognitions->count()); ?></span>
                                    </span>
                                    <svg id="arrow-<?php echo e($index); ?>" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="dropdown-<?php echo e($index); ?>" class="dropdown-content mt-2 space-y-1 pr-2">
                                    <?php $__currentLoopData = $recognitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recognition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex items-center gap-2 text-sm text-gray-600 py-1 px-2 hover:bg-green-50 rounded">
                                            <span>
                                                <?php switch($recognition->country_code):
                                                    case ('SA'): ?> 🇸🇦 <?php break; ?>
                                                    <?php case ('EG'): ?> 🇪🇬 <?php break; ?>
                                                    <?php case ('JO'): ?> 🇯🇴 <?php break; ?>
                                                    <?php case ('AE'): ?> 🇦🇪 <?php break; ?>
                                                    <?php case ('QA'): ?> 🇶🇦 <?php break; ?>
                                                    <?php case ('KW'): ?> 🇰🇼 <?php break; ?>
                                                    <?php case ('SY'): ?> 🇸🇾 <?php break; ?>
                                                    <?php case ('IQ'): ?> 🇮🇶 <?php break; ?>
                                                    <?php case ('LB'): ?> 🇱🇧 <?php break; ?>
                                                    <?php case ('PS'): ?> 🇵🇸 <?php break; ?>
                                                    <?php default: ?> 🌍
                                                <?php endswitch; ?>
                                            </span>
                                            <span><?php echo e($recognition->country_name_ar); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="mt-3 px-3 py-2 bg-gray-50 rounded-lg text-xs text-gray-400 text-center">
                                لا توجد دول معترف بها
                            </div>
                        <?php endif; ?>
                        
                        <!-- Action Button -->
                        <a href="<?php echo e(route('universities.show', $university->id)); ?>" 
                           class="block mt-4 text-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 rounded-lg transition">
                            تفاصيل الجامعة
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-16 bg-white rounded-xl">
                    <div class="text-6xl mb-4">🌍</div>
                    <p class="text-gray-500">لا توجد جامعات مسجلة في هذه الدولة</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            <?php echo e($universities->appends(request()->query())->links()); ?>

        </div>
    </div>

    <script>
        function toggleDropdown(index) {
            const dropdown = document.getElementById('dropdown-' + index);
            const arrow = document.getElementById('arrow-' + index);
            
            dropdown.classList.toggle('open');
            
            if (dropdown.classList.contains('open')) {
                arrow.style.transform = 'rotate(180deg)';
            } else {
                arrow.style.transform = 'rotate(0deg)';
            }
        }
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

</html><?php /**PATH C:\laragon\www\testProject\resources\views/universities/recognitions.blade.php ENDPATH**/ ?>