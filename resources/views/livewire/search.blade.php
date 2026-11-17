<div class="flex-1 relative" 
     x-data="{ focused: false }"
     @keydown.escape.window="focused = false">

    {{-- Formulario de Búsqueda --}}
    <form action="{{ route('search') }}" method="GET" autocomplete="off" class="relative flex items-center">
        
        {{-- Campo de texto --}}
        <div class="relative w-full">
            <input type="text" 
                   name="name" 
                   wire:model.live.debounce.300ms="search"
                   @focus="focused = true"
                   placeholder="¿Estás buscando algún producto?"
                   class="w-full bg-slate-50 hover:bg-white focus:bg-white text-slate-900 text-xs sm:text-sm font-medium rounded-2xl pl-11 pr-24 py-3 border border-slate-200 focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10 shadow-2xs transition-all duration-200 placeholder:text-slate-400">

            {{-- Icono Lupa Izquierda --}}
            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                <i class="fas fa-search text-sm"></i>
            </div>

            {{-- Indicador de Carga / Clear Button --}}
            <div class="absolute right-14 top-1/2 -translate-y-1/2 flex items-center gap-2">
                <div wire:loading wire:target="search" class="text-slate-400">
                    <i class="fas fa-circle-notch animate-spin text-xs"></i>
                </div>

                @if(filled($search))
                    <button type="button" 
                            wire:click="$set('search', '')" 
                            class="text-slate-400 hover:text-slate-600 p-1 rounded-full transition-colors">
                        <i class="fas fa-times-circle text-xs"></i>
                    </button>
                @endif
            </div>
        </div>

        {{-- Botón Buscar --}}
        <button type="submit" 
                aria-label="Buscar"
                class="absolute right-1 top-1 bottom-1 px-4 bg-slate-900 hover:bg-slate-800 text-white rounded-xl flex items-center justify-center transition-all active:scale-95 shadow-2xs">
            <i class="fas fa-arrow-right text-xs"></i>
        </button>
    </form>

    {{-- Dropdown de Resultados (Autocomplete) --}}
    <div x-cloak
         x-show="focused && $wire.search && $wire.search.trim().length > 0" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1 scale-98"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-1 scale-98"
         @click.outside="focused = false"
         class="absolute z-50 left-0 right-0 mt-2 bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-100 overflow-hidden max-h-[75vh] flex flex-col">

        <div class="overflow-y-auto divide-y divide-slate-50 p-2">
            @forelse ($products as $product)
                <a href="{{ route('products.show', $product) }}" 
                   class="group flex items-center gap-3.5 p-2.5 rounded-xl hover:bg-slate-50 transition-all duration-150">

                    {{-- Miniatura de Imagen --}}
                    <div class="w-12 h-12 bg-slate-50 rounded-lg border border-slate-100 flex items-center justify-center overflow-hidden flex-shrink-0 p-1">
                        <img class="max-w-full max-h-full object-contain transition-transform duration-300 group-hover:scale-105"
                             src="{{ Storage::url($product->images->first()->url ?? 'img/default.jpg') }}"
                             alt="{{ $product->name }}" 
                             loading="lazy">
                    </div>

                    {{-- Info del Producto --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 mb-0.5">
                            <span class="text-[9px] font-black uppercase tracking-wider text-slate-400 bg-slate-100 px-1.5 py-0.2 rounded">
                                {{ $product->brand->name ?? $product->subcategory->category->name ?? 'General' }}
                            </span>
                        </div>

                        <h4 class="text-xs font-black text-slate-800 uppercase leading-snug truncate group-hover:text-slate-900">
                            {{ $product->name }}
                        </h4>

                        <p class="text-[10px] text-slate-400 font-semibold italic truncate">
                            {{ $product->sku ?? $product->code ?? '' }}
                        </p>
                    </div>

                    {{-- Precio --}}
                    @if(isset($product->price))
                        <div class="text-right flex-shrink-0">
                            <span class="text-xs font-black text-slate-900 block">
                                ${{ number_format($product->price, 2) }}
                            </span>
                        </div>
                    @endif

                    <div class="text-slate-300 group-hover:text-slate-600 transition-colors pl-1">
                        <i class="fas fa-chevron-right text-[10px]"></i>
                    </div>
                </a>
            @empty
                <div class="px-4 py-8 text-center space-y-2">
                    <div class="w-10 h-10 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-search-minus text-sm"></i>
                    </div>
                    <p class="text-xs font-bold text-slate-700">Sin resultados</p>
                    <p class="text-[11px] text-slate-400">No encontramos coincidencias para "<span class="font-semibold text-slate-600">{{ $search }}</span>"</p>
                </div>
            @endforelse
        </div>

        {{-- Footer de Ver Todos los Resultados --}}
        @if(count($products) > 0)
            <div class="p-2 bg-slate-50/80 border-t border-slate-100 text-center">
                <button type="submit" 
                        @click="$el.closest('form').submit()"
                        class="text-[11px] font-black uppercase text-slate-700 hover:text-slate-900 transition-colors inline-flex items-center gap-1.5 py-1">
                    <span>Ver todos los resultados</span>
                    <i class="fas fa-arrow-right text-[9px]"></i>
                </button>
            </div>
        @endif
    </div>
</div>