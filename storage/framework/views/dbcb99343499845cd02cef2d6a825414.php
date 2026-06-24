<?php $__env->startSection('title', 'الرئيسية'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginala038281ce129721dd88a49670137597b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala038281ce129721dd88a49670137597b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala038281ce129721dd88a49670137597b)): ?>
<?php $attributes = $__attributesOriginala038281ce129721dd88a49670137597b; ?>
<?php unset($__attributesOriginala038281ce129721dd88a49670137597b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala038281ce129721dd88a49670137597b)): ?>
<?php $component = $__componentOriginala038281ce129721dd88a49670137597b; ?>
<?php unset($__componentOriginala038281ce129721dd88a49670137597b); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal2f906c7b72b7f488716a138bd805a1ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f906c7b72b7f488716a138bd805a1ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.about-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('about-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f906c7b72b7f488716a138bd805a1ae)): ?>
<?php $attributes = $__attributesOriginal2f906c7b72b7f488716a138bd805a1ae; ?>
<?php unset($__attributesOriginal2f906c7b72b7f488716a138bd805a1ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f906c7b72b7f488716a138bd805a1ae)): ?>
<?php $component = $__componentOriginal2f906c7b72b7f488716a138bd805a1ae; ?>
<?php unset($__componentOriginal2f906c7b72b7f488716a138bd805a1ae); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9d429c24cfe2db0b8ff82af6a5fc9911 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d429c24cfe2db0b8ff82af6a5fc9911 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.universities-cards-section','data' => ['universities' => $universities ?? [],'showViewAllButton' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('universities-cards-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['universities' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($universities ?? []),'showViewAllButton' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d429c24cfe2db0b8ff82af6a5fc9911)): ?>
<?php $attributes = $__attributesOriginal9d429c24cfe2db0b8ff82af6a5fc9911; ?>
<?php unset($__attributesOriginal9d429c24cfe2db0b8ff82af6a5fc9911); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d429c24cfe2db0b8ff82af6a5fc9911)): ?>
<?php $component = $__componentOriginal9d429c24cfe2db0b8ff82af6a5fc9911; ?>
<?php unset($__componentOriginal9d429c24cfe2db0b8ff82af6a5fc9911); ?>
<?php endif; ?>
    
    <?php if (isset($component)) { $__componentOriginal8ad61966f9df3be08b6bafc311a11148 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ad61966f9df3be08b6bafc311a11148 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.contact-us-section','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('contact-us-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ad61966f9df3be08b6bafc311a11148)): ?>
<?php $attributes = $__attributesOriginal8ad61966f9df3be08b6bafc311a11148; ?>
<?php unset($__attributesOriginal8ad61966f9df3be08b6bafc311a11148); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ad61966f9df3be08b6bafc311a11148)): ?>
<?php $component = $__componentOriginal8ad61966f9df3be08b6bafc311a11148; ?>
<?php unset($__componentOriginal8ad61966f9df3be08b6bafc311a11148); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\testProject\resources\views/home.blade.php ENDPATH**/ ?>