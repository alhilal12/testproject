

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">📢 إدارة الإعلانات</h1>
            <a href="<?php echo e(route('admin.announcements.create')); ?>"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                + إضافة جديد
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-right">#</th>
                        <th class="px-4 py-3 text-right">العنوان</th>
                        <th class="px-4 py-3 text-center">الصورة</th>
                        <th class="px-4 py-3 text-center">الحالة</th>
                        <th class="px-4 py-3 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3"><?php echo e($index + 1); ?></td>
                            <td class="px-4 py-3"><?php echo e($announcement->title_ar); ?></td>
                            <td class="px-4 py-3 text-center">
                                <?php if($announcement->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $announcement->image)); ?>"
                                        class="w-16 h-10 object-cover rounded">
                                <?php else: ?>
                                    <span class="text-gray-400">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="<?php echo e($announcement->is_active ? 'text-green-600' : 'text-red-600'); ?>">
                                    <?php echo e($announcement->is_active ? '✅ نشط' : '❌ غير نشط'); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="<?php echo e(route('admin.announcements.edit', $announcement)); ?>"
                                    class="text-blue-600 hover:text-blue-800 mx-1">✏️</a>
                                <form action="<?php echo e(route('admin.announcements.destroy', $announcement)); ?>" method="POST"
                                    class="inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-800 mx-1"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500">📭 لا توجد إعلانات حتى الآن</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\testProject\resources\views/admin/announcements/index.blade.php ENDPATH**/ ?>