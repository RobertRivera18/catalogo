<div x-data>
    <div class="flex gap-2 items-center">

    <div>
        <p class="text-lg font-semibold text-gray-700">Talla:</p>
        @foreach ($sizes as $size)
        <button 
        type="button"
        wire:click="$set('size_id', {{ $size->id }})"
        class="px-4 py-2 rounded-md shadow-sm border 
               transition-colors duration-200 ease-in-out
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               {{ $size_id === $size->id ? 'bg-indigo-500 text-white border-indigo-500' : 'bg-gray-100 text-gray-700 border-gray-300 hover:bg-gray-200' }}">
        {{ $size->name }}
    </button>
    
    @endforeach
    </div>
 
</div>
<div class="mt-2">
    <p class="text-lg font-semibold text-gray-700">Color: <span class="text-xs"> Selecciona una talla primero</span></p>
    <ul class="flex flex-wrap items-center">
        @foreach ($colors as $color)
            <li class="mr-4 mb-4">
                <div 
                    wire:click="$set('color_id', {{ $color->id }})"
                    class="w-10 h-10 rounded-lg cursor-pointer border-2 transition-all duration-200"
                    style="background-color: {{ $color->code }};
                           border-color: {{ $color_id === $color->id ? '#ffffff' : '#d1d5db' }};
                           box-shadow: {{ $color_id === $color->id ? '0 0 0 2px #6366f1' : 'none' }};"
                    title="{{ ucfirst($color->code) }}">
                </div>
            </li>
        @endforeach
    </ul>

</div>

    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">Stock disponible:</span>

        @if ($quantity)
        {{$quantity}}
        @else
        {{$product->stock}}
        @endif

    </p>


    <div class="flex space-x-4 mt-8 mb-4">
        <div class="flex-shrink-0">
            <div class="flex items-center space-x-6">

                <div class="mr-4">
                    <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                    wire:target="decrement" wire:click="decrement">
                        -
                    </x-secondary-button>
                    <span class="mx-2 text-gray-700">{{$qty}}</span>
                    <x-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" 
                        wire:loading.attr="disabled"
                        wire:target="increment" 
                        wire:click="increment">
                        +
                    </x-secondary-button>
                </div>
            </div>
        </div>


        <div class="flex-1">
            <button
                class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-green-500 dark:bg-green-700 hover:text-white hover:bg-green-600 dark:hover:bg-green-600 focus:text-white focus:ring-offset-2 focus:bg-green-600 focus:ring-green-600 dark:focus:bg-green-600 dark:focus:ring-green-600 rounded-md gap-x-2 text-sm px-4 py-2 w-full"
                x-bind:disabled="!$wire.quantity"
                wire:click="addItem"
                wire:loading.attr="disabled" 
                wire:target="addItem">

                Agregar al carrito


                <svg class="w-4 h-4 shrink-0 animate-spin" wire:loading="true" wire:target="add_to_cart"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>

        </div>
    
    </div>

 {{-- <div class="mt-14">
        <div class="text-center mb-6">
            <h4 class="text-2xl font-bold text-gray-900">Pago 100% Seguro</h4>
            <p class="text-sm text-gray-500 mt-1">Tus transacciones están protegidas con los más altos estándares de
                seguridad</p>
        </div>

        <ul class="flex justify-center items-center gap-6 flex-wrap">
            @foreach (range(1, 5) as $i)
                <li class="bg-white p-3 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <a href="#">
                        <img src="{{ asset('img/' . $i . '.svg') }}" alt="Método de pago {{ $i }}"
                            class="w-20 h-auto transition-transform duration-300 ease-in-out hover:scale-110">
                    </a>
                </li>
            @endforeach
        </ul>
    </div> --}}

  {{-- <div class="grid lg:grid-cols-2 gap-6 mt-10">
        <div
            class="flex items-center bg-white border border-gray-200 shadow-sm rounded-2xl p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
                <i class="fas fa-truck text-xl text-green-600"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-800 font-semibold text-base">Despacho a domicilio</p>
                <p class="text-sm text-green-500 mt-1">Disponible</p>
            </div>
        </div>

        <div
            class="flex items-center bg-white border border-gray-200 shadow-sm rounded-2xl p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 bg-green-100 rounded-full">
                <i class="fas fa-store text-xl text-green-600"></i>
            </div>
            <div class="ml-5">
                <p class="text-gray-800 font-semibold text-base">Retiro en tienda</p>
                <p class="text-sm text-green-500 mt-1">Disponible</p>
            </div>
        </div>
    </div>
</div> --}}