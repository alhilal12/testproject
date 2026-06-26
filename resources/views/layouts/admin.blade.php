<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
=======
    

>>>>>>> 802ca6c7c538885cf52bd2da882caf0c2e0fea4a
    <title>@yield('title', 'لوحة الإدارة')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
<<<<<<< HEAD
=======
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
>>>>>>> 802ca6c7c538885cf52bd2da882caf0c2e0fea4a
</body>

</html>