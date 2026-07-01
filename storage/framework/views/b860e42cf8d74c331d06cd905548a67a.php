<section class="py-16 lg:py-24 bg-white" id="contact" dir="rtl">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="mb-16">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4"
                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                اتصل بنا
            </h2>
            <div class="flex items-center gap-4">
                <div class="h-1 w-16 bg-yellow-600"></div>
                <p class="text-lg text-gray-600" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    نحن هنا للإجابة على جميع استفساراتك والمساعدة في رحلتك الأكاديمية
                </p>
            </div>
        </div>

        <!-- Main Grid: Contact Info + Form -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Left Side: Contact Information -->
            <div class="space-y-8 contact-info-section">

                <!-- Address Card -->
                <div
                    class="contact-card group flex items-start gap-4 p-6 rounded-lg hover:bg-yellow-50 transition-all duration-500 transform hover:translate-x-2 cursor-pointer">
                    <div class="flex-shrink-0">
                        <div
                            class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 group-hover:bg-yellow-200 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-yellow-600 transition-colors"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            العنوان
                        </h3>
                        <p class="text-gray-600" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            <?php echo e(\App\Models\Setting::get('address') ?: 'إسطنبول، تركيا'); ?>

                        </p>
                    </div>
                </div>

                <!-- WhatsApp Card -->
                <?php
                    $whatsappNumber = \App\Models\Setting::get('whatsapp_number');
                    // تنظيف الرقم: حذف + و 00 من البداية
                    $cleanNumber = preg_replace('/^(00|\+)/', '', $whatsappNumber);
                    $whatsappLink = $whatsappNumber ? 'https://wa.me/' . $cleanNumber . '?text=مرحباً،%20أحتاج%20إلى%20استشارة%20بخصوص%20الجامعات%20التركية' : '#';
                ?>
                <a href="<?php echo e($whatsappLink); ?>" target="_blank"
                    class="contact-card group flex items-start gap-4 p-6 rounded-lg hover:bg-yellow-50 transition-all duration-500 transform hover:translate-x-2 cursor-pointer block">
                    <div class="flex-shrink-0">
                        <div
                            class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 group-hover:bg-green-500 transition-all duration-300">
                            <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition-all duration-300"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-green-600 transition-colors"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            واتس اب
                        </h3>
                        <p class="text-gray-600 group-hover:text-green-600 transition-colors"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif; direction: ltr; text-align: left;">
                            <?php echo e($whatsappNumber ?: '+90 534 732 8625'); ?>

                        </p>
                        <p class="text-xs text-gray-400 mt-1">اضغط للتواصل المباشر</p>
                    </div>
                </a>

                <!-- Email Card -->
                <?php
                    $contactEmail = \App\Models\Setting::get('contact_email');
                ?>
                <a href="mailto:<?php echo e($contactEmail ?: 'info@alhilal-education.com'); ?>"
                    class="contact-card group flex items-start gap-4 p-6 rounded-lg hover:bg-yellow-50 transition-all duration-500 transform hover:translate-x-2 cursor-pointer block">
                    <div class="flex-shrink-0">
                        <div
                            class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 group-hover:bg-yellow-500 transition-all duration-300">
                            <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition-all duration-300"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-yellow-600 transition-colors"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            البريد الإلكتروني
                        </h3>
                        <p class="text-gray-600 group-hover:text-yellow-600 transition-colors"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            <?php echo e($contactEmail ?: 'info@alhilal-education.com'); ?>

                        </p>
                        <p class="text-xs text-gray-400 mt-1">اضغط لفتح بريدك الإلكتروني</p>
                    </div>
                </a>

                <!-- Working Hours Card -->
                <?php
                    $workingHours = \App\Models\Setting::get('working_hours');
                ?>
                <?php if($workingHours): ?>
                    <div
                        class="contact-card group flex items-start gap-4 p-6 rounded-lg hover:bg-yellow-50 transition-all duration-500 transform hover:translate-x-2 cursor-pointer">
                        <div class="flex-shrink-0">
                            <div
                                class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 group-hover:bg-yellow-200 group-hover:scale-110 transition-all duration-300">
                                <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-yellow-600 transition-colors"
                                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                ساعات العمل
                            </h3>
                            <p class="text-gray-600" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                <?php echo e($workingHours); ?>

                            </p>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Right Side: Contact Form -->
            <div class="contact-form-section">
                <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <input type="text" id="name" name="name"
                            value="<?php echo e(old('name', Auth::check() ? Auth::user()->name : '')); ?>"
                            placeholder="الاسم الكامل" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-yellow-600 focus:outline-none transition-all duration-300 focus:shadow-lg">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email"
                            value="<?php echo e(old('email', Auth::check() ? Auth::user()->email : '')); ?>"
                            placeholder="البريد الإلكتروني" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-yellow-600 focus:outline-none transition-all duration-300 focus:shadow-lg">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <input type="tel" id="phone" name="phone"
                            value="<?php echo e(old('phone', Auth::check() && Auth::user()->studentProfile ? Auth::user()->studentProfile->phone : '')); ?>"
                            placeholder="رقم الهاتف (اختياري)"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-yellow-600 focus:outline-none transition-all duration-300 focus:shadow-lg">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" placeholder="رسالتك" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-yellow-600 focus:outline-none transition-all duration-300 focus:shadow-lg resize-none"><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-6 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <span>إرسال الرسالة</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>

                    <?php if(session('success')): ?>
                        <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded animate-pulse">
                            ✓ <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* Contact Card Animation */
    .contact-card {
        animation: slideInRight 0.6s ease-out forwards;
    }

    .contact-card:nth-child(1) {
        animation-delay: 0s;
    }

    .contact-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .contact-card:nth-child(3) {
        animation-delay: 0.2s;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Form Section Animation */
    .contact-form-section {
        animation: slideInLeft 0.6s ease-out forwards;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Input Focus Animation */
    .form-group input:focus,
    .form-group textarea:focus {
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }

    /* Smooth transitions */
    * {
        transition: all 0.3s ease;
    }

    /* RTL Support */
    [dir="rtl"] {
        direction: rtl;
        text-align: right;
    }

    [dir="rtl"] input,
    [dir="rtl"] textarea {
        text-align: right;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-card {
            animation-delay: 0s !important;
        }

        .contact-form-section {
            animation-delay: 0s !important;
        }
    }
</style><?php /**PATH C:\laragon\www\testProject\resources\views/components/contact-us-section.blade.php ENDPATH**/ ?>