<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Header con número de orden --}}
    <div class="mb-8">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 mb-2">
                    Detalle de Orden
                </h1>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">Número de orden:</span>
                    <span
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 font-bold px-4 py-2 rounded-xl border-2 border-blue-200">
                        <i class="fas fa-hashtag text-sm"></i>
                        ORDEN-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
            </div>

            {{-- Badge de estado general --}}
            <div class="flex items-center gap-2">
                @if ($order->status == 5)
                    <span
                        class="inline-flex items-center gap-2 bg-red-100 text-red-700 font-bold px-5 py-3 rounded-xl border-2 border-red-300">
                        <i class="fas fa-times-circle"></i>
                        Anulado
                    </span>
                @elseif($order->status == 4)
                    <span
                        class="inline-flex items-center gap-2 bg-green-100 text-green-700 font-bold px-5 py-3 rounded-xl border-2 border-green-300">
                        <i class="fas fa-check-circle"></i>
                        Entregado
                    </span>
                @elseif($order->status == 3)
                    <span
                        class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 font-bold px-5 py-3 rounded-xl border-2 border-blue-300">
                        <i class="fas fa-shipping-fast"></i>
                        En Camino
                    </span>
                @else
                    <span
                        class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 font-bold px-5 py-3 rounded-xl border-2 border-yellow-300">
                        <i class="fas fa-clock"></i>
                        Procesando
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- Stepper de seguimiento --}}
    <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-8 md:p-12 mb-8">
        <div class="relative flex items-center justify-between">

            {{-- Paso 1: Recibido --}}
            <div class="relative flex flex-col items-center flex-1">
                <div
                    class="relative z-10 flex items-center justify-center w-16 h-16 md:w-20 md:h-20 rounded-full transition-all duration-500 {{ $order->status >= 2 && $order->status != 5 ? 'bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg scale-110' : 'bg-gray-300' }}">
                    <i class="fas fa-check text-white text-xl md:text-2xl"></i>
                </div>
                <div class="absolute -bottom-10 md:-bottom-12 left-1/2 -translate-x-1/2 whitespace-nowrap">
                    <p
                        class="text-xs md:text-sm font-bold {{ $order->status >= 2 && $order->status != 5 ? 'text-blue-600' : 'text-gray-500' }}">
                        Recibido
                    </p>
                    @if ($order->status >= 2 && $order->status != 5)
                        <p class="text-xs text-gray-500 text-center mt-1">
                            <i class="far fa-check-circle mr-1"></i>Completado
                        </p>
                    @endif
                </div>
            </div>

            {{-- Línea de conexión 1 --}}
            <div
                class="flex-1 h-2 mx-2 rounded-full transition-all duration-500 {{ $order->status >= 3 && $order->status != 5 ? 'bg-gradient-to-r from-blue-500 to-blue-600' : 'bg-gray-300' }}">
            </div>

            {{-- Paso 2: Enviado --}}
            <div class="relative flex flex-col items-center flex-1">
                <div
                    class="relative z-10 flex items-center justify-center w-16 h-16 md:w-20 md:h-20 rounded-full transition-all duration-500 {{ $order->status >= 3 && $order->status != 5 ? 'bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg scale-110' : 'bg-gray-300' }}">
                    <i
                        class="fas fa-shipping-fast text-white text-xl md:text-2xl {{ $order->status == 3 && $order->status != 5 ? 'animate-pulse' : '' }}"></i>
                </div>
                <div class="absolute -bottom-10 md:-bottom-12 left-1/2 -translate-x-1/2 whitespace-nowrap">
                    <p
                        class="text-xs md:text-sm font-bold {{ $order->status >= 3 && $order->status != 5 ? 'text-blue-600' : 'text-gray-500' }}">
                        Enviado
                    </p>
                    @if ($order->status >= 3 && $order->status != 5)
                        <p class="text-xs text-gray-500 text-center mt-1">
                            <i class="far fa-clock mr-1"></i>En tránsito
                        </p>
                    @endif
                </div>
            </div>

            {{-- Línea de conexión 2 --}}
            <div
                class="flex-1 h-2 mx-2 rounded-full transition-all duration-500 {{ $order->status >= 4 && $order->status != 5 ? 'bg-gradient-to-r from-blue-500 to-green-500' : 'bg-gray-300' }}">
            </div>

            {{-- Paso 3: Entregado --}}
            <div class="relative flex flex-col items-center flex-1">
                <div
                    class="relative z-10 flex items-center justify-center w-16 h-16 md:w-20 md:h-20 rounded-full transition-all duration-500 {{ $order->status >= 4 && $order->status != 5 ? 'bg-gradient-to-br from-green-500 to-green-600 shadow-lg scale-110' : 'bg-gray-300' }}">
                    <i class="fas fa-gift text-white text-xl md:text-2xl"></i>
                </div>
                <div class="absolute -bottom-10 md:-bottom-12 left-1/2 -translate-x-1/2 whitespace-nowrap">
                    <p
                        class="text-xs md:text-sm font-bold {{ $order->status >= 4 && $order->status != 5 ? 'text-green-600' : 'text-gray-500' }}">
                        Entregado
                    </p>
                    @if ($order->status >= 4 && $order->status != 5)
                        <p class="text-xs text-gray-500 text-center mt-1">
                            <i class="fas fa-check-double mr-1"></i>Completado
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Mensaje de anulación --}}
        @if ($order->status == 5)
            <div class="mt-16 bg-red-50 border-2 border-red-200 rounded-xl p-4 flex items-center gap-3">
                <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                <div>
                    <p class="font-bold text-red-700">Esta orden ha sido anulada</p>
                    <p class="text-sm text-red-600">El pedido no será procesado ni enviado</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Actualizar estado (Admin) --}}
    <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-6 mb-8">
        <div class="flex items-center gap-3 mb-6">
            <div
                class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-cog text-white"></i>
            </div>
            <h2 class="text-xl font-bold text-gray-900">Actualizar Estado de Orden</h2>
        </div>

        <form wire:submit.prevent="update">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
                <label class="relative cursor-pointer group">
                    <input wire:model="status" type="radio" name="status" value="2" class="peer sr-only">
                    <div
                        class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all hover:border-gray-400 hover:shadow-md">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-blue-500 peer-checked:bg-blue-500 flex items-center justify-center transition-all">
                            <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-sm text-gray-700 peer-checked:text-blue-700">Recibido</p>
                            <p class="text-xs text-gray-500">Orden confirmada</p>
                        </div>
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input wire:model="status" type="radio" name="status" value="3" class="peer sr-only">
                    <div
                        class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all hover:border-gray-400 hover:shadow-md">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-blue-500 peer-checked:bg-blue-500 flex items-center justify-center transition-all">
                            <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-sm text-gray-700 peer-checked:text-blue-700">Enviado</p>
                            <p class="text-xs text-gray-500">En tránsito</p>
                        </div>
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input wire:model="status" type="radio" name="status" value="4" class="peer sr-only">
                    <div
                        class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-300 peer-checked:border-green-500 peer-checked:bg-green-50 transition-all hover:border-gray-400 hover:shadow-md">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-green-500 peer-checked:bg-green-500 flex items-center justify-center transition-all">
                            <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-sm text-gray-700 peer-checked:text-green-700">Entregado</p>
                            <p class="text-xs text-gray-500">Completado</p>
                        </div>
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input wire:model="status" type="radio" name="status" value="5" class="peer sr-only">
                    <div
                        class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-300 peer-checked:border-red-500 peer-checked:bg-red-50 transition-all hover:border-gray-400 hover:shadow-md">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500 flex items-center justify-center transition-all">
                            <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-sm text-gray-700 peer-checked:text-red-700">Anulado</p>
                            <p class="text-xs text-gray-500">Cancelado</p>
                        </div>
                    </div>
                </label>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all active:scale-95">
                    <i class="fas fa-save"></i>
                    Actualizar Estado
                </button>
            </div>
        </form>
    </div>

    {{-- Información de envío y contacto --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        {{-- Envío --}}
        <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                    <i
                        class="fas {{ $order->envio_type == 1 ? 'fa-store' : 'fa-shipping-fast' }} text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Información de Envío</h3>
            </div>

            @if ($order->envio_type == 1)
                <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl p-5 border-2 border-amber-200">
                    <div class="flex items-start gap-3 mb-4">
                        <i class="fas fa-store text-orange-600 text-2xl mt-1"></i>
                        <div>
                            <p class="font-bold text-gray-900 mb-2">Retiro en Tienda</p>
                            <p class="text-sm text-gray-700">Los productos deben ser recogidos en:</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-orange-200">
                        <p class="font-semibold text-gray-900 mb-1">
                            <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i>
                            Dirección de la tienda
                        </p>
                        <p class="text-sm text-gray-600">Calle Falsa y Avenida 123</p>
                        <p class="text-sm text-gray-600">Horario: Lun-Vie 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            @else
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-5 border-2 border-green-200">
                    <div class="flex items-start gap-3 mb-4">
                        <i class="fas fa-truck text-green-600 text-2xl mt-1"></i>
                        <div>
                            <p class="font-bold text-gray-900 mb-2">Envío a Domicilio</p>
                            <p class="text-sm text-gray-700">Los productos serán enviados a:</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-green-200 space-y-2">
                        <p class="text-sm">
                            <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>
                            <span class="font-semibold text-gray-900">{{ $order->address }}</span>
                        </p>
                        <p class="text-sm text-gray-600 pl-6">
                            {{ $order->department->name }} - {{ $order->city->name }} - {{ $order->district->name }}
                        </p>
                    </div>
                </div>
            @endif
        </div>

        {{-- Contacto --}}
        <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                    <i class="fas fa-user text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">Datos de Contacto</h3>
            </div>

            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-5 border-2 border-purple-200">
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-4 border border-purple-200">
                        <p class="text-xs text-gray-500 mb-1 uppercase tracking-wide font-semibold">Persona que recibe
                        </p>
                        <p class="font-bold text-gray-900 text-lg">
                            <i class="fas fa-user-circle text-purple-500 mr-2"></i>
                            {{ $order->contact }}
                        </p>
                    </div>

                    <div class="bg-white rounded-lg p-4 border border-purple-200">
                        <p class="text-xs text-gray-500 mb-1 uppercase tracking-wide font-semibold">Teléfono de
                            contacto</p>
                        <a href="tel:{{ $order->phone }}"
                            class="font-bold text-gray-900 text-lg hover:text-purple-600 transition-colors">
                            <i class="fas fa-phone text-purple-500 mr-2"></i>
                            {{ $order->phone }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Resumen de productos --}}
    <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 p-6 md:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div
                class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                <i class="fas fa-shopping-bag text-white text-xl"></i>
            </div>
            <h2 class="text-xl font-bold text-gray-900">Resumen de Productos</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-200">
                        <th class="text-left py-4 px-2 font-bold text-gray-700 text-sm">Producto</th>
                        <th class="text-center py-4 px-2 font-bold text-gray-700 text-sm">Precio</th>
                        <th class="text-center py-4 px-2 font-bold text-gray-700 text-sm">Cantidad</th>
                        <th class="text-right py-4 px-2 font-bold text-gray-700 text-sm">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($items as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-2">
                                <div class="flex items-center gap-4">
                                    <img class="w-20 h-16 object-cover rounded-lg shadow-md border-2 border-gray-100"
                                        src="{{ $item->options->image }}" alt="{{ $item->name }}">
                                    <article class="flex-1">
                                        <h3 class="font-bold text-gray-900 mb-1">{{ $item->name }}</h3>
                                        <div class="flex items-center gap-2 text-xs">
                                            @isset($item->options->color)
                                                <span
                                                    class="inline-flex items-center gap-1 bg-gray-100 px-2 py-1 rounded-md">
                                                    <i class="fas fa-palette text-gray-500"></i>
                                                    {{ $item->options->color }}
                                                </span>
                                            @endisset

                                            @isset($item->options->size)
                                                <span
                                                    class="inline-flex items-center gap-1 bg-gray-100 px-2 py-1 rounded-md">
                                                    <i class="fas fa-ruler text-gray-500"></i>
                                                    {{ $item->options->size }}
                                                </span>
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center py-4 px-2">
                                <span class="font-bold text-gray-900">${{ number_format($item->price, 2) }}</span>
                            </td>
                            <td class="text-center py-4 px-2">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 text-blue-700 font-bold rounded-lg">
                                    {{ $item->qty }}
                                </span>
                            </td>
                            <td class="text-right py-4 px-2">
                                <span
                                    class="font-black text-gray-900 text-lg">${{ number_format($item->price * $item->qty, 2) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border-t-2 border-gray-300">
                        <td colspan="3" class="py-6 px-2 text-right">
                            <span class="text-lg font-bold text-gray-700">Total de la Orden:</span>
                        </td>
                        <td class="text-right py-6 px-2">
                            <span class="text-3xl font-black text-green-600">
                                ${{ number_format(collect($items)->sum(fn($item) => $item->price * $item->qty), 2) }}
                            </span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
