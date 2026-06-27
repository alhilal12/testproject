<nav class="sticky top-0 z-50 bg-white shadow-lg border-b-2 border-yellow-600" dir="rtl">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <div class="w-40 h-40 rounded-full overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="AL-HILAL Logo" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-2 xl:gap-4">
                <a href="{{ route('home') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base">الرئيسية</a>
                <a href="{{ url('/#about') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base">من نحن</a>

                <!-- الجامعات Dropdown -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base flex items-center gap-1">
                        الجامعات
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="{{ route('universities.index') }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg">جميع
                            الجامعات</a>
                        <a href="{{ route('universities.index', ['type' => 'public']) }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">جامعات حكومية</a>
                        <a href="{{ route('universities.index', ['type' => 'private']) }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">جامعات خاصة</a>
                        <a href="{{ route('universities.ranking') }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">ترتيب الجامعات</a>
                        <a href="{{ route('universities.recognitions') }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg">الجامعات
                            المعترف بها</a>
                    </div>
                </div>

                <!-- التقويم Dropdown -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base flex items-center gap-1">
                        التقويم الأكاديمي
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="{{ route('university-quotas.index', ['type' => 'undergraduate']) }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg">تقويم
                            المفاضلات</a>
                        <a href="{{ route('university-quotas.index', ['type' => 'postgraduate']) }}"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg">تقويم الدراسات
                            العليا</a>
                    </div>
                </div>

                <!-- المقالات Dropdown -->
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base flex items-center gap-1">
                        المقالات
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="{{ route('articles.index') }}?category=all"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-t-lg">جميع
                            المقالات</a>
                        <a href="{{ route('articles.index') }}?category=turkey-studies"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">الدراسة في تركيا</a>
                        <a href="{{ route('articles.index') }}?category=exams"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">اختبارات القبول</a>
                        <a href="{{ route('articles.index') }}?category=scholarships"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">المنح الدراسية</a>
                        <a href="{{ route('articles.index') }}?category=certificates"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600">أهم الشهادات</a>
                        <a href="{{ route('articles.index') }}?category=testimonials"
                            class="block px-4 py-2 hover:bg-yellow-50 hover:text-yellow-600 rounded-b-lg">قصص النجاح</a>
                    </div>
                </div>

                <a href="{{ url('/#contact') }}"
                    class="text-gray-700 hover:text-yellow-600 font-semibold text-sm xl:text-base">اتصل بنا</a>

                <!-- Dark Mode -->
                <button id="darkModeToggle" class="p-2 rounded-lg hover:bg-gray-100 text-xl">🌙</button>

                <!-- Google Translate -->
                <button onclick="translatePage('ar')"
                    class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100 font-bold text-yellow-600">🇸🇦 ع</button>
                <button onclick="translatePage('tr')" class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100">🇹🇷
                    T</button>
                <button onclick="translatePage('en')" class="px-1.5 py-0.5 text-xs rounded hover:bg-gray-100">🇬🇧
                    E</button>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden lg:flex items-center gap-4">
                @auth
                    <a href="{{ route('notifications.index') }}" class="relative">
                        <svg class="w-6 h-6 text-gray-700 hover:text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @php $unreadCount = Auth::user()->unreadNotifications()->count(); @endphp
                        @if($unreadCount > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                        @endif
                    </a>
                    <div class="relative group">
                        <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
                            <span class="text-gray-700 font-semibold">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ Auth::user()->isAdmin() ? route('consultant.dashboard') : route('dashboard') }}"
                                class="block px-4 py-2 hover:bg-yellow-50 rounded-t-lg">لوحة التحكم</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit"
                                    class="w-full text-right px-4 py-2 hover:bg-red-50 text-red-600 rounded-b-lg">تسجيل
                                    خروج</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 text-yellow-600 border-2 border-yellow-600 hover:bg-yellow-50 font-bold rounded-lg">تسجيل
                        الدخول</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg shadow-lg">إنشاء
                        حساب</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center gap-4">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-yellow-50 rounded">الرئيسية</a>
            <a href="#about" class="block px-4 py-2 hover:bg-yellow-50 rounded">من نحن</a>
            <a href="{{ route('universities.index') }}" class="block px-4 py-2 hover:bg-yellow-50 rounded">الجامعات</a>
            <a href="{{ route('university-quotas.index') }}"
                class="block px-4 py-2 hover:bg-yellow-50 rounded">التقويم</a>
            <a href="{{ route('articles.index') }}" class="block px-4 py-2 hover:bg-yellow-50 rounded">المقالات</a>
            <a href="#contact" class="block px-4 py-2 hover:bg-yellow-50 rounded">اتصل بنا</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-right px-4 py-2 text-red-600 hover:bg-red-50 rounded">تسجيل
                        خروج</button>
                </form>
            @else
            <a href="{{ route('register') }}" class="block px-4 py-2 bg-yellow-600 text-white rounded text-center">إنشاء
                حساب</a>
            @endif
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('darkModeToggle');
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark');
            toggle.textContent = '☀️';
        }
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('dark');
            localStorage.setItem('darkMode', document.body.classList.contains('dark'));
            toggle.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
        });

        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    });

    function translatePage(lang) {
        window.location.href = `https://translate.google.com/translate?sl=ar&tl=${lang}&u=${encodeURIComponent(window.location.href)}`;
    }
</script>

<style>
    [dir="rtl"] {
        direction: rtl;
        text-align: right;
    }

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