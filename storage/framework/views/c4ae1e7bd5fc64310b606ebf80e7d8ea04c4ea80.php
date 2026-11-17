<div class="container mx-auto px-4 py-3 md:py-6 max-w-7xl font-sans tracking-tight antialiased" x-data="{ open: false, view: $wire.entangle('view') }">
    <div
        class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 md:p-6 mb-6 border border-slate-200/60 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">
                Catálogo de Productos
            </h1>
            <p class="text-xs md:text-sm text-slate-500 flex items-center gap-2 font-medium">
                <span
                    class="font-bold text-slate-900 bg-slate-100 px-3 py-0.5 rounded-full border border-slate-200/80 text-xs">
                    <?php echo e(number_format($products->total())); ?>

                </span>
                <span>productos disponibles</span>
            </p>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <div class="hidden sm:inline-flex rounded-2xl border border-slate-200/80 bg-slate-100/70 p-1">
                <button wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula"
                    class="flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold rounded-xl transition-all duration-150 <?php echo e($view === 'grid' ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-500 hover:text-slate-800'); ?>">
                    <i class="fas fa-th-large text-xs"></i>
                    <span class="hidden lg:inline">Cuadrícula</span>
                </button>

                <button wire:click="$set('view', 'list')" aria-label="Vista de lista"
                    class="flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold rounded-xl transition-all duration-150 <?php echo e($view === 'list' ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-500 hover:text-slate-800'); ?>">
                    <i class="fas fa-list text-xs"></i>
                    <span class="hidden lg:inline">Lista</span>
                </button>
            </div>
        </div>
    </div>

    <div
        class="md:hidden bg-white/90 backdrop-blur-md rounded-2xl shadow-xs border border-slate-200/60 p-2 mb-4 flex items-center gap-2">
        <button wire:click="$set('view', '<?php echo e($view === 'grid' ? 'list' : 'grid'); ?>')" aria-label="Cambiar vista"
            class="flex items-center justify-center w-11 h-11 rounded-xl border border-slate-200/80 text-slate-700 bg-slate-50 active:scale-95 transition-all duration-150 shrink-0">
            <i class="fas <?php echo e($view === 'grid' ? 'fa-list' : 'fa-th-large'); ?> text-sm"></i>
        </button>

        <button @click="open = true"
            class="flex-1 flex items-center justify-center gap-2.5 bg-slate-900 text-white font-bold text-xs uppercase tracking-wider rounded-xl py-3 px-4 shadow-xs active:scale-[0.98] transition-all duration-150">
            <i class="fas fa-sliders-h text-xs"></i>
            <span>Filtros y orden</span>
        </button>
    </div>

    <div class="md:hidden mb-6">
        <div class="overflow-x-auto pb-2 -mx-4 px-4 scrollbar-none snap-x flex gap-2">
            <button wire:click="$set('category', '')"
                class="snap-start px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all duration-150 <?php echo e(!$categorySelected ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-600 border border-slate-200/80'); ?>">
                Todos
            </button>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button wire:click="$set('category', '<?php echo e($category->slug); ?>')"
                    class="snap-start px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all duration-150 <?php echo e($category->slug === $categorySelected ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-600 border border-slate-200/80'); ?>">
                    <?php echo e($category->name); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <div class="fixed inset-0 z-50 md:hidden" x-show="open" x-cloak>
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-xs" x-show="open"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false">
        </div>

        <div class="absolute bottom-0 left-0 w-full bg-white rounded-t-3xl shadow-2xl max-h-[85vh] flex flex-col border-t border-slate-200/60"
            x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full">

            <div class="w-10 h-1 bg-slate-300 rounded-full mx-auto my-3"></div>

            <div class="flex items-center justify-between px-6 pb-4 border-b border-slate-100">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Filtrar Productos</h2>
                    <p class="text-xs text-slate-400">Ajusta los resultados según tu preferencia</p>
                </div>
                <button @click="open = false"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Ordenar
                            por</label>
                        <select wire:model.live="order"
                            class="w-full border-slate-200/80 bg-slate-50/50 rounded-2xl text-xs font-semibold py-3 focus:ring-2 focus:ring-slate-900 focus:bg-white transition-all">
                            <option value="">Predeterminado</option>
                            <option value="price_asc">Menor precio</option>
                            <option value="price_desc">Mayor precio</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3">Categorías</label>
                        <div class="space-y-1.5">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" wire:click="$set('category', '<?php echo e($cat->slug); ?>')"
                                    class="w-full flex items-center justify-between px-4 py-3 rounded-2xl text-xs font-semibold transition-all duration-150 <?php echo e($cat->slug === $categorySelected ? 'bg-slate-900 text-white shadow-xs' : 'bg-slate-50 hover:bg-slate-100 text-slate-700'); ?>">
                                    <span><?php echo e($cat->name); ?></span>
                                    <?php if($cat->slug === $categorySelected): ?>
                                        <i class="fas fa-check text-xs"></i>
                                    <?php endif; ?>
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-slate-100">
                        <button type="button" wire:click="limpiar" @click="open = false"
                            class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase rounded-xl py-3 transition-colors">Limpiar</button>
                        <button type="button" @click="open = false"
                            class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs uppercase rounded-xl py-3 shadow-xs active:scale-[0.98] transition-all">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        
        <aside class="hidden lg:block col-span-1">
            <div
                class="bg-white/90 backdrop-blur-md rounded-3xl border border-slate-200/60 p-6 sticky top-6 shadow-xs space-y-6">

                
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-sliders-h text-slate-400 text-xs"></i>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-900">Filtros</h3>
                    </div>

                    <?php if($categorySelected || $order): ?>
                        <button type="button" wire:click="limpiar"
                            class="text-[11px] font-semibold text-slate-400 hover:text-slate-900 transition-colors">
                            Limpiar
                        </button>
                    <?php endif; ?>
                </div>

                <div class="space-y-6">
                    
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Ordenar por
                        </label>

                        <div class="relative">
                            <select wire:model.live="order"
                                class="w-full appearance-none border border-slate-200/80 bg-slate-50/50 rounded-2xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white px-3.5 py-2.5 transition-all outline-none cursor-pointer">
                                <option value="">Default (Destacados)</option>
                                <option value="price_asc">Menor precio</option>
                                <option value="price_desc">Mayor precio</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fas fa-chevron-down text-[10px]"></i>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3">
                            Categorías
                        </label>

                        <nav class="space-y-1">
                            
                            <button type="button" wire:click="$set('category', '')"
                                class="w-full text-left px-3.5 py-2.5 rounded-2xl text-xs font-semibold transition-all duration-200 flex items-center justify-between group <?php echo e(!$categorySelected ? 'bg-slate-900 text-white font-bold shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'); ?>">
                                <span>Todas las categorías</span>
                                <?php if(!$categorySelected): ?>
                                    <i class="fas fa-check text-[10px] text-white"></i>
                                <?php endif; ?>
                            </button>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $isActive = $cat->slug === $categorySelected; ?>
                                <button type="button" wire:click="$set('category', '<?php echo e($cat->slug); ?>')"
                                    class="w-full text-left px-3.5 py-2.5 rounded-2xl text-xs font-semibold transition-all duration-200 flex items-center justify-between group <?php echo e($isActive ? 'bg-slate-900 text-white font-bold shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900'); ?>">
                                    <span><?php echo e($cat->name); ?></span>
                                    <?php if($isActive): ?>
                                        <i class="fas fa-check text-[10px] text-white"></i>
                                    <?php endif; ?>
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </nav>
                    </div>

                    <hr class="border-slate-100">


                    <div class="pt-1">
                        <button type="button" wire:click="limpiar"
                            class="w-full border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-xs rounded-2xl py-2.5 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-undo text-[10px] text-slate-400"></i>
                            <span>Restablecer Filtros</span>
                        </button>
                    </div>
                </div>
            </div>
        </aside>

        
        <section class="lg:col-span-3">

            
            <div wire:loading.flex wire:target="category,order,view,limpiar"
                class="w-full items-center justify-center py-16">
                <div class="flex items-center gap-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">
                    <i class="fas fa-circle-notch animate-spin text-slate-900 text-base"></i>
                    <span>Cargando catálogo...</span>
                </div>
            </div>

            <div wire:loading.remove wire:target="category,order,view,limpiar">
                <?php if($view === 'grid'): ?>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 sm:gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <article wire:key="grid-<?php echo e($product->id); ?>"
                                class="group relative flex flex-col overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200/60 bg-white p-3 sm:p-4 shadow-xs transition-all duration-300 hover:shadow-md hover:border-slate-300/80">

                                
                                <div
                                    class="absolute left-3 top-3 sm:left-4 sm:top-4 z-10 flex flex-col items-start gap-1">
                                    <span
                                        class="rounded-full border border-slate-200/60 bg-white/90 px-2.5 py-0.5 text-[9px] sm:text-[10px] font-extrabold tracking-wider uppercase text-slate-800 backdrop-blur-md shadow-2xs">
                                        <?php echo e($product->brand->name ?? 'INVICTA'); ?>

                                    </span>
                                </div>

                                
                                <?php if(isset($product->discount_percentage) && $product->discount_percentage > 0): ?>
                                    <div
                                        class="absolute right-3 top-3 sm:right-4 sm:top-4 z-10 flex h-8 w-8 sm:h-9 sm:w-9 flex-col items-center justify-center rounded-full bg-rose-600 text-center leading-none text-white shadow-xs">
                                        <span class="text-[6px] sm:text-[7px] font-bold uppercase">OFF</span>
                                        <span
                                            class="text-[8px] sm:text-[9px] font-black">-<?php echo e($product->discount_percentage); ?>%</span>
                                    </div>
                                <?php endif; ?>

                                
                                <div
                                    class="relative mb-3 aspect-square w-full overflow-hidden rounded-xl bg-slate-50/80 sm:rounded-2xl p-3">
                                    <a href="<?php echo e(route('products.show', $product)); ?>"
                                        class="flex h-full w-full items-center justify-center">
                                        <img src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>"
                                            alt="<?php echo e($product->name); ?>" loading="lazy"
                                            class="max-h-full max-w-full object-contain object-center transition-transform duration-500 ease-out group-hover:scale-105">
                                    </a>

                                    <?php if(($product->images->count() ?? 1) > 1): ?>
                                        <span
                                            class="pointer-events-none absolute bottom-2.5 right-2.5 flex items-center gap-1 rounded-full bg-slate-900/70 px-2 py-1 text-[10px] font-medium text-white shadow-xs backdrop-blur-md">
                                            <i class="fas fa-images text-[9px]"></i>
                                            +<?php echo e($product->images->count() - 1); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                
                                <div class="flex flex-1 flex-col justify-between space-y-2.5 sm:space-y-3">
                                    <div>
                                        <span
                                            class="block text-[9px] sm:text-[10px] font-bold tracking-wider uppercase text-slate-400">
                                            <?php echo e($product->subcategory->category->name ?? ''); ?>

                                        </span>

                                        <h3
                                            class="mt-0.5 min-h-[2.25rem] text-xs font-bold uppercase leading-snug text-slate-900 line-clamp-2">
                                            <a href="<?php echo e(route('products.show', $product)); ?>"
                                                class="hover:text-slate-600 transition-colors">
                                                <?php echo e($product->name); ?>

                                            </a>
                                        </h3>

                                        <div
                                            class="mt-1 flex items-center justify-between border-t border-slate-100 pt-1 text-[9px] sm:text-[10px]">
                                            <span
                                                class="font-medium italic tracking-tight text-slate-400 uppercase line-clamp-1">
                                                <?php echo e($product->collection_name ?? ($product->subcategory->name ?? 'Colección')); ?>

                                            </span>
                                        </div>
                                    </div>

                                    
                                    <div
                                        class="flex flex-col gap-2 border-t border-slate-100 pt-2.5 sm:flex-row sm:items-center sm:justify-between sm:pt-3">

                                        
                                        <div class="flex items-baseline justify-between sm:flex-col sm:justify-center">
                                            <span
                                                class="text-[8px] font-bold tracking-wider uppercase text-slate-400 leading-none">PRECIO</span>

                                            <div class="flex items-baseline gap-1.5 sm:flex-col sm:gap-0">
                                                <?php if(isset($product->old_price) && $product->old_price > $product->price): ?>
                                                    <span
                                                        class="text-[9px] font-semibold text-slate-400 line-through leading-none">
                                                        $<?php echo e(number_format($product->old_price, 2)); ?>

                                                    </span>
                                                <?php endif; ?>
                                                <span class="text-sm font-extrabold leading-none text-slate-900">
                                                    $<?php echo e(number_format($product->price, 2)); ?>

                                                </span>
                                            </div>
                                        </div>

                                        
                                        <div class="flex items-center gap-1.5 w-full sm:w-auto">
                                            <div
                                                class="flex h-9 min-w-[38px] sm:min-w-[42px] flex-col items-center justify-center rounded-xl border border-slate-200/80 bg-slate-50 px-1.5 py-0.5 text-[8px] font-semibold leading-tight text-slate-600 shrink-0">
                                                <span class="text-[7px] text-slate-400 font-bold uppercase">STK</span>
                                                <span
                                                    class="font-bold text-slate-800 text-[9px] sm:text-[10px]"><?php echo e($product->stock ?? 1); ?></span>
                                            </div>

                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('add-cart-grid-' . $product->id)) {
    $componentId = $_instance->getRenderedChildComponentId('add-cart-grid-' . $product->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('add-cart-grid-' . $product->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('add-cart-grid-' . $product->id);
} else {
    $response = \Livewire\Livewire::mount('add-cart', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('add-cart-grid-' . $product->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        </div>

                                    </div>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div
                                class="col-span-full bg-white border border-slate-200/60 rounded-3xl p-12 text-center shadow-xs">
                                <i class="fas fa-box-open text-4xl text-slate-300 mb-3"></i>
                                <h3 class="text-base font-bold text-slate-800">No se encontraron productos</h3>
                                <p class="text-xs text-slate-400 mt-1">Prueba cambiando los parámetros o limpiando los
                                    filtros.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    
                    <div class="space-y-4">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <article wire:key="list-<?php echo e($product->id); ?>"
                                class="group bg-white rounded-3xl border border-slate-200/60 shadow-xs hover:shadow-md transition-all duration-300 p-4 flex flex-col sm:flex-row gap-5 items-center relative">

                                
                                <div
                                    class="w-full sm:w-44 aspect-square bg-slate-50/80 rounded-2xl overflow-hidden flex-shrink-0 relative flex items-center justify-center p-2 border border-slate-100">
                                    <span
                                        class="absolute top-2 left-2 z-10 bg-white/90 text-slate-900 text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full border border-slate-200/60 backdrop-blur-md">
                                        <?php echo e($product->brand->name); ?>

                                    </span>

                                    <a href="<?php echo e(route('products.show', $product)); ?>"
                                        class="w-full h-full flex items-center justify-center">
                                        <img src="<?php echo e(Storage::url($product->images->first()->url ?? 'img/default.jpg')); ?>"
                                            alt="<?php echo e($product->name); ?>" loading="lazy"
                                            class="max-h-full max-w-full object-contain transition-transform duration-500 ease-out group-hover:scale-105">
                                    </a>
                                </div>

                                
                                <div class="flex-1 min-w-0 w-full space-y-2">
                                    <div>
                                        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wide">
                                            <?php echo e($product->subcategory->name ?? ''); ?>

                                        </span>

                                        <h3 class="font-bold text-sm text-slate-900 uppercase leading-snug truncate">
                                            <a href="<?php echo e(route('products.show', $product)); ?>"
                                                class="hover:text-slate-600 transition-colors">
                                                <?php echo e($product->name); ?>

                                            </a>
                                        </h3>

                                        <p
                                            class="text-[10px] font-medium italic text-slate-400 uppercase tracking-tight">
                                            <?php echo e($product->collection_name ?? ($product->subcategory->name ?? '')); ?>

                                        </p>

                                        <span class="inline-block text-[10px] font-semibold text-slate-500 mt-0.5">
                                            SKU: <?php echo e($product->sku ?? ($product->code ?? 'N/A')); ?>

                                        </span>
                                    </div>

                                    <p class="text-xs text-slate-500 line-clamp-2">
                                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($product->description), 140, '...')); ?>

                                    </p>
                                </div>

                                <div
                                    class="w-full sm:w-auto flex sm:flex-col items-center sm:items-end justify-between gap-3 border-t sm:border-t-0 border-slate-100 pt-3 sm:pt-0">
                                    <div class="text-left sm:text-right">
                                        <?php if(isset($product->old_price) && $product->old_price > $product->price): ?>
                                            <span class="block text-[10px] font-semibold text-slate-400 line-through">
                                                $<?php echo e(number_format($product->old_price, 2)); ?>

                                            </span>
                                        <?php endif; ?>
                                        <span class="text-base font-extrabold text-slate-900">
                                            $<?php echo e(number_format($product->price, 2)); ?>

                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <div
                                            class="flex h-9 min-w-[38px] sm:min-w-[42px] flex-col items-center justify-center rounded-xl border border-slate-200/80 bg-slate-50 px-1.5 py-0.5 text-[8px] font-semibold text-slate-600 shrink-0">
                                            <span class="text-[7px] text-slate-400 font-bold uppercase">STK</span>
                                            <span
                                                class="font-bold text-slate-800 text-[9px] sm:text-[10px]"><?php echo e($product->stock ?? 1); ?></span>
                                        </div>

                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('add-cart-list-' . $product->id)) {
    $componentId = $_instance->getRenderedChildComponentId('add-cart-list-' . $product->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('add-cart-list-' . $product->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('add-cart-list-' . $product->id);
} else {
    $response = \Livewire\Livewire::mount('add-cart', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('add-cart-list-' . $product->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    </div>
                                </div>

                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="bg-white border border-slate-200/60 rounded-3xl p-12 text-center shadow-xs">
                                <i class="fas fa-box-open text-4xl text-slate-300 mb-3"></i>
                                <h3 class="text-base font-bold text-slate-800">No se encontraron productos</h3>
                                <p class="text-xs text-slate-400 mt-1">Prueba cambiando los parámetros o limpiando los
                                    filtros.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                
                <?php if($products->hasMorePages()): ?>
                    <div wire:key="sentinel-<?php echo e($products->count()); ?>"
                        wire:intersect.margin.300px="loadMore"
                        class="flex items-center justify-center py-10 min-h-[80px]">
                        <div wire:loading.flex wire:target="loadMore"
                            class="items-center gap-3 text-slate-400 font-semibold text-xs uppercase tracking-wider">
                            <i class="fas fa-circle-notch animate-spin text-slate-900 text-base"></i>
                            <span>Cargando más productos...</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </section>
    </div>
</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/products-home.blade.php ENDPATH**/ ?>