<?php $__env->startSection('title', 'إعدادات التواصل'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-4">
                    <span class="text-3xl">⚙️</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">إعدادات التواصل</h1>
                <p class="text-gray-500 text-sm mt-1">تحديث معلومات الاتصال التي تظهر في الموقع</p>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="bg-green-50 border-r-4 border-green-500 text-green-700 p-3 rounded-lg mb-6 text-sm">
                    ✅ <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('consultant.contact.config.update')); ?>">
                <?php echo csrf_field(); ?>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- WhatsApp Number -->
                    <div class="p-5 border-b border-gray-100">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            📱 رقم الواتساب
                        </label>
                        <input type="text" name="whatsapp_number" value="<?php echo e(\App\Models\Setting::get('whatsapp_number')); ?>"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-yellow-400 focus:outline-none"
                            placeholder="مثال: 905551234567">
                        <p class="text-xs text-gray-400 mt-1">أدخل الرقم بدون علامة + (مثال: 905551234567)</p>
                    </div>

                    <!-- Email -->
                    <div class="p-5 border-b border-gray-100">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            📧 البريد الإلكتروني
                        </label>
                        <input type="email" name="contact_email" value="<?php echo e(\App\Models\Setting::get('contact_email')); ?>"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-yellow-400 focus:outline-none"
                            placeholder="info@example.com">
                        <p class="text-xs text-gray-400 mt-1">سيظهر هذا البريد في صفحة اتصل بنا</p>
                    </div>

                    <!-- Address -->
                    <div class="p-5 border-b border-gray-100">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            📍 العنوان
                        </label>
                        <input type="text" name="address" value="<?php echo e(\App\Models\Setting::get('address')); ?>"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-yellow-400 focus:outline-none"
                            placeholder="اسطنبول، تركيا">
                    </div>

                    <!-- Working Hours -->
                    <div class="p-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            🕒 ساعات العمل
                        </label>
                        <input type="text" name="working_hours" value="<?php echo e(\App\Models\Setting::get('working_hours')); ?>"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-yellow-400 focus:outline-none"
                            placeholder="الأحد - الخميس: 9:00 - 18:00">
                    </div>

                    <!-- Buttons -->
                    <div class="bg-gray-50 px-5 py-4 flex gap-3">
                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                            💾 حفظ الإعدادات
                        </button>
                        <a href="<?php echo e(route('consultant.dashboard')); ?>"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2 rounded-lg transition">
                            ← العودة
                        </a>
                    </div>
                </div>
            </form>

            <!-- Info Note -->
            <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-3">
                <p class="text-blue-600 text-xs flex items-center gap-2">
                    <span>💡</span>
                    هذه المعلومات ستظهر في صفحة "اتصل بنا" وفي تذييل الموقع (Footer)
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\testproject-main\resources\views/consultant/settings.blade.php ENDPATH**/ ?>