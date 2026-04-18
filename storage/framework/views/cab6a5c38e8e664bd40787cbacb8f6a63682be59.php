<div class="container mx-auto p-4">

    
    <div class="bg-white rounded-xl shadow-md overflow-hidden flex justify-between items-center mb-6 px-4 py-3">
        <h1 class="font-semibold text-gray-700 text-lg flex items-center gap-2">
            <i><?php echo $category->icon; ?></i> <?php echo e($category->name); ?>

        </h1>

        <div class="hidden md:flex rounded-md overflow-hidden border border-gray-300 text-gray-500 shadow-sm">
            <button
                class="px-4 py-2 hover:bg-gray-100 transition-colors duration-200 <?php echo e($view == 'grid' ? 'text-orange-500 bg-gray-100' : ''); ?>"
                wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula">
                <i class="fas fa-border-all"></i>
            </button>
            <button
                class="px-4 py-2 hover:bg-gray-100 transition-colors duration-200 <?php echo e($view == 'list' ? 'text-orange-500 bg-gray-100' : ''); ?>"
                wire:click="$set('view', 'list')" aria-label="Vista de lista">
                <i class="fas fa-th-list"></i>
            </button>
        </div>
    </div>


    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <div class="col-span-1">
            <form wire:submit.prevent="filtrar">
                
                <div class="mb-2">
                    <p class="text-lg font-semibold">Ordenar por</p>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model' => 'order']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'order']); ?>
                        <option value="new">Más recientes</option>
                        <option value="old">Más antiguos</option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                
                <div class="mb-2">
                    <p class="text-lg font-semibold">Subcategorías</p>
                    <ul>
                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'subcategoria','value' => ''.e($subcategory->slug).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'subcategoria','value' => ''.e($subcategory->slug).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <span class="ml-2 text-gray-700 capitalize"><?php echo e($subcategory->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <div class="mb-2">
                    <p class="text-lg font-semibold">Marcas</p>
                    <ul>
                        <?php $__currentLoopData = $category->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'marca','value' => ''.e($brand->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'marca','value' => ''.e($brand->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <span class="ml-2 text-gray-700 capitalize"><?php echo e($brand->name); ?></span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','class' => 'w-full mt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full mt-4']); ?>Aplicar Filtros <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </form>
        </div>

        
        <div class="md:col-span-3">
            <?php if($view == 'grid'): ?>
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="min-w-[220px] max-w-full p-3 bg-white rounded-xl shadow-md border border-gray-200">
                            <figure class="rounded-xl overflow-hidden mb-3 aspect-square">
                                <a href="<?php echo e(route('products.show', $product)); ?>" class="block w-full h-full">
                                    <img src="<?php echo e(Storage::url($product->images->first()->url)); ?>"
                                        class="w-full h-full object-cover object-center"
                                        alt="Imagen de <?php echo e($product->name); ?>">
                                </a>
                            </figure>

                            <?php
                                $averageRating = round($product->reviews->avg('rating'), 1) ?? 5;
                            ?>

                            <div class="flex items-center text-sm space-x-2 mb-1">
                                <div class="flex space-x-0.5">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($averageRating >= $i): ?>
                                            <i class="fas fa-star text-yellow-400 text-base"></i>
                                        <?php elseif($averageRating >= $i - 0.5): ?>
                                            <i class="fas fa-star-half-alt text-yellow-400 text-base"></i>
                                        <?php else: ?>
                                            <i class="far fa-star text-gray-700 text-base"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <div class="text-gray-700 font-medium space-x-1">
                                    <span><?php echo e(number_format($averageRating, 1)); ?></span>
                                    <span class="text-gray-500">(<?php echo e($product->reviews->count()); ?>)</span>
                                </div>
                            </div>

                            <h3 class="text-base font-semibold truncate mb-1">
                                <a href="<?php echo e(route('products.show', $product)); ?>">
                                    <?php echo e(Str::limit($product->name, 40)); ?>

                                </a>
                            </h3>

                            <p class="text-sm text-gray-600 mb-1">
                                <?php echo e($product->subcategory->name); ?>

                            </p>

                            <p class="text-xs text-gray-500 mb-2">
                                Quedan <?php echo e($product->stock); ?> disponibles
                            </p>

                            <div class="flex justify-between items-center gap-2 text-sm font-semibold text-gray-800">
                                <div class="inline-flex flex-col px-3 py-1 rounded-md border border-blue-200">
                                    <span
                                        class="text-gray-900 font-bold">$<?php echo e(number_format($product->price, 2)); ?></span>
                                    <span class="text-gray-400 line-through text-xs">
                                        $<?php echo e(number_format($product->price + $product->price * 0.25, 2)); ?>

                                    </span>
                                </div>
                                <a href="<?php echo e(route('products.show', $product)); ?>"
                                    class="flex items-center gap-1 text-blue-600 hover:text-blue-800 transition">
                                    <i class="fas fa-eye text-lg"></i>
                                    <span>Ver</span>
                                </a>
                            </div>
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="col-span-full">
                            <div
                                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                                <strong class="font-bold">¡Ups!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.products-list','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('products-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                            <strong class="font-bold">¡Ups!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>

            
            <div class="mt-6">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/category-filter.blade.php ENDPATH**/ ?>