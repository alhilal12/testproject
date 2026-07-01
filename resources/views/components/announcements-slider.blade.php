@if($announcements->count() > 0)
    <section class="container mx-auto px-4 py-8">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
            <!-- Swiper -->
            <div class="swiper announcementsSwiper">
                <div class="swiper-wrapper">
                    @foreach($announcements as $announcement)
                        <div class="swiper-slide">
                            <div class="relative h-[400px] md:h-[500px] w-full">
                                <!-- Background Image -->
                                @if($announcement->image)
                                    <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title_ar }}"
                                        class="w-full h-full object-cover">
                                    <!-- Overlay Gradient (أسود شفاف) -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>
                                @else
                                    <!-- Gradient Background if no image (أسود مع تدرج) -->
                                    <div class="w-full h-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700"></div>
                                @endif

                                <!-- Decorative Pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-500 rounded-full blur-3xl"></div>
                                </div>

                                <!-- Content -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center text-center text-white p-6 md:p-12">
                                    <div class="max-w-3xl relative z-10">
                                        <!-- Badge -->
                                        <span
                                            class="inline-block bg-white/10 backdrop-blur-sm border border-white/20 px-4 py-1 rounded-full text-sm font-semibold mb-4">
                                            📢 إعلان مميز
                                        </span>

                                        <!-- Title -->
                                        <h2
                                            class="text-3xl md:text-5xl font-bold mb-4 drop-shadow-lg leading-tight [text-shadow:_0_4px_30px_rgba(0,0,0,0.5)]">
                                            {{ $announcement->title_ar }}
                                        </h2>

                                        <!-- Description -->
                                        <p
                                            class="text-lg md:text-xl opacity-95 max-w-2xl mx-auto drop-shadow-md leading-relaxed [text-shadow:_0_2px_10px_rgba(0,0,0,0.5)]">
                                            {{ $announcement->description_ar }}
                                        </p>

                                        <!-- Button -->
                                        @if($announcement->link)
                                            <a href="{{ $announcement->link }}" target="_blank"
                                                class="mt-6 inline-flex items-center gap-2 bg-white text-gray-900 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg hover:shadow-xl">
                                                اعرف المزيد
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination !bottom-4"></div>
                <div
                    class="swiper-button-next !text-white !bg-black/30 !w-12 !h-12 !rounded-full !backdrop-blur-sm hover:!bg-black/50 transition">
                </div>
                <div
                    class="swiper-button-prev !text-white !bg-black/30 !w-12 !h-12 !rounded-full !backdrop-blur-sm hover:!bg-black/50 transition">
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.announcementsSwiper', {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    speed: 1000,
                });
            });
        </script>
    @endpush
@endif