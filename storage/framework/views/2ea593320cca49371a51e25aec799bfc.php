

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-2xl font-bold mb-6">✏️ تعديل الإعلان</h1>

        <form action="<?php echo e(route('admin.announcements.update', $announcement)); ?>" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-xl shadow-md p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (عربي) *</label>
                <input type="text" name="title_ar" value="<?php echo e(old('title_ar', $announcement->title_ar)); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (تركي)</label>
                <input type="text" name="title_tr" value="<?php echo e(old('title_tr', $announcement->title_tr)); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">العنوان (إنجليزي)</label>
                <input type="text" name="title_en" value="<?php echo e(old('title_en', $announcement->title_en)); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (عربي)</label>
                <textarea name="description_ar" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"><?php echo e(old('description_ar', $announcement->description_ar)); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (تركي)</label>
                <textarea name="description_tr" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"><?php echo e(old('description_tr', $announcement->description_tr)); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الوصف (إنجليزي)</label>
                <textarea name="description_en" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"><?php echo e(old('description_en', $announcement->description_en)); ?></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">الصورة الحالية</label>
                <?php if($announcement->image): ?>
                    <div class="mb-2">
                        <img src="<?php echo e(asset('storage/' . $announcement->image)); ?>" class="w-32 h-20 object-cover rounded">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" class="w-full">
                <p class="text-xs text-gray-400 mt-1">اتركه فارغاً إذا لم ترد تغيير الصورة</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">رابط (اختياري)</label>
                <input type="url" name="link" value="<?php echo e(old('link', $announcement->link)); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500"
                    placeholder="https://example.com">
            </div>

            <div class="mb-4 flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" <?php echo e($announcement->is_active ? 'checked' : ''); ?>

                    class="w-5 h-5 text-yellow-500">
                <label class="text-sm font-semibold">نشط</label>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">💾 تحديث</button>
                <a href="<?php echo e(route('admin.announcements.index')); ?>"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg transition">إلغاء</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\testProject\resources\views/admin/announcements/edit.blade.php ENDPATH**/ ?>