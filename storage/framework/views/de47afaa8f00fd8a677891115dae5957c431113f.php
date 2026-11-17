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

        
        <?php if(session('success')): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-500"></i>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                <span><?php echo e(session('error')); ?></span>
            </div>
        <?php endif; ?>

        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-3">

                
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                        Orden #<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?>

                    </h1>
                    <p class="text-sm text-gray-400">
                        Seguimiento de tu pedido · <?php echo e($order->created_at->format('d/m/Y H:i')); ?>

                    </p>
                </div>

                
                <?php if($order->status == 5): ?>
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                        <div class="mt-0.5">
                            <i class="fas fa-times-circle text-red-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold">
                                Orden cancelada
                            </p>
                            <p class="text-xs text-red-600 mt-0.5">
                                Este pedido fue anulado y no será procesado.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            
            <?php if($order->status == 1): ?>
                <div class="flex flex-wrap items-center gap-3">
                    
                    <?php
                        $waText = rawurlencode("Hola, consulto por mi pedido #" . str_pad($order->id, 6, '0', STR_PAD_LEFT) . " a nombre de {$order->contact} por un total de $" . number_format($order->total, 2));
                    ?>
                    <a href="https://wa.me/1234567890?text=<?php echo e($waText); ?>" target="_blank"
                        class="inline-flex items-center gap-2 bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow hover:bg-emerald-700 transition-all">
                        <i class="fab fa-whatsapp text-base"></i>
                        Coordinar por WhatsApp
                    </a>

                    <form action="<?php echo e(route('orders.cancel', $order)); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" onclick="return confirm('¿Seguro que deseas cancelar esta orden?')"
                            class="inline-flex items-center gap-2 bg-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-red-600 transition">
                            <i class="fas fa-times"></i>
                            Cancelar orden
                        </button>
                    </form>
                </div>
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
                    <p class="text-sm font-semibold text-gray-900">Entrega</p>
                </div>

                <?php if($order->envio_type == 1): ?>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                            <i class="fas fa-store text-gray-600 text-sm"></i>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                Retiro en tienda
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Calle Falsa y Avenida 123
                            </p>
                            <?php if($order->references): ?>
                                <p class="text-xs text-gray-400 mt-1">
                                    <i class="fas fa-comment-alt mr-1"></i>
                                    <?php echo e($order->references); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt text-gray-600 text-sm"></i>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-medium text-gray-800">
                                <?php echo e($order->address); ?>

                            </p>

                            <?php if($order->provincia || $order->ciudad): ?>
                                <p class="text-xs text-gray-500">
                                    <i class="fas fa-map-pin mr-1"></i>
                                    <?php echo e(collect([$order->provincia, $order->ciudad])->filter()->implode(' - ')); ?>

                                </p>
                            <?php endif; ?>

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

                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 leading-none">Datos de contacto</p>
                        <p class="text-xs text-gray-400 mt-1">Persona que recibirá el pedido</p>
                    </div>
                </div>

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

            <div class="divide-y divide-gray-100">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center gap-4 py-4 first:pt-0 last:pb-0">

                        <img class="w-16 h-16 rounded-lg object-cover border border-gray-100 bg-gray-50 shrink-0"
                            src="<?php echo e($item->options->image ?? asset('img/default.jpg')); ?>"
                            alt="<?php echo e($item->name); ?>">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                <?php echo e($item->name); ?>

                            </p>

                            <p class="text-xs text-gray-400 mt-0.5">
                                <?php if(isset($item->options->color)): ?>
                                    <?php echo e($item->options->color); ?>

                                <?php endif; ?>

                                <?php if(isset($item->options->size)): ?>
                                    · <?php echo e($item->options->size); ?>

                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="text-right shrink-0">
                            <p class="text-xs text-gray-500">
                                <?php echo e($item->qty); ?> × $<?php echo e(number_format($item->price, 2)); ?>

                            </p>
                            <p class="text-sm font-semibold text-gray-900">
                                $<?php echo e(number_format($item->price * $item->qty, 2)); ?>

                            </p>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between items-center">
                <span class="text-sm font-medium text-gray-500">Total del pedido</span>
                <span class="text-xl font-bold text-gray-900">
                    $<?php echo e(number_format($order->total, 2)); ?>

                </span>
            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/orders/show.blade.php ENDPATH**/ ?>