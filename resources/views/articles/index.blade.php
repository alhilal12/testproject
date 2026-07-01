<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المقالات | الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9fafb;
        }

        .serif-text {
            font-family: 'Cairo', serif;
        }

        /*  */
        .dark {
            background-color: #1a202c;
            color: #e2e8f0;
        }

        .dark .bg-white {
            background-color: #2d3748 !important;
        }

        .dark .text-gray-800 {
            color: #e2e8f0 !important;
        }

        .dark .border-gray-200 {
            border-color: #4a5568 !important;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <x-navbar />

    <main class="max-w-[1200px] mx-auto px-6 mt-12">

        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 tracking-tight">📚 المكتبة المعرفية</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                اكتشف أحدث المقالات والنصائح حول التعليم العالي، المنح الدراسية، وتطوير المسار المهني
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="flex flex-col md:flex-row gap-6 mb-12 items-center justify-between">
            <div class="relative w-full md:max-w-md">
                <span
                    class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-yellow-500">search</span>
                <input type="text" id="searchInput" onkeyup="filterArticles()"
                    class="w-full pr-12 pl-4 py-3 bg-white border border-gray-200 text-gray-800 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition-all"
                    placeholder="ابحث عن مقالات...">
            </div>
            <div class="flex gap-3 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <button onclick="filterByCategory('all')" id="cat-all"
                    class="category-btn bg-yellow-500 text-white px-6 py-2 rounded-full font-medium text-sm shadow-md">الكل</button>
                <button onclick="filterByCategory('turkey-studies')" id="cat-turkey-studies"
                    class="category-btn bg-gray-100 text-gray-600 px-6 py-2 rounded-full font-medium text-sm hover:bg-yellow-500 hover:text-white transition-all">الدراسة
                    في تركيا</button>
                <button onclick="filterByCategory('exams')" id="cat-exams"
                    class="category-btn bg-gray-100 text-gray-600 px-6 py-2 rounded-full font-medium text-sm hover:bg-yellow-500 hover:text-white transition-all">اختبارات
                    القبول</button>
                <button onclick="filterByCategory('scholarships')" id="cat-scholarships"
                    class="category-btn bg-gray-100 text-gray-600 px-6 py-2 rounded-full font-medium text-sm hover:bg-yellow-500 hover:text-white transition-all">المنح
                    الدراسية</button>
                <button onclick="filterByCategory('certificates')" id="cat-certificates"
                    class="category-btn bg-gray-100 text-gray-600 px-6 py-2 rounded-full font-medium text-sm hover:bg-yellow-500 hover:text-white transition-all">الشهادات</button>
                <button onclick="filterByCategory('testimonials')" id="cat-testimonials"
                    class="category-btn bg-gray-100 text-gray-600 px-6 py-2 rounded-full font-medium text-sm hover:bg-yellow-500 hover:text-white transition-all">قصص
                    النجاح</button>
            </div>
        </div>

        <!-- Featured Article -->
        @if($featuredArticle)
            <div
                class="bg-gradient-to-br from-yellow-50 to-white rounded-2xl overflow-hidden mb-16 shadow-lg border border-gray-100">
                <div class="grid md:grid-cols-2 gap-0">
                    <div class="relative h-64 md:h-[400px] overflow-hidden">
                        @if($featuredArticle->image)
                            <img src="{{ asset('storage/' . $featuredArticle->image) }}" class="w-full h-full object-cover">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                                <span class="material-symbols-outlined text-white text-7xl">menu_book</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 md:p-12 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4">
                            <span
                                class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-full font-medium">{{ $featuredArticle->category_name }}</span>
                            <span class="text-sm text-gray-500 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                {{ $featuredArticle->read_time ?? '5' }} دقائق قراءة
                            </span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 hover:text-yellow-600 transition">
                            <a href="{{ route('articles.show', $featuredArticle->slug) }}">{{ $featuredArticle->title }}</a>
                        </h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6 serif-text">
                            {{ Str::limit(strip_tags($featuredArticle->content), 150) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ mb_substr($featuredArticle->author->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $featuredArticle->author->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $featuredArticle->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ route('articles.show', $featuredArticle->slug) }}"
                                class="text-yellow-600 font-bold flex items-center gap-1 group">
                                اقرأ المقال
                                <span
                                    class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition">arrow_back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articlesGrid">
            @foreach($articles as $article)
                <article
                    class="article-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group border border-gray-100"
                    data-category="{{ $article->category }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <span class="material-symbols-outlined text-gray-400 text-5xl">article</span>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span
                                class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">{{ $article->category_name }}</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between text-sm text-gray-400 mb-3">
                            <span>{{ $article->created_at->format('d/m/Y') }}</span>
                            <span>{{ $article->read_time ?? '4' }} دقائق قراءة</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 hover:text-yellow-600 transition">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-3 mb-4 serif-text">
                            {{ Str::limit(strip_tags($article->content), 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-gray-500 text-sm">person</span>
                                </div>
                                <span class="text-xs text-gray-400">{{ $article->author->name }}</span>
                            </div>
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-yellow-600 text-sm font-semibold flex items-center gap-1 group">
                                اقرأ
                                <span
                                    class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition">arrow_back</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($articles->count() == 0)
            <div class="text-center py-16">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-4">menu_book</span>
                <p class="text-gray-500 text-lg">لا توجد مقالات في هذا القسم حالياً</p>
                <p class="text-gray-400 text-sm mt-2">سيتم إضافة مقالات جديدة قريباً</p>
            </div>
        @endif

        <!-- Pagination -->
        @if($articles->count() > 0)
            <div class="mt-12 flex justify-center gap-2">
                {{ $articles->links() }}
            </div>
        @endif

        <!-- Newsletter Section -->
        <div class="mt-16 bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl p-8 md:p-12 text-center text-white">
            <span class="material-symbols-outlined text-5xl mb-4 text-yellow-500">mail</span>
            <h3 class="text-2xl font-bold mb-2">اشترك في نشرتنا البريدية</h3>
            <p class="text-gray-300 mb-6 max-w-md mx-auto">احصل على أحدث المقالات والموارد التعليمية مباشرة إلى بريدك
                الإلكتروني</p>
            <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-3">
                <input type="email" placeholder="بريدك الإلكتروني"
                    class="flex-1 px-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-2 rounded-lg transition">اشتراك</button>
            </form>
        </div>
    </main>



    <script>
        function filterByCategory(category) {
            const articles = document.querySelectorAll('.article-card');
            const btns = document.querySelectorAll('.category-btn');

            btns.forEach(btn => {
                btn.classList.remove('bg-yellow-500', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });

            const activeBtn = document.getElementById(`cat-${category}`);
            if (activeBtn) {
                activeBtn.classList.remove('bg-gray-100', 'text-gray-600');
                activeBtn.classList.add('bg-yellow-500', 'text-white');
            }

            articles.forEach(article => {
                if (category === 'all') {
                    article.style.display = '';
                } else if (article.dataset.category === category) {
                    article.style.display = '';
                } else {
                    article.style.display = 'none';
                }
            });
        }

        function filterArticles() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const articles = document.querySelectorAll('.article-card');

            articles.forEach(article => {
                const title = article.querySelector('h3').innerText.toLowerCase();
                if (title.includes(searchTerm)) {
                    article.style.display = '';
                } else {
                    article.style.display = 'none';
                }
            });
        }
        // 
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('darkModeToggle');
            const icon = document.getElementById('darkModeIcon');

            if (localStorage.getItem('darkMode') === 'true') {
                document.documentElement.classList.add('dark');
                if (icon) icon.textContent = '☀️';
            }

            if (toggle) {
                toggle.addEventListener('click', function () {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.setItem('darkMode', isDark);
                    if (icon) icon.textContent = isDark ? '☀️' : '🌙';
                });
            }
        });
    </script>
    <x-floating-whatsapp />
</body>

</html>