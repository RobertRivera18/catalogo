<div class="min-h-screen bg-[#f5f5f7] py-10">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 xl:grid-cols-5 gap-10">

        
        <div class="xl:col-span-3 space-y-8">

            
            <div>
                <p class="text-sm text-gray-400">Checkout</p>
                <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                    Finaliza tu compra
                </h1>
            </div>

            
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-4">Envío</p>

                <?php if($order->envio_type == 1): ?>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                            <i class="fas fa-store text-gray-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Retiro en tienda</p>
                            <p class="text-xs text-gray-500">Calle Falsa y Avenida 123</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 mt-1">
                            <i class="fas fa-truck text-gray-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Entrega a domicilio</p>
                            <p class="text-xs text-gray-500"><?php echo e($order->address); ?></p>
                            <p class="text-xs text-gray-400">
                                <?php echo e($order->provincia); ?>,
                                <?php echo e($order->ciudad); ?>,
                            <br>
                                <?php echo e($order->references); ?>

                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-4">Contacto</p>

                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Nombre</span>
                        <span><?php echo e($order->contact); ?></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Teléfono</span>
                        <span><?php echo e($order->phone); ?></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Documento</span>
                        <span>
                            <?php echo e(strtoupper($order->identification_type)); ?>

                            · <?php echo e($order->identification_number); ?>

                        </span>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-5">Productos</p>

                <div class="space-y-5">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-4">

                            <img class="w-16 h-16 rounded-xl object-cover"
                                 src="<?php echo e($item->options->image); ?>" alt="">

                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    <?php echo e($item->name); ?>

                                    
                                </p>

                                <p class="text-xs text-gray-400">
                                    <?php if(isset($item->options->color)): ?>
                                        <?php echo e($item->options->color); ?>

                                    <?php endif; ?>
                                    <?php if(isset($item->options->size)): ?>
                                        · <?php echo e($item->options->size); ?>

                                    <?php endif; ?>
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="text-sm text-gray-500">
                                    <?php echo e($item->qty); ?> × $<?php echo e($item->price); ?>

                                </p>
                                <p class="text-sm font-semibold text-gray-900">
                                    $<?php echo e($item->price * $item->qty); ?>

                                </p>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>

        
        <div class="xl:col-span-2">
            <div class="sticky top-10">

                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">

                    
                    <div class="flex justify-center mb-6">
                        <img class="h-6 opacity-80" src="<?php echo e(asset('img/pagos.jpg')); ?>" alt="">
                    </div>

                    
                    <div class="space-y-3 text-sm text-gray-600">

                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>$<?php echo e($order->total - $order->shipping_cost); ?></span>
                        </div>

                        <div class="flex justify-between">
                            <span>Envío</span>
                            <span>$<?php echo e($order->shipping_cost); ?></span>
                        </div>

                        <div class="border-t pt-4 flex justify-between text-base font-semibold text-gray-900">
                            <span>Total</span>
                            <span>$<?php echo e($order->total); ?></span>
                        </div>

                    </div>

                    
                    <div class="mt-6">
                        <div id="paypal-button-container"></div>
                    </div>

                    
                    <p class="text-xs text-gray-400 text-center mt-5">
                        Pago seguro · Encriptación SSL
                    </p>

                </div>

            </div>
        </div>

    </div>
</div>


<?php $__env->startPush('script'); ?>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e(config('services.paypal.client_id')); ?>">
        // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "<?php echo e($order->total); ?>"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    Livewire.emit('payOrder');
                    /* console.log(details);
                    alert('Transaction completed by ' + details.payer.name.given_name); */
                });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
<?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/payment-order.blade.php ENDPATH**/ ?>