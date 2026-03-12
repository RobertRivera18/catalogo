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

<li class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition overflow-hidden">

    <article class="flex flex-col md:flex-row">

        
        <figure class="md:w-56 flex-shrink-0 bg-gray-100">

            <img class="w-full h-48 md:h-full object-contain p-3"
                src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>" alt="<?php echo e($product->name); ?>"
                loading="lazy">

        </figure>


        
        <div class="flex-1 p-5 flex flex-col justify-between">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-3">

                <div>

                    <h2 class="text-lg font-semibold text-gray-800 leading-tight">
                        <?php echo e($product->name); ?>

                    </h2>

                    <span class="inline-block mt-1 text-xs font-medium bg-gray-100 text-gray-700 px-2 py-1 rounded">
                        <?php echo e($product->subcategory->name ?? 'Sin categoría'); ?>

                    </span>

                    <p class="text-sm text-gray-600 mt-2">
                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($product->description), 120)); ?>

                    </p>

                </div>


                
                <div class="flex items-center gap-2">

                    <ul class="flex text-yellow-400 text-sm">
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                    </ul>

                    <span class="text-xs text-gray-500">(24)</span>

                </div>

            </div>


            
            <div class="flex items-center justify-between mt-5 border-t pt-4">

                <p class="text-xl font-bold text-gray-900">
                    $<?php echo e(number_format($product->price, 2)); ?>

                </p>

                <a href="<?php echo e(route('products.show', $product)); ?>"
                    class="inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">

                    <i class="fas fa-eye text-xs"></i>

                    <span>Ver producto</span>

                </a>

            </div>

        </div>

    </article>

</li>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/components/products-list.blade.php ENDPATH**/ ?>