<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-responsive','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table-responsive'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="px-6 py-4 bg-white">
            <h1 class="text-lg font-semibold text-gray-700">Carrito de Compras</h1>
        </div>
        <?php if(Cart::count()): ?>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="<?php echo e($item->options->image); ?>"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo e($item->name); ?>

                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <?php if($item->options->color): ?>
                                                <span>
                                                    Color: <?php echo e(__($item->options->color)); ?>

                                                </span>    
                                            <?php endif; ?>

                                            <?php if($item->options->size): ?>

                                                <span class="mx-1">-</span>

                                                <span>
                                                    <?php echo e($item->options->size); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                         
                                <div class="text-sm text-gray-500">
                                    <span>$<?php echo e($item->price); ?></span>
                                    <a class="ml-6 cursor-pointer hover:text-red-600"
                                        wire:click="delete('<?php echo e($item->rowId); ?>')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('<?php echo e($item->rowId); ?>')">
                                        <i class="fas fa-trash"></i>  
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    <?php if($item->options->size): ?>

                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('update-cart-item-size', ['rowId' => $item->rowId])->html();
} elseif ($_instance->childHasBeenRendered($item->rowId)) {
    $componentId = $_instance->getRenderedChildComponentId($item->rowId);
    $componentTag = $_instance->getRenderedChildComponentTagName($item->rowId);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($item->rowId);
} else {
    $response = \Livewire\Livewire::mount('update-cart-item-size', ['rowId' => $item->rowId]);
    $html = $response->html();
    $_instance->logRenderedChild($item->rowId, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                                    <?php elseif($item->options->color): ?>

                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('update-cart-item-color', ['rowId' => $item->rowId])->html();
} elseif ($_instance->childHasBeenRendered($item->rowId)) {
    $componentId = $_instance->getRenderedChildComponentId($item->rowId);
    $componentTag = $_instance->getRenderedChildComponentTagName($item->rowId);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($item->rowId);
} else {
    $response = \Livewire\Livewire::mount('update-cart-item-color', ['rowId' => $item->rowId]);
    $html = $response->html();
    $_instance->logRenderedChild($item->rowId, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        
                                    <?php else: ?>

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

                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-500">
                                    $<?php echo e($item->price * $item->qty); ?>

                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

            <div class="px-6 py-4">
                <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" 
                    wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito de compras
                </a>
            </div>

        <?php else: ?>
            <div class="flex flex-col items-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <p class="text-lg text-gray-700 mt-4">TU CARRO DE COMPRAS ESTÁ VACÍO</p>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-enlace','data' => ['href' => '/','class' => 'mt-4 px-16']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('boton-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/','class' => 'mt-4 px-16']); ?>
                    Ir al inicio
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <?php if(Cart::count()): ?>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>
                        $<?php echo e(Cart::subTotal()); ?>

                    </p>
                </div>

                <div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-enlace','data' => ['href' => ''.e(route('orders.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('boton-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('orders.create')).'']); ?>
                        Continuar
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/shopping-cart.blade.php ENDPATH**/ ?>