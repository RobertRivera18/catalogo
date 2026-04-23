<div class="min-h-screen bg-[#f5f5f7] py-10">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 xl:grid-cols-5 gap-10">

        {{-- IZQUIERDA --}}
        <div class="xl:col-span-3 space-y-8">

            {{-- Header --}}
            <div>
                <p class="text-sm text-gray-400">Checkout</p>
                <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                    Finaliza tu compra
                </h1>
            </div>

            {{-- Card: Envío --}}
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-4">Envío</p>

                @if ($order->envio_type == 1)
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                            <i class="fas fa-store text-gray-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Retiro en tienda</p>
                            <p class="text-xs text-gray-500">Calle Falsa y Avenida 123</p>
                        </div>
                    </div>
                @else
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 mt-1">
                            <i class="fas fa-truck text-gray-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Entrega a domicilio</p>
                            <p class="text-xs text-gray-500">{{ $order->address }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $order->provincia }},
                                {{ $order->ciudad }},
                            <br>
                                {{ $order->references }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Card: Contacto --}}
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-4">Contacto</p>

                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Nombre</span>
                        <span>{{ $order->contact }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Teléfono</span>
                        <span>{{ $order->phone }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-400">Documento</span>
                        <span>
                            {{ strtoupper($order->identification_type) }}
                            · {{ $order->identification_number }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Productos --}}
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-900 mb-5">Productos</p>

                <div class="space-y-5">
                    @foreach ($items as $item)
                        <div class="flex items-center gap-4">

                            <img class="w-16 h-16 rounded-xl object-cover"
                                 src="{{ $item->options->image }}" alt="">

                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $item->name }}
                                    
                                </p>

                                <p class="text-xs text-gray-400">
                                    @isset($item->options->color)
                                        {{ $item->options->color }}
                                    @endisset
                                    @isset($item->options->size)
                                        · {{ $item->options->size }}
                                    @endisset
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="text-sm text-gray-500">
                                    {{ $item->qty }} × ${{ $item->price }}
                                </p>
                                <p class="text-sm font-semibold text-gray-900">
                                    ${{ $item->price * $item->qty }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- DERECHA (PAGO PREMIUM) --}}
        <div class="xl:col-span-2">
            <div class="sticky top-10">

                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">

                    {{-- Logo pago --}}
                    <div class="flex justify-center mb-6">
                        <img class="h-6 opacity-80" src="{{ asset('img/pagos.jpg') }}" alt="">
                    </div>

                    {{-- Totales --}}
                    <div class="space-y-3 text-sm text-gray-600">

                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>${{ $order->total - $order->shipping_cost }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Envío</span>
                            <span>${{ $order->shipping_cost }}</span>
                        </div>

                        <div class="border-t pt-4 flex justify-between text-base font-semibold text-gray-900">
                            <span>Total</span>
                            <span>${{ $order->total }}</span>
                        </div>

                    </div>

                    {{-- Botón --}}
                    <div class="mt-6">
                        <div id="paypal-button-container"></div>
                    </div>

                    {{-- Seguridad --}}
                    <p class="text-xs text-gray-400 text-center mt-5">
                        Pago seguro · Encriptación SSL
                    </p>

                </div>

            </div>
        </div>

    </div>
</div>


@push('script')
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
        // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{ $order->total }}"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    Livewire.emit('payOrder');
                    /* console.log(details);
                    alert('Transaction completed by ' + details.payer.name.given_name); */
                });
            }
        }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
@endpush
</div>
