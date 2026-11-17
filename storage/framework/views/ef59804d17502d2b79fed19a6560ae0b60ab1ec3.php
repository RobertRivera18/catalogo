<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <figure class="mb-8">
            <div
                class="relative w-full aspect-[16/9] sm:aspect-[21/9] md:aspect-[3/1] overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100/80 group">

                <!-- Fondo ambiental desenfocado (Toma la misma imagen para rellenar los bordes elegante) -->
                <img class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-40 scale-125 select-none pointer-events-none"
                    src="<?php echo e(Storage::url($category->image)); ?>" alt="" aria-hidden="true">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent z-10"></div>

                <div class="relative z-10 w-full h-full p-4 sm:p-6 flex items-center justify-center">
                    <img class="max-h-full max-w-full object-contain object-center drop-shadow-2xl transition-transform duration-700 ease-out group-hover:scale-105"
                        src="<?php echo e(Storage::url($category->image)); ?>" alt="Categoría <?php echo e($category->name); ?>" loading="lazy">
                </div>

                <div class="absolute bottom-6 left-6 sm:left-8 z-20">
                    <span class="text-[11px] font-semibold tracking-widest text-white/70 uppercase block mb-0.5">
                        Categoría
                    </span>
                    <h1 class="text-white text-2xl sm:text-3xl font-bold tracking-tight drop-shadow-md">
                        <?php echo e($category->name); ?>

                    </h1>
                </div>

            </div>
        </figure>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-filter', ['category' => $category])->html();
} elseif ($_instance->childHasBeenRendered('DK5rjBG')) {
    $componentId = $_instance->getRenderedChildComponentId('DK5rjBG');
    $componentTag = $_instance->getRenderedChildComponentTagName('DK5rjBG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DK5rjBG');
} else {
    $response = \Livewire\Livewire::mount('category-filter', ['category' => $category]);
    $html = $response->html();
    $_instance->logRenderedChild('DK5rjBG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/categories/show.blade.php ENDPATH**/ ?>