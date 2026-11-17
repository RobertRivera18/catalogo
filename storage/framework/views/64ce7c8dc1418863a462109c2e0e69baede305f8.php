<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['size' => 35, 'color' => 'white']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['size' => 35, 'color' => 'white']); ?>
<?php foreach (array_filter((['size' => 35, 'color' => 'white']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $col = match ($color) {
        'gray' => '#374151',
        'white' => '#ffffff',
        default => '#374151',
    };
?>

<svg 
    width="<?php echo e($size); ?>" 
    height="<?php echo e($size); ?>" 
    viewBox="0 0 24 24" 
    fill="none" 
    stroke="<?php echo e($col); ?>" 
    stroke-width="2" 
    stroke-linecap="round" 
    stroke-linejoin="round"
>
    <!-- Estructura del carrito -->
    <circle cx="8" cy="21" r="1"></circle>
    <circle cx="19" cy="21" r="1"></circle>
    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
</svg><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/components/cart.blade.php ENDPATH**/ ?>