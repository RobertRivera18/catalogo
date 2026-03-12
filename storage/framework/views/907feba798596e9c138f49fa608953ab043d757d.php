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

<div class="grid grid-cols-1 md:grid-cols-4 p-4 gap-4">
    
    <div class="md:col-span-1">
        <p class="text-md font-bold text-left text-gray-900 mb-2">Subcategorías</p>
        <hr>
        <ul class="space-y-1">
            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-left">
                    <a href="<?php echo e(route('categories.show', $category) . '?subcategoria=' . $subcategory->slug); ?>"
                       class="block text-zinc-500 font-semibold text-sm hover:text-orange-500">
                        <?php echo e($subcategory->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    
    <div class="col-span-3 hidden md:block">
        <img src="<?php echo e(Storage::url($category->image)); ?>"
             class="bg-gray-800 h-64 w-full object-cover object-center rounded-lg"
             alt="">
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/components/navigation-subcategories.blade.php ENDPATH**/ ?>