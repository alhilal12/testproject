<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($article->title); ?> - الهلال للاستشارات التعليمية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9fafb;
        }

        /* تنسيق محتوى المقال */
        .article-content {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #374151;
        }

        .article-content h1 {
            font-size: 2rem;
            font-weight: 800;
            margin: 1.5rem 0 1rem;
            color: #1f2937;
            border-right: 4px solid #eab308;
            padding-right: 1rem;
        }

        .article-content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 1.25rem 0 0.75rem;
            color: #374151;
            border-right: 4px solid #eab308;
            padding-right: 1rem;
        }

        .article-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 1rem 0 0.5rem;
            color: #4b5563;
            padding-right: 0.75rem;
        }

        .article-content p {
            margin-bottom: 1rem;
            text-align: justify;
        }

        .article-content ul,
        .article-content ol {
            margin: 1rem 0;
            padding-right: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
            line-height: 1.7;
        }

        .article-content a {
            color: #eab308;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .article-content a:hover {
            color: #ca8a04;
        }

        .article-content hr {
            margin: 2rem 0;
            border: 0;
            height: 1px;
            background: linear-gradient(to right, transparent, #eab308, transparent);
        }

        .article-content blockquote {
            border-right: 4px solid #eab308;
            background-color: #fefce8;
            padding: 1rem 1.5rem;
            margin: 1rem 0;
            border-radius: 0.5rem;
            font-style: italic;
            color: #4b5563;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }

        .article-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .article-content th,
        .article-content td {
            border: 1px solid #e5e7eb;
            padding: 0.75rem;
            text-align: right;
        }

        .article-content th {
            background-color: #f3f4f6;
            font-weight: 700;
        }
    </style>
</head>

<body class="bg-gray-50">

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

    <!-- Article Header -->
    <div class="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 mt-20">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center gap-2 mb-4 flex-wrap">
                <span
                    class="bg-yellow-500 text-white text-sm px-3 py-1 rounded-full"><?php echo e($article->category_name); ?></span>
                <span class="bg-gray-700 text-gray-300 text-sm px-3 py-1 rounded-full">⏱️
                    <?php echo e($article->read_time ?? '5'); ?> دقائق</span>
                <span
                    class="bg-gray-700 text-gray-300 text-sm px-3 py-1 rounded-full"><?php echo e($article->difficulty_name ?? 'مبتدئ'); ?></span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight"><?php echo e($article->title); ?>

            </h1>
            <div class="flex items-center justify-center gap-4 text-gray-300 flex-wrap">
                <div class="flex items-center gap-2">
                    <div
                        class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        <?php echo e(mb_substr($article->author->name, 0, 1)); ?>

                    </div>
                    <span><?php echo e($article->author->name); ?></span>
                </div>
                <span>📅 <?php echo e($article->created_at->format('d/m/Y')); ?></span>
                <span>👁️ <?php echo e(number_format($article->views)); ?> مشاهدة</span>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">

            <!-- Featured Image -->
            <?php if($article->image): ?>
                <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                    <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>"
                        class="w-full h-auto object-cover">
                </div>
            <?php endif; ?>

            <!-- Table of Contents (إذا كان المقال طويلاً) -->
            <?php if(strlen(strip_tags($article->content)) > 2000): ?>
                <div class="bg-gray-100 rounded-xl p-5 mb-8 border-r-4 border-yellow-500">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        محتويات المقال
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <?php
                            $headers = [];
                            preg_match_all('/<h2>(.*?)<\/h2>/', $article->content, $headers);
                        ?>
                        <?php $__currentLoopData = $headers[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="text-sm text-gray-600 hover:text-yellow-600 transition">• <?php echo e($header); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Content -->
            <div class="article-content bg-white rounded-2xl p-6 md:p-8 shadow-lg">
                <?php echo $article->content; ?>

            </div>

            <!-- Tags (إذا كانت موجودة) -->
            <div class="mt-8 flex flex-wrap gap-2 justify-center">
                <span class="text-gray-500 text-sm ml-2">🏷️ الوسوم:</span>
                <a href="#"
                    class="bg-gray-100 hover:bg-yellow-100 text-gray-600 hover:text-yellow-600 px-3 py-1 rounded-full text-sm transition">دراسة
                    في تركيا</a>
                <a href="#"
                    class="bg-gray-100 hover:bg-yellow-100 text-gray-600 hover:text-yellow-600 px-3 py-1 rounded-full text-sm transition">الجامعات
                    التركية</a>
                <a href="#"
                    class="bg-gray-100 hover:bg-yellow-100 text-gray-600 hover:text-yellow-600 px-3 py-1 rounded-full text-sm transition">القبول
                    الجامعي</a>
            </div>

            <!-- Author Bio -->
            <div
                class="mt-8 bg-gray-50 rounded-xl p-6 flex flex-col md:flex-row gap-4 items-center md:items-start border-r-4 border-yellow-500">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center text-white text-2xl font-bold flex-shrink-0">
                    <?php echo e(mb_substr($article->author->name, 0, 1)); ?>

                </div>
                <div class="text-center md:text-right">
                    <h4 class="font-bold text-gray-800 text-lg"><?php echo e($article->author->name); ?></h4>
                    <p class="text-gray-500 text-sm mb-2">كاتب ومستشار تعليمي</p>
                    <p class="text-gray-600 text-sm">متخصص في مجال التعليم العالي والاستشارات الأكاديمية للطلاب الراغبين
                        في الدراسة في تركيا.</p>
                </div>
            </div>

            <!-- Related Articles -->
            <?php if(isset($relatedArticles) && $relatedArticles->count() > 0): ?>
                <div class="mt-12">
                    <h3
                        class="text-xl font-bold text-gray-800 mb-6 text-center border-b-2 border-yellow-500 inline-block pb-2 w-full">
                        📖 مقالات ذات صلة</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition group">
                                <div class="p-4">
                                    <div class="text-xs text-gray-400 mb-2"><?php echo e($related->created_at->format('d/m/Y')); ?></div>
                                    <h4
                                        class="font-bold text-gray-800 mb-2 group-hover:text-yellow-600 transition line-clamp-2">
                                        <a href="<?php echo e(route('articles.show', $related->slug)); ?>"><?php echo e($related->title); ?></a>
                                    </h4>
                                    <a href="<?php echo e(route('articles.show', $related->slug)); ?>"
                                        class="text-yellow-600 text-sm font-semibold hover:underline">اقرأ المزيد →</a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Share Buttons -->
            <div class="mt-12 text-center">
                <p class="text-gray-600 mb-3">هل أعجبك المقال؟ شاركه مع أصدقائك</p>
                <div class="flex justify-center gap-3 flex-wrap">
                    <a href="https://wa.me/?text=<?php echo e(urlencode($article->title . ' - ' . route('articles.show', $article->slug))); ?>"
                        target="_blank"
                        class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.019-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.496.099-.198.05-.372-.025-.521-.075-.149-.669-1.614-.916-2.21-.242-.579-.487-.5-.669-.51-.173-.01-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.478 0 1.462 1.065 2.874 1.213 3.074.149.198 2.095 3.2 5.075 4.486.71.307 1.264.49 1.696.627.713.226 1.362.194 1.876.118.572-.085 1.758-.719 2.006-1.413.248-.694.248-1.288.173-1.413-.074-.124-.272-.198-.57-.347z" />
                        </svg>
                        واتس اب
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('articles.show', $article->slug))); ?>"
                        target="_blank"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                        فيسبوك
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($article->title)); ?>&url=<?php echo e(urlencode(route('articles.show', $article->slug))); ?>"
                        target="_blank"
                        class="bg-sky-500 hover:bg-sky-600 text-white px-5 py-2 rounded-lg transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                        تويتر
                    </a>
                </div>
            </div>
        </div>
    </div>


    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <?php if (isset($component)) { $__componentOriginal67d5d5978c3922da5619d6ebcc86c174 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67d5d5978c3922da5619d6ebcc86c174 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.floating-whatsapp','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('floating-whatsapp'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67d5d5978c3922da5619d6ebcc86c174)): ?>
<?php $attributes = $__attributesOriginal67d5d5978c3922da5619d6ebcc86c174; ?>
<?php unset($__attributesOriginal67d5d5978c3922da5619d6ebcc86c174); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67d5d5978c3922da5619d6ebcc86c174)): ?>
<?php $component = $__componentOriginal67d5d5978c3922da5619d6ebcc86c174; ?>
<?php unset($__componentOriginal67d5d5978c3922da5619d6ebcc86c174); ?>
<?php endif; ?>
</body>

</html><?php /**PATH C:\laragon\www\testproject-main\resources\views/articles/show.blade.php ENDPATH**/ ?>