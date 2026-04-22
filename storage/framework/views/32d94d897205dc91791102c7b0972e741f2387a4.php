<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['width' => '96']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '96']); ?>
         <?php $__env->slot('trigger', null, []); ?> 
            <span class="relative inline-block cursor-pointer">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cart','data' => ['color' => 'white','size' => '30']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'white','size' => '30']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if(Cart::count()): ?>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center min-w-[20px] h-[20px] px-1 text-[11px] font-semibold text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full shadow">
                        <?php echo e(Cart::count()); ?>

                    </span>
                <?php else: ?>
                    <span class="absolute top-0 right-0 w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>
                <?php endif; ?>
            </span>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('content', null, []); ?> 
            <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">

                
                <div class="px-4 py-3 border-b bg-gray-50 flex justify-between items-center">
                    <p class="text-sm font-semibold text-gray-800">
                        Carrito
                    </p>
                    <span class="text-xs text-gray-500">
                        <?php echo e(Cart::count()); ?> items
                    </span>
                </div>

                
                <ul class="max-h-80 overflow-y-auto divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="flex gap-4 p-4 hover:bg-gray-50 transition">

                            <img class="w-16 h-16 object-cover rounded-lg border"
                                src="<?php echo e($item->options->image); ?>" alt="">

                            <div class="flex-1 min-w-0">
                                <h1 class="text-sm font-medium text-gray-900 line-clamp-2">
                                    <?php echo e($item->name); ?>

                                </h1>

                                <div class="text-xs text-gray-500 mt-1">
                                    Cant: <?php echo e($item->qty); ?>


                                    <?php if(isset($item->options['color'])): ?>
                                        • <?php echo e($item->options['color']); ?>

                                    <?php endif; ?>

                                    <?php if(isset($item->options['size'])): ?>
                                        • <?php echo e($item->options['size']); ?>

                                    <?php endif; ?>
                                </div>

                                <p class="text-sm font-semibold text-gray-900 mt-2">
                                    $<?php echo e(number_format($item->price, 2)); ?>

                                </p>
                            </div>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="py-10 px-4 text-center">
                            <p class="text-sm text-gray-500">
                                Tu carrito está vacío
                            </p>
                        </li>
                    <?php endif; ?>
                </ul>

                
                <?php if(Cart::count()): ?>
                    <div class="p-4 border-t bg-white space-y-3">

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Total</span>
                            <span class="text-lg font-bold text-gray-900">
                                $<?php echo e(number_format(floatval(str_replace(',', '', Cart::subtotal())), 2)); ?>

                            </span>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.boton-enlace','data' => ['href' => ''.e(route('shopping-cart')).'','class' => 'block w-full text-center bg-black text-white py-2.5 rounded-lg font-medium hover:bg-gray-800 transition']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('boton-enlace'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('shopping-cart')).'','class' => 'block w-full text-center bg-black text-white py-2.5 rounded-lg font-medium hover:bg-gray-800 transition']); ?>
                            Ver carrito
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    </div>
                <?php endif; ?>

            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/dropdown-cart.blade.php ENDPATH**/ ?>