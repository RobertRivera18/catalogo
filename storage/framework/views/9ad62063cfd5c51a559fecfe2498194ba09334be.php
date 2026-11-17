<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['category']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['category']); ?>
<?php foreach (array_filter((['category']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="flex flex-col md:flex-row gap-6 p-6 h-full items-start">
    
    <div class="w-full md:w-1/3">
        <span class="text-[11px] font-semibold tracking-widest text-slate-400 uppercase block mb-1">Explorar</span>
        <h4 class="text-base font-bold text-slate-900 mb-2 tracking-tight">Subcategorías</h4>
        <div class="h-px w-full bg-slate-100 mb-3"></div>

        <ul class="space-y-1 max-h-[320px] overflow-y-auto pr-1">
            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('categories.show', $category) . '?subcategoria=' . $subcategory->slug); ?>"
                       class="block py-1.5 px-2.5 -mx-2 rounded-xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-150">
                        <?php echo e($subcategory->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    
    <div class="hidden md:block w-full md:w-2/3 h-full">
        <div class="relative h-full min-h-[320px] w-full overflow-hidden rounded-2xl bg-slate-100 group border border-slate-100/80">
            <img src="<?php echo e(Storage::url($category->image)); ?>"
                 class="h-full w-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                 alt="<?php echo e($category->name); ?>">

            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>

            <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between">
                <div>
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-white/70">Colección</span>
                    <h5 class="text-xl font-bold text-white tracking-tight mt-0.5"><?php echo e($category->name); ?></h5>
                </div>
                <span class="px-3.5 py-1.5 rounded-full bg-white/20 backdrop-blur-md text-xs font-semibold text-white border border-white/30 shadow-md group-hover:bg-white group-hover:text-slate-900 transition-all duration-300">
                    Ver todo
                </span>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/components/navigation-subcategories.blade.php ENDPATH**/ ?>