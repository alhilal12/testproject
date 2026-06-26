<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الجامعات - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

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

    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">إدارة الجامعات</h1>
                <a href="<?php echo e(route('admin.universities.create')); ?>"
                    class="bg-white text-yellow-600 hover:bg-yellow-50 px-4 py-2 rounded-lg transition font-semibold">
                    + إضافة جامعة جديدة
                </a>
            </div>
            

            <div class="p-6">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- ✅ فلترة بسيطة -->
                <div class="mb-6 p-4 bg-gray-50 rounded-xl">
                    <form action="<?php echo e(route('admin.universities.index')); ?>" method="GET" class="flex flex-wrap gap-4 items-end">
                        <div class="flex-1 min-w-[200px]">
                            <label class="block text-gray-700 font-semibold mb-1 text-sm">🏫 اسم الجامعة</label>
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                                placeholder="ابحث باسم الجامعة..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                        </div>
                        
                        <div class="w-48">
                            <label class="block text-gray-700 font-semibold mb-1 text-sm">🏷️ النوع</label>
                            <select name="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="">الكل</option>
                                <option value="public" <?php echo e(request('type') == 'public' ? 'selected' : ''); ?>>حكومية</option>
                                <option value="private" <?php echo e(request('type') == 'private' ? 'selected' : ''); ?>>خاصة</option>
                            </select>
                        </div>
                        
                        <div class="flex gap-2">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">
                                🔍 بحث
                            </button>
                            <a href="<?php echo e(route('admin.universities.index')); ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg transition">
                                🔄 إعادة تعيين
                            </a>
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-right py-3 px-4">#</th>
                                <th class="text-right py-3 px-4">الشعار</th>
                                <th class="text-right py-3 px-4">الاسم (عربي)</th>
                                <th class="text-right py-3 px-4">الاسم (تركي)</th>
                                <th class="text-right py-3 px-4">المدينة</th>
                                <th class="text-right py-3 px-4">النوع</th>
                                <th class="text-right py-3 px-4">البرامج</th>
                                <th class="text-right py-3 px-4">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4"><?php echo e($university->id); ?></td>
                                    <td class="py-3 px-4">
                                        <?php if($university->logo): ?>
                                            <img src="<?php echo e(asset('storage/' . $university->logo)); ?>"  loading="lazy" alt="<?php echo e($university->name_ar); ?>"
                                                class="w-10 h-10 rounded-full object-cover">
                                        <?php else: ?>
                                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 font-semibold"><?php echo e($university->name_ar); ?></td>
                                    <td class="py-3 px-4 text-gray-600"><?php echo e($university->name_tr); ?></td>
                                    <td class="py-3 px-4"><?php echo e($university->city); ?></td>
                                    <td class="py-3 px-4">
                                        <?php if($university->type == 'public'): ?>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">حكومية</span>
                                        <?php else: ?>
                                            <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">خاصة</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4"><?php echo e($university->courses_count); ?></td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">
                                            <a href="<?php echo e(route('admin.universities.edit', $university->id)); ?>"
                                                class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600 transition">
                                                تعديل
                                            </a>
                                            <form action="<?php echo e(route('admin.universities.destroy', $university->id)); ?>"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذه الجامعة؟')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition">
                                                    حذف
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center py-10 text-gray-500">
                                        لا توجد جامعات مضافة بعد
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                   <?php echo e($universities->appends(request()->all())->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; <?php echo e(date('Y')); ?> الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>

</html><?php /**PATH C:\laragon\www\testproject-main\resources\views/admin/universities/index.blade.php ENDPATH**/ ?>