<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - الهلال للاستشارات التعليمية</title>
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

        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            transition: all 0.3s ease;
        }

        .whatsapp-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-8 mt-20">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-white mb-2 animate-fadeUp">مرحباً، <?php echo e(Auth::user()->name); ?></h1>
            <p class="text-gray-300 animate-fadeUp" style="animation-delay: 0.1s;">مرحباً بعودتك إلى لوحة التحكم الخاصة
                بك</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">

        <!-- WhatsApp Contact Card -->
        <div class="animate-fadeUp mb-8">
            <div class="whatsapp-btn rounded-2xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">تواصل معنا مباشرة</h2>
                            <p class="text-white/80">لديك استفسار؟ فريقنا جاهز للإجابة على جميع أسئلتك</p>
                        </div>
                    </div>
                    <a href="https://wa.me/905551234567?text=مرحباً،%20أحتاج%20إلى%20استشارة%20بخصوص%20الجامعات%20التركية"
                        target="_blank"
                        class="bg-white text-green-600 hover:bg-gray-100 font-bold px-6 py-3 rounded-xl transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        </svg>
                        تواصل الآن عبر واتس اب
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards (استشاراتي فقط) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 animate-fadeUp">
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-yellow-500">
                <p class="text-2xl font-bold text-gray-800"><?php echo e($stats['total']); ?></p>
                <p class="text-gray-500 text-sm">إجمالي الاستشارات</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-yellow-500">
                <p class="text-2xl font-bold text-yellow-600"><?php echo e($stats['pending']); ?></p>
                <p class="text-gray-500 text-sm">قيد الانتظار</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-green-500">
                <p class="text-2xl font-bold text-green-600"><?php echo e($stats['replied']); ?></p>
                <p class="text-gray-500 text-sm">تم الرد</p>
            </div>
            <div class="stat-card bg-white rounded-xl shadow-md p-4 text-center border-t-4 border-gray-500">
                <p class="text-2xl font-bold text-gray-600"><?php echo e($stats['completed']); ?></p>
                <p class="text-gray-500 text-sm">مكتمل</p>
            </div>
        </div>
        <!-- Action Buttons -->
        <div class="grid grid-cols-2 gap-4 mb-8 animate-fadeUp">
            <a href="<?php echo e(route('documents.index')); ?>"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span>📄 مستنداتي</span>
            </a>
            <a href="<?php echo e(route('university-quotas.index')); ?>"
                class="flex items-center justify-center gap-2 p-3 bg-white rounded-xl shadow-md hover:shadow-lg transition">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span>📅 التقويم الأكاديمي</span>
            </a>

        </div>
        <!-- Action Buttons (زر طلب استشارة جديد) -->
        <div class="flex justify-center mb-8 animate-fadeUp">
            <a href="<?php echo e(route('consultation.create')); ?>"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>📝 طلب استشارة جديدة</span>
            </a>
        </div>
        <!-- استشاراتي (القائمة الرئيسية) -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeUp">
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 px-6 py-4">
                <h2 class="text-xl font-bold text-white">استشاراتي</h2>
            </div>
            <div class="p-6">
                <?php if(count($consultations) > 0): ?>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                                <div class="flex-1">
                                    <p class="text-gray-800 font-medium mb-2"><?php echo e($consult->message); ?></p>
                                    <div class="flex flex-wrap gap-3 text-sm text-gray-500">
                                        <span><?php echo e($consult->created_at->format('Y/m/d')); ?></span>
                                        <?php if($consult->university): ?>
                                            <span>🏛️ <?php echo e($consult->university->name_ar); ?></span>
                                        <?php endif; ?>
                                        <?php if($consult->major): ?>
                                            <span>📚 <?php echo e($consult->major->name_ar); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 mt-3 md:mt-0">
                                    <span class="status-badge status-<?php echo e($consult->status); ?>">
                                        <?php echo e($consult->status_text); ?>

                                    </span>
                                    <a href="<?php echo e(route('consultation.show', $consult->id)); ?>"
                                        class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm transition">
                                        التفاصيل
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-6">
                        <?php echo e($consultations->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="text-center py-12">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z">
                            </path>
                        </svg>
                        <p class="text-gray-500">لا توجد استشارات حالياً</p>
                        <a href="<?php echo e(route('consultation.create')); ?>"
                            class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg transition">
                            طلب استشارة جديدة
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; <?php echo e(date('Y')); ?> الهلال للاستشارات التعليمية. جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>

</html><?php /**PATH C:\laragon\www\testProject\resources\views/dashboard.blade.php ENDPATH**/ ?>