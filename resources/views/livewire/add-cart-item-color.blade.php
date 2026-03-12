<div x-data="{ showSuccess: false }">

    {{-- Selector de Color Mejorado --}}
    {{-- Selector de Color --}}
    <div class="mb-6">

        <div class="flex items-center justify-between mb-3">
            <label class="text-base font-bold text-gray-900">
                Elige tu color
            </label>

            @if ($color_id)
                <span class="text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded-full">
                    Color seleccionado
                </span>
            @endif
        </div>

        <div class="flex flex-wrap gap-2">

            @foreach ($colors as $color)
                <button type="button" wire:click="$set('color_id', {{ $color->id }})"
                    class="group relative w-10 h-10 rounded-lg cursor-pointer transition-all duration-200 hover:scale-105 active:scale-95"
                    style="background-color: {{ $color->code }};" title="{{ ucfirst($color->name ?? $color->code) }}">

                    {{-- Borde de selección --}}
                    <div
                        class="absolute inset-0 rounded-lg transition-all duration-200
                    {{ $color_id === $color->id
                        ? 'ring-2 ring-orange-500 ring-offset-1'
                        : 'ring-1 ring-gray-300 group-hover:ring-gray-400' }}">
                    </div>

                    {{-- Check seleccionado --}}
                    @if ($color_id === $color->id)
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-check text-white text-xs drop-shadow"></i>
                        </div>
                    @endif

                </button>
            @endforeach

        </div>

    </div>

    {{-- Stock Disponible Mejorado --}}
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-5 border border-blue-200 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-white"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600 font-medium">Stock Disponible</p>
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $quantity ?: $product->stock }} unidades
                    </p>
                </div>
            </div>
            @if ($quantity > 0 || $product->stock > 0)
                <div class="flex items-center gap-2 bg-green-100 px-3 py-1.5 rounded-full">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-semibold text-green-700">Disponible</span>
                </div>
            @else
                <div class="flex items-center gap-2 bg-red-100 px-3 py-1.5 rounded-full">
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                    <span class="text-sm font-semibold text-red-700">Agotado</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Control de Cantidad + Botón de Agregar --}}
    <div class="bg-white rounded-2xl border-2 border-gray-200 p-5 mb-6">
        <div class="flex items-center gap-4">
            {{-- Selector de cantidad --}}
            <div class="flex items-center">
                <label class="text-sm font-semibold text-gray-700 mr-3">Cantidad:</label>
                <div class="flex items-center bg-gray-100 rounded-xl overflow-hidden border border-gray-200">
                    <button type="button" x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                        wire:target="decrement" wire:click="decrement"
                        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed font-bold text-xl">
                        <i class="fas fa-minus"></i>
                    </button>

                    <span
                        class="w-16 h-10 flex items-center justify-center text-lg font-bold text-gray-900 bg-white border-x border-gray-200">
                        {{ $qty }}
                    </span>

                    <button type="button" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                        wire:target="increment" wire:click="increment"
                        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-200 active:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed font-bold text-xl">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            {{-- Botón Agregar al Carrito --}}
            <button type="button" x-bind:disabled="!$wire.quantity || !$wire.color_id" wire:click="addItem"
                wire:loading.attr="disabled" wire:target="addItem"
                @click="if($wire.quantity && $wire.color_id) { showSuccess = true; setTimeout(() => showSuccess = false, 3000) }"
                class="flex-1 relative overflow-hidden bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-xl px-6 py-4 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:from-green-500 disabled:hover:to-green-600 shadow-lg hover:shadow-xl active:scale-95 group">

                {{-- Contenido del botón --}}
                <span class="relative z-10 flex items-center justify-center gap-3">
                    <i class="fas fa-shopping-cart text-lg"></i>
                    <span class="text-base">Agregar al carrito</span>

                    {{-- Spinner de carga --}}
                    <svg class="w-5 h-5 animate-spin hidden" wire:loading.class.remove="hidden" wire:target="addItem"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </span>

                {{-- Efecto de brillo al hover --}}
                <div
                    class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent">
                </div>
            </button>
        </div>

        {{-- Mensaje de éxito --}}
        <div x-show="showSuccess" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="mt-4 bg-green-50 border-2 border-green-200 rounded-xl p-4 flex items-center gap-3">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check text-white"></i>
            </div>
            <div>
                <p class="font-bold text-green-900">¡Producto agregado!</p>
                <p class="text-sm text-green-700">El producto se ha añadido a tu carrito correctamente</p>
            </div>
        </div>
    </div>

    {{-- Métodos de Pago --}}
    <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 border border-purple-200 mb-6">
        <div class="text-center mb-5">
            <div class="inline-flex items-center gap-2 mb-2">
                <i class="fas fa-shield-alt text-2xl text-purple-600"></i>
                <h4 class="text-xl font-bold text-gray-900">Pago 100% Seguro</h4>
            </div>
            <p class="text-sm text-gray-600">Tus transacciones están protegidas con los más altos estándares de
                seguridad</p>
        </div>

        <div class="flex justify-center items-center gap-4 flex-wrap">
            @foreach (range(1, 5) as $i)
                <div
                    class="group bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <img src="{{ asset('img/' . $i . '.svg') }}" alt="Método de pago {{ $i }}"
                        class="w-16 h-auto transition-transform duration-300 group-hover:scale-110">
                </div>
            @endforeach
        </div>
    </div>

    {{-- Opciones de Entrega --}}
    <div class="grid sm:grid-cols-2 gap-4">
        {{-- Despacho a Domicilio --}}
        <div
            class="group bg-white border-2 border-gray-200 hover:border-green-400 rounded-2xl p-5 transition-all duration-300 hover:shadow-lg cursor-pointer">
            <div class="flex items-start gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-400 to-green-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-truck text-2xl text-white"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h5 class="font-bold text-gray-900 mb-1 flex items-center gap-2">
                        Despacho a domicilio
                        <i
                            class="fas fa-arrow-right text-green-500 text-sm opacity-0 group-hover:opacity-100 transition-opacity"></i>
                    </h5>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-semibold text-green-600">Disponible</span>
                    </div>
                    <p class="text-xs text-gray-600">Recibe tu pedido en 3-5 días hábiles</p>
                </div>
            </div>
        </div>

        {{-- Retiro en Tienda --}}
        <div
            class="group bg-white border-2 border-gray-200 hover:border-blue-400 rounded-2xl p-5 transition-all duration-300 hover:shadow-lg cursor-pointer">
            <div class="flex items-start gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-store text-2xl text-white"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h5 class="font-bold text-gray-900 mb-1 flex items-center gap-2">
                        Retiro en tienda
                        <i
                            class="fas fa-arrow-right text-blue-500 text-sm opacity-0 group-hover:opacity-100 transition-opacity"></i>
                    </h5>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                        <span class="text-sm font-semibold text-blue-600">Disponible</span>
                    </div>
                    <p class="text-xs text-gray-600">Retira gratis en 24 horas</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Beneficios adicionales --}}
    <div class="mt-6 bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-5 border border-amber-200">
        <h5 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
            <i class="fas fa-gift text-orange-500"></i>
            Beneficios de tu compra
        </h5>
        <ul class="space-y-2">
            <li class="flex items-center gap-3 text-sm text-gray-700">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Garantía de 30 días</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Cambios y devoluciones sin costo</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Soporte técnico incluido</span>
            </li>
            <li class="flex items-center gap-3 text-sm text-gray-700">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>Envío gratis en compras sobre $50</span>
            </li>
        </ul>
    </div>



</div>
