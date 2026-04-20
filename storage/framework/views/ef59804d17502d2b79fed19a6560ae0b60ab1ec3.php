<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <figure class="mb-8">
    <div class="relative w-full aspect-[16/7] overflow-hidden rounded-2xl bg-gray-100 shadow-sm">

        <!-- Imagen -->
        <img 
            class="w-full h-full object-cover object-center transition-transform duration-500 ease-out hover:scale-110"
            src="<?php echo e(Storage::url($category->image)); ?>"
            alt="Categoría <?php echo e($category->name); ?>"
            loading="lazy"
        >

        <!-- Overlay degradado para mejorar legibilidad -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>

        <!-- Título encima de la imagen (UX moderna) -->
        <div class="absolute bottom-4 left-6">
            <h2 class="text-white text-2xl font-semibold tracking-wide drop-shadow">
                <?php echo e($category->name); ?>

            </h2>
        </div>

    </div>
</figure>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-filter', ['category' => $category])->html();
} elseif ($_instance->childHasBeenRendered('gjF7LjO')) {
    $componentId = $_instance->getRenderedChildComponentId('gjF7LjO');
    $componentTag = $_instance->getRenderedChildComponentTagName('gjF7LjO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gjF7LjO');
} else {
    $response = \Livewire\Livewire::mount('category-filter', ['category' => $category]);
    $html = $response->html();
    $_instance->logRenderedChild('gjF7LjO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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