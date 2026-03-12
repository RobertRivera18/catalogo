<div class="container mx-auto px-4 py-6" x-data="{
    open: false,
    view: '<?php echo e($view); ?>',
    selectedCategory: '<?php echo e($categorySelected); ?>'
}">

    
    <div class="bg-gradient-to-r from-orange-50 to-amber-50 rounded-2xl p-6 mb-8 shadow-sm border border-orange-100">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                    Catálogo de Productos
                </h1>
                <p class="text-sm text-gray-600">
                    <span class="font-semibold text-orange-600"><?php echo e($products->total()); ?></span> productos encontrados
                </p>
            </div>

            
            <div class="hidden md:flex items-center gap-3">
                <span class="text-sm text-gray-600 font-medium">Vista:</span>
                <div class="inline-flex rounded-lg border border-gray-200 bg-white shadow-sm overflow-hidden">
                    <button wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula"
                        class="group px-5 py-2.5 transition-all duration-200 <?php echo e($view === 'grid' ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-gray-50'); ?>">
                        <i
                            class="fas fa-border-all <?php echo e($view === 'grid' ? '' : 'group-hover:scale-110 transition-transform'); ?>"></i>
                        <span class="ml-2 text-sm font-medium hidden lg:inline">Cuadrícula</span>
                    </button>
                    <button wire:click="$set('view', 'list')" aria-label="Vista de lista"
                        class="group px-5 py-2.5 transition-all duration-200 border-l border-gray-200 <?php echo e($view === 'list' ? 'bg-orange-500 text-white' : 'text-gray-600 hover:bg-gray-50'); ?>">
                        <i
                            class="fas fa-th-list <?php echo e($view === 'list' ? '' : 'group-hover:scale-110 transition-transform'); ?>"></i>
                        <span class="ml-2 text-sm font-medium hidden lg:inline">Lista</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="md:hidden bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
        <div class="flex items-center justify-between gap-4">
            
            <button wire:click="$set('view', '<?php echo e($view === 'grid' ? 'list' : 'grid'); ?>')" aria-label="Cambiar vista"
                class="flex items-center justify-center w-12 h-12 rounded-xl border-2 border-gray-200 text-gray-600 hover:text-orange-500 hover:border-orange-300 hover:bg-orange-50 transition-all duration-200 active:scale-95">
                <i class="fas <?php echo e($view === 'grid' ? 'fa-th-list' : 'fa-border-all'); ?> text-lg"></i>
            </button>

            
            <button @click="open = true"
                class="flex-1 flex items-center justify-center gap-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-xl py-3 px-4 shadow-md hover:shadow-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 active:scale-95">
                <i class="fas fa-sliders-h"></i>
                <span>Filtros y orden</span>
            </button>
        </div>
    </div>

    
    <div class="fixed inset-0 z-50 md:hidden" x-show="open" x-cloak style="display: none;">
        
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" x-show="open"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false">
        </div>

        
        <div class="absolute bottom-0 left-0 w-full bg-white rounded-t-3xl shadow-2xl max-h-[85vh] overflow-hidden flex flex-col"
            x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full">

            
            <div class="flex items-center justify-between p-5 border-b border-gray-200">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Filtros</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Personaliza tu búsqueda</p>
                </div>
                <button @click="open = false"
                    class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            
            <div class="flex-1 overflow-y-auto p-5">
                <form wire:submit.prevent="filtrar" class="space-y-6">
                    
                    <div>
                        <label class="flex items-center gap-2 text-base font-semibold text-gray-800 mb-3">
                            <i class="fas fa-sort text-orange-500"></i>
                            Ordenar por
                        </label>
                        <select wire:model.defer="order"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all py-3 px-4">
                            <option value="">Seleccionar orden...</option>
                            <option value="new">📅 Más recientes</option>
                            <option value="old">🕐 Más antiguos</option>
                            <option value="price_asc">💰 Menor precio</option>
                            <option value="price_desc">💎 Mayor precio</option>
                            <option value="popular">⭐ Más populares</option>
                        </select>
                    </div>

                    
                    <div>
                        <label class="flex items-center gap-2 text-base font-semibold text-gray-800 mb-3">
                            <i class="fas fa-tags text-orange-500"></i>
                            Categorías
                        </label>
                        <div class="space-y-2">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" wire:click="$set('category', '<?php echo e($category->slug); ?>')"
                                    class="w-full text-left px-4 py-3 rounded-xl transition-all duration-200 <?php echo e($category->slug === $categorySelected ? 'bg-orange-500 text-white shadow-md' : 'bg-gray-50 text-gray-700 hover:bg-orange-50 hover:text-orange-600'); ?>">
                                    <span class="font-medium"><?php echo e($category->name); ?></span>
                                    <?php if($category->slug === $categorySelected): ?>
                                        <i class="fas fa-check float-right mt-1"></i>
                                    <?php endif; ?>
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div class="flex gap-3 pt-4">
                        <button type="button" wire:click="limpiarFiltros"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl py-3 transition-colors">
                            Limpiar
                        </button>
                        <button type="submit" @click="open = false"
                            class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl py-3 shadow-md hover:shadow-lg transition-all">
                            Aplicar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="md:hidden mb-6">
        <div class="flex items-center gap-2 mb-3">
            <i class="fas fa-filter text-orange-500"></i>
            <span class="text-sm font-semibold text-gray-700">Categorías</span>
        </div>
        <div class="overflow-x-auto pb-2 -mx-4 px-4">
            <div class="flex gap-2 min-w-max">
                <button wire:click="$set('category', '')"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all whitespace-nowrap <?php echo e(!$categorySelected ? 'bg-orange-500 text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:border-orange-300'); ?>">
                    Todos
                </button>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="$set('category', '<?php echo e($category->slug); ?>')"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-all whitespace-nowrap <?php echo e($category->slug === $categorySelected ? 'bg-orange-500 text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:border-orange-300'); ?>">
                        <?php echo e($category->name); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        
        <aside class="hidden lg:block col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
                <form wire:submit.prevent="filtrar" class="space-y-6">
                    
                    <div>
                        <label class="flex items-center gap-2 text-base font-semibold text-gray-900 mb-3">
                            <i class="fas fa-sort text-orange-500"></i>
                            Ordenar
                        </label>
                        <select wire:model.defer="order"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                            <option value="">Seleccionar...</option>
                            <option value="new">Más recientes</option>
                            <option value="old">Más antiguos</option>
                            <option value="price_asc">Menor precio</option>
                            <option value="price_desc">Mayor precio</option>
                            <option value="popular">Más populares</option>
                        </select>
                    </div>

                    <hr class="border-gray-200">

                    
                    <div>
                        <label class="flex items-center gap-2 text-base font-semibold text-gray-900 mb-3">
                            <i class="fas fa-tags text-orange-500"></i>
                            Categorías
                        </label>
                        <div class="space-y-2">
                            <label
                                class="flex items-center gap-3 p-2 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors group">
                                <input type="radio" wire:model="category" value=""
                                    class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300">
                                <span class="text-gray-700 font-medium group-hover:text-orange-600 transition-colors">
                                    Todos
                                </span>
                            </label>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label
                                    class="flex items-center gap-3 p-2 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors group">
                                    <input type="radio" wire:model="category" value="<?php echo e($cat->slug); ?>"
                                        class="w-4 h-4 text-orange-500 focus:ring-orange-500 border-gray-300">
                                    <span
                                        class="text-gray-700 font-medium group-hover:text-orange-600 transition-colors">
                                        <?php echo e($cat->name); ?>

                                    </span>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    
                    <div class="space-y-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl py-3 shadow-md hover:shadow-lg transition-all duration-200 active:scale-95">
                            <i class="fas fa-check mr-2"></i>
                            Aplicar Filtros
                        </button>
                        <button type="button" wire:click="limpiarFiltros"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl py-2.5 transition-colors">
                            <i class="fas fa-redo mr-2"></i>
                            Limpiar
                        </button>
                    </div>
                </form>
            </div>
        </aside>

        
        <section class="lg:col-span-4">
            <?php if($view === 'grid'): ?>
                <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity duration-200">
                    <ul class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="group">
                                <article
                                    class="h-full bg-white rounded-2xl border-2 border-gray-100 hover:border-orange-300 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                                    
                                    <div class="relative">
                                        <a href="<?php echo e(route('products.show', $product)); ?>"
                                            class="block relative aspect-[4/3] overflow-hidden bg-gray-100">
                                            <img src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>"
                                                alt="<?php echo e($product->name); ?>"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                loading="lazy">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            </div>
                                        </a>
                                        
                                        <div
                                            class="absolute top-3 right-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow-lg">
                                            -20%
                                        </div>
                                    </div>

                                    
                                    <div class="p-4 space-y-3">
                                        
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-md">
                                                <?php echo e($product->subcategory->name); ?>

                                            </span>
                                            <?php
                                                $avg = round($product->reviews->avg('rating') ?? 5, 1);
                                            ?>
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <span
                                                    class="text-sm font-bold text-gray-700"><?php echo e(number_format($avg, 1)); ?></span>
                                            </div>
                                        </div>

                                        
                                        <h3 class="font-bold text-gray-900 leading-snug line-clamp-2 min-h-[2.5rem]">
                                            <a href="<?php echo e(route('products.show', $product)); ?>"
                                                class="hover:text-orange-600 transition-colors">
                                                <?php echo e($product->name); ?>

                                            </a>
                                        </h3>

                                        
                                        <div class="flex items-end justify-between pt-2 border-t border-gray-100">
                                            <div>
                                                <p class="text-2xl font-bold text-gray-900">
                                                    $<?php echo e(number_format($product->price, 2)); ?>

                                                </p>
                                                <p class="text-xs text-gray-400 line-through">
                                                    $<?php echo e(number_format($product->price * 1.25, 2)); ?>

                                                </p>
                                            </div>
                                            <a href="<?php echo e(route('products.show', $product)); ?>"
                                                class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2.5 rounded-xl transition-all hover:scale-105 active:scale-95 shadow-md">
                                                <i class="fas fa-eye"></i>
                                                <span class="text-sm">Ver</span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="col-span-full">
                                <div
                                    class="bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-8 text-center">
                                    <i class="fas fa-search text-5xl text-red-300 mb-4"></i>
                                    <h3 class="text-xl font-bold text-red-700 mb-2">No se encontraron productos</h3>
                                    <p class="text-red-600">Intenta ajustar los filtros de búsqueda</p>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php else: ?>
                
                <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity duration-200">
                    <ul class="space-y-4">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li>
                                <article
                                    class="group flex flex-col sm:flex-row gap-5 bg-white p-5 rounded-2xl border-2 border-gray-100 hover:border-orange-300 shadow-sm hover:shadow-xl transition-all duration-300">
                                    
                                    <a href="<?php echo e(route('products.show', $product)); ?>"
                                        class="w-full sm:w-48 flex-shrink-0">
                                        <figure class="relative aspect-[4/3] rounded-xl overflow-hidden bg-gray-100">
                                            <img src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>"
                                                alt="<?php echo e($product->name); ?>"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                loading="lazy">
                                            <div
                                                class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                -20%
                                            </div>
                                        </figure>
                                    </a>

                                    
                                    <div class="flex-1 flex flex-col justify-between min-w-0">
                                        <div class="space-y-2">
                                            <div class="flex items-start justify-between gap-3">
                                                <div class="flex-1 min-w-0">
                                                    <span
                                                        class="inline-block text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-md mb-2">
                                                        <?php echo e($product->subcategory->name ?? 'Sin categoría'); ?>

                                                    </span>
                                                    <h3 class="font-bold text-lg text-gray-900 leading-tight">
                                                        <a href="<?php echo e(route('products.show', $product)); ?>"
                                                            class="hover:text-orange-600 transition-colors">
                                                            <?php echo e($product->name); ?>

                                                        </a>
                                                    </h3>
                                                </div>
                                                <?php
                                                    $avg = round($product->reviews->avg('rating') ?? 5, 1);
                                                ?>
                                                <div class="flex items-center gap-1 flex-shrink-0">
                                                    <i class="fas fa-star text-yellow-400"></i>
                                                    <span
                                                        class="font-bold text-gray-700"><?php echo e(number_format($avg, 1)); ?></span>
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 line-clamp-2">
                                                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($product->description), 150, '...')); ?>

                                            </p>

                                        </div>

                                        <div
                                            class="flex items-center justify-between pt-4 mt-4 border-t border-gray-100">
                                            <div>
                                                <p class="text-2xl font-bold text-gray-900">
                                                    $<?php echo e(number_format($product->price, 2)); ?>

                                                </p>
                                                <p class="text-sm text-gray-400 line-through">
                                                    $<?php echo e(number_format($product->price * 1.2, 2)); ?>

                                                </p>
                                            </div>

                                            <a href="<?php echo e(route('products.show', $product)); ?>"
                                                class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-3 rounded-xl transition-all hover:scale-105 active:scale-95 shadow-md">
                                                <i class="fas fa-eye"></i>
                                                <span>Ver detalles</span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div
                                class="bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-8 text-center">
                                <i class="fas fa-search text-5xl text-red-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-red-700 mb-2">No se encontraron productos</h3>
                                <p class="text-red-600">Intenta ajustar los filtros de búsqueda</p>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <div wire:loading
                class="fixed bottom-8 right-8 bg-orange-500 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-3 z-50 animate-pulse">
                <i class="fas fa-spinner fa-spin"></i>
                <span class="font-semibold">Cargando...</span>
            </div>

            
            <div class="mt-8">
                <?php echo e($products->links()); ?>

            </div>
        </section>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\catalogo\catalogo\resources\views/livewire/products-home.blade.php ENDPATH**/ ?>