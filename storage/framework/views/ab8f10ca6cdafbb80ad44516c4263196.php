<nav class="sticky top-0 z-50 bg-white shadow-lg border-b-2 border-yellow-600" dir="rtl">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="w-40 h-40 rounded-full overflow-hidden">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="AL-HILAL Logo" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Desktop Navigation Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="<?php echo e(route('home')); ?>"
                    class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 relative group"
                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    الرئيسية
                    <span
                        class="absolute bottom-0 right-0 w-0 h-1 bg-yellow-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="<?php echo e(url('/#about')); ?>"
                    class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 relative group"
                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    من نحن
                    <span
                        class="absolute bottom-0 right-0 w-0 h-1 bg-yellow-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <!-- الجامعات - قائمة منسدلة -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 flex items-center gap-1">
                        الجامعات
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">

                        <!-- ✅ جميع الجامعات -->
                        <a href="<?php echo e(route('universities.index')); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                            جميع الجامعات
                        </a>

                        <!-- خط فاصل -->
                        <div class="border-t border-gray-100 my-1"></div>

                        <a href="<?php echo e(route('universities.index', ['type' => 'public'])); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            جامعات حكومية
                        </a>

                        <a href="<?php echo e(route('universities.index', ['type' => 'private'])); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            جامعات خاصة
                        </a>

                        <!-- خط فاصل -->
                        <div class="border-t border-gray-100 my-1"></div>

                        <a href="<?php echo e(route('universities.ranking')); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            ترتيب الجامعات
                        </a>

                        <a href="<?php echo e(route('universities.recognitions')); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg transition">
                            الجامعات المعترف بها
                        </a>

                    </div>
                </div>


                <!-- تقويم المفاضلات -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 flex items-center gap-1">
                        التقويم الأكاديمي
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="<?php echo e(route('university-quotas.index', ['type' => 'undergraduate'])); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg">
                            تقويم المفاضلات
                        </a>
                        <a href="<?php echo e(route('university-quotas.index', ['type' => 'postgraduate'])); ?>"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg">
                            تقويم الدراسات العليا
                        </a>
                    </div>
                </div>

                <!-- Articles Dropdown -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 flex items-center gap-1">
                        المقالات
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="<?php echo e(route('articles.index')); ?>?category=all"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                            جميع المقالات
                        </a>
                        <a href="<?php echo e(route('articles.index')); ?>?category=turkey-studies"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            الدراسة في تركيا
                        </a>
                        <a href="<?php echo e(route('articles.index')); ?>?category=exams"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            اختبارات القبول
                        </a>
                        <a href="<?php echo e(route('articles.index')); ?>?category=scholarships"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            المنح الدراسية
                        </a>
                        <a href="<?php echo e(route('articles.index')); ?>?category=certificates"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition">
                            أهم الشهادات
                        </a>
                        <a href="<?php echo e(route('articles.index')); ?>?category=testimonials"
                            class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg transition">
                            قصص النجاح
                        </a>
                    </div>
                </div>

                <a href="<?php echo e(url('/#contact')); ?>"
                    class="text-gray-700 hover:text-yellow-600 font-semibold transition-colors duration-300 relative group"
                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    اتصل بنا
                    <span
                        class="absolute bottom-0 right-0 w-0 h-1 bg-yellow-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <button id="darkModeToggle"
                    class="p-2 rounded-lg hover:bg-gray-100 transition relative w-10 h-10 flex items-center justify-center">
                    <!-- أيقونة الشمس (تظهر في الوضع الفاتح) -->
                    <svg id="sunIcon" class="w-6 h-6 text-yellow-500 absolute transition-all duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>

                    <!-- أيقونة القمر (تظهر في الوضع الغامق) -->
                    <svg id="moonIcon"
                        class="w-6 h-6 text-gray-200 absolute transition-all duration-300 opacity-0 rotate-90"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex items-center gap-4">
                <?php if(auth()->guard()->check()): ?>
                    <!-- Notifications Icon -->
                    <div class="relative">
                        <a href="<?php echo e(route('notifications.index')); ?>" class="relative block">
                            <svg class="w-6 h-6 text-gray-700 hover:text-yellow-600 transition" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>

                            <?php
                                $unreadCount = Auth::user()->unreadNotifications()->count();
                            ?>
                            <?php if($unreadCount > 0): ?>
                                <span
                                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                    <?php echo e($unreadCount > 9 ? '9+' : $unreadCount); ?>

                                </span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                            <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700 font-semibold"><?php echo e(Auth::user()->name); ?></span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">

                            <?php if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()): ?>
                                <a href="<?php echo e(route('consultant.dashboard')); ?>"
                                    class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v16h16V4H4zm2 2h12v12H6V6zm2 2h8v2H8V8zm0 4h8v2H8v-2zm0 4h8v2H8v-2z"></path>
                                    </svg>
                                    لوحة التحكم
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('dashboard')); ?>"
                                    class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v16h16V4H4zm2 2h12v12H6V6zm2 2h8v2H8V8zm0 4h8v2H8v-2zm0 4h8v2H8v-2z"></path>
                                    </svg>
                                    لوحة التحكم
                                </a>
                            <?php endif; ?>

                            <form method="POST" action="<?php echo e(route('logout')); ?>" class="block">
                                <?php echo csrf_field(); ?>
                                <button type="submit"
                                    class="w-full text-right px-4 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-b-lg transition">
                                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    تسجيل خروج
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="hidden md:flex items-center gap-4">
                        <a href="<?php echo e(route('login')); ?>"
                            class="px-6 py-2 text-yellow-600 border-2 border-yellow-600 hover:bg-yellow-50 font-bold rounded-lg transition">
                            تسجيل الدخول
                        </a>
                        <a href="<?php echo e(route('register')); ?>"
                            class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg transition shadow-lg">
                            إنشاء حساب
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center gap-4">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold transition-all"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        لوحتي
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"
                        class="px-4 py-2 text-yellow-600 border-2 border-yellow-600 rounded-lg font-semibold"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        دخول
                    </a>
                <?php endif; ?>

                <button id="mobile-menu-btn" class="text-gray-700 hover:text-yellow-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
            <a href="<?php echo e(route('home')); ?>"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">الرئيسية</a>
            <a href="#about"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">من
                نحن</a>
            <a href="<?php echo e(route('universities.index')); ?>"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">الجامعات</a>
            <a href="<?php echo e(route('university-quotas.index')); ?>"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">تقويم
                المفاضلات</a>
            <a href="<?php echo e(route('articles.index')); ?>"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">المقالات</a>
            <a href="#contact"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">اتصل
                بنا</a>
            <?php if(auth()->guard()->check()): ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="block">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="w-full text-right px-4 py-2 text-red-600 hover:bg-red-50 rounded transition-colors">تسجيل
                        خروج</button>
                </form>
            <?php else: ?>
            <a href="<?php echo e(route('register')); ?>"
                class="block px-4 py-2 bg-yellow-600 text-white rounded font-semibold text-center">إنشاء حساب</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('darkModeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');

        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark');
            sunIcon.style.opacity = '0';
            sunIcon.style.transform = 'rotate(-90deg) scale(0.5)';
            moonIcon.style.opacity = '1';
            moonIcon.style.transform = 'rotate(0deg) scale(1)';
        }

        if (toggle) {
            toggle.addEventListener('click', function () {
                const isDark = document.body.classList.toggle('dark');
                localStorage.setItem('darkMode', isDark);

                if (isDark) {
                    sunIcon.style.opacity = '0';
                    sunIcon.style.transform = 'rotate(-90deg) scale(0.5)';
                    moonIcon.style.opacity = '1';
                    moonIcon.style.transform = 'rotate(0deg) scale(1)';
                } else {
                    sunIcon.style.opacity = '1';
                    sunIcon.style.transform = 'rotate(0deg) scale(1)';
                    moonIcon.style.opacity = '0';
                    moonIcon.style.transform = 'rotate(90deg) scale(0.5)';
                }
            });
        }
    });
