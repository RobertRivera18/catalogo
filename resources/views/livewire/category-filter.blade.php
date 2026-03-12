<div class="container mx-auto p-4">

    {{-- Header de la categoría --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden flex justify-between items-center mb-6 px-4 py-3">
        <h1 class="font-semibold text-gray-700 text-lg flex items-center gap-2">
            <i>{!! $category->icon !!}</i> {{ $category->name }}
        </h1>

        <div class="hidden md:flex rounded-md overflow-hidden border border-gray-300 text-gray-500 shadow-sm">
            <button
                class="px-4 py-2 hover:bg-gray-100 transition-colors duration-200 {{ $view == 'grid' ? 'text-orange-500 bg-gray-100' : '' }}"
                wire:click="$set('view', 'grid')" aria-label="Vista de cuadrícula">
                <i class="fas fa-border-all"></i>
            </button>
            <button
                class="px-4 py-2 hover:bg-gray-100 transition-colors duration-200 {{ $view == 'list' ? 'text-orange-500 bg-gray-100' : '' }}"
                wire:click="$set('view', 'list')" aria-label="Vista de lista">
                <i class="fas fa-th-list"></i>
            </button>
        </div>
    </div>


    {{-- Grid general --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        {{-- Filtros --}}
        <div class="col-span-1">
            <form wire:submit.prevent="filtrar">
                {{-- Ordenar por --}}
                <div class="mb-2">
                    <p class="text-lg font-semibold">Ordenar por</p>
                    <x-select wire:model.defer="order">
                        <option value="new">Más recientes</option>
                        <option value="old">Más antiguos</option>
                    </x-select>
                </div>

                {{-- Subcategorías --}}
                <div class="mb-2">
                    <p class="text-lg font-semibold">Subcategorías</p>
                    <ul>
                        @foreach ($category->subcategories as $subcategory)
                            <li>
                                <label>
                                    <x-checkbox wire:model.defer="subcategoria" value="{{ $subcategory->slug }}" />
                                    <span class="ml-2 text-gray-700 capitalize">{{ $subcategory->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Marcas --}}
                <div class="mb-2">
                    <p class="text-lg font-semibold">Marcas</p>
                    <ul>
                        @foreach ($category->brands as $brand)
                            <li>
                                <label>
                                    <x-checkbox wire:model.defer="marca" value="{{ $brand->name }}" />
                                    <span class="ml-2 text-gray-700 capitalize">{{ $brand->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Botón aplicar filtros --}}
                <x-button type="submit" class="w-full mt-4">Aplicar Filtros</x-button>
            </form>
        </div>

        {{-- Productos --}}
        <div class="md:col-span-3">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($products as $product)
                        <li class="min-w-[220px] max-w-full p-3 bg-white rounded-xl shadow-md border border-gray-200">
                            <figure class="rounded-xl overflow-hidden mb-3 aspect-square">
                                <a href="{{ route('products.show', $product) }}" class="block w-full h-full">
                                    <img src="{{ Storage::url($product->images->first()->url) }}"
                                        class="w-full h-full object-cover object-center"
                                        alt="Imagen de {{ $product->name }}">
                                </a>
                            </figure>

                            @php
                                $averageRating = round($product->reviews->avg('rating'), 1) ?? 5;
                            @endphp

                            <div class="flex items-center text-sm space-x-2 mb-1">
                                <div class="flex space-x-0.5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($averageRating >= $i)
                                            <i class="fas fa-star text-yellow-400 text-base"></i>
                                        @elseif ($averageRating >= $i - 0.5)
                                            <i class="fas fa-star-half-alt text-yellow-400 text-base"></i>
                                        @else
                                            <i class="far fa-star text-gray-700 text-base"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="text-gray-700 font-medium space-x-1">
                                    <span>{{ number_format($averageRating, 1) }}</span>
                                    <span class="text-gray-500">({{ $product->reviews->count() }})</span>
                                </div>
                            </div>

                            <h3 class="text-base font-semibold truncate mb-1">
                                <a href="{{ route('products.show', $product) }}">
                                    {{ Str::limit($product->name, 40) }}
                                </a>
                            </h3>

                            <p class="text-sm text-gray-600 mb-1">
                                {{ $product->subcategory->name }}
                            </p>

                            <p class="text-xs text-gray-500 mb-2">
                                Quedan {{ $product->stock }} disponibles
                            </p>

                            <div class="flex justify-between items-center gap-2 text-sm font-semibold text-gray-800">
                                <div class="inline-flex flex-col px-3 py-1 rounded-md border border-blue-200">
                                    <span
                                        class="text-gray-900 font-bold">${{ number_format($product->price, 2) }}</span>
                                    <span class="text-gray-400 line-through text-xs">
                                        ${{ number_format($product->price + $product->price * 0.25, 2) }}
                                    </span>
                                </div>
                                <a href="{{ route('products.show', $product) }}"
                                    class="flex items-center gap-1 text-blue-600 hover:text-blue-800 transition">
                                    <i class="fas fa-eye text-lg"></i>
                                    <span>Ver</span>
                                </a>
                            </div>
                        </li>

                    @empty
                        <li class="col-span-full">
                            <div
                                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                                <strong class="font-bold">¡Ups!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse($products as $product)
                        <x-products-list :product="$product" />
                    @empty
                        <div
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                            <strong class="font-bold">¡Ups!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
