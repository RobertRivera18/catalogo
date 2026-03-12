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
        <figure class="mb-4">
            <img class="w-full h-80 object-cover object-center bg-blue-900 rounded-lg"
                src="<?php echo e(Storage::url($category->image)); ?>" alt="">
        </figure>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-filter',['category'=>$category])->html();
} elseif ($_instance->childHasBeenRendered('ZZ2Brwe')) {
    $componentId = $_instance->getRenderedChildComponentId('ZZ2Brwe');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZZ2Brwe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZZ2Brwe');
} else {
    $response = \Livewire\Livewire::mount('category-filter',['category'=>$category]);
    $html = $response->html();
    $_instance->logRenderedChild('ZZ2Brwe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>

   
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/categories/show.blade.php ENDPATH**/ ?>