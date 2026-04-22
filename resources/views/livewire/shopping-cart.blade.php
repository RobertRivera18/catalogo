<div class="max-w-7xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-semibold text-gray-900 mb-6">
        Detalles de compra
    </h1>

    @if (Cart::count())

        <div class="grid lg:grid-cols-3 gap-6">


            <div class="lg:col-span-2 space-y-4">

                @foreach (Cart::content() as $item)
                    <div class="bg-white border border-gray-200 rounded-xl p-4 flex gap-4 items-center">

                        <!-- Imagen -->
                        <img class="w-20 h-20 object-cover rounded-lg border" src="{{ $item->options->image }}"
                            alt="">

                        <!-- Info -->
                        <div class="flex-1">
                            <h2 class="text-sm font-semibold text-gray-900 leading-tight">
                                {{ $item->name }}
                            </h2>

                            <p class="text-xs text-gray-500 mt-1">
                                REF: {{ $item->id }}
                            </p>

                            <div class="text-xs text-gray-500 mt-1 space-x-2">
                                @if ($item->options->color)
                                    <span>Color: {{ $item->options->color }}</span>
                                @endif
                                @if ($item->options->size)
                                    <span>• {{ $item->options->size }}</span>
                                @endif
                            </div>

                            <p class="text-blue-600 font-semibold mt-2">
                                ${{ $item->price }}
                            </p>
                        </div>

                        <!-- Cantidad -->
                        <div class="flex items-center border rounded-lg px-2 py-1">
                            @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                        </div>

                        <!-- Total -->
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">
                                ${{ $item->price * $item->qty }}
                            </p>

                            <button wire:click="delete('{{ $item->rowId }}')"
                                class="text-red-500 text-xs mt-2 hover:underline">
                                Eliminar
                            </button>
                        </div>

                    </div>
                @endforeach

                <!-- Vaciar carrito -->
                <button wire:click="destroy" class="text-sm text-gray-500 hover:text-red-500">
                    Vaciar carrito
                </button>

            </div>

            <!-- 💰 RESUMEN -->
            <div class="bg-white border border-gray-200 rounded-xl p-5 h-fit space-y-4">

                <h2 class="text-lg font-semibold text-gray-900">
                    Resumen de compra
                </h2>

                <div class="flex justify-between text-sm text-gray-600">
                    <span>Subtotal</span>
                    <span>${{ Cart::subtotal() }}</span>
                </div>

                <div class="flex justify-between text-sm text-gray-600">
                    <span>IVA (15%)</span>
                    <span>
                        ${{ number_format(Cart::subtotal() * 0.15, 2) }}
                    </span>
                </div>

                <div class="border-t pt-3 flex justify-between text-lg font-semibold">
                    @php
                        $subtotal = floatval(str_replace(',', '', Cart::subtotal()));
                    @endphp

                    <span>Total</span>
                    <span class="text-blue-600">
                        ${{ number_format($subtotal * 1.15, 2) }}
                    </span>
                </div>

                <!-- Botones -->
                <a href="{{ route('orders.create') }}"
                    class="block w-full text-center bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                    Ir a pagar
                </a>

                <a href="#"
                    class="block w-full text-center bg-green-500 text-white py-3 rounded-lg font-medium hover:bg-green-600 transition">
                    Pago en efectivo
                </a>

                <a href="/"
                    class="block w-full text-center border border-gray-300 py-3 rounded-lg text-gray-700 hover:bg-gray-50">
                    Seguir comprando
                </a>

            </div>

        </div>
    @else
        <!-- Empty -->
        <div class="flex flex-col items-center py-16">
            <x-cart class="w-16 h-16 text-gray-300" />
            <p class="mt-4 text-gray-500">Tu carrito está vacío</p>

            <a href="/" class="mt-4 bg-black text-white px-6 py-2 rounded-lg">
                Ir al inicio
            </a>
        </div>

    @endif

</div>
