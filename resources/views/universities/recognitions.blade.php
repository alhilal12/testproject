<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="قائمة بالجامعات التركية المعترف بها في الدول العربية. تعرف على الجامعات المعتمدة في السعودية، مصر، الأردن، الإمارات، الكويت، قطر، والعراق">
    <meta name="keywords" content="الجامعات المعترف بها في السعودية, الجامعات المعترف بها في مصر, الجامعات المعترف بها في الأردن, الجامعات التركية المعترف بها">
    <meta property="og:title" content="الجامعات التركية المعترف بها | الهلال للاستشارات التعليمية">
    <meta property="og:description" content="اكتشف الجامعات التركية المعترف بها في مختلف الدول العربية">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <title>الجامعات المعترف بها حسب الدولة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f9fafb; }
        .country-card {
            transition: all 0.3s ease;
        }
        .country-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        .country-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
        }
        .university-item {
            transition: background-color 0.2s ease;
        }
        .university-item:hover {
            background-color: #fef3c7;
        }
        .dark { background-color: #1a202c; color: #e2e8f0; }
    .dark .bg-white { background-color: #2d3748 !important; }
    .dark .text-gray-800 { color: #e2e8f0 !important; }
    .dark .border-gray-200 { border-color: #4a5568 !important; }
    </style>
</head>

<body>

    <x-navbar />

    <div class="container mx-auto px-4 py-8 max-w-5xl">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">🌍 الجامعات المعترف بها</h1>
            <p class="text-gray-500 text-lg">اكتشف الجامعات التركية المعترف بها في مختلف الدول العربية</p>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 mb-8">
            <form method="GET" action="{{ route('universities.recognitions') }}" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">🇸🇦 اختر الدولة</label>
                    <select name="country" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                        <option value="">جميع الدول</option>
                        @foreach($countries as $country)
                            <option value="{{ $country['country_code'] }}" {{ request('country') == $country['country_code'] ? 'selected' : '' }}>
                                {{ $country['country_name_ar'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">
                        🔍 بحث
                    </button>
                    <a href="{{ route('universities.recognitions') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition">
                        إعادة تعيين
                    </a>
                </div>
            </form>
        </div>

        <!-- Countries Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($countries as $country)
                <div class="country-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 " data-country-code="{{ $country['country_code'] }}">
                    
                    <!-- Country Header (قابل للنقر - أبيض مع إطار) -->
                    <div onclick="toggleCountry({{ $loop->index }})" 
                         class="px-5 py-3 flex items-center gap-3 cursor-pointer border-b border-gray-200 hover:bg-gray-50 transition">
                        <span class="text-2xl">
                            @switch($country['country_code'])
                                @case('SA') 🇸🇦 @break
                                @case('EG') 🇪🇬 @break
                                @case('JO') 🇯🇴 @break
                                @case('AE') 🇦🇪 @break
                                @case('QA') 🇶🇦 @break
                                @case('KW') 🇰🇼 @break
                                @case('SY') 🇸🇾 @break
                                @case('IQ') 🇮🇶 @break
                                @case('LB') 🇱🇧 @break
                                @case('PS') 🇵🇸 @break
                                @default 🌍
                            @endswitch
                        </span>
                        <h2 class="text-xl font-bold text-gray-800">{{ $country['country_name_ar'] }}</h2>
                        <span class="mr-auto bg-yellow-100 text-yellow-700 text-sm px-2.5 py-0.5 rounded-full font-semibold">
                            {{ $country['universities']->count() }}
                        </span>
                        <svg id="arrow-{{ $loop->index }}" class="w-5 h-5 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>

                    <!-- Universities List (قابل للطي) -->
                    <div id="country-content-{{ $loop->index }}" class="country-content">
                        <div class="p-4 space-y-2">
                            @forelse($country['universities'] as $university)
                                <a href="{{ route('universities.show', $university->id) }}" 
                                   class="university-item block px-3 py-2 rounded-lg hover:bg-yellow-50 transition flex items-center gap-3 border-b border-gray-50 last:border-0">
                                    @if($university->logo)
                                        <img src="{{ asset('storage/' . $university->logo) }}" loading="lazy" class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs font-bold">
                                            {{ mb_substr($university->name_ar, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-gray-800 text-sm">{{ $university->name_ar }}</div>
                                        <div class="text-xs text-gray-400">📍 {{ $university->city ?? '—' }}</div>
                                    </div>
                                    <svg class="mr-auto w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @empty
                                <div class="text-center text-gray-400 text-sm py-4">لا توجد جامعات معترف بها في هذه الدولة</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-2xl shadow-md">
                    <div class="text-6xl mb-4">🌍</div>
                    <p class="text-gray-500 text-lg">لا توجد دول لديها جامعات معترف بها حالياً</p>
                    <p class="text-gray-400 text-sm mt-2">سيتم إضافة المزيد قريباً</p>
                </div>
            @endforelse
        </div>

        <!-- Update Info -->
        <div class="text-center text-sm text-gray-400 mt-10">
            📅 يتم تحديث البيانات من المصادر الرسمية بشكل دوري
        </div>
    </div>

    <x-floating-whatsapp />

    <script>
        function toggleCountry(index) {
            const content = document.getElementById('country-content-' + index);
            const arrow = document.getElementById('arrow-' + index);
            
            // إغلاق جميع الكروت الأخرى
            document.querySelectorAll('.country-content').forEach(el => {
                if (el.id !== 'country-content-' + index) {
                    el.style.maxHeight = '0';
                    const otherArrow = document.getElementById('arrow-' + el.id.split('-')[2]);
                    if (otherArrow) otherArrow.style.transform = 'rotate(0deg)';
                }
            });
            
            if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
                content.style.maxHeight = content.scrollHeight + 'px';
                arrow.style.transform = 'rotate(180deg)';
            } else {
                content.style.maxHeight = '0px';
                arrow.style.transform = 'rotate(0deg)';
            }
        }

        // فتح الدولة المحددة تلقائياً عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            const countryParam = new URLSearchParams(window.location.search).get('country');
            if (countryParam) {
                document.querySelectorAll('.country-card').forEach(function(card, index) {
                    const countryCode = card.dataset.countryCode;
                    if (countryCode === countryParam) {
                        toggleCountry(index);
                    }
                });
            }
        });
         document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('darkModeToggle');
        const icon = document.getElementById('darkModeIcon');
        
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
            if (icon) icon.textContent = '☀️';
        }
        
        if (toggle) {
            toggle.addEventListener('click', function() {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('darkMode', isDark);
                if (icon) icon.textContent = isDark ? '☀️' : '🌙';
            });
        }
    });
    </script>
</body>
</html>8