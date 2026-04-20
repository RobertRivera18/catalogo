<div class="container mx-auto px-4 py-6">

    
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm flex justify-between items-center mb-6 px-5 py-4">
        <h1 class="font-bold text-gray-800 text-lg flex items-center gap-2.5">
            <span class="text-xl"><?php echo $category->icon; ?></span>
            <?php echo e($category->name); ?>

        </h1>

        <div class="hidden md:flex rounded-xl overflow-hidden border border-gray-200 shadow-sm">
            <button wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula"
                class="px-4 py-2 transition-colors duration-150 <?php echo e($view == 'grid' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-50'); ?>">
                <i class="fas fa-border-all text-sm"></i>
            </button>
            <button wire:click="$set('view', 'list')" aria-label="Vista de lista"
                class="px-4 py-2 transition-colors duration-150 <?php echo e($view == 'list' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-50'); ?>">
                <i class="fas fa-th-list text-sm"></i>
            </button>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        
        <div class="col-span-1">
            <form wire:submit.prevent="filtrar"
                class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col gap-6 sticky top-4">

                
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-2">Ordenar por</p>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model' => 'order','class' => 'w-full text-sm rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'order','class' => 'w-full text-sm rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500']); ?>
                        <option value="new">Más recientes</option>
                        <option value="old">Más antiguos</option>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                <hr class="border-gray-100">

                
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-3">Subcategorías</p>
                    <ul class="flex flex-col gap-2">
                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="flex items-center gap-2.5 cursor-pointer group">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'subcategoria','value' => ''.e($subcategory->slug).'','class' => 'rounded text-blue-600 focus:ring-blue-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'subcategoria','value' => ''.e($subcategory->slug).'','class' => 'rounded text-blue-600 focus:ring-blue-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <span
                                        class="text-sm text-gray-600 group-hover:text-gray-900 capitalize transition-colors">
                                        <?php echo e($subcategory->name); ?>

                                    </span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <hr class="border-gray-100">

                
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-3">Marcas</p>
                    <ul class="flex flex-col gap-2">
                        <?php $__currentLoopData = $category->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <label class="flex items-center gap-2.5 cursor-pointer group">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model' => 'marca','value' => ''.e($brand->name).'','class' => 'rounded text-blue-600 focus:ring-blue-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'marca','value' => ''.e($brand->name).'','class' => 'rounded text-blue-600 focus:ring-blue-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <span
                                        class="text-sm text-gray-600 group-hover:text-gray-900 capitalize transition-colors">
                                        <?php echo e($brand->name); ?>

                                    </span>
                                </label>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 active:scale-[.98] text-white text-sm font-semibold py-2.5 rounded-xl transition-all duration-150">
                    Aplicar filtros
                </button>

            </form>
        </div>

        
        <div class="md:col-span-3">

            <?php if($view == 'grid'): ?>
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $averageRating = round($product->reviews->avg('rating'), 1) ?? 5; ?>

                        <li>
                            <div
                                class="group flex flex-col bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 overflow-hidden h-full">

                                
                                <a href="<?php echo e(route('products.show', $product)); ?>"
                                    class="block relative overflow-hidden bg-gray-50 aspect-square">
                                    

                                    <img src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>"
                                        alt="<?php echo e($product->name); ?>" loading="lazy"
                                        class="w-full h-full object-contain p-2 sm:p-4 transition-transform duration-300 group-hover:scale-105">
                                    <span
                                        class="absolute top-2.5 left-2.5 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow">
                                        −25%
                                    </span>
                                </a>

                                
                                <div class="flex flex-col gap-2 p-3 flex-1">

                                    <span
                                        class="text-[10px] font-semibold text-gray-700 bg-blue-50 border border-indigo-200 px-2 py-0.5 rounded-full w-fit">
                                        <?php echo e($product->subcategory->name); ?>

                                    </span>

                                    <a href="<?php echo e(route('products.show', $product)); ?>"
                                        class="text-sm font-bold text-gray-800 leading-snug line-clamp-2 hover:text-blue-600 transition-colors">
                                        <?php echo e($product->name); ?>

                                    </a>

                                    
                                    <div class="flex items-center gap-1.5">
                                        <div class="flex gap-0.5">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($averageRating >= $i): ?>
                                                    <i class="fas fa-star text-amber-400 text-[11px]"></i>
                                                <?php elseif($averageRating >= $i - 0.5): ?>
                                                    <i class="fas fa-star-half-alt text-amber-400 text-[11px]"></i>
                                                <?php else: ?>
                                                    <i class="far fa-star text-gray-300 text-[11px]"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <span
                                            class="text-[10px] font-semibold text-gray-600"><?php echo e(number_format($averageRating, 1)); ?></span>
                                        <span
                                            class="text-[10px] text-gray-400">(<?php echo e($product->reviews->count()); ?>)</span>
                                    </div>

                                    
                                    <div class="flex items-center gap-1.5">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full
                                            <?php echo e($product->stock > 5 ? 'bg-emerald-400' : ($product->stock > 0 ? 'bg-amber-400' : 'bg-red-400')); ?>">
                                        </span>
                                        <span class="text-[10px] text-gray-500">
                                            <?php echo e($product->stock > 0 ? 'Quedan ' . $product->stock : 'Sin stock'); ?>

                                        </span>
                                    </div>

                                    
                                    <div class="mt-auto pt-1">
                                        <p class="text-[10px] text-gray-400 line-through leading-none">
                                            $<?php echo e(number_format($product->price * 1.25, 2)); ?>

                                        </p>
                                        <p class="text-lg font-black text-gray-900 leading-tight">
                                            $<?php echo e(number_format($product->price, 2)); ?>

                                        </p>
                                    </div>

                                </div>

                                
                                <div class="px-3 pb-3">
                                    <a href="<?php echo e(route('products.show', $product)); ?>"
                                        class="flex items-center justify-center gap-1.5 bg-blue-600 hover:bg-blue-700 active:scale-[.98] text-white text-xs font-semibold py-2.5 rounded-xl transition-all duration-150 w-full">
                                        <i class="fas fa-eye text-xs"></i>
                                        Ver producto
                                    </a>
                                </div>

                            </div>
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="col-span-full">
                            <div
                                class="flex flex-col items-center justify-center gap-3 py-16 bg-white rounded-2xl border border-gray-100 shadow-sm text-center">
                                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center">
                                    <i class="fas fa-search text-red-400 text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 text-sm">Sin resultados</p>
                                    <p class="text-xs text-gray-400 mt-0.5">No existe ningún producto con ese filtro.
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php else: ?>
                <ul class="flex flex-col gap-3">
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
                            class="flex flex-col items-center justify-center gap-3 py-16 bg-white rounded-2xl border border-gray-100 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center">
                                <i class="fas fa-search text-red-400 text-lg"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 text-sm">Sin resultados</p>
                                <p class="text-xs text-gray-400 mt-0.5">No existe ningún producto con ese filtro.</p>
                            </div>
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