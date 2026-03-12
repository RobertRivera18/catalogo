<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startPush('css'); ?>
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <style>
            /* Animaciones personalizadas */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeInUp {
                animation: fadeInUp 0.6s ease-out;
            }

            /* Mejoras para flexslider */
            .flexslider {
                border: none !important;
                box-shadow: none !important;
                background: transparent !important;
            }

            .flexslider .slides img {
                border-radius: 1rem !important;
            }

            .flex-control-thumbs {
                margin-top: 1rem !important;
                gap: 0.5rem;
            }

            .flex-control-thumbs li {
                border-radius: 0.5rem !important;
                overflow: hidden;
                border: 2px solid transparent !important;
                transition: all 0.3s ease;
            }

            .flex-control-thumbs li:hover {
                border-color: #f97316 !important;
            }

            .flex-control-thumbs li.flex-active {
                border-color: #f97316 !important;
                box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3) !important;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'px-4 py-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 py-6']); ?>
        
        <nav class="mb-8 animate-fadeInUp" aria-label="Breadcrumb">
            <ol
                class="flex flex-wrap items-center gap-2 text-sm bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100">
                <li class="flex items-center">
                    <a href="/"
                        class="flex items-center gap-2 text-gray-600 hover:text-orange-500 transition-colors group">
                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        <span class="font-medium">Inicio</span>
                    </a>
                </li>

                <li class="text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </li>

                <li>
                    <a href="<?php echo e(route('categories.show', $product->subcategory->category->slug)); ?>"
                        class="text-gray-600 hover:text-orange-500 transition-colors font-medium">
                        <?php echo e($product->subcategory->category->name); ?>

                    </a>
                </li>

                <li class="text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </li>

                <li class="text-gray-500 font-medium truncate max-w-[200px]" aria-current="page">
                    <?php echo e($product->subcategory->name); ?>

                </li>
            </ol>
        </nav>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            
            <div class="animate-fadeInUp">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
                    <div class="flexslider relative overflow-visible">
                        <ul class="slides">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-thumb="<?php echo e(Storage::url($image->url)); ?>">
                                    <div class="relative aspect-square bg-gray-50 rounded-xl overflow-hidden">
                                        <img class="w-full h-full object-contain" src="<?php echo e(Storage::url($image->url)); ?>"
                                            alt="Imagen del producto <?php echo e($product->name); ?>">
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    
                    <div
                        class="absolute top-10 right-10 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full shadow-lg font-bold text-sm">
                        -25% OFF
                    </div>
                </div>
            </div>

            
            <div class="animate-fadeInUp space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    
                    <div class="flex items-center justify-between mb-4">
                        <span
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700 text-xs font-bold px-3 py-1.5 rounded-full border border-indigo-200">
                            <i class="fas fa-tag"></i>
                            <?php echo e($product->subcategory->name); ?>

                        </span>

                        <span
                            class="inline-flex items-center gap-2 text-sm font-semibold px-3 py-1.5 rounded-full <?php echo e($product->status == 2 ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-50 text-gray-700 border border-gray-200'); ?>">
                            <span
                                class="w-2 h-2 rounded-full <?php echo e($product->status == 2 ? 'bg-green-500 animate-pulse' : 'bg-gray-500'); ?>"></span>
                            <?php echo e($product->status == 2 ? 'Disponible' : 'No disponible'); ?>

                        </span>
                    </div>

                    
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        <?php echo e($product->name); ?>

                    </h1>

                    
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-gray-200">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 font-medium">Marca:</span>
                            <a href="#"
                                class="text-orange-600 hover:text-orange-700 font-bold capitalize underline decoration-2 underline-offset-2 transition-colors">
                                <?php echo e($product->brand->name); ?>

                            </a>
                        </div>

                        <?php
                            $averageRating = round($product->reviews->avg('rating') ?? 5, 1);
                            $reviewCount = $product->reviews->count();
                        ?>

                        <div class="flex items-center gap-3 bg-amber-50 px-4 py-2 rounded-full border border-amber-200">
                            <div class="flex items-center gap-1">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <i
                                        class="fas fa-star text-sm <?php echo e($averageRating >= $i ? 'text-yellow-400' : 'text-gray-300'); ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="text-sm font-bold text-gray-700">
                                <?php echo e(number_format($averageRating, 1)); ?>

                            </span>
                            <span class="text-sm text-gray-600">
                                (<?php echo e($reviewCount); ?> <?php echo e($reviewCount === 1 ? 'reseña' : 'reseñas'); ?>)
                            </span>
                        </div>
                    </div>

                    
                    <div class="py-6">
                        <div class="flex items-end gap-4">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Precio anterior:</p>
                                <span class="text-2xl line-through text-gray-400 font-medium">
                                    $<?php echo e(number_format($product->price + $product->price * 0.25, 2)); ?>

                                </span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-green-600 font-semibold mb-1">¡Ahorra 25%!</p>
                                <span
                                    class="text-5xl font-black bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">
                                    $<?php echo e(number_format($product->price, 2)); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <?php if($product->subcategory->size): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item-size', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('bPe2lp9')) {
    $componentId = $_instance->getRenderedChildComponentId('bPe2lp9');
    $componentTag = $_instance->getRenderedChildComponentTagName('bPe2lp9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bPe2lp9');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item-size', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('bPe2lp9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php elseif($product->subcategory->color): ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item-color', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('2clPzJH')) {
    $componentId = $_instance->getRenderedChildComponentId('2clPzJH');
    $componentTag = $_instance->getRenderedChildComponentTagName('2clPzJH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2clPzJH');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item-color', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('2clPzJH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php else: ?>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('SlImbSi')) {
    $componentId = $_instance->getRenderedChildComponentId('SlImbSi');
    $componentTag = $_instance->getRenderedChildComponentTagName('SlImbSi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SlImbSi');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('SlImbSi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php endif; ?>
                </div>

                
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-200 p-6">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-shield-alt text-blue-600"></i>
                        Garantía y Seguridad
                    </h3>
                    <ul class="space-y-3 text-sm text-gray-700">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Garantía de 30 días</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-truck text-blue-500"></i>
                            <span>Envío gratuito en compras mayores a $50</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-lock text-orange-500"></i>
                            <span>Pago 100% seguro</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-undo text-purple-500"></i>
                            <span>Devoluciones fáciles</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        
        <div x-data="{ activeTab: 'description' }" class="mt-12">
            
            <div class="bg-white rounded-t-2xl shadow-lg border border-gray-100 border-b-0">
                <ul class="flex flex-wrap gap-2 p-4" role="tablist">
                    <li role="presentation">
                        <button @click="activeTab = 'description'"
                            :class="activeTab === 'description'
                                ?
                                'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg' :
                                'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200 active:scale-95"
                            type="button">
                            <i class="fas fa-info-circle"></i>
                            <span>Descripción</span>
                        </button>
                    </li>
                    <li role="presentation">
                        <button @click="activeTab = 'reviews'"
                            :class="activeTab === 'reviews'
                                ?
                                'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg' :
                                'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200 active:scale-95"
                            type="button">
                            <i class="fas fa-star"></i>
                            <span>Reseñas (<?php echo e($product->reviews->count()); ?>)</span>
                        </button>
                    </li>
                    <li role="presentation">
                        <button @click="activeTab = 'specs'"
                            :class="activeTab === 'specs'
                                ?
                                'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg' :
                                'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200 active:scale-95"
                            type="button">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Especificaciones</span>
                        </button>
                    </li>
                </ul>
            </div>

            
            <div class="bg-white rounded-b-2xl shadow-lg border border-gray-100 border-t-0 p-4">
                
                <div x-show="activeTab === 'description'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="prose max-w-none 
        prose-h1:mt-4 prose-h1:mb-2 
        prose-h2:mt-4 prose-h2:mb-2
        prose-p:my-2 
        prose-ul:my-2 prose-li:my-1
        prose-lg">
                    <?php echo $product->description; ?>

                </div>



                
                <div x-show="activeTab === 'reviews'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="grid lg:grid-cols-2 gap-8">
                        
                        <div>
                            <div
                                class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-6 border border-amber-200 mb-6">
                                <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center gap-2">
                                    <i class="fas fa-chart-bar text-orange-500"></i>
                                    Valoración General
                                </h3>
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('review-product', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('P8t8iWM')) {
    $componentId = $_instance->getRenderedChildComponentId('P8t8iWM');
    $componentTag = $_instance->getRenderedChildComponentTagName('P8t8iWM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('P8t8iWM');
} else {
    $response = \Livewire\Livewire::mount('review-product', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('P8t8iWM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>

                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('review', $product)): ?>
                                <div class="bg-white rounded-2xl border-2 border-dashed border-gray-300 p-6">
                                    <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center gap-2">
                                        <i class="fas fa-edit text-blue-500"></i>
                                        Escribe tu reseña
                                    </h3>
                                    <form action="<?php echo e(route('reviews.store', $product)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-4">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                Tu comentario
                                            </label>
                                            <textarea name="comment" id="editor"
                                                class="w-full rounded-xl border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                                rows="4" placeholder="Comparte tu experiencia con este producto..."></textarea>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'comment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'comment']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </div>

                                        <div x-data="{ rating: 5 }" class="mb-6">
                                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                                Tu calificación
                                            </label>
                                            <div class="flex items-center gap-4">
                                                <ul class="flex gap-2">
                                                    <template x-for="i in 5" :key="i">
                                                        <li>
                                                            <button type="button" @click="rating = i"
                                                                class="focus:outline-none transition-transform hover:scale-125">
                                                                <i class="fas fa-star text-3xl"
                                                                    :class="rating >= i ? 'text-yellow-400' : 'text-gray-300'"></i>
                                                            </button>
                                                        </li>
                                                    </template>
                                                </ul>
                                                <span class="text-2xl font-bold text-gray-700"
                                                    x-text="rating + '/5'"></span>
                                                <input type="hidden" name="rating" x-model="rating">
                                            </div>
                                        </div>

                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 py-3 rounded-xl shadow-md hover:shadow-lg transition-all']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 py-3 rounded-xl shadow-md hover:shadow-lg transition-all']); ?>
                                            <i class="fas fa-paper-plane mr-2"></i>
                                            Publicar Reseña
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div>
                            <h3 class="font-bold text-xl text-gray-900 mb-6 flex items-center gap-2">
                                <i class="fas fa-comments text-blue-500"></i>
                                Opiniones de Clientes
                            </h3>

                            <?php $__empty_1 = true; $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <article
                                    class="bg-gray-50 rounded-2xl p-6 mb-4 border border-gray-200 hover:border-orange-300 transition-all">
                                    <div class="flex items-start gap-4">
                                        <img class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-md flex-shrink-0"
                                            src="<?php echo e($review->user->profile_photo_url); ?>"
                                            alt="<?php echo e($review->user->name); ?>">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-3 mb-2">
                                                <div>
                                                    <h4 class="font-bold text-gray-900"><?php echo e($review->user->name); ?></h4>
                                                    <p class="text-xs text-gray-500">
                                                        <i class="far fa-clock mr-1"></i>
                                                        <?php echo e($review->created_at->diffForHumans()); ?>

                                                    </p>
                                                </div>
                                                <div
                                                    class="flex items-center gap-1 bg-yellow-50 px-3 py-1 rounded-full border border-yellow-200">
                                                    <span
                                                        class="font-bold text-yellow-600"><?php echo e($review->rating); ?></span>
                                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                </div>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-700">
                                                <?php echo $review->comment; ?>

                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div
                                    class="text-center py-12 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
                                    <i class="fas fa-comment-slash text-5xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-600 font-medium">Aún no hay reseñas</p>
                                    <p class="text-sm text-gray-500 mt-2">¡Sé el primero en compartir tu opinión!</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div x-show="activeTab === 'specs'" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <i class="fas fa-box text-blue-500"></i>
                                Información del Producto
                            </h4>
                            <dl class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-200">
                                    <dt class="text-gray-600 font-medium">SKU:</dt>
                                    <dd class="text-gray-900 font-semibold"><?php echo e($product->id); ?></dd>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-200">
                                    <dt class="text-gray-600 font-medium">Marca:</dt>
                                    <dd class="text-gray-900 font-semibold capitalize"><?php echo e($product->brand->name); ?>

                                    </dd>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-200">
                                    <dt class="text-gray-600 font-medium">Categoría:</dt>
                                    <dd class="text-gray-900 font-semibold">
                                        <?php echo e($product->subcategory->category->name); ?></dd>
                                </div>
                                <div class="flex justify-between py-2">
                                    <dt class="text-gray-600 font-medium">Subcategoría:</dt>
                                    <dd class="text-gray-900 font-semibold"><?php echo e($product->subcategory->name); ?></dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <i class="fas fa-truck text-green-500"></i>
                                Envío y Entrega
                            </h4>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Envío estándar: 3-5 días hábiles</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Envío express: 1-2 días hábiles</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Envío gratis en pedidos mayores a $50</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span>Rastreo en tiempo real disponible</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('script'); ?>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Párrafo',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Encabezado 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Encabezado 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            }).catch(error => console.log(error));
        </script>
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    slideshow: false,
                    animationSpeed: 400,
                    directionNav: true,
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\catalogo\catalogo\resources\views/products/show.blade.php ENDPATH**/ ?>