</script>
<style>
    [dir="rtl"] {
        direction: rtl;
        text-align: right;
    }

    a,
    button {
        transition: all 0.3s ease;
    }

    .relative.group span {
        transform-origin: right;
    }

    @media (max-width: 768px) {
        nav {
            padding: 0.5rem 0;
        }
    }

    /* Dark Mode */
    .dark {
        background-color: #1a202c;
        color: #e2e8f0;
        /* لون النص الأساسي في الوضع الغامق */
    }

    /* جميع عناصر النص */
    .dark h1,
    .dark h2,
    .dark h3,
    .dark h4,
    .dark h5,
    .dark h6,
    .dark p,
    .dark span,
    .dark div,
    .dark a,
    .dark li,
    .dark label,
    .dark .text-gray-800,
    .dark .text-gray-700,
    .dark .text-gray-600 {
        color: #e2e8f0 !important;
    }

    /* استثناء للروابط */
    .dark a {
        color: #63b3ed !important;
    }

    .dark a:hover {
        color: #90cdf4 !important;
    }

    /* خلفيات العناصر */
    .dark .bg-white {
        background-color: #2d3748 !important;
    }

    .dark .bg-gray-50 {
        background-color: #1a202c !important;
    }

    .dark .bg-gray-100 {
        background-color: #2d3748 !important;
    }

    .dark .border-gray-200 {
        border-color: #4a5568 !important;
    }

    .dark .shadow-md {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3) !important;
    }
</style><?php /**PATH C:\laragon\www\testProject\resources\views/components/navbar.blade.php ENDPATH**/ ?>