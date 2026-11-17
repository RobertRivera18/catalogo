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

<li class="group bg-white rounded-3xl border border-slate-200/60 shadow-xs hover:shadow-md transition-all duration-300 overflow-hidden">
    <article class="flex flex-col md:flex-row items-center">

        
        <figure class="relative w-full md:w-52 h-48 sm:h-52 md:h-52 bg-slate-50/80 flex-shrink-0 flex items-center justify-center p-4 border-b md:border-b-0 md:border-r border-slate-100 overflow-hidden">
            
            
            <span class="absolute top-3 left-3 z-10 rounded-full border border-slate-200/60 bg-white/90 px-2.5 py-0.5 text-[10px] font-extrabold uppercase text-slate-700 backdrop-blur-md shadow-2xs">
                <?php echo e($product->subcategory->name ?? 'Catálogo'); ?>

            </span>

            
            <a href="<?php echo e(route('products.show', $product)); ?>" class="w-full h-full flex items-center justify-center">
                <img class="max-h-full max-w-full object-contain transition-transform duration-500 ease-out group-hover:scale-105"
                    src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>" 
                    alt="<?php echo e($product->name); ?>"
                    loading="lazy">
            </a>
        </figure>

        
        <div class="flex-1 p-5 md:p-6 flex flex-col justify-between space-y-4 w-full">

            <div class="space-y-2">
                <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-2">
                    <h2 class="text-base font-bold text-slate-900 leading-snug tracking-tight">
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="hover:text-slate-600 transition-colors">
                            <?php echo e($product->name); ?>

                        </a>
                    </h2>

                    
                    <div class="flex items-center gap-1.5 shrink-0">
                        <div class="flex text-amber-400 text-xs">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-[11px] font-semibold text-slate-400">(24)</span>
                    </div>
                </div>

                
                <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">
                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($product->description), 130)); ?>

                </p>
            </div>

            
            <div class="flex items-center justify-between border-t border-slate-100 pt-4 mt-auto">
                <div class="flex items-baseline gap-2">
                    <?php if(isset($product->old_price) && $product->old_price > $product->price): ?>
                        <span class="text-xs font-semibold text-slate-400 line-through">
                            $<?php echo e(number_format($product->old_price, 2)); ?>

                        </span>
                    <?php endif; ?>
                    <span class="text-lg font-extrabold text-slate-900 tracking-tight">
                        $<?php echo e(number_format($product->price, 2)); ?>

                    </span>
                </div>

                <a href="<?php echo e(route('products.show', $product)); ?>"
                    class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all duration-150 shadow-xs active:scale-[0.98]">
                    <i class="fas fa-eye text-[11px]"></i>
                    <span>Ver producto</span>
                </a>
            </div>

        </div>

    </article>
</li><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/components/products-list.blade.php ENDPATH**/ ?>