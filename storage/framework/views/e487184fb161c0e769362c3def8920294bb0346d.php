<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 10px;
        color: #2d2d2d;
        background: #ffffff;
    }

    /* ── HEADER ─────────────────────────────────── */
    .header {
        background: #1a3a5c;
        color: #ffffff;
        padding: 18px 24px 14px;
        margin-bottom: 16px;
    }
    .header-inner {
        width: 100%;
    }
    .header-left { width: 70%; vertical-align: middle; }
    .header-right { width: 30%; text-align: right; vertical-align: middle; }

    .product-name {
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: #ffffff;
        line-height: 1.2;
    }
    .brand-name {
        font-size: 11px;
        color: #a8c4e0;
        margin-top: 4px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .badge {
        display: inline-block;
        background: #e8f0fe;
        color: #1a3a5c;
        font-size: 9px;
        padding: 2px 8px;
        border-radius: 10px;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin-top: 6px;
    }

    /* ── PRECIO ──────────────────────────────────── */
    .price-box {
        background: #f0a500;
        color: #fff;
        padding: 6px 14px;
        border-radius: 4px;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
    }
    .price-label {
        font-size: 8px;
        color: #a8c4e0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 3px;
    }

    /* ── BODY LAYOUT ─────────────────────────────── */
    .body-wrap { padding: 0 20px; }

    .main-table { width: 100%; margin-bottom: 14px; }
    .col-desc { width: 55%; vertical-align: top; padding-right: 12px; }
    .col-img  { width: 45%; vertical-align: middle; text-align: center; }

    /* ── DESCRIPTION CARD ────────────────────────── */
    .card {
        border: 1px solid #dde3ed;
        border-radius: 5px;
        overflow: hidden;
    }
    .card-header {
        background: #f0f4fa;
        padding: 6px 12px;
        font-size: 9px;
        font-weight: bold;
        color: #1a3a5c;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border-bottom: 1px solid #dde3ed;
    }
    .card-body {
        padding: 10px 12px;
        line-height: 1.6;
        color: #444;
        font-size: 9.5px;
    }

    /* ── IMAGE BOX ───────────────────────────────── */
    .img-wrapper {
        border: 1px solid #dde3ed;
        border-radius: 5px;
        padding: 10px;
        background: #fafbfd;
        text-align: center;
    }
    .img-wrapper img {
        max-height: 200px;
        max-width: 100%;
    }

    /* ── SECTION TITLE ───────────────────────────── */
    .section-title {
        font-size: 9px;
        font-weight: bold;
        color: #1a3a5c;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border-left: 3px solid #f0a500;
        padding-left: 7px;
        margin-bottom: 8px;
        margin-top: 14px;
    }

    /* ── ACCESSORIES ─────────────────────────────── */
    .acc-table { width: 100%; border-collapse: collapse; }
    .acc-table td {
        text-align: center;
        padding: 8px 6px;
        border: 1px solid #eaeef5;
        border-radius: 4px;
        background: #fafbfd;
        width: 80px;
        vertical-align: top;
    }
    .acc-table img { height: 38px; margin-bottom: 4px; }
    .acc-name { font-size: 8px; color: #555; line-height: 1.3; }

    /* ── SPECS TABLE ─────────────────────────────── */
    .specs-table { width: 100%; border-collapse: collapse; }
    .specs-table tr:nth-child(even) td { background: #f5f7fb; }
    .specs-table td {
        padding: 5px 10px;
        border-bottom: 1px solid #eaeef5;
        font-size: 9.5px;
        vertical-align: top;
    }
    .spec-label {
        color: #1a3a5c;
        font-weight: bold;
        width: 40%;
    }
    .spec-value { color: #444; }

    /* ── DIVIDER ─────────────────────────────────── */
    .divider {
        border: none;
        border-top: 1px solid #dde3ed;
        margin: 10px 0;
    }

    /* ── FOOTER ──────────────────────────────────── */
    .footer {
        margin-top: 20px;
        background: #1a3a5c;
        color: #a8c4e0;
        padding: 8px 20px;
        font-size: 8px;
        text-align: center;
        letter-spacing: 0.3px;
    }
    .footer-inner { width: 100%; }
    .footer-left  { width: 50%; text-align: left;  vertical-align: middle; }
    .footer-right { width: 50%; text-align: right; vertical-align: middle; }
</style>
</head>
<body>


<div class="header">
    <table class="header-inner">
        <tr>
            <td class="header-left">
                <div class="product-name"><?php echo e($product->name); ?></div>
                <div class="brand-name"><?php echo e($product->brand->name); ?></div>
                <span class="badge">Ficha Técnica</span>
            </td>
            <td class="header-right">
                <div class="price-label">Precio</div>
                <div class="price-box">$<?php echo e(number_format($product->price, 2)); ?></div>
            </td>
        </tr>
    </table>
</div>


<div class="body-wrap">

    
    <table class="main-table">
        <tr>
            <td class="col-desc">
                <div class="card">
                    <div class="card-header">Descripción del Producto</div>
                    <div class="card-body"><?php echo strip_tags($product->description); ?></div>
                </div>
            </td>
            <td class="col-img">
                <?php if($product->images->first()): ?>
                    <div class="img-wrapper">
                        <img src="<?php echo e(public_path('storage/' . $product->images->first()->url)); ?>">
                    </div>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    
    <?php if($product->includedAccessories->isNotEmpty()): ?>
        <div class="section-title">Accesorios Incluidos</div>
        <table class="acc-table">
            <tr>
                <?php $__currentLoopData = $product->includedAccessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td>
                    <?php if($acc->image): ?>
                        <img src="<?php echo e(public_path('storage/' . $acc->image)); ?>"><br>
                    <?php endif; ?>
                    <div class="acc-name"><?php echo e($acc->name); ?></div>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </table>
    <?php endif; ?>

    
    <?php if($product->optionalAccessories->isNotEmpty()): ?>
        <div class="section-title">Accesorios Opcionales</div>
        <table class="acc-table">
            <tr>
                <?php $__currentLoopData = $product->optionalAccessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td>
                    <?php if($acc->image): ?>
                        <img src="<?php echo e(public_path('storage/' . $acc->image)); ?>"><br>
                    <?php endif; ?>
                    <div class="acc-name"><?php echo e($acc->name); ?></div>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </table>
    <?php endif; ?>

    
    <?php if($product->specifications->isNotEmpty()): ?>
        <div class="section-title">Especificaciones Técnicas</div>
        <div class="card">
            <table class="specs-table">
                <?php $__currentLoopData = $product->specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="spec-label"><?php echo e($spec->name); ?></td>
                    <td class="spec-value"><?php echo e($spec->value); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    <?php endif; ?>

</div>


<div class="footer">
    <table class="footer-inner">
        <tr>
            <td class="footer-left"><?php echo e($product->brand->name); ?> — <?php echo e($product->name); ?></td>
            <td class="footer-right">Documento generado el <?php echo e(now()->format('d/m/Y')); ?></td>
        </tr>
    </table>
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/pdf/product.blade.php ENDPATH**/ ?>