<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('css'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php $__env->stopPush(); ?>

    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
         <!-- Slider main container -->
        <div class="swiper relative w-full mb-12">
            <!-- Wrapper de los slides -->
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $covers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cover): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <img src="<?php echo e($cover->image); ?>"
                            class="w-full aspect-[3/1] object-center object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-105 hover:rounded-lg"
                            alt="Cover image">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Paginación -->
            <div class="swiper-pagination !bottom-2"></div>

            <!-- Botones de navegación -->
            <div class="swiper-button-prev !text-white"></div>
            <div class="swiper-button-next !text-white"></div>


        </div>



        


        

        
        

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('products-home')->html();
} elseif ($_instance->childHasBeenRendered('SZCdKJq')) {
    $componentId = $_instance->getRenderedChildComponentId('SZCdKJq');
    $componentTag = $_instance->getRenderedChildComponentTagName('SZCdKJq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SZCdKJq');
} else {
    $response = \Livewire\Livewire::mount('products-home');
    $html = $response->html();
    $_instance->logRenderedChild('SZCdKJq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

    <?php $__env->startPush('script'); ?>
        


        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                loop: true,
                speed: 600,
                effect: 'Cube', // o 'slide', 'cube', 'coverflow', 'flip'
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,

                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true,
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },
                grabCursor: true,
            });
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/welcome.blade.php ENDPATH**/ ?>