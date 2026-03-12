<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <section class="grid lg:grid-cols-4 gap-6 text-white">

            <a href="<?php echo e(route('admin.orders.index')."?status=2"); ?>"
                class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    <?php echo e($recibido); ?>

                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="<?php echo e(route('admin.orders.index')."?status=3"); ?>"
                class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    <?php echo e($enviado); ?>

                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="<?php echo e(route('admin.orders.index')."?status=4"); ?>"
                class="bg-pink-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    <?php echo e($entregado); ?>

                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="<?php echo e(route('admin.orders.index')."?status=5"); ?>"
                class="bg-green-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    <?php echo e($anulado); ?>

                </p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        <?php if($orders->count()): ?>

        <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <h1 class="text-2xl mb-4">Pedidos recientes</h1>

            <ul>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('admin.orders.show', $order)); ?>"
                        class="flex items-center py-2 px-4 hover:bg-gray-100">
                        <span class="w-12 text-center">
                            <?php switch($order->status):
                            case (1): ?>
                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                            <?php break; ?>
                            <?php case (2): ?>
                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                            <?php break; ?>
                            <?php case (3): ?>
                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                            <?php break; ?>
                            <?php case (4): ?>
                            <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                            <?php break; ?>
                            <?php case (5): ?>
                            <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                            <?php break; ?>
                            <?php default: ?>

                            <?php endswitch; ?>
                        </span>

                        <span>
                            Orden: <?php echo e($order->id); ?>

                            <br>
                            <?php echo e($order->created_at->format('d/m/Y')); ?>

                        </span>


                        <div class="ml-auto">
                            <span class="font-bold">
                                <?php switch($order->status):
                                case (1): ?>

                                Pendiente

                                <?php break; ?>
                                <?php case (2): ?>

                                Recibido

                                <?php break; ?>
                                <?php case (3): ?>

                                Enviado

                                <?php break; ?>
                                <?php case (4): ?>

                                Entregado

                                <?php break; ?>
                                <?php case (5): ?>

                                Anulado

                                <?php break; ?>
                                <?php default: ?>

                                <?php endswitch; ?>
                            </span>

                            <br>

                            <span class="text-sm">
                                <?php echo e($order->total); ?> USD
                            </span>
                        </div>

                        <span>
                            <i class="fas fa-angle-right ml-6"></i>
                        </span>

                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>

        <?php else: ?>
        <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <span class="font-bold text-lg">
                No existe registros de ordenes
            </span>
        </div>
        <?php endif; ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>