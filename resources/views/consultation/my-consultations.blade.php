<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلبات الاستشارة - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fadeUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-slideRight {
            animation: slideInRight 0.5s ease-out forwards;
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
        }

        .status-processing {
            background-color: #dbeafe;
            color: #2563eb;
        }

        .status-replied {
            background-color: #d1fae5;
            color: #059669;
        }

        .status-completed {
            background-color: #e5e7eb;
            color: #4b5563;
        }

        .consultation-card {
            transition: all 0.3s ease;
        }

        .consultation-card:hover {
            transform: translateX(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans">

    <x-navbar />

    <!-- Hero Section صغير -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-12 mt-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2 animate-fadeUp">طلبات الاستشارة</h1>
            <p class="text-gray-300 animate-fadeUp" style="animation-delay: 0.1s;">تابع حالة طلباتك واستفساراتك</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-10 animate-fadeUp">
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-yellow-500">
                <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                <p class="text-gray-500 text-sm">إجمالي الطلبات</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-yellow-400">
                <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
                <p class="text-gray-500 text-sm">قيد الانتظار</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-blue-400">
                <p class="text-2xl font-bold text-blue-600">{{ $stats['processing'] }}</p>
                <p class="text-gray-500 text-sm">قيد المعالجة</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-green-400">
                <p class="text-2xl font-bold text-green-600">{{ $stats['replied'] }}</p>
                <p class="text-gray-500 text-sm">تم الرد</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-gray-400">
                <p class="text-2xl font-bold text-gray-600">{{ $stats['completed'] }}</p>
                <p class="text-gray-500 text-sm">مكتمل</p>
            </div>
        </div>

        <!-- New Consultation Button -->
        <div class="text-left mb-6 animate-slideRight">
            <a href="{{ route('consultation.create') }}"
                class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-3 rounded-lg transition transform hover:scale-105 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                طلب استشارة جديدة
            </a>
        </div>

        <!-- Consultations List -->
        @if($consultations->count() > 0)
            <div class="space-y-4">
                @foreach($consultations as $consult)
                    <div class="consultation-card bg-white rounded-xl shadow-md overflow-hidden animate-slideRight"
                        style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <div class="p-5">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                <!-- Left Side -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="status-badge status-{{ $consult->status }}">
                                            {{ $consult->status_text }}
                                        </span>
                                        <span class="text-gray-400 text-sm">{{ $consult->created_at->format('Y/m/d') }}</span>
                                    </div>
                                    <p class="text-gray-800 font-medium line-clamp-2">
                                        {{ $consult->message }}
                                    </p>
                                    <div class="flex flex-wrap gap-3 mt-3 text-sm text-gray-500">
                                        @if($consult->university)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4 0h1m-1-4h1">
                                                    </path>
                                                </svg>
                                                {{ $consult->university->name_ar }}
                                            </span>
                                        @endif
                                        @if($consult->major)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                    </path>
                                                </svg>
                                                {{ $consult->major->name_ar }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Right Side - Action Button -->
                                <a href="{{ route('consultation.show', $consult->id) }}"
                                    class="flex-shrink-0 inline-flex items-center justify-center gap-2 px-5 py-2 border-2 border-yellow-500 text-yellow-600 hover:bg-yellow-500 hover:text-white rounded-lg transition duration-300">
                                    عرض التفاصيل
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>

                            <!-- Admin Reply Preview (if available) -->
                            @if($consult->admin_reply && $consult->status == 'replied')
                                <div class="mt-3 pt-3 border-t border-gray-100">
                                    <div class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                            </path>
                                        </svg>
                                        <p class="text-gray-600 text-sm line-clamp-1">
                                            <span class="font-semibold">رد المستشار:</span> {{ $consult->admin_reply }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $consultations->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-lg p-12 text-center animate-fadeUp">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                    </path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">لا توجد طلبات استشارة</h3>
                <p class="text-gray-500 mb-6">لم تقم بإرسال أي طلب استشارة بعد</p>
                <a href="{{ route('consultation.create') }}"
                    class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-3 rounded-lg transition">
                    طلب استشارة جديدة
                </a>
            </div>
        @endif
    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <style>
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</body>

</html>