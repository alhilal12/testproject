<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $title ?? 'تقويم المفاضلات' }} - مواعيد التقديم للجامعات التركية">
    <meta property="og:title" content="{{ $title ?? 'تقويم المفاضلات' }}">
    <title>{{ $title ?? 'تقويم الجامعات التركية' }} | الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9fafb;
        }

        .table-header {
            background: linear-gradient(135deg, #1e3a5f 0%, #0f2b44 100%);
        }

        .deadline-ended {
            opacity: 0.6;
            background-color: #f3f4f6;
        }

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

<body>

    <x-navbar />

    <div class="container mx-auto px-4 py-12">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">📅 {{ $title }}</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $description }}</p>
        </div>

        <!-- Tabs -->
        <div class="flex justify-center gap-4 mb-8">
            <a href="{{ route('university-quotas.index', ['type' => 'undergraduate']) }}"
                class="px-8 py-3 rounded-lg font-semibold transition-all duration-300 {{ $viewType == 'undergraduate' ? 'bg-yellow-500 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                📊 تقويم المفاضلات
            </a>
            <a href="{{ route('university-quotas.index', ['type' => 'postgraduate']) }}"
                class="px-8 py-3 rounded-lg font-semibold transition-all duration-300 {{ $viewType == 'postgraduate' ? 'bg-yellow-500 text-white shadow-lg' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                🎓 تقويم الدراسات العليا
            </a>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white rounded-xl shadow-md p-5 mb-8">
            <form method="GET" action="{{ route('university-quotas.index') }}" id="filterForm">
                <input type="hidden" name="type" value="{{ $viewType }}">
                <div class="flex flex-wrap gap-4 items-end">
                    <!-- بحث -->
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">🔍 بحث</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن جامعة..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                    </div>

                    <!-- فلترة المدينة -->
                    <div class="w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">📍 المدينة</label>
                        <select name="city"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                            <option value="all">جميع المدن</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- فلترة الكلية (للمفاضلات العادية فقط) -->
                    @if($viewType == 'undergraduate')
                        <div class="w-56">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">🏛️ الكلية</label>
                            <select name="college"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="">جميع الكليات</option>
                                @foreach($colleges as $college)
                                    <option value="{{ $college->name_ar }}" {{ request('college') == $college->name_ar ? 'selected' : '' }}>
                                        {{ $college->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- فلترة المعهد (للمفاضلات العادية فقط) -->
                        <div class="w-56">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">📚 المعهد</label>
                            <select name="institute"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-yellow-500 focus:outline-none">
                                <option value="">جميع المعاهد</option>
                                @foreach($institutes as $institute)
                                    <option value="{{ $institute->name_ar }}" {{ request('institute') == $institute->name_ar ? 'selected' : '' }}>
                                        {{ $institute->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <!-- إخفاء المفاضلات المنتهية -->
                    <div class="flex items-center h-[50px]">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="hide_expired" value="true" {{ $hideExpired == 'true' ? 'checked' : '' }} onchange="this.form.submit()"
                                class="w-5 h-5 text-yellow-500 rounded focus:ring-yellow-500">
                            <span class="text-sm text-gray-700">📅 إخفاء المفاضلات المنتهية</span>
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">
                            تطبيق الفلتر
                        </button>
                        <a href="{{ route('university-quotas.index', ['type' => $viewType]) }}"
                            class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition ml-2">
                            إعادة تعيين
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="table-header text-white">
                            <th class="px-3 py-3 text-center w-20">#</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة</th>
                            <th class="px-4 py-3 text-right">اسم الجامعة (عربي)</th>

                            {{-- عمود البرنامج/المعهد يظهر فقط للدراسات العليا --}}
                            @if($viewType == 'postgraduate')
                                <th class="px-4 py-3 text-right">البرنامج / المعهد</th>
                            @endif

                            <th class="px-4 py-3 text-center">الرسوم</th>
                            <th class="px-4 py-3 text-center">المدينة</th>
                            <th class="px-4 py-3 text-center">بدء التسجيل</th>
                            <th class="px-4 py-3 text-center">انتهاء التسجيل</th>
                            <th class="px-4 py-3 text-center">النتائج</th>
                            <th class="px-4 py-3">الشهادات المقبولة</th>
                            <th class="px-4 py-3 text-center">التفاصيل</th>
                            <th class="px-4 py-3 text-center">نوع التقديم</th>
                            <th class="px-4 py-3 text-center">الترتيب المحلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($quotas as $index => $quota)
                            @php
                                $isExpired = $quota->registration_end && \Carbon\Carbon::parse($quota->registration_end)->isPast();
                            @endphp
                            <tr class="border-b hover:bg-gray-50 transition {{ $isExpired ? 'deadline-ended' : '' }}">
                                <td class="px-3 py-3 text-center font-bold text-gray-700">
                                    {{ $quota->competition_number ?? ($quotas->firstItem() + $index) }}
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-800">{{ $quota->university_name_tr ?? '—' }}
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $quota->university_name_ar ?? '—' }}</td>

                                {{-- عمود البرنامج/المعهد يظهر فقط للدراسات العليا --}}

                                @if($viewType == 'postgraduate')
                                    <td class="px-4 py-3 text-gray-600">{{ $quota->institute ?? '—' }}</td>
                                @endif

                                <td class="px-4 py-3 text-center">
                                    <span
                                        class="{{ $quota->fee == 'مجانا' ? 'text-green-600 font-bold' : 'text-gray-700' }}">
                                        {{ $quota->fee ?? '—' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">{{ $quota->city ?? '—' }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($quota->registration_start)
                                        <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-sm">
                                            {{ \Carbon\Carbon::parse($quota->registration_start)->format('d/m/Y') }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($quota->registration_end)
                                        <span class="bg-red-50 text-red-600 px-2 py-1 rounded text-sm font-semibold">
                                            {{ \Carbon\Carbon::parse($quota->registration_end)->format('d/m/Y') }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($quota->results_date)
                                        {{ \Carbon\Carbon::parse($quota->results_date)->format('d/m/Y') }}
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        @if($quota->accepted_certificates)
                                            @php
                                                $certs = is_string($quota->accepted_certificates) ? json_decode($quota->accepted_certificates, true) : $quota->accepted_certificates;
                                                if (is_array($certs)) {
                                                    foreach ($certs as $cert) {
                                                        echo '<span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">' . trim($cert) . '</span>';
                                                    }
                                                } else {
                                                    echo '<span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">' . $quota->accepted_certificates . '</span>';
                                                }
                                            @endphp
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($quota->university_id)
                                        <a href="{{ route('universities.show', $quota->university_id) }}"
                                            class="text-yellow-600 hover:text-yellow-700 font-semibold inline-flex items-center gap-1">
                                            التفاصيل
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </a>
                                    @elseif($quota->details)
                                        <button onclick="showDetails('{{ addslashes($quota->details) }}')"
                                            class="text-yellow-600 hover:text-yellow-700">📋 عرض</button>
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">{{ $quota->application_method ?? '—' }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($quota->local_rank && $quota->local_rank != '**')
                                        <span
                                            class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-sm font-semibold">
                                            {{ $quota->local_rank }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">{{ $quota->local_rank ?? '—' }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $viewType == 'postgraduate' ? 12 : 11 }}"
                                    class="text-center py-16 text-gray-500">
                                    <div class="text-lg">📭 لا توجد بيانات حالياً</div>

                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t bg-gray-50">
                {{ $quotas->appends(request()->except('page'))->links()}}
            </div>
        </div>

        <!-- Update Info -->
        <div class="text-center text-sm text-gray-400 mt-6">
            📅 يتم تحديث البيانات تلقائياً من المصادر الرسمية كل 6 ساعات
        </div>
    </div>

    <!-- Modal for Details -->
    <div id="detailsModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">📋 تفاصيل إضافية</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            <div id="detailsContent" class="text-gray-600 leading-relaxed"></div>
            <button onclick="closeModal()"
                class="mt-6 w-full bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">إغلاق</button>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        function showDetails(details) {
            const modal = document.getElementById('detailsModal');
            const content = document.getElementById('detailsContent');
            content.innerHTML = details;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('detailsModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
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