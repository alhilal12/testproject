

<?php $__env->startSection('title', 'إدارة المقالات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">📝 إدارة المقالات</h1>
                <a href="<?php echo e(route('admin.articles.create')); ?>"
                    class="bg-white text-yellow-600 hover:bg-yellow-50 px-4 py-2 rounded-lg transition font-semibold">
                    + كتابة مقال جديد
                </a>
            </div>

            <div class="p-6">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-right py-3 px-4">#</th>
                                <th class="text-right py-3 px-4">الصورة</th>
                                <th class="text-right py-3 px-4">العنوان</th>
                                <th class="text-right py-3 px-4">الفئة</th>
                                <th class="text-right py-3 px-4">تاريخ النشر</th>
                                <th class="text-right py-3 px-4">الحالة</th>
                                <th class="text-right py-3 px-4">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4"><?php echo e($article->id); ?></td>
                                    <td class="py-3 px-4">
                                        <?php if($article->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" loading="lazy"
                                                class="w-12 h-12 rounded-lg object-cover">
                                        <?php else: ?>
                                            <div
                                                class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                                📄</div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4 font-semibold"><?php echo e($article->title); ?></td>
                                    <td class="py-3 px-4"><?php echo e($article->category_name); ?></td>
                                    <td class="py-3 px-4"><?php echo e($article->created_at->format('Y-m-d')); ?></td>
                                    <td class="py-3 px-4">
                                        <?php if($article->is_published): ?>
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">منشور</span>
                                        <?php else: ?>
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">مسودة</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">
                                            <a href="<?php echo e(route('admin.articles.edit', $article->id)); ?>"
                                                class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600 transition">تعديل</a>
                                            <form action="<?php echo e(route('admin.articles.destroy', $article->id)); ?>" method="POST"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-10 text-gray-500">
                                        لا توجد مقالات مضافة بعد
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <?php echo e($articles->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\testProject\resources\views/admin/articles/index.blade.php ENDPATH**/ ?>