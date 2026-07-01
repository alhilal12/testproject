@props(['universities' => [], 'title' => 'استكشف الجامعات التركية', 'subtitle' => 'اختر من بين أفضل الجامعات الحكومية والخاصة', 'showViewAllButton' => false])

<section class="py-16 lg:py-24 bg-gradient-to-b from-white to-gray-50" id="universities-cards">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4"
                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 mb-2" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                {{ $subtitle }}
            </p>
            <div class="flex justify-center">
                <div class="h-1 w-16 bg-gradient-to-r from-yellow-500 to-yellow-600"></div>
            </div>
        </div>

        <!-- Universities Cards Grid -->
        @if(count($universities) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($universities as $university)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

                        <!-- Logo Circle (دائري، خلفية بيضاء) -->
                        <div class="flex justify-center pt-6 pb-2 bg-white">
                            <div class="relative group">
                                <div class="w-24 h-24 rounded-full bg-white shadow-md overflow-hidden flex items-center justify-center border-2 border-gray-100">
                                    @if($university->logo)
                               <img src="{{ asset('storage/' . $university->logo) }}" 
     loading="lazy"
     alt="{{ $university->name_ar }}"
     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-yellow-400 to-yellow-500 flex items-center justify-center">
                                            <span class="text-white text-xl font-bold">{{ mb_substr($university->name_ar, 0, 2) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Type Badge (أسفل الشعار مباشرة) -->
                                <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-white text-xs font-bold shadow-md {{ $university->type == 'public' ? 'bg-blue-500' : 'bg-purple-500' }}">
                                        {{ $university->type == 'public' ? '🏛️ حكومية' : '🏢 خاصة' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-4 pt-6">
                            <!-- University Name -->
                            <h3 class="text-md font-bold text-gray-800 text-center line-clamp-2 leading-tight">
                                {{ $university->name_ar }}
                            </h3>
                            <p class="text-gray-500 text-xs text-center mt-1">{{ $university->name_tr }}</p>

                            <!-- Divider -->
                            <div class="border-t border-gray-100 my-3"></div>

                            <!-- City & Rank in one line -->
                            <div class="flex justify-center items-center gap-3 text-xs text-gray-500 mb-3">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $university->city }}</span>
                                </div>
                                @if($university->rank_local)
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <span>#{{ $university->rank_local }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Languages Badges (مختصرة) -->
                            @php
                                $langs = is_array($university->languages) ? $university->languages : json_decode($university->languages, true);
                                $langMap = ['turkish' => '🇹🇷', 'english' => '🇬🇧', 'arabic' => '🇸🇦', 'german' => '🇩🇪', 'french' => '🇫🇷', 'spanish' => '🇪🇸', 'italian' => '🇮🇹', 'russian' => '🇷🇺', 'chinese' => '🇨🇳'];
                            @endphp
                            @if(is_array($langs) && count($langs) > 0)
                                <div class="flex justify-center gap-1 mb-3">
                                    @foreach(array_slice($langs, 0, 4) as $lang)
                                        <span class="text-xs bg-gray-100 rounded-full px-2 py-0.5">{{ $langMap[$lang] ?? substr($lang, 0, 2) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('universities.show', $university->id) }}"
                                    class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1.5 px-3 rounded-lg text-xs text-center transition duration-300">
                                    التفاصيل
                                </a>
                                @if($university->website)
                                    <a href="{{ $university->website }}" target="_blank"
                                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-1.5 px-3 rounded-lg text-xs text-center transition duration-300">
                                        🌐 الموقع
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            @if($showViewAllButton)
                <div class="mt-12 text-center">
                    <a href="{{ route('universities.index') }}"
                        class="inline-flex items-center px-8 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                        عرض جميع الجامعات 
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="col-span-full py-16 text-center">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4 0h1m-1-4h1">
                    </path>
                </svg>
                <p class="text-gray-500 text-lg" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                    لا توجد جامعات متاحة حالياً. يرجى العودة لاحقاً.
                </p>
            </div>
        @endif
    </div>
</section>

<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    @media (max-width: 768px) {
        .grid {
            grid-template-columns: 1fr;
        }
    }
</style>