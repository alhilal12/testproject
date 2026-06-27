<nav class="sticky top-0 z-50 bg-white shadow-lg border-b-2 border-yellow-600" dir="rtl">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="AL-HILAL" class="h-12 w-auto">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-4 text-sm">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">الرئيسية</a>
                <a href="{{ url('/#about') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">من نحن</a>
                <a href="{{ route('universities.index') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold">الجامعات</a>
                <a href="{{ route('university-quotas.index') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold">التقويم</a>
                <a href="{{ route('articles.index') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold">المقالات</a>
                <a href="{{ url('/#contact') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">اتصل بنا</a>

                <!-- Dark Mode -->
                <button id="darkModeToggle" class="p-1.5 rounded hover:bg-gray-100 text-lg">
                    🌙
                </button>

                <!-- Google Translate -->
                <button onclick="translatePage('ar')"
                    class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100 font-bold text-yellow-600">ع</button>
                <button onclick="translatePage('tr')"
                    class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100">🇹🇷</button>
                <button onclick="translatePage('en')"
                    class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100">🇬🇧</button>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-2 text-sm">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-yellow-600 font-semibold">لوحتي</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">خروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-yellow-600 border border-yellow-600 px-4 py-1.5 rounded-lg hover:bg-yellow-50 font-semibold">دخول</a>
                    <a href="{{ route('register') }}"
                        class="bg-yellow-600 text-white px-4 py-1.5 rounded-lg hover:bg-yellow-700 font-semibold">اشتراك</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2 text-sm">
            <a href="{{ route('home') }}" class="block px-3 py-2 hover:bg-yellow-50 rounded">الرئيسية</a>
            <a href="{{ url('/#about') }}" class="block px-3 py-2 hover:bg-yellow-50 rounded">من نحن</a>
            <a href="{{ route('universities.index') }}" class="block px-3 py-2 hover:bg-yellow-50 rounded">الجامعات</a>
            <a href="{{ route('university-quotas.index') }}"
                class="block px-3 py-2 hover:bg-yellow-50 rounded">التقويم</a>
            <a href="{{ route('articles.index') }}" class="block px-3 py-2 hover:bg-yellow-50 rounded">المقالات</a>
            <a href="{{ url('/#contact') }}" class="block px-3 py-2 hover:bg-yellow-50 rounded">اتصل بنا</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-right px-3 py-2 text-red-600 hover:bg-red-50 rounded">تسجيل
                        خروج</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-yellow-600 hover:bg-yellow-50 rounded">تسجيل
                    الدخول</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 bg-yellow-600 text-white rounded text-center">إنشاء
                    حساب</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dark Mode
        const toggle = document.getElementById('darkModeToggle');
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark');
            toggle.textContent = '☀️';
        }
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('dark');
            const isDark = document.body.classList.contains('dark');
            localStorage.setItem('darkMode', isDark);
            toggle.textContent = isDark ? '☀️' : '🌙';
        });

        // Mobile Menu
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });

    // Google Translate
    function translatePage(lang) {
        const url = `https://translate.google.com/translate?sl=ar&tl=${lang}&u=${encodeURIComponent(window.location.href)}`;
        window.location.href = url;
    }
</script>

<style>
    .dark {
        background-color: #1a202c;
        color: #e2e8f0;
    }

    .dark .bg-white {
        background-color: #2d3748 !important;
    }

    .dark .text-gray-700 {
        color: #cbd5e0 !important;
    }

    .dark .border-yellow-600 {
        border-color: #d69e2e !important;
    }

    .dark a {
        color: #63b3ed !important;
    }
</style>