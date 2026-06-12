<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="ترتيب الجامعات التركية حسب التصنيف المحلي والعالمي. تعرف على أفضل الجامعات في تركيا لعام <?php echo e(date('Y')); ?>">
    <meta name="keywords"
        content="ترتيب الجامعات التركية, أفضل الجامعات في تركيا, تصنيف الجامعات التركية, ترتيب الجامعات محليا">
    <meta property="og:title" content="ترتيب الجامعات التركية | الهلال للاستشارات التعليمية">
    <meta property="og:description" content="قائمة بأفضل الجامعات التركية حسب الترتيب المحلي والعالمي">
    <meta property="og:image" content="<?php echo e(asset('images/logo.png')); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <title>ترتيب الجامعات التركية | الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9fafb;
        }

        .table-header {
            background: linear-gradient(135deg, #1e3a5f 0%, #0f2b44 100%);
        }
    </style>
</head>

<body>

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

    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">📊 ترتيب الجامعات التركية</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">قائمة بأفضل الجامعات التركية حسب التصنيف المحلي</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="table-header text-white">
                            <th class="px-4 py-3 text-center w-24">الترتيب</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة (تركي)</th>
                            <th class="px-4 py-3 text-center">المدينة</th>
                            <th class="px-4 py-3 text-center">النوع</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-4 py-3 text-center font-bold">
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                        <?php echo e($university->rank_local); ?>

                                    </span>
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    <a href="<?php echo e(route('universities.show', $university->id)); ?>"
                                        class="hover:text-yellow-600 transition">
                                        <?php echo e($university->name_ar); ?>

                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-600"><?php echo e($university->name_tr); ?></td>
                                <td class="px-4 py-3 text-center"><?php echo e($university->city); ?></td>
                                <td class="px-4 py-3 text-center">
                                    <?php if($university->type == 'public'): ?>
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">🏢
                                            حكومية</span>
                                    <?php else: ?>
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">🏛️ خاصة</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-16 text-gray-500">
                                    <div class="text-lg">📭 لا توجد بيانات ترتيب متاحة حالياً</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

</html><?php /**PATH C:\laragon\www\testProject\resources\views/universities/ranking.blade.php ENDPATH**/ ?>