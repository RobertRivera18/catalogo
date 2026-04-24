<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
    h1 { font-size: 18px; margin-bottom: 5px; }
    .title { text-align: center; font-weight: bold; }
    .section { margin-top: 10px; }
    .grid { width: 100%; }
    .left { width: 40%; vertical-align: top; }
    .right { width: 60%; text-align: center; }
    .box { border: 1px solid #ddd; padding: 8px; }
    table { width: 100%; border-collapse: collapse; }
    td { border-bottom: 1px solid #eee; padding: 5px; }
    .label { color: #666; width: 50%; }
    .acc img { height: 40px; }
</style>
</head>

<body>


<div class="title">
    <h1><?php echo e(strtoupper($product->name)); ?></h1>
    <p><?php echo e($product->brand->name); ?></p>
</div>

<table class="grid">
<tr>
    
    <td class="left">
        <div class="box">
            <strong>Descripción</strong>
            <p><?php echo strip_tags($product->description); ?></p>
        </div>
    </td>

    
    <td class="right">
        <?php if($product->images->first()): ?>
            <img src="<?php echo e(public_path('storage/' . $product->images->first()->url)); ?>"
                 style="max-height:250px;">
        <?php endif; ?>
    </td>
</tr>
</table>


<div class="section">
    <strong>Accesorios incluidos</strong>
    <table>
        <tr>
            <?php $__currentLoopData = $product->includedAccessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="acc" align="center">
                    <?php if($acc->image): ?>
                        <img src="<?php echo e(public_path('storage/' . $acc->image)); ?>">
                    <?php endif; ?>
                    <div><?php echo e($acc->name); ?></div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
</div>

<div class="section">
    <strong>Accesorios opcionales</strong>
    <table>
        <tr>
            <?php $__currentLoopData = $product->optionalAccessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="acc" align="center">
                    <?php if($acc->image): ?>
                        <img src="<?php echo e(public_path('storage/' . $acc->image)); ?>">
                    <?php endif; ?>
                    <div><?php echo e($acc->name); ?></div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </table>
</div>


<div class="section">
    <strong>Ficha técnica</strong>
    <table>
        <?php $__currentLoopData = $product->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="label"><?php echo e($spec->name); ?></td>
                <td><?php echo e($spec->value); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>


<div class="section">
    <strong>Precio:</strong> $<?php echo e(number_format($product->price, 2)); ?>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/pdf/product.blade.php ENDPATH**/ ?>