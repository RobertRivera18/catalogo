<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="order-2 lg:order-1 xl:col-span-3">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>

                    @if ($order->envio_type == 1)
                        <p class="text-lg font-semibold">Envio<i class="fas fa-store text-lg text-gray-700"></i></p>
                        <p class="text-sm">Los Productos deben ser recogidos en la tienda</p>

                        <p class="text-sm">Calle Falsa y Avenida123</p>
                    @else
                        <p class="text-lg font-semibold">Envio <i class="fas fa-truck text-3xl text-gray-700"></i></p>
                        <p class="text-sm">Los Productos seran enviados a:</p>
                        <p class="text-sm"> <i class="fas fa-address-card"></i> {{ $order->address }}</p>
                        <p><i class="fas fa-map-pin"></i> {{ $order->department->name }}-{{ $order->city->name }}-
                            {{ $order->district->name }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold">Datos de Contacto</p>
                    <p class="text-sm font-bold"><i class="fas fa-user mr-1"></i>Persona que recibira el producto: <span
                            class="font-normal">{{ $order->contact }}</span></p>
                    <p class="text-sm"> <i class="fas fa-phone mr-1"></i>Telefono de Contacto:{{ $order->phone }}</p>

                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">

                                            @isset($item->options->color)
                                                Color: {{ $item->options->color }}
                                            @endisset

                                            @isset($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <hr>
                            <td class="text-center">
                                ${{ $item->price }}
                            </td>

                            <td class="text-center">
                                {{ $item->qty }}
                            </td>

                            <td class="text-center">
                                ${{ $item->price * $item->qty }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>

    <div class="order-1 lg:order-2 xl:col-span-2">
        <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
            <div class="flex justify-between items-center mb-4">
                <img class="h-8" src="{{ asset('img/pagos.jpg') }}" alt="">
                <div class="text-gray-700">
                    <p class="text-sm font-semibold">
                        Subtotal: ${{ $order->total - $order->shipping_cost }}
                    </p>
                    <p class="text-sm font-semibold">
                        Envío: ${{ $order->shipping_cost }}
                    </p>
                    <p class="text-lg font-semibold uppercase">
                        Total: ${{ $order->total }}
                    </p>

                    <div class="cho-container">

                    </div>
                </div>
            </div>


            <div id="paypal-button-container"></div>

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
