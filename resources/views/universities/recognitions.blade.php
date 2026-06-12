<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="قائمة بالجامعات التركية المعترف بها في الدول العربية. تعرف على الجامعات المعتمدة في السعودية، مصر، الأردن، الإمارات، الكويت، قطر، والعراق">
<meta name="keywords" content="الجامعات المعترف بها في السعودية, الجامعات المعترف بها في مصر, الجامعات المعترف بها في الأردن, الجامعات التركية المعترف بها, شهادات معترف بها">
<meta property="og:title" content="الجامعات التركية المعترف بها | الهلال للاستشارات التعليمية">
<meta property="og:description" content="اكتشف الجامعات التركية المعترف بها في مختلف الدول العربية">
<meta property="og:image" content="{{ asset('images/logo.png') }}">
<meta property="og:url" content="{{ url()->current() }}">
<link rel="canonical" href="{{ url()->current() }}">

@if(request('country'))
    <meta name="description" content="الجامعات التركية المعترف بها في {{ $countries->where('country_code', request('country'))->first()->country_name_ar ?? 'هذه الدولة' }} - قائمة محدثة">
@endif
    <title>الجامعات المعترف بها - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .dropdown-content.open {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-50">

    <x-navbar />

    <div class="container mx-auto px-4 py-8">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">🌍 الجامعات المعترف بها</h1>
            <p class="text-gray-500">تعرف على الجامعات المعترف بها في مختلف الدول</p>
        </div>

        <!-- Filter by Country -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-8">
            <form method="GET" class="flex flex-wrap gap-4 items-center">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-semibold mb-1">اختر الدولة</label>
                    <select name="country" class="w-full px-4 py-2 border rounded-lg">
                        <option value="">جميع الدول</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->country_code }}" {{ request('country') == $country->country_code ? 'selected' : '' }}>
                                {{ $country->country_name_ar }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg">بحث</button>
                    <a href="{{ route('universities.recognitions') }}" class="bg-gray-200 px-4 py-2 rounded-lg mr-2">إعادة تعيين</a>
                </div>
            </form>
        </div>

        <!-- Universities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($universities as $index => $university)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                    
                    <!-- Card Body -->
                    <div class="p-4">
                        <!-- Logo & Name -->
                        <div class="flex items-center gap-3 mb-3">
                            @if($university->logo)
                                <img src="{{ asset('storage/' . $university->logo) }}"  loading="lazy" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold text-sm">
                                    {{ mb_substr($university->name_ar, 0, 2) }}
                                </div>
                            @endif
                            <div>
                                <h3 class="font-bold text-gray-800">{{ $university->name_ar }}</h3>
                                <p class="text-xs text-gray-500">📍 {{ $university->city }}</p>
                            </div>
                        </div>
                        
                        <!-- Dropdown for Countries -->
                        @php
                            $recognitions = $university->recognitions;
                        @endphp
                        @if($recognitions->count() > 0)
                            <div class="mt-3">
                                <button onclick="toggleDropdown({{ $index }})" 
                                        class="w-full flex items-center justify-between px-3 py-2 bg-gray-50 hover:bg-gray-100 rounded-lg transition text-sm text-gray-600">
                                    <span class="flex items-center gap-2">
                                        <span>🌍</span>
                                        <span>الدول المعترف بها</span>
                                        <span class="text-xs bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded-full">{{ $recognitions->count() }}</span>
                                    </span>
                                    <svg id="arrow-{{ $index }}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="dropdown-{{ $index }}" class="dropdown-content mt-2 space-y-1 pr-2">
                                    @foreach($recognitions as $recognition)
                                        <div class="flex items-center gap-2 text-sm text-gray-600 py-1 px-2 hover:bg-green-50 rounded">
                                            <span>
                                                @switch($recognition->country_code)
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
                                            <span>{{ $recognition->country_name_ar }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="mt-3 px-3 py-2 bg-gray-50 rounded-lg text-xs text-gray-400 text-center">
                                لا توجد دول معترف بها
                            </div>
                        @endif
                        
                        <!-- Action Button -->
                        <a href="{{ route('universities.show', $university->id) }}" 
                           class="block mt-4 text-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 rounded-lg transition">
                            تفاصيل الجامعة
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-xl">
                    <div class="text-6xl mb-4">🌍</div>
                    <p class="text-gray-500">لا توجد جامعات مسجلة في هذه الدولة</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $universities->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        function toggleDropdown(index) {
            const dropdown = document.getElementById('dropdown-' + index);
            const arrow = document.getElementById('arrow-' + index);
            
            dropdown.classList.toggle('open');
            
            if (dropdown.classList.contains('open')) {
                arrow.style.transform = 'rotate(180deg)';
            } else {
                arrow.style.transform = 'rotate(0deg)';
            }
        }
    </script>

    <x-floating-whatsapp />
</body>

</html>