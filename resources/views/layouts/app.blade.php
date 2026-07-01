<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <!-- ✅ SEO Meta Tags -->
    <title>@yield('title', 'الهلال للاستشارات التعليمية - دليلك للدراسة في تركيا')</title>

    <!-- Meta Description -->
    <meta name="description"
        content="@yield('meta_description', 'الهلال للاستشارات التعليمية - دليلك الشامل للدراسة في الجامعات التركية، معلومات عن القبول، التخصصات، وأفضل الجامعات الحكومية والخاصة')">

    <!-- Meta Keywords -->
    <meta name="keywords"
        content="@yield('meta_keywords', 'الدراسة في تركيا, الجامعات التركية, القبول في الجامعات التركية, الاستشارات التعليمية, دراسة الماجستير في تركيا, دراسة الدكتوراه في تركيا, المنح الدراسية')">

    <meta name="author" content="الهلال للاستشارات التعليمية">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Arabic">
    <meta name="revisit-after" content="7 days">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ✅ Alternate URLs -->
    <link rel="alternate" href="{{ url()->current() }}" hreflang="ar">

    <!-- ✅ Open Graph (فيسبوك - واتساب - تيليجرام - لينكدإن) -->
    <meta property="og:title" content="@yield('og_title', 'الهلال للاستشارات التعليمية')">
    <meta property="og:description" content="@yield('og_description', 'دليلك الشامل للدراسة في الجامعات التركية')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:alt" content="شعار الهلال للاستشارات التعليمية">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta property="og:site_name" content="الهلال للاستشارات التعليمية">

    <!-- ✅ Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'الهلال للاستشارات التعليمية')">
    <meta name="twitter:description" content="@yield('og_description', 'دليلك الشامل للدراسة في الجامعات التركية')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:image:alt" content="شعار الهلال للاستشارات التعليمية">

    <!-- ✅ ما إذا كان الموقع متجاوب مع الأجهزة المحمولة -->
    <meta name="theme-color" content="#eab308">
    <meta name="msapplication-TileColor" content="#eab308">

    <!-- ✅ Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <!-- Swiper CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- ✅ CSS & Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'], 'build')
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
        body {
            font-family: 'Cairo', 'Segoe UI', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    @if(app()->environment('local'))
        {{-- في بيئة التطوير --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- في بيئة الإنتاج --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <script src="{{ asset('build/assets/app.js') }}" defer></script>
    @endif
    <!-- Footer (سيتم إضافته لاحقاً) -->

    <!-- Floating WhatsApp Button -->

    <x-floating-whatsapp />
    <style>
        @keyframes ping {

            75%,
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        .animate-ping {
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* Dark Mode */
        .dark {
            background-color: #1a202c;
            color: #e2e8f0;
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

        .dark .text-gray-800 {
            color: #e2e8f0 !important;
        }

        .dark .text-gray-700 {
            color: #cbd5e0 !important;
        }

        .dark .text-gray-600 {
            color: #a0aec0 !important;
        }

        .dark .border-gray-200 {
            border-color: #4a5568 !important;
        }

        .dark .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3) !important;
        }

        .dark .hover\:bg-gray-50:hover {
            background-color: #4a5568 !important;
        }

        .dark .hover\:bg-gray-100:hover {
            background-color: #4a5568 !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('darkModeToggle');
            const icon = document.getElementById('darkModeIcon');

            // 1. استعادة الوضع المخزن
            if (localStorage.getItem('darkMode') === 'true') {
                document.documentElement.classList.add('dark');
                if (icon) icon.textContent = '☀️';
            }

            // 2. تبديل الوضع عند الضغط
            if (toggle) {
                toggle.addEventListener('click', function () {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.setItem('darkMode', isDark);
                    if (icon) icon.textContent = isDark ? '☀️' : '🌙';
                });
            }
        });
    </script>
</body>

</html>