<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-5xl mx-auto px-4 py-10 space-y-8">

        
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">
                    Orden #<?php echo e($order->id); ?>

                </h1>
                <p class="text-sm text-gray-400">
                    Seguimiento de tu pedido
                </p>
            </div>

            <?php if($order->status == 1): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-enlace','data' => ['href' => ''.e(route('orders.payment', $order)).'','class' => 'ml-auto inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow hover:shadow-md hover:scale-[1.02] transition-all']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('boton-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('orders.payment', $order)).'','class' => 'ml-auto inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow hover:shadow-md hover:scale-[1.02] transition-all']); ?>
                    <i class="fas fa-credit-card"></i>
                    Ir a pagar
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>

        
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between">

                
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="<?php echo e($order->status >= 2 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400'); ?> w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 <?php echo e($order->status >= 2 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400'); ?>">
                        Recibido
                    </p>
                </div>

                <div
                    class="<?php echo e($order->status >= 3 && $order->status != 5 ? 'bg-black' : 'bg-gray-200'); ?> h-[2px] flex-1 mx-2">
                </div>

                
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="<?php echo e($order->status >= 3 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400'); ?> w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-truck text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 <?php echo e($order->status >= 3 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400'); ?>">
                        Enviado
                    </p>
                </div>

                <div
                    class="<?php echo e($order->status >= 4 && $order->status != 5 ? 'bg-black' : 'bg-gray-200'); ?> h-[2px] flex-1 mx-2">
                </div>

                
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="<?php echo e($order->status >= 4 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400'); ?> w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 <?php echo e($order->status >= 4 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400'); ?>">
                        Entregado
                    </p>
                </div>

            </div>
        </div>

        
        <div class="grid md:grid-cols-2 gap-6">

            
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fas fa-truck text-gray-400"></i>
                    <p class="text-sm font-semibold text-gray-900">Envío</p>
                </div>
                <?php if($order->envio_type == 1): ?>

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-store text-gray-600 text-sm"></i>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                Retiro en tienda
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Calle Falsa y Avenida 123
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-truck text-gray-600 text-sm"></i>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-medium text-gray-800">
                                <?php echo e($order->address); ?>

                            </p>

                            <p class="text-xs text-gray-500">
                                <i class="fas fa-map-pin mr-1"></i>
                                <?php echo e($order->provincia); ?> - <?php echo e($order->ciudad); ?>

                            </p>

                            <?php if($order->references): ?>
                                <p class="text-xs text-gray-400">
                                    <i class="fas fa-location-arrow mr-1"></i>
                                    <?php echo e($order->references); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endif; ?>
            </div>

            
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                <!-- Header -->
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 leading-none">Datos de contacto</p>
                        <p class="text-xs text-gray-400">Persona que recibirá el pedido</p>
                    </div>
                </div>

                <!-- Info -->
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm text-gray-800">
                        <i class="fas fa-user-circle text-gray-400 text-xs"></i>
                        <span class="font-medium"><?php echo e($order->contact); ?></span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-phone text-gray-400 text-xs"></i>
                        <span><?php echo e($order->phone); ?></span>
                    </div>
                </div>

            </div>

        </div>

        
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-900 mb-6">Productos</p>

            <div class="space-y-5">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition">

                        <img class="w-16 h-16 rounded-lg object-cover border" src="<?php echo e($item->options->image); ?>"
                            alt="">

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
                            <p class="text-xs text-gray-500">
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/orders/show.blade.php ENDPATH**/ ?>