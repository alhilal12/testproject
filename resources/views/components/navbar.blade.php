<nav class="sticky top-0 z-50 bg-white shadow-lg border-b-2 border-yellow-600" dir="rtl">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="w-40 h-40 rounded-full overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="AL-HILAL Logo" class="w-full h-full object-cover">
                </div>
            </div>
            <!-- Desktop Navigation Menu -->
            <div class="hidden lg:flex items-center gap-2 xl:gap-4">
                <a href="{{ route('home') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold transition text-sm xl:text-base">
                    الرئيسية
                </a>
                <a href="{{ url('/#about') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold transition text-sm xl:text-base">
                    من نحن
                </a>
                <!-- باقي العناصر بنفس الطريقة -->

                <!-- Google Translate Buttons -->
                <div class="flex items-center gap-1">
                    <button onclick="translatePage('ar')"
                        class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100 transition font-bold text-yellow-600">
                        🇸🇦 ع
                    </button>
                    <button onclick="translatePage('tr')"
                        class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100 transition">
                        🇹🇷 T
                    </button>
                    <button onclick="translatePage('en')"
                        class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100 transition">
                        🇬🇧 E
                    </button>
                </div>
            </div>

            <!-- Auth Buttons (Desktop) -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <!-- Notifications Icon -->
                    <div class="relative">
                        <a href="{{ route('notifications.index') }}" class="relative block">
                            <svg class="w-6 h-6 text-gray-700 hover:text-yellow-600 transition" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>

                            @php
                                $unreadCount = Auth::user()->unreadNotifications()->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span
                                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                    {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                                </span>
                            @endif
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
                            <span class="text-gray-700 font-semibold">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">

                            @if(Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())
                                <a href="{{ route('consultant.dashboard') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v16h16V4H4zm2 2h12v12H6V6zm2 2h8v2H8V8zm0 4h8v2H8v-2zm0 4h8v2H8v-2z"></path>
                                    </svg>
                                    لوحة التحكم
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg transition">
                                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v16h16V4H4zm2 2h12v12H6V6zm2 2h8v2H8V8zm0 4h8v2H8v-2zm0 4h8v2H8v-2z"></path>
                                    </svg>
                                    لوحة التحكم
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
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
                @else
                    <div class="hidden md:flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 text-yellow-600 border-2 border-yellow-600 hover:bg-yellow-50 font-bold rounded-lg transition">
                            تسجيل الدخول
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg transition shadow-lg">
                            إنشاء حساب
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 bg-yellow-600 text-white rounded-lg font-semibold transition-all"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        لوحتي
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-yellow-600 border-2 border-yellow-600 rounded-lg font-semibold"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        دخول
                    </a>
                @endauth

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
            <a href="{{ route('home') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">الرئيسية</a>
            <a href="#about"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">من
                نحن</a>
            <a href="{{ route('universities.index') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">الجامعات</a>
            <a href="{{ route('university-quotas.index') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">تقويم
                المفاضلات</a>
            <a href="{{ route('articles.index') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">المقالات</a>
            <a href="#contact"
                class="block px-4 py-2 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded transition-colors">اتصل
                بنا</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                        class="w-full text-right px-4 py-2 text-red-600 hover:bg-red-50 rounded transition-colors">تسجيل
                        خروج</button>
                </form>
            @else
            <a href="{{ route('register') }}"
                class="block px-4 py-2 bg-yellow-600 text-white rounded font-semibold text-center">إنشاء حساب</a>
            @endif
        </div>
    </div>
</nav>

<!-- Google Translate Script -->
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'ar',
            includedLanguages: 'ar,tr,en',
            autoDisplay: false,
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div id="google_translate_element" style="display: none;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dark Mode Toggle
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

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Google Translate - تطبيق اللغة المخزنة
        const urlParams = new URLSearchParams(window.location.search);
        let lang = urlParams.get('lang') || localStorage.getItem('preferred_lang') || 'ar';

        if (lang !== 'ar') {
            setTimeout(() => {
                const select = document.querySelector('.goog-te-combo');
                if (select) {
                    select.value = lang;
                    select.dispatchEvent(new Event('change'));
                }
            }, 1500);
        }
    });

    // دالة الترجمة
    function translatePage(lang) {
        localStorage.setItem('preferred_lang', lang);
        window.location.href = window.location.href + '?lang=' + lang;
    }
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
    }

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

    .dark a {
        color: #63b3ed !important;
    }

    .dark a:hover {
        color: #90cdf4 !important;
    }

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
</style>