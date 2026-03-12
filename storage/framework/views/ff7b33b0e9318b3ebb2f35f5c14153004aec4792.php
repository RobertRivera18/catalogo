
<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="order-2 lg:order-1 xl:col-span-3">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-<?php echo e($order->id); ?></p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    
                    <?php if($order->envio_type==1): ?>
                    <p class="text-lg font-semibold">Envio<i class="fas fa-store text-lg text-gray-700"></i></p>
                        <p class="text-sm">Los Productos deben ser recogidos en la tienda</p>
                 
                    <p class="text-sm">Calle Falsa y Avenida123</p>
                    <?php else: ?>
                    <p class="text-lg font-semibold">Envio  <i class="fas fa-truck text-3xl text-gray-700"></i></p>
                    <p class="text-sm">Los Productos seran enviados a:</p>
                     <p class="text-sm"> <i class="fas fa-address-card"></i> <?php echo e($order->address); ?></p>
                    <p><i class="fas fa-map-pin"></i> <?php echo e($order->department->name); ?>-<?php echo e($order->city->name); ?>- <?php echo e($order->district->name); ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <p class="text-lg font-semibold">Datos de Contacto</p>
                    <p class="text-sm font-bold"><i class="fas fa-user mr-1"></i>Persona que recibira el producto: <span
                            class="font-normal"><?php echo e($order->contact); ?></span></p>
                    <p class="text-sm"> <i class="fas fa-phone mr-1"></i>Telefono de Contacto:<?php echo e($order->phone); ?></p>

                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                    
                </thead>
             
                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="<?php echo e($item->options->image); ?>"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold"><?php echo e($item->name); ?></h1>
                                        <div class="flex text-xs">

                                            <?php if(isset($item->options->color)): ?>
                                                Color: <?php echo e($item->options->color); ?>

                                            <?php endif; ?>

                                            <?php if(isset($item->options->size)): ?>
                                                - <?php echo e($item->options->size); ?>

                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <hr>
                            <td class="text-center">
                                $<?php echo e($item->price); ?>

                            </td>

                            <td class="text-center">
                                <?php echo e($item->qty); ?>

                            </td>

                            <td class="text-center">
                                $<?php echo e($item->price * $item->qty); ?>

                            </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>



    </div>

    <div class="order-1 lg:order-2 xl:col-span-2">
        <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
            <div class="flex justify-between items-center mb-4">
                <img class="h-8" src="<?php echo e(asset('img/pagos.jpg')); ?>" alt="">
                <div class="text-gray-700">
                    <p class="text-sm font-semibold">
                        Subtotal: $<?php echo e($order->total - $order->shipping_cost); ?>

                    </p>
                    <p class="text-sm font-semibold">
                        Envío: $<?php echo e($order->shipping_cost); ?>

                    </p>
                    <p class="text-lg font-semibold uppercase">
                        Total: $<?php echo e($order->total); ?>

                    </p>

                    <div class="cho-container">

                    </div>
                </div>
            </div>


            <div id="paypal-button-container"></div>

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
</div><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/payment-order.blade.php ENDPATH**/ ?>