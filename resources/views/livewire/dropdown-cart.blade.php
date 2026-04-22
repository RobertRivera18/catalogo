<div>
    <x-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size="30" />

                @if (Cart::count())
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center min-w-[20px] h-[20px] px-1 text-[11px] font-semibold text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full shadow">
                        {{ Cart::count() }}
                    </span>
                @else
                    <span class="absolute top-0 right-0 w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"></span>
                @endif
            </span>
        </x-slot>

        <x-slot name="content">
            <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">

                {{-- HEADER --}}
                <div class="px-4 py-3 border-b bg-gray-50 flex justify-between items-center">
                    <p class="text-sm font-semibold text-gray-800">
                        Carrito
                    </p>
                    <span class="text-xs text-gray-500">
                        {{ Cart::count() }} items
                    </span>
                </div>

                {{-- LISTA --}}
                <ul class="max-h-80 overflow-y-auto divide-y">
                    @forelse (Cart::content() as $item)
                        <li class="flex gap-4 p-4 hover:bg-gray-50 transition">

                            <img class="w-16 h-16 object-cover rounded-lg border"
                                src="{{ $item->options->image }}" alt="">

                            <div class="flex-1 min-w-0">
                                <h1 class="text-sm font-medium text-gray-900 line-clamp-2">
                                    {{ $item->name }}
                                </h1>

                                <div class="text-xs text-gray-500 mt-1">
                                    Cant: {{ $item->qty }}

                                    @isset($item->options['color'])
                                        • {{ $item->options['color'] }}
                                    @endisset

                                    @isset($item->options['size'])
                                        • {{ $item->options['size'] }}
                                    @endisset
                                </div>

                                <p class="text-sm font-semibold text-gray-900 mt-2">
                                    ${{ number_format($item->price, 2) }}
                                </p>
                            </div>

                        </li>
                    @empty
                        <li class="py-10 px-4 text-center">
                            <p class="text-sm text-gray-500">
                                Tu carrito está vacío
                            </p>
                        </li>
                    @endforelse
                </ul>

                {{-- FOOTER --}}
                @if (Cart::count())
                    <div class="p-4 border-t bg-white space-y-3">

                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Total</span>
                            <span class="text-lg font-bold text-gray-900">
                                ${{ number_format(floatval(str_replace(',', '', Cart::subtotal())), 2) }}
                            </span>
                        </div>

                        <x-boton-enlace 
                            href="{{ route('shopping-cart') }}"
                            class="block w-full text-center bg-black text-white py-2.5 rounded-lg font-medium hover:bg-gray-800 transition">
                            Ver carrito
                        </x-boton-enlace>

                    </div>
                @endif

            </div>
        </x-slot>
    </x-dropdown>
</div>