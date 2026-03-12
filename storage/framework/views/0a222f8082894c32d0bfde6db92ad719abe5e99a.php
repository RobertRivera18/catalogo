<div x-data>

    <p class="text-lg text-gray-700">Color</p>

    <ul class="flex flex-wrap items-center">
        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mr-4 mb-4">
                <div wire:click="$set('color_id', <?php echo e($color->id); ?>)"
                    class="w-10 h-10 rounded-lg cursor-pointer border-2 transition-all duration-200"
                    style="background-color: <?php echo e($color->code); ?>;
                       border-color: <?php echo e($color_id === $color->id ? '#ffffff' : '#d1d5db'); ?>;
                       box-shadow: <?php echo e($color_id === $color->id ? '0 0 0 2px #6366f1' : 'none'); ?>;"
                    title="<?php echo e(ucfirst($color->code)); ?>">
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">Stock Disponible:</span>
        <?php if($quantity): ?>
            <?php echo e($quantity); ?>

        <?php else: ?>
            <?php echo e($product->stock); ?>

        <?php endif; ?>

    </p>
    <div class="mt-14">
        <div class="text-center mb-6">
            <h4 class="text-2xl font-bold text-gray-900">Pago 100% Seguro</h4>
            <p class="text-sm text-gray-500 mt-1">Tus transacciones están protegidas con los más altos estándares de
                seguridad</p>
        </div>

        <ul class="flex justify-center items-center gap-6 flex-wrap">
            <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="bg-white p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <a href="#">
                        <img src="<?php echo e(asset('img/' . $i . '.svg')); ?>" alt="Método de pago <?php echo e($i); ?>"
                            class="w-20 h-auto transition-transform duration-300 ease-in-out hover:scale-110">
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>


    <div class="flex space-x-4 mt-8 mb-4">
        <div class="flex-shrink-0">
            <div class="flex items-center space-x-6">

                <div class="mr-4">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['disabled' => true,'xBind:disabled' => '$wire.qty <= 1','wire:loadingAttr' => 'disabled','wire:target' => 'decrement','wire:click' => 'decrement']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => true,'x-bind:disabled' => '$wire.qty <= 1','wire:loading-attr' => 'disabled','wire:target' => 'decrement','wire:click' => 'decrement']); ?>
                        -
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <span class="mx-2 text-gray-700"><?php echo e($qty); ?></span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xBind:disabled' => '$wire.qty >= $wire.quantity','wire:loadingAttr' => 'disabled','wire:target' => 'increment','wire:click' => 'increment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-bind:disabled' => '$wire.qty >= $wire.quantity','wire:loading-attr' => 'disabled','wire:target' => 'increment','wire:click' => 'increment']); ?>
                        +
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
        </div>


        <div class="flex-1">
            <button
                class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-green-500 dark:bg-green-700 hover:text-white hover:bg-green-600 dark:hover:bg-green-600 focus:text-white focus:ring-offset-2 focus:bg-green-600 focus:ring-green-600 dark:focus:bg-green-600 dark:focus:ring-green-600 rounded-md gap-x-2 text-sm px-4 py-2 w-full"
                x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                wire:target="addItem">

                Agregar al carrito


                <svg class="w-4 h-4 shrink-0 animate-spin" wire:loading="true" wire:target="add_to_cart"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>


        </div>


    </div>

    <div class="grid lg:grid-cols-2 gap-6 mt-10">
        <div
            class="flex items-center bg-white border border-gray-200 shadow-sm rounded-2xl p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
                <i class="fas fa-truck text-xl text-green-600"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-800 font-semibold text-base">Despacho a domicilio</p>
                <p class="text-sm text-green-500 mt-1">Disponible</p>
            </div>
        </div>

        <div
            class="flex items-center bg-white border border-gray-200 shadow-sm rounded-2xl p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
                <i class="fas fa-store text-xl text-green-600"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-800 font-semibold text-base">Retiro en tienda</p>
                <p class="text-sm text-green-500 mt-1">Disponible</p>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/add-cart-item-color.blade.php ENDPATH**/ ?>