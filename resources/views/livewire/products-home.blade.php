<div class="container mx-auto px-4 py-6" x-data="{
    open: false,
    view: '{{ $view }}',
    selectedCategory: '{{ $categorySelected }}'
}">

    {{-- Header mejorado con mejor jerarquía visual --}}
    <div class="bg-gray-50 rounded-2xl p-5 md:p-6 mb-8 border border-gray-200 shadow-sm">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            {{-- Título --}}
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-900">
                    Catálogo de Productos
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    <span class="font-semibold text-gray-900 bg-white px-2 py-0.5 rounded-md border">
                        {{ $products->total() }}
                    </span>
                    productos encontrados
                </p>
            </div>


            {{-- Controles de vista --}}
            <div class="flex items-center gap-3">

                <span class="text-sm text-gray-500 font-medium hidden sm:block">
                    Vista
                </span>

                <div class="flex rounded-lg border border-gray-200 bg-white shadow-sm overflow-hidden">

                    {{-- Grid --}}
                    <button wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium transition
                    {{ $view === 'grid' ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">

                        <i class="fas fa-border-all text-sm"></i>

                        <span class="hidden lg:inline">Cuadrícula</span>

                    </button>


                    {{-- List --}}
                    <button wire:click="$set('view', 'list')" aria-label="Vista de lista"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium border-l border-gray-200 transition
                    {{ $view === 'list' ? 'bg-gray-900 text-white' : 'text-gray-600 hover:bg-gray-100' }}">

                        <i class="fas fa-th-list text-sm"></i>

                        <span class="hidden lg:inline">Lista</span>

                    </button>

                </div>

            </div>

        </div>

    </div>

    {{-- Controles móviles mejorados --}}
    <div class="md:hidden bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
        <div class="flex items-center justify-between gap-4">
            {{-- Botón cambiar vista --}}
            <button wire:click="$set('view', '{{ $view === 'grid' ? 'list' : 'grid' }}')" aria-label="Cambiar vista"
                class="flex items-center justify-center w-12 h-12 rounded-xl border-2 border-gray-200 text-gray-600 hover:text-gray-500 hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 active:scale-95">
                <i class="fas {{ $view === 'grid' ? 'fa-th-list' : 'fa-border-all' }} text-lg"></i>
            </button>

            {{-- Botón filtros --}}
            <button @click="open = true"
                class="flex-1 flex items-center justify-center gap-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-xl py-3 px-4 shadow-md hover:shadow-lg hover:from-gray-600 hover:to-orange-700 transition-all duration-200 active:scale-95">
                <i class="fas fa-sliders-h"></i>
                <span>Filtros y orden</span>
            </button>
        </div>
    </div>

    {{-- Panel lateral móvil mejorado --}}
    <div class="fixed inset-0 z-50 md:hidden" x-show="open" x-cloak style="display: none;">
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" x-show="open"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false">
        </div>

        {{-- Panel deslizable --}}
        <div class="absolute bottom-0 left-0 w-full bg-white rounded-t-3xl shadow-2xl max-h-[85vh] overflow-hidden flex flex-col"
            x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full">

            {{-- Header del panel --}}
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

            {{-- Contenido scrolleable --}}
            <div class="flex-1 overflow-y-auto p-5">
                <form wire:submit.prevent="filtrar" class="space-y-6">
                    {{-- Ordenar --}}
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

                    {{-- Categorías --}}
                    <div>
                        <label class="flex items-center gap-2 text-base font-semibold text-gray-800 mb-3">
                            <i class="fas fa-tags text-gray-500"></i>
                            Categorías
                        </label>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                                <button type="button" wire:click="$set('category', '{{ $category->slug }}')"
                                    class="w-full text-left px-4 py-3 rounded-xl transition-all duration-200 {{ $category->slug === $categorySelected ? 'bg-gray-500 text-white shadow-md' : 'bg-gray-50 text-gray-700 hover:bg-orange-50 hover:text-gray-600' }}">
                                    <span class="font-medium">{{ $category->name }}</span>
                                    @if ($category->slug === $categorySelected)
                                        <i class="fas fa-check float-right mt-1"></i>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Botones de acción --}}
                    <div class="flex gap-3 pt-4">
                        <button type="button" wire:click="limpiar"
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

    {{-- Chips de categorías (móvil) --}}
    <div class="md:hidden mb-6">
        <div class="flex items-center gap-2 mb-3">
            <i class="fas fa-filter text-gray-500"></i>
            <span class="text-sm font-semibold text-gray-700">Categorías</span>
        </div>
        <div class="overflow-x-auto pb-2 -mx-4 px-4">
            <div class="flex gap-2 min-w-max">
                <button wire:click="$set('category', '')"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all whitespace-nowrap {{ !$categorySelected ? 'bg-gray-500 text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:border-orange-300' }}">
                    Todos
                </button>
                @foreach ($categories as $category)
                    <button wire:click="$set('category', '{{ $category->slug }}')"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-all whitespace-nowrap {{ $category->slug === $categorySelected ? 'bg-gray-500 text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:border-gray-300' }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Grid principal --}}
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        {{-- Sidebar (Desktop) mejorado --}}
        <aside class="hidden lg:block col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
                <form wire:submit.prevent="filtrar" class="space-y-6">
                    {{-- Ordenar --}}
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

                    {{-- Categorías --}}
                    <div>

                        <label class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-2">
                            <i class="fas fa-tags text-gray-600 text-sm"></i>
                            Categorías
                        </label>

                        <div class="space-y-1">

                            <label
                                class="flex items-center gap-2 px-2 py-1.5 rounded-md cursor-pointer hover:bg-gray-50 transition group">

                                <input type="radio" wire:model="category" value=""
                                    class="w-3.5 h-3.5 text-gray-900 focus:ring-gray-400 border-gray-300">

                                <span class="text-sm text-gray-700 group-hover:text-gray-900">
                                    Todos
                                </span>

                            </label>

                            @foreach ($categories as $cat)
                                <label
                                    class="flex items-center gap-2 px-2 py-1.5 rounded-md cursor-pointer hover:bg-gray-50 transition group">

                                    <input type="radio" wire:model="category" value="{{ $cat->slug }}"
                                        class="w-3.5 h-3.5 text-gray-900 focus:ring-gray-400 border-gray-300">

                                    <span class="text-sm text-gray-700 group-hover:text-gray-900">
                                        {{ $cat->name }}
                                    </span>

                                </label>
                            @endforeach

                        </div>

                    </div>

                    <hr class="border-gray-200">
                    {{-- Botones --}}
                    <div class="space-y-2">
                        <button type="submit"
                            class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl py-3 shadow-md hover:shadow-lg transition-all duration-200 active:scale-95">
                            <i class="fas fa-check mr-2"></i>
                            Aplicar Filtros

                        </button>
                        <button type="button" wire:click="limpiar"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl py-2.5 transition-colors">
                            <i class="fas fa-redo mr-2"></i>
                            Limpiar
                        </button>
                    </div>
                </form>
            </div>
        </aside>

        {{-- Productos --}}
        <section class="lg:col-span-4">
            @if ($view === 'grid')
                <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity duration-200">

                    <ul class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4 sm:gap-6">

                        @forelse ($products as $product)
                            <li class="group">
                                <article
                                    class="h-full bg-white rounded-2xl border border-gray-200 hover:border-gray-300 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden">

                                    {{-- Imagen --}}
                                    <div class="relative">

                                        <a href="{{ route('products.show', $product) }}"
                                            class="block relative aspect-[3/2] sm:aspect-[4/3] bg-gray-50 overflow-hidden">
                                            <img src="{{ Storage::url($product->images->first()->url ?? 'img/default.jpg') }}"
                                                alt="{{ $product->name }}" loading="lazy"
                                                class="w-full h-full object-contain p-2 sm:p-4 transition-transform duration-300 group-hover:scale-105">

                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                            </div>

                                        </a>

                                        {{-- Badge --}}
                                        <div
                                            class="absolute top-2 right-2 bg-red-500 text-white text-[10px] sm:text-xs font-semibold px-2 py-1 rounded-full shadow">
                                            -20%
                                        </div>

                                    </div>


                                    {{-- Contenido --}}
                                    <div class="p-3 sm:p-4 space-y-2 sm:space-y-3">

                                        {{-- Categoría y rating --}}
                                        <div class="flex items-center justify-between">

                                            <span
                                                class="text-[10px] sm:text-xs font-semibold text-gray-600 bg-gray-100 px-2 py-1 rounded-md">
                                                {{ $product->subcategory->name }}
                                            </span>

                                            @php
                                                $avg = round($product->reviews->avg('rating') ?? 5, 1);
                                            @endphp

                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-star text-yellow-400 text-xs sm:text-sm"></i>
                                                <span class="text-xs sm:text-sm font-semibold text-gray-700">
                                                    {{ number_format($avg, 1) }}
                                                </span>
                                            </div>

                                        </div>


                                        {{-- Nombre --}}
                                        <h3
                                            class="font-semibold text-sm sm:text-base text-gray-900 leading-snug line-clamp-2">

                                            <a href="{{ route('products.show', $product) }}"
                                                class="hover:text-gray-700 transition-colors">

                                                {{ $product->name }}

                                            </a>

                                        </h3>

                                        {{-- Precio --}}
                                        <div class="flex items-center justify-between mt-1  border-t border-gray-100">

                                            <div class="flex items-center gap-2 mt-1">

                                                <p class="text-lg sm:text-xl font-bold text-gray-900">
                                                    ${{ number_format($product->price, 2) }}
                                                </p>

                                                <p class="text-[10px] sm:text-xs text-gray-400 line-through">
                                                    ${{ number_format($product->price * 1.25, 2) }}
                                                </p>

                                            </div>

                                            <a href="{{ route('products.show', $product) }}"
                                                class="flex items-center gap-1 sm:gap-2 bg-gray-900 hover:bg-gray-800 text-white font-semibold px-2 sm:px-4 py-1.5 sm:py-2 rounded-lg transition-all hover:scale-105 shadow">

                                                <i class="fas fa-eye text-xs"></i>
                                                <span class="text-xs sm:text-sm">Ver</span>

                                            </a>

                                        </div>
                                    </div>
                                </article>
                            </li>
                        @empty

                            <li class="col-span-full">

                                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center">

                                    <i class="fas fa-search text-5xl text-gray-300 mb-4"></i>

                                    <h3 class="text-lg font-semibold text-gray-700 mb-2">
                                        No se encontraron productos
                                    </h3>

                                    <p class="text-gray-500">
                                        Intenta ajustar los filtros de búsqueda
                                    </p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            @else
                {{-- Vista Lista mejorada --}}
                <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity duration-200">
                    <ul class="space-y-2">
                        @forelse ($products as $product)
                            <li>
                                <article
                                    class="group flex flex-col sm:flex-row gap-5 bg-white p-5 rounded-2xl border-2 border-gray-100 hover:border-orange-300 shadow-sm hover:shadow-xl transition-all duration-300">
                                    {{-- Imagen --}}
                                    <a href="{{ route('products.show', $product) }}"
                                        class="w-full sm:w-48 flex-shrink-0">
                                        <figure class="relative aspect-[4/3] rounded-xl overflow-hidden bg-gray-100">
                                            <img src="{{ Storage::url($product->images->first()->url ?? 'img/default.jpg') }}"
                                                alt="{{ $product->name }}"
                                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110"
                                                loading="lazy">
                                            <div
                                                class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                                -20%
                                            </div>
                                        </figure>
                                    </a>

                                    {{-- Contenido --}}
                                    <div class="flex-1 flex flex-col justify-between min-w-0">
                                        <div class="space-y-2">
                                            <div class="flex items-start justify-between gap-3">
                                                <div class="flex-1 min-w-0">
                                                    <span
                                                        class="inline-block text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-md mb-2">
                                                        {{ $product->subcategory->name ?? 'Sin categoría' }}
                                                    </span>
                                                    <h3 class="font-bold text-lg text-gray-900 leading-tight">
                                                        <a href="{{ route('products.show', $product) }}"
                                                            class="hover:text-orange-600 transition-colors">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h3>
                                                </div>
                                                @php
                                                    $avg = round($product->reviews->avg('rating') ?? 5, 1);
                                                @endphp
                                                <div class="flex items-center gap-1 flex-shrink-0">
                                                    <i class="fas fa-star text-yellow-400"></i>
                                                    <span
                                                        class="font-bold text-gray-700">{{ number_format($avg, 1) }}</span>
                                                </div>
                                            </div>

                                            <p class="text-sm text-gray-600 line-clamp-2">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($product->description), 150, '...') }}
                                            </p>

                                        </div>

                                        <div
                                            class="flex items-center justify-between pt-4 mt-4 border-t border-gray-100">
                                            <div>
                                                <p class="text-2xl font-bold text-gray-900">
                                                    ${{ number_format($product->price, 2) }}
                                                </p>
                                                <p class="text-sm text-gray-400 line-through">
                                                    ${{ number_format($product->price * 1.2, 2) }}
                                                </p>
                                            </div>

                                            <a href="{{ route('products.show', $product) }}"
                                                class="flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-3 rounded-xl transition-all hover:scale-105 active:scale-95 shadow-md">
                                                <i class="fas fa-eye"></i>
                                                <span>Ver detalles</span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @empty
                            <div
                                class="bg-gradient-to-r from-red-50 to-orange-50 border-2 border-red-200 rounded-2xl p-8 text-center">
                                <i class="fas fa-search text-5xl text-red-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-red-700 mb-2">No se encontraron productos</h3>
                                <p class="text-red-600">Intenta ajustar los filtros de búsqueda</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
            @endif

            {{-- Indicador de carga --}}
            <div wire:loading
                class="fixed bottom-8 right-8 bg-blue-800 text-white px-6 py-3 rounded-full shadow-2xl flex items-center gap-3 z-50 animate-pulse">
                <i class="fas fa-spinner fa-spin"></i>
                <span class="font-semibold">Cargando...</span>
            </div>

            {{-- Paginación mejorada --}}
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </section>
    </div>
</div>
