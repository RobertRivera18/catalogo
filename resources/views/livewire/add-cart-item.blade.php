<div x-data="{ showSuccess: false, addingToCart: false }">

    {{-- Stock Disponible Mejorado --}}
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border-2 border-blue-200 mb-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                    <i class="fas fa-box-open text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Stock Disponible</p>
                    <p class="text-3xl font-black text-gray-900 mt-0.5">
                        {{ $quantity ?: $product->stock }}
                        <span class="text-base font-medium text-gray-600">unidades</span>
                    </p>
                </div>
            </div>

            {{-- Badge de disponibilidad --}}
            @if (($quantity ?: $product->stock) > 10)
                <div class="flex items-center gap-2 bg-green-100 px-4 py-2 rounded-full border border-green-300">
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-bold text-green-700">En Stock</span>
                </div>
            @elseif(($quantity ?: $product->stock) > 0)
                <div class="flex items-center gap-2 bg-yellow-100 px-4 py-2 rounded-full border border-yellow-300">
                    <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-bold text-yellow-700">Pocas unidades</span>
                </div>
            @else
                <div class="flex items-center gap-2 bg-red-100 px-4 py-2 rounded-full border border-red-300">
                    <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                    <span class="text-sm font-bold text-red-700">Agotado</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Control de Cantidad y Botón Agregar --}}
    <div class="bg-white rounded-2xl border-2 border-gray-200 p-6 mb-6 shadow-md hover:shadow-lg transition-shadow">

        {{-- Selector de cantidad --}}
        <div class="mb-5">
            <label class="block text-sm font-bold text-gray-700 mb-3">
                <i class="fas fa-shopping-basket text-orange-500 mr-2"></i>
                Selecciona la cantidad
            </label>
            <div class="flex items-center justify-center bg-gray-50 rounded-xl p-2 border-2 border-gray-200">
                {{-- Botón decrementar --}}
                <button type="button" x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                    wire:target="decrement" wire:click="decrement"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-orange-500 hover:to-orange-600 hover:text-white font-bold text-xl shadow-sm hover:shadow-md transition-all duration-200 disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-gray-700 active:scale-90 border-2 border-gray-200 hover:border-orange-500">
                    <i class="fas fa-minus"></i>
                </button>

                {{-- Display de cantidad --}}
                <div class="flex-1 flex flex-col items-center justify-center px-6">
                    <span class="text-4xl font-black text-gray-900">{{ $qty }}</span>
                    <span class="text-xs text-gray-500 font-medium mt-1">{{ $qty === 1 ? 'unidad' : 'unidades' }}</span>
                </div>

                {{-- Botón incrementar --}}
                <button type="button" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                    wire:target="increment" wire:click="increment"
                    class="w-12 h-12 flex items-center justify-center bg-white rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-orange-500 hover:to-orange-600 hover:text-white font-bold text-xl shadow-sm hover:shadow-md transition-all duration-200 disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-gray-700 active:scale-90 border-2 border-gray-200 hover:border-orange-500">
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            {{-- Información de límite --}}
            @if ($qty >= ($quantity ?: $product->stock))
                <p class="text-xs text-amber-600 mt-2 flex items-center gap-1 justify-center">
                    <i class="fas fa-exclamation-triangle"></i>
                    Has alcanzado el stock máximo disponible
                </p>
            @endif
        </div>

        {{-- Botón Agregar al Carrito --}}
        <button type="button" x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
            wire:target="addItem"
            @click="if($wire.quantity) { addingToCart = true; setTimeout(() => { addingToCart = false; showSuccess = true; setTimeout(() => showSuccess = false, 3000) }, 800) }"
            class="relative w-full overflow-hidden bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-xl px-6 py-4 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:from-green-500 disabled:hover:to-green-600 shadow-lg hover:shadow-2xl active:scale-95 group">

            {{-- Contenido del botón --}}
            <span class="relative z-10 flex items-center justify-center gap-3 text-base">
                <i class="fas fa-shopping-cart text-xl" :class="addingToCart ? 'animate-bounce' : ''"></i>
                <span wire:loading.remove wire:target="addItem">
                    Agregar al carrito
                </span>
                <span wire:loading wire:target="addItem" class="flex items-center gap-2">
                    <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Agregando...
                </span>
            </span>

            {{-- Efecto de brillo --}}
            <div
                class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent">
            </div>
        </button>

        {{-- Mensaje de éxito --}}
        <div x-show="showSuccess" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 transform translate-y-4 scale-95"
            class="mt-4 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-300 rounded-xl p-4 flex items-center gap-3 shadow-md"
            style="display: none;">
            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                <i class="fas fa-check text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-bold text-green-900 text-sm">¡Producto agregado al carrito!</p>
                <p class="text-xs text-green-700 mt-0.5">{{ $qty }}
                    {{ $qty === 1 ? 'unidad agregada' : 'unidades agregadas' }} correctamente</p>
            </div>
            <button @click="showSuccess = false" class="text-green-600 hover:text-green-800 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    {{-- Métodos de Pago --}}
    {{-- <div class="bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 rounded-2xl p-8 border-2 border-purple-200 mb-6 shadow-lg">
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center gap-3 mb-3">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center shadow-md">
                    <i class="fas fa-shield-alt text-white text-lg"></i>
                </div>
                <h4 class="text-2xl font-black text-gray-900">Pago 100% Seguro</h4>
            </div>
            <p class="text-sm text-gray-600 max-w-md mx-auto">
                Tus transacciones están protegidas con los más altos estándares de seguridad y encriptación
            </p>
        </div>

        <div class="flex justify-center items-center gap-4 flex-wrap">
            @foreach (range(1, 5) as $i)
                <div class="group bg-white p-4 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 border-transparent hover:border-purple-300">
                    <img src="{{ asset('img/' . $i . '.svg') }}" 
                         alt="Método de pago {{ $i }}"
                         class="w-20 h-auto transition-transform duration-300 group-hover:scale-110 filter group-hover:brightness-110">
                </div>
            @endforeach
        </div> --}}

    {{-- Badges de seguridad --}}
    {{-- <div class="flex items-center justify-center gap-4 mt-6 flex-wrap">
            <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200">
                <i class="fas fa-lock text-green-500"></i>
                <span class="text-xs font-semibold text-gray-700">SSL Seguro</span>
            </div>
            <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200">
                <i class="fas fa-check-circle text-blue-500"></i>
                <span class="text-xs font-semibold text-gray-700">PCI Compliant</span>
            </div>
            <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200">
                <i class="fas fa-shield-alt text-purple-500"></i>
                <span class="text-xs font-semibold text-gray-700">Datos Protegidos</span>
            </div>
        </div>
    </div> --}}

    {{-- Opciones de Entrega Mejoradas --}}
    {{-- <div class="grid sm:grid-cols-2 gap-4 mb-6"> --}}
    {{-- Despacho a Domicilio --}}
    {{-- <div class="group relative bg-white border-2 border-gray-200 hover:border-green-400 rounded-2xl p-6 transition-all duration-300 hover:shadow-xl cursor-pointer overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-emerald-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative flex items-start gap-4">
                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-2">
                        <h5 class="font-bold text-gray-900 text-base">Envío a Domicilio</h5>
                        <i class="fas fa-arrow-right text-green-500 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-bold text-green-600">Disponible</span>
                    </div>
                    <p class="text-xs text-gray-600 mb-2">
                        <i class="far fa-clock mr-1"></i>
                        Entrega en 3-5 días hábiles
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-md font-semibold">
                            Envío gratis desde $50
                        </span>
                    </div>
                </div>
            </div>
        </div> --}}

    {{-- Retiro en Tienda --}}
    {{-- <div class="group relative bg-white border-2 border-gray-200 hover:border-blue-400 rounded-2xl p-6 transition-all duration-300 hover:shadow-xl cursor-pointer overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <div class="relative flex items-start gap-4">
                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                    <i class="fas fa-store text-white text-2xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-2">
                        <h5 class="font-bold text-gray-900 text-base">Retiro en Tienda</h5>
                        <i class="fas fa-arrow-right text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-bold text-blue-600">Disponible</span>
                    </div>
                    <p class="text-xs text-gray-600 mb-2">
                        <i class="far fa-clock mr-1"></i>
                        Listo para retirar en 24 horas
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-semibold">
                            ¡Sin costo de envío!
                        </span>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}

    {{-- Beneficios Adicionales --}}
    {{-- <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 border-2 border-amber-200 shadow-sm">
        <h5 class="font-bold text-gray-900 mb-4 flex items-center gap-2 text-base">
            <i class="fas fa-gift text-orange-500 text-xl"></i>
            Ventajas de tu compra
        </h5>
        <ul class="grid sm:grid-cols-2 gap-3">
            <li class="flex items-center gap-3 text-sm text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg flex-shrink-0"></i>
                <span class="font-medium">Garantía de 30 días</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg flex-shrink-0"></i>
                <span class="font-medium">Cambios sin costo</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg flex-shrink-0"></i>
                <span class="font-medium">Soporte 24/7</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700 bg-white p-3 rounded-lg shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg flex-shrink-0"></i>
                <span class="font-medium">Producto original</span>
            </li>
        </ul>
    </div> --}}

</div>
