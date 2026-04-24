<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10 space-y-8">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div class="space-y-3">

                {{-- Título --}}
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                        Orden #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                    </h1>
                    <p class="text-sm text-gray-400">
                        Seguimiento de tu pedido
                    </p>
                </div>

                {{-- Estado --}}
                @if ($order->status == 5)
                    <div
                        class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">

                        <div class="mt-0.5">
                            <i class="fas fa-times-circle text-red-500"></i>
                        </div>

                        <div>
                            <p class="text-sm font-semibold">
                                Orden cancelada
                            </p>
                            <p class="text-xs text-red-600 mt-0.5">
                                Este pedido fue anulado y no será procesado.
                            </p>
                        </div>

                    </div>
                @endif

            </div>

            @if ($order->status == 1)
                <x-boton-enlace href="{{ route('orders.payment', $order) }}"
                    class="ml-auto inline-flex items-center gap-2 bg-black text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow hover:shadow-md hover:scale-[1.02] transition-all">
                    <i class="fas fa-credit-card"></i>
                    Ir a pagar
                </x-boton-enlace>
            @endif
            @if ($order->status == 1)
                <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline">
                    @csrf
                    <button onclick="return confirm('¿Seguro que deseas cancelar esta orden?')"
                        class="ml-3 inline-flex items-center gap-2 bg-red-500 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-red-600 transition">
                        <i class="fas fa-times"></i>
                        Cancelar orden
                    </button>
                </form>
            @endif
        </div>

        {{-- STEPPER --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between">

                {{-- Recibido --}}
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400' }} w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 {{ $order->status >= 2 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400' }}">
                        Recibido
                    </p>
                </div>

                <div
                    class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-black' : 'bg-gray-200' }} h-[2px] flex-1 mx-2">
                </div>

                {{-- Enviado --}}
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400' }} w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-truck text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 {{ $order->status >= 3 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400' }}">
                        Enviado
                    </p>
                </div>

                <div
                    class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-black' : 'bg-gray-200' }} h-[2px] flex-1 mx-2">
                </div>

                {{-- Entregado --}}
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-black text-white shadow' : 'bg-gray-200 text-gray-400' }} w-11 h-11 rounded-full flex items-center justify-center transition">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <p
                        class="text-xs mt-2 {{ $order->status >= 4 && $order->status != 5 ? 'text-gray-900 font-medium' : 'text-gray-400' }}">
                        Entregado
                    </p>
                </div>

            </div>
        </div>

        {{-- INFO --}}
        <div class="grid md:grid-cols-2 gap-6">

            {{-- ENVÍO --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fas fa-truck text-gray-400"></i>
                    <p class="text-sm font-semibold text-gray-900">Envío</p>
                </div>
                @if ($order->envio_type == 1)

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-store text-gray-600 text-sm"></i>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                Retiro en tienda
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Calle Falsa y Avenida 123
                            </p>
                        </div>
                    </div>
                @else
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-truck text-gray-600 text-sm"></i>
                        </div>

                        <div class="space-y-1">
                            <p class="text-sm font-medium text-gray-800">
                                {{ $order->address }}
                            </p>

                            <p class="text-xs text-gray-500">
                                <i class="fas fa-map-pin mr-1"></i>
                                {{ $order->provincia }} - {{ $order->ciudad }}
                            </p>

                            @if ($order->references)
                                <p class="text-xs text-gray-400">
                                    <i class="fas fa-location-arrow mr-1"></i>
                                    {{ $order->references }}
                                </p>
                            @endif
                        </div>
                    </div>

                @endif
            </div>

            {{-- CONTACTO --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                <!-- Header -->
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 leading-none">Datos de contacto</p>
                        <p class="text-xs text-gray-400">Persona que recibirá el pedido</p>
                    </div>
                </div>

                <!-- Info -->
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm text-gray-800">
                        <i class="fas fa-user-circle text-gray-400 text-xs"></i>
                        <span class="font-medium">{{ $order->contact }}</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-phone text-gray-400 text-xs"></i>
                        <span>{{ $order->phone }}</span>
                    </div>
                </div>

            </div>

        </div>

        {{-- PRODUCTOS --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-900 mb-6">Productos</p>

            <div class="space-y-5">
                @foreach ($items as $item)
                    <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition">

                        <img class="w-16 h-16 rounded-lg object-cover border" src="{{ $item->options->image }}"
                            alt="">

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
                            <p class="text-xs text-gray-500">
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
</x-app-layout>
