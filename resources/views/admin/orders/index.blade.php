<x-admin-layout>
    <div class="max-w-7xl mx-auto px-4 py-10 space-y-10">

        {{-- HEADER --}}
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard de órdenes</h1>
            <p class="text-sm text-gray-400">Resumen general del sistema</p>
        </div>

        {{-- STATS --}}
        <section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @php
                $stats = [
                    ['label'=>'Recibido','value'=>$recibido,'icon'=>'fa-credit-card','color'=>'gray','status'=>2],
                    ['label'=>'Enviado','value'=>$enviado,'icon'=>'fa-truck','color'=>'blue','status'=>3],
                    ['label'=>'Entregado','value'=>$entregado,'icon'=>'fa-check','color'=>'green','status'=>4],
                    ['label'=>'Anulado','value'=>$anulado,'icon'=>'fa-times','color'=>'red','status'=>5],
                ];
            @endphp

            @foreach($stats as $stat)
                <a href="{{ route('admin.orders.index').'?status='.$stat['status'] }}"
                   class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition group">

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500">{{ $stat['label'] }}</span>

                        <div class="w-10 h-10 flex items-center justify-center rounded-xl
                            bg-{{ $stat['color'] }}-100 text-{{ $stat['color'] }}-600">
                            <i class="fas {{ $stat['icon'] }}"></i>
                        </div>
                    </div>

                    <p class="text-2xl font-semibold text-gray-900">
                        {{ $stat['value'] }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">Ver órdenes</p>

                </a>
            @endforeach

        </section>

        {{-- LISTA --}}
        @if ($orders->count())

            <section class="bg-white border border-gray-200 rounded-2xl">

                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-sm font-medium text-gray-900">Pedidos recientes</h2>
                </div>

                <ul class="divide-y divide-gray-100">

                    @foreach ($orders as $order)

                        @php
                            $statusMap = [
                                1 => ['Pendiente','text-gray-400'],
                                2 => ['Recibido','text-gray-600'],
                                3 => ['Enviado','text-blue-600'],
                                4 => ['Entregado','text-green-600'],
                                5 => ['Anulado','text-red-600'],
                            ];

                            [$label,$color] = $statusMap[$order->status] ?? ['-','text-gray-400'];
                        @endphp

                        <li>
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="flex items-center px-6 py-4 hover:bg-gray-50 transition">

                                {{-- ICON --}}
                                <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 mr-4">
                                    <i class="fas fa-box text-gray-500 text-sm"></i>
                                </div>

                                {{-- INFO --}}
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">
                                        Orden #{{ $order->id }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        {{ $order->created_at->format('d M Y') }}
                                    </p>
                                </div>

                                {{-- STATUS --}}
                                <div class="text-right mr-6">
                                    <p class="text-sm font-medium {{ $color }}">
                                        {{ $label }}
                                    </p>
                                    <p class="text-xs text-gray-400">
                                        ${{ number_format($order->total, 2) }}
                                    </p>
                                </div>

                                {{-- ARROW --}}
                                <i class="fas fa-chevron-right text-gray-300"></i>

                            </a>
                        </li>

                    @endforeach

                </ul>

            </section>

        @else

            <div class="bg-white border border-gray-200 rounded-2xl p-10 text-center">
                <i class="fas fa-box-open text-3xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">No hay órdenes registradas</p>
            </div>

        @endif

    </div>
</x-admin-layout>