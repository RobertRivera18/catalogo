<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-4 py-10 space-y-10">

        
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Mis pedidos</h1>
            <p class="text-sm text-gray-400">Seguimiento y estado de tus órdenes</p>
        </div>

        
        <section class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5">

            <?php
                $stats = [
                    ['label'=>'Pendiente','value'=>$pendiente,'icon'=>'fa-clock','color'=>'yellow','status'=>1],
                    ['label'=>'Recibido','value'=>$recibido,'icon'=>'fa-credit-card','color'=>'gray','status'=>2],
                    ['label'=>'Enviado','value'=>$enviado,'icon'=>'fa-truck','color'=>'blue','status'=>3],
                    ['label'=>'Entregado','value'=>$entregado,'icon'=>'fa-check','color'=>'green','status'=>4],
                    ['label'=>'Anulado','value'=>$anulado,'icon'=>'fa-times','color'=>'red','status'=>5],
                ];
            ?>

            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('orders.index').'?status='.$stat['status']); ?>"
                   class="bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-md transition">

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs text-gray-500"><?php echo e($stat['label']); ?></span>

                        <div class="w-9 h-9 flex items-center justify-center rounded-lg
                            bg-<?php echo e($stat['color']); ?>-100 text-<?php echo e($stat['color']); ?>-600">
                            <i class="fas <?php echo e($stat['icon']); ?> text-sm"></i>
                        </div>
                    </div>

                    <p class="text-xl font-semibold text-gray-900">
                        <?php echo e($stat['value']); ?>

                    </p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </section>

        
        <section class="bg-white border border-gray-200 rounded-2xl">

            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-sm font-medium text-gray-900">Pedidos recientes</h2>
            </div>

            <ul class="divide-y divide-gray-100">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $statusMap = [
                            1 => ['Pendiente','text-yellow-600'],
                            2 => ['Recibido','text-gray-600'],
                            3 => ['Enviado','text-blue-600'],
                            4 => ['Entregado','text-green-600'],
                            5 => ['Anulado','text-red-600'],
                        ];

                        [$label,$color] = $statusMap[$order->status] ?? ['-','text-gray-400'];
                    ?>

                    <li>
                        <a href="<?php echo e(route('orders.show', $order)); ?>"
                           class="flex items-center px-6 py-4 hover:bg-gray-50 transition">

                            
                            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 mr-4">
                                <i class="fas fa-box text-gray-500 text-sm"></i>
                            </div>

                            
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    Orden #<?php echo e($order->id); ?>

                                </p>
                                <p class="text-xs text-gray-400">
                                    <?php echo e($order->created_at->format('d M Y')); ?>

                                </p>
                            </div>

                            
                            <div class="text-right mr-6">
                                <p class="text-sm font-medium <?php echo e($color); ?>">
                                    <?php echo e($label); ?>

                                </p>
                                <p class="text-xs text-gray-400">
                                    $<?php echo e(number_format($order->total, 2)); ?>

                                </p>
                            </div>

                            
                            <i class="fas fa-chevron-right text-gray-300"></i>

                        </a>
                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </section>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/orders/index.blade.php ENDPATH**/ ?>