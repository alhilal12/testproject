<section class="py-16 lg:py-24 bg-white" id="about">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->

        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4"
                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                {{ $title ?? 'من نحن' }}
            </h2>
            <p class="text-lg text-gray-600 mb-2" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                {{ $subtitle ?? 'رحلتنا نحو تحقيق أحلام الطلاب الأكاديمية' }}
            </p>
            <div class="flex justify-center">
                <div class="h-1 w-16 bg-gradient-to-r from-yellow-500 to-yellow-600"></div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">

            <!-- Left Side - Image with Animation -->
            <div class="relative group">
                <!-- Main Image -->
                <div
                    class="relative overflow-hidden rounded-lg shadow-2xl transform transition-all duration-500 hover:scale-105">
                    <img src="{{ $image ?? asset('images/about-us.jpg') }}" alt="من نحن - الهلال للاستشارات التعليمية"
                        class="w-full h-96 object-cover">

                    <!-- Overlay on Hover -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-yellow-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                        <p class="text-white font-bold text-lg" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                            نحن هنا لمساعدتك
                        </p>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-yellow-600/20 rounded-full blur-2xl"></div>
                <div class="absolute -top-4 -left-4 w-32 h-32 bg-yellow-600/10 rounded-full blur-3xl"></div>
            </div>

            <!-- Right Side - Text Content -->
            <div class="space-y-6">
                <!-- Main Description -->
                <div class="space-y-4">
                    <p class="text-lg text-gray-700 leading-relaxed"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        نحن <span class="font-bold text-yellow-600">الهلال للاستشارات الأكاديمية</span>، متخصصون في
                        تقديم استشارات شاملة وموثوقة للطلاب الراغبين في الدراسة بالجامعات الخارج (تركيا, قبرص ,
                        كازخستان). بفريق متخصص وخبرة
                        تزيد عن سنوات، رافقنا آلاف الطلاب في رحلتهم الأكاديمية.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        نؤمن بأن كل طالب يستحق فرصة حقيقية لتحقيق أحلامه الأكاديمية، لذا نقدم خدمات متكاملة تغطي جميع
                        جوانب رحلة الدراسة في الخارج ، من اختيار التخصص والجامعة المناسبة، وحتى الحصول على التأشيرة
                        والإقامة.
                    </p>
                </div>

                <!-- Features List with Hover Effects -->
                <div class="space-y-3 pt-4">
                    @php
                        $features = [
                            [
                                'icon' => '✓',
                                'title' => 'استشارات متخصصة',
                                'description' => 'فريق متخصص يرافقك في كل خطوة'
                            ],
                            [
                                'icon' => '✓',
                                'title' => 'تغطية شاملة',
                                'description' => 'من اختيار الجامعة حتى الإقامة'
                            ],
                            [
                                'icon' => '✓',
                                'title' => 'دعم مستمر',
                                'description' => 'نحن معك طوال رحلتك الدراسية'
                            ],
                        ];
                    @endphp

                    @foreach($features as $feature)
                        <div
                            class="flex items-start p-4 bg-gray-50 rounded-lg hover:bg-yellow-50 transition-all duration-300 transform hover:translate-x-2 cursor-pointer group/feature">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-md bg-yellow-600 text-white font-bold group-hover/feature:scale-110 transition-transform duration-300">
                                    {{ $feature['icon'] }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900 group-hover/feature:text-yellow-600 transition-colors"
                                    style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                    {{ $feature['title'] }}
                                </h3>
                                <p class="text-gray-600 text-sm" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                    {{ $feature['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- CTA Button -->
                <div class="pt-4">
                    <a href="{{ $buttonUrl ?? '#contact' }}"
                        class="inline-flex items-center px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                        style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        ابدأ استشارتك الآن
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Section with Counter Animation -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 py-12 border-t-2 border-b-2 border-gray-200">
            @php
                $stats = [
                    [
                        'number' => '5000',
                        'label' => 'طالب مستفيد',
                        'icon' => '👨‍🎓'
                    ],
                    [
                        'number' => '50',
                        'label' => 'جامعة ',
                        'icon' => '🏫'
                    ],
                    [
                        'number' => '98',
                        'label' => 'معدل النجاح %',
                        'icon' => '⭐'
                    ],
                ];
            @endphp

            @foreach($stats as $stat)
                <div class="text-center group/stat transform transition-all duration-300 hover:scale-110">
                    <div class="text-5xl mb-3 group-hover/stat:scale-125 transition-transform duration-300">
                        {{ $stat['icon'] }}
                    </div>
                    <div class="text-4xl font-bold text-yellow-600 mb-2 counter" data-target="{{ $stat['number'] }}">
                        0
                    </div>
                    <p class="text-gray-600 font-semibold" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Why Choose Us Section -->
        <div class="mt-16">
            <h3 class="text-3xl font-bold text-center text-gray-900 mb-12"
                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                لماذا تختار الهلال؟
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $reasons = [
                        [
                            'title' => 'خبرة عملية',
                            'description' => 'سنوات من الخبرة في مجال الاستشارات التعليمية',
                            'color' => 'blue'
                        ],
                        [
                            'title' => 'فريق متخصص',
                            'description' => 'متخصصون في التعليم العالي والجامعات الخارج',
                            'color' => 'purple'
                        ],
                        [
                            'title' => 'دعم 24/7',
                            'description' => 'نحن متاحون دائماً للإجابة على استفساراتك',
                            'color' => 'green'
                        ],
                        [
                            'title' => 'نتائج مثبتة',
                            'description' => 'معدل نجاح عالي جداً في قبول الطلاب',
                            'color' => 'red'
                        ],
                    ];
                @endphp

                @foreach($reasons as $reason)
                    <div
                        class="group/reason relative bg-gradient-to-br from-gray-50 to-white p-6 rounded-lg border-2 border-gray-200 hover:border-yellow-600 transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                        <!-- Animated Background -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-yellow-600/5 to-transparent opacity-0 group-hover/reason:opacity-100 transition-opacity duration-300 rounded-lg">
                        </div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <h4 class="text-lg font-bold text-gray-900 mb-2 group-hover/reason:text-yellow-600 transition-colors"
                                style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                {{ $reason['title'] }}
                            </h4>
                            <p class="text-gray-600 text-sm" style="font-family: 'Cairo', 'Segoe UI', sans-serif;">
                                {{ $reason['description'] }}
                            </p>
                        </div>

                        <!-- Decorative Icon -->
                        <div
                            class="absolute -top-3 -right-3 w-12 h-12 bg-yellow-600 rounded-full opacity-0 group-hover/reason:opacity-100 transition-all duration-300 transform group-hover/reason:scale-125">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    /* Counter Animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .counter {
        animation: countUp 1s ease-out;
    }

    /* Smooth transitions for all interactive elements */
    [class*="group"] {
        transition: all 0.3s ease;
    }

    /* Hover effect for cards */
    .group/reason {
        position: relative;
        overflow: hidden;
    }

    .group/reason::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .group/reason:hover::before {
        left: 100%;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Counter Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.counter');

        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps
                    let current = 0;

                    const updateCounter = () => {
                        current += increment;
                        if (current < target) {
                            counter.textContent = Math.floor(current);
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => observer.observe(counter));
    });
</script>