<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">


            <div class="relative">
                <div
                    class="<?php echo e(($order->status >=2 && $order->status != 5)?'bg-blue-400':'bg-gray-400'); ?> rounded-full h-12 w-12  flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div class=" <?php echo e(($order->status >=3 && $order->status != 5)?'bg-blue-400':'bg-gray-400'); ?> h-1 flex-1 mx-2">
            </div>


            <div class="relative">
                <div
                    class="<?php echo e(($order->status >=3 && $order->status != 5)?'bg-blue-400':'bg-gray-400'); ?> rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div class="<?php echo e(($order->status >=4 && $order->status != 5)?'bg-blue-400':'bg-gray-400'); ?> h-1 flex-1 mx-2">
            </div>


            <div class="relative">
                <div
                    class=" <?php echo e(($order->status >=4 && $order->status != 5)?'bg-blue-400':'bg-gray-400'); ?> rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>




        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Numero de Orden:</span>
                Orden-<?php echo e($order->id); ?>

            </p>

            <?php if($order->status==1): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-enlace','data' => ['class' => 'ml-auto','href' => ''.e(route('orders.payment',$order)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('boton-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto','href' => ''.e(route('orders.payment',$order)).'']); ?>
                Ir a pagar
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>

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

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-gray-700">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4 rounded-md" src="<?php echo e($item->options->image); ?>"
                                    alt="">

                                <article>
                                    <h1 class="font-bold"><?php echo e($item->name); ?></h1>
                                    <div class="flex text-xs">
                                        <?php if(isset($item->options->color)): ?>
                                        Color:<?php echo e($item->options->color); ?>

                                        <?php endif; ?>

                                        <?php if(isset($item->options->size)): ?>
                                        -<?php echo e($item->options->size); ?>

                                        <?php endif; ?>
                                    </div>
                                </article>
                            </div>
                        </td>
                        <td class="text-center">
                            $<?php echo e($item->price); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e($item->qty); ?>

                        </td>
                        <td class="text-center">
                            $<?php echo e($item->price*$item->qty); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/orders/show.blade.php ENDPATH**/ ?>