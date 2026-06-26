<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التقارير والإحصائيات - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <x-navbar />

    <div class="container mx-auto px-4 py-8">

        <div class="mb-6">
            <a href="{{ route('consultant.dashboard') }}"
                class="text-yellow-600 hover:text-yellow-700 inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                    </path>
                </svg>
                رجوع إلى لوحة التحكم
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">التقارير والإحصائيات</h1>
            </div>

            <div class="p-6">
                <!-- إحصائيات سريعة -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
                    <div
                        class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-4 text-center text-white">
                        <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
                        <p class="text-sm opacity-90">إجمالي الاستشارات</p>
                    </div>
                    <div
                        class="stat-card bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-4 text-center text-white">
                        <p class="text-3xl font-bold">{{ $stats['pending'] }}</p>
                        <p class="text-sm opacity-90">في انتظار الرد</p>
                    </div>
                    <div
                        class="stat-card bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl p-4 text-center text-white">
                        <p class="text-3xl font-bold">{{ $stats['processing'] }}</p>
                        <p class="text-sm opacity-90">قيد المعالجة</p>
                    </div>
                    <div
                        class="stat-card bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-4 text-center text-white">
                        <p class="text-3xl font-bold">{{ $stats['replied'] }}</p>
                        <p class="text-sm opacity-90">تم الرد</p>
                    </div>
                    <div
                        class="stat-card bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl p-4 text-center text-white">
                        <p class="text-3xl font-bold">{{ $stats['completed'] }}</p>
                        <p class="text-sm opacity-90">مكتمل</p>
                    </div>
                </div>

                <!-- الرسم البياني -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 text-center">الاستشارات الشهرية</h2>
                        <canvas id="monthlyChart" height="250"></canvas>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 text-center">توزيع الاستشارات حسب الحالة</h2>
                        <canvas id="statusChart" height="250"></canvas>
                    </div>
                </div>

                <!-- الجامعات الأكثر طلباً -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4 0h1m-1-4h1">
                                </path>
                            </svg>
                            أكثر الجامعات طلباً
                        </h2>
                        <div class="space-y-3">
                            @forelse($topUniversities as $item)
                                <div class="flex justify-between items-center">
                                    <span>{{ $item->university?->name_ar ?? 'غير محدد' }}</span>
                                    <div class="flex items-center gap-3">
                                        <div class="w-48 bg-gray-200 rounded-full h-2 overflow-hidden">
                                            <div class="bg-yellow-500 h-2 rounded-full"
                                                style="width: {{ ($item->total / $stats['total']) * 100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-semibold">{{ $item->total }} استشارة</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center">لا توجد بيانات كافية</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- التخصصات الأكثر طلباً -->
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            أكثر التخصصات طلباً
                        </h2>
                        <div class="space-y-3">
                            @forelse($topMajors as $item)
                                <div class="flex justify-between items-center">
                                    <span>{{ $item->major?->name_ar ?? 'غير محدد' }}</span>
                                    <div class="flex items-center gap-3">
                                        <div class="w-48 bg-gray-200 rounded-full h-2 overflow-hidden">
                                            <div class="bg-green-500 h-2 rounded-full"
                                                style="width: {{ ($item->total / $stats['total']) * 100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-semibold">{{ $item->total }} استشارة</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center">لا توجد بيانات كافية</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- معلومات إضافية -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl p-6 text-white">
                        <h3 class="text-lg font-bold mb-2">⏱️ متوسط وقت الرد</h3>
                        <p class="text-3xl font-bold">
                            @if($avgReplyTime->avg_hours)
                                {{ number_format($avgReplyTime->avg_hours, 1) }} ساعة
                            @else
                                —
                            @endif
                        </p>
                        <p class="text-sm opacity-80 mt-2">منذ إنشاء الاستشارة حتى الرد عليها</p>
                    </div>
                    <div class="bg-gradient-to-r from-teal-500 to-cyan-600 rounded-xl p-6 text-white">
                        <h3 class="text-lg font-bold mb-2">📊 نسبة الإنجاز</h3>
                        <p class="text-3xl font-bold">
                            @if($stats['total'] > 0)
                                {{ round(($stats['completed'] / $stats['total']) * 100) }}%
                            @else
                                0%
                            @endif
                        </p>
                        <p class="text-sm opacity-80 mt-2">من إجمالي الاستشارات المكتملة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        // الرسم البياني الشهري
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_column($monthlyStats, 'month')) !!},
                datasets: [{
                    label: 'عدد الاستشارات',
                    data: {!! json_encode(array_column($monthlyStats, 'count')) !!},
                    borderColor: '#eab308',
                    backgroundColor: 'rgba(234, 179, 8, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // الرسم البياني للحالات
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['في انتظار الرد', 'قيد المعالجة', 'تم الرد', 'مكتمل'],
                datasets: [{
                    data: [{{ $stats['pending'] }}, {{ $stats['processing'] }}, {{ $stats['replied'] }}, {{ $stats['completed'] }}],
                    backgroundColor: ['#eab308', '#3b82f6', '#10b981', '#6b7280'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</body>

</html>