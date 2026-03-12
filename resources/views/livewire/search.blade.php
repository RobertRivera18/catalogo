<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">
        <x-input name="name" wire:model="search" type="text" class="w-full"
            placeholder="¿Estas buscando algun producto"></x-input>

        <button class="absolute top-0 right-0 w-12 h-full bg-gray-800 rounded-r-md flex items-center justify-center">
            <x-search size="35" color="white" />
        </button>


    </form>
    <div class="absolute w-full  shadow rounded-lg mt-1 hidden" :class="{ 'hidden': !$wire.open }"
        @click.away="$wire.open=false">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex items-center gap-3">

                        <div class="w-16 h-12 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                            <img class="max-w-full max-h-full object-contain"
                                src="{{ Storage::url($product->images->first()->url ?? 'img/default.jpg') }}"
                                alt="{{ $product->name }}" loading="lazy">
                        </div>

                        <div class="text-gray-700 flex-1 min-w-0">
                            <p class="text-sm font-semibold leading-5 truncate">
                                {{ $product->name }}
                            </p>

                            <p class="text-xs text-gray-500">
                                Categoría: {{ $product->subcategory->category->name ?? 'Sin categoría' }}
                            </p>
                        </div>

                    </a>
                @empty
                    <p class="text-md  leading-5">No existe ningun registro con los parametros especificados</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
