<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['product']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['product']); ?>
<?php foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<li class="bg-white rounded-lg shadow-lg mb-4">
    <article class="md:flex">
        <figure>
            <img class="h-48 w-full md:w-56 object-center object-cover rounded-lg"
                src="<?php echo e(Storage::url($product->images->first()->url)); ?>" alt="">
        </figure>
        <div class="flex-1 py-4 px-6 flex  flex-col">
            <div class="lg:flex justify-between">
                <div>
                    <h1 class="text-md font-semibold text-gray-700 text-xl"><?php echo e($product->name); ?></h1>
                    <p class="font-bold text-gray-700 text-xl">$<?php echo e($product->price); ?></p>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"><?php echo e($product->subcategory->name); ?></span>

                    <p class="text-sm"><?php echo e(Str::limit($product->description), 20); ?></p>

                    
                </div>
                <div class="flex items-center">

                    <ul class="flex text-sm">
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                        <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                    </ul>
                    <span class="text-gray-700 text-sm">(24)</span>
                </div>
            </div>

            <div class=" mt-4 md:mt-auto mb-8 flex justify-end">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-enlace','data' => ['href' => ''.e(route('products.show', $product)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('products.show', $product)).'']); ?>
                    Más Información
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>


    </article>
</li>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/components/products-list.blade.php ENDPATH**/ ?>