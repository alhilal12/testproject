<section class="relative w-full h-screen min-h-96 overflow-hidden" id="hero">

    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 w-full h-full">
        <!-- Background Image -->
        <img src="<?php echo e($backgroundImage ?? asset('images/hero1.jpg')); ?>" alt="AL-HILAL Education Hero Background"
            class="w-full h-full object-cover">

        <!-- Dark Overlay for Better Text Readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/40"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 w-full h-full flex items-center justify-center">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-3xl mx-auto text-center lg:text-right">

                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    <?php echo e($title ?? 'مستقبلك الأكاديمي يبدأ هنا'); ?>

                </h1>

                <!-- Decorative Line -->
                <div class="flex justify-center lg:justify-end mb-8">
                    <div class="h-1 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600"></div>
                </div>

                <!-- Subtitle/Description -->
                <p class="text-lg sm:text-xl lg:text-2xl text-gray-100 mb-8 leading-relaxed font-light"
                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    <?php echo e($subtitle ?? 'نقدم لك استشارات متكاملة وشاملة، نرافقك خطوة بخطوة من اختيار التخصص والجامعة حتى إتمام التسجيل وبدء رحلتك التعليمية في تركيا.'); ?>

                </p>

                <!-- CTA Button -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-end">
                    <a href="<?php echo e($buttonUrl ?? '#contact'); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 bg-yellow-600 hover:bg-yellow-700 text-white font-bold text-lg rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-2xl"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        <?php echo e($buttonText ?? 'ابدأ استشارتك المجانية الآن'); ?>

                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    <!-- Secondary Button (Optional) -->
                    <?php if($secondaryButtonUrl ?? false): ?>
                        <a href="<?php echo e($secondaryButtonUrl); ?>"
                            class="inline-flex items-center justify-center px-8 py-4 border-2 border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white font-bold text-lg rounded-full transition-all duration-300"
                            style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            <?php echo e($secondaryButtonText ?? 'اعرف المزيد'); ?>

                        </a>
                    <?php endif; ?>
                </div>

                <!-- Trust Indicators (Optional) -->
                <?php if($showTrustIndicators ?? true): ?>
                    <div class="mt-16 pt-8 border-t border-gray-400/30">
                        <p class="text-gray-300 text-sm mb-4" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            موثوق من قبل آلاف الطلاب
                        </p>
                        <div class="flex justify-center lg:justify-end gap-6 flex-wrap">
                            <div class="text-center">
                                <p class="text-3xl font-bold text-yellow-500">5000+</p>
                                <p class="text-gray-300 text-sm" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">طالب
                                    مستفيد</p>
                            </div>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-yellow-500">50+</p>
                                <p class="text-gray-300 text-sm" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">جامعة
                                    تركية</p>
                            </div>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-yellow-500">100%</p>
                                <p class="text-gray-300 text-sm" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">رضا
                                    العملاء</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator (Optional) -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<style>
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Responsive text sizing */
    @media (max-width: 640px) {
        h1 {
            font-size: 2rem;
        }

        p {
            font-size: 1rem;
        }
    }

    /* Animation for scroll indicator */
    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .animate-bounce {
        animation: bounce 2s infinite;
    }

    /* Gradient text effect (optional) */
    .gradient-text {
        background: linear-gradient(135deg, #D4AF37 0%, #FCD34D 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Overlay gradient */
    .overlay-gradient {
        background: linear-gradient(135deg,
                rgba(0, 0, 0, 0.8) 0%,
                rgba(0, 0, 0, 0.5) 50%,
                rgba(0, 0, 0, 0.3) 100%);
    }
</style><?php /**PATH C:\laragon\www\testproject-main\resources\views/components/hero-section.blade.php ENDPATH**/ ?>