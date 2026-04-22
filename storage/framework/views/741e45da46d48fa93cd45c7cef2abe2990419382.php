<div class="max-w-7xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-semibold text-gray-900 mb-6">
        Detalles de compra
    </h1>

    <?php if(Cart::count()): ?>

        <div class="grid lg:grid-cols-3 gap-6">


            <div class="lg:col-span-2 space-y-4">

                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white border border-gray-200 rounded-xl p-4 flex gap-4 items-center">

                        <!-- Imagen -->
                        <img class="w-20 h-20 object-cover rounded-lg border" src="<?php echo e($item->options->image); ?>"
                            alt="">

                        <!-- Info -->
                        <div class="flex-1">
                            <h2 class="text-sm font-semibold text-gray-900 leading-tight">
                                <?php echo e($item->name); ?>

                            </h2>

                            <p class="text-xs text-gray-500 mt-1">
                                REF: <?php echo e($item->id); ?>

                            </p>

                            <div class="text-xs text-gray-500 mt-1 space-x-2">
                                <?php if($item->options->color): ?>
                                    <span>Color: <?php echo e($item->options->color); ?></span>
                                <?php endif; ?>
                                <?php if($item->options->size): ?>
                                    <span>• <?php echo e($item->options->size); ?></span>
                                <?php endif; ?>
                            </div>

                            <p class="text-blue-600 font-semibold mt-2">
                                $<?php echo e($item->price); ?>

                            </p>
                        </div>

                        <!-- Cantidad -->
                        <div class="flex items-center border rounded-lg px-2 py-1">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('update-cart-item', ['rowId' => $item->rowId])->html();
} elseif ($_instance->childHasBeenRendered($item->rowId)) {
    $componentId = $_instance->getRenderedChildComponentId($item->rowId);
    $componentTag = $_instance->getRenderedChildComponentTagName($item->rowId);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($item->rowId);
} else {
    $response = \Livewire\Livewire::mount('update-cart-item', ['rowId' => $item->rowId]);
    $html = $response->html();
    $_instance->logRenderedChild($item->rowId, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>

                        <!-- Total -->
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">
                                $<?php echo e($item->price * $item->qty); ?>

                            </p>

                            <button wire:click="delete('<?php echo e($item->rowId); ?>')"
                                class="text-red-500 text-xs mt-2 hover:underline">
                                Eliminar
                            </button>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Vaciar carrito -->
                <button wire:click="destroy" class="text-sm text-gray-500 hover:text-red-500">
                    Vaciar carrito
                </button>

            </div>

            <!-- 💰 RESUMEN -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 h-fit space-y-4">

                <h2 class="text-lg font-semibold text-gray-900">
                    Resumen de compra
                </h2>

                <div class="flex justify-between text-sm text-gray-600">
                    <span>Subtotal</span>
                    <span>$<?php echo e(Cart::subtotal()); ?></span>
                </div>

                <div class="flex justify-between text-sm text-gray-600">
                    <span>IVA (15%)</span>
                    <span>
                        $<?php echo e(number_format(Cart::subtotal() * 0.15, 2)); ?>

                    </span>
                </div>

                <div class="border-t pt-3 flex justify-between text-lg font-semibold">
                    <?php
                        $subtotal = floatval(str_replace(',', '', Cart::subtotal()));
                    ?>

                    <span>Total</span>
                    <span class="text-blue-600">
                        $<?php echo e(number_format($subtotal * 1.15, 2)); ?>

                    </span>
                </div>

                <!-- Botones -->
                <a href="<?php echo e(route('orders.create')); ?>"
                    class="block w-full text-center bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                    Ir a pagar
                </a>

                <a href="#"
                    class="block w-full text-center bg-green-500 text-white py-3 rounded-lg font-medium hover:bg-green-600 transition">
                    Pago en efectivo
                </a>

                <a href="/"
                    class="block w-full text-center border border-gray-300 py-3 rounded-lg text-gray-700 hover:bg-gray-50">
                    Seguir comprando
                </a>

            </div>

        </div>
    <?php else: ?>
        <!-- Empty -->
        <div class="flex flex-col items-center py-16">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cart','data' => ['class' => 'w-16 h-16 text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-gray-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <p class="mt-4 text-gray-500">Tu carrito está vacío</p>

            <a href="/" class="mt-4 bg-black text-white px-6 py-2 rounded-lg">
                Ir al inicio
            </a>
        </div>

    <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/shopping-cart.blade.php ENDPATH**/ ?>