<div>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-bold text-xl sm:text-2xl text-gray-800 leading-tight">
                Lista de productos
            </h2>

            <a href="<?php echo e(route('admin.products.create')); ?>"
                class="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-sm rounded-xl shadow-sm hover:shadow-indigo-500/25 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="w-5 h-5 text-indigo-100 group-hover:scale-110 transition-transform duration-200"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                <span>Agregar producto</span>
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            
            <div class="p-4 sm:p-6 border-b border-gray-100 bg-gray-50/50">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'text','wire:model.live.debounce.300ms' => 'search','class' => 'w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm','placeholder' => 'Buscar producto por nombre...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','wire:model.live.debounce.300ms' => 'search','class' => 'w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm','placeholder' => 'Buscar producto por nombre...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

            <?php if($products->count()): ?>

                
                <div class="grid grid-cols-1 divide-y divide-gray-200 md:hidden">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-4 space-y-3 hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <?php if($product->images->count()): ?>
                                    <img class="h-12 w-12 rounded-lg object-cover border border-gray-100 flex-shrink-0"
                                        src="<?php echo e(Storage::url($product->images->first()->url)); ?>"
                                        alt="<?php echo e($product->name); ?>">
                                <?php else: ?>
                                    <img class="h-12 w-12 rounded-lg object-cover border border-gray-100 flex-shrink-0"
                                        src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                        alt="Sin imagen">
                                <?php endif; ?>

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 truncate">
                                        <?php echo e($product->name); ?>

                                    </p>
                                    <p class="text-xs text-gray-500">
                                        <?php echo e($product->subcategory->category->name); ?>

                                    </p>
                                </div>

                                <div>
                                    <?php switch($product->status):
                                        case (1): ?>
                                            <span
                                                class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">
                                                Borrador
                                            </span>
                                        <?php break; ?>

                                        <?php case (2): ?>
                                            <span
                                                class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                                Publicado
                                            </span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-2 border-t border-gray-100 text-sm">
                                <div>
                                    <span class="text-xs text-gray-400 block">Precio</span>
                                    <span
                                        class="font-bold text-gray-900">$<?php echo e(number_format($product->price, 2)); ?></span>
                                </div>

                                <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                    class="inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-md transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Editar
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Producto
                                </th>
                                <th scope="col"
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th scope="col"
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-6 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col"
                                    class="px-6 py-3.5 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50/80 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <?php if($product->images->count()): ?>
                                                <img class="h-11 w-11 rounded-lg object-cover border border-gray-200 flex-shrink-0"
                                                    src="<?php echo e(Storage::url($product->images->first()->url)); ?>"
                                                    alt="<?php echo e($product->name); ?>">
                                            <?php else: ?>
                                                <img class="h-11 w-11 rounded-lg object-cover border border-gray-200 flex-shrink-0"
                                                    src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                    alt="Sin imagen">
                                            <?php endif; ?>
                                            <div class="min-w-0">
                                                <div class="text-sm font-semibold text-gray-900 truncate">
                                                    <?php echo e($product->name); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="text-sm text-gray-600 bg-gray-100 px-2.5 py-1 rounded-md font-medium">
                                            <?php echo e($product->subcategory->category->name); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php switch($product->status):
                                            case (1): ?>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 border border-amber-200">
                                                    Borrador
                                                </span>
                                            <?php break; ?>

                                            <?php case (2): ?>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    Publicado
                                                </span>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        $<?php echo e(number_format($product->price, 2)); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                                            class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                
                <div class="px-6 py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No se encontraron productos</h3>
                    <p class="mt-1 text-sm text-gray-500">Prueba ajustando la búsqueda o crea un nuevo producto.</p>
                </div>
            <?php endif; ?>

            
            <?php if($products->hasPages()): ?>
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <?php echo e($products->links()); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/admin/show-products.blade.php ENDPATH**/ ?>