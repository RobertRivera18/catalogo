<div wire:init="loadPosts">
    @if (count($products))

        <div class="glider-contain">
            <ul class="glider-{{ $category->id }} flex gap-x-6">
                @foreach ($products as $product)
                    <li class="min-w-[220px] p-2 border-1">
                        <figure class="border rounded-3xl overflow-hidden mb-2">
                            <a href="{{ route('products.show', $product) }}" class="block">
                                <img src="{{ Storage::url($product->images->first()->url) }}"
                                    class="w-full aspect-square object-cover object-center"
                                    alt="Imagen de {{ $product->name }}">
                            </a>
                        </figure>

                        @php
                            $averageRating = round($product->reviews->avg('rating'), 1) ?? 5;
                        @endphp

                        <div class="flex items-center w-full text-sm space-x-2">
                            <!-- Estrellas -->
                            <div class="flex space-x-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($averageRating >= $i)
                                        <i class="fas fa-star text-yellow-400 text-base"></i>
                                    @elseif ($averageRating >= $i - 0.5)
                                        <i class="fas fa-star-half-alt text-yellow-400 text-base"></i>
                                    @else
                                        <i class="far fa-star text-gray-300 text-base"></i>
                                    @endif
                                @endfor
                            </div>

                            <!-- Promedio y cantidad -->
                            <div class="flex items-center text-gray-700 font-medium space-x-1">
                                <span>{{ number_format($averageRating, 1) }}</span>
                                <span class="text-gray-500">({{ $product->reviews->count() }})</span>
                            </div>
                        </div>

                        <h3 class="text-base truncate  font-segoe font-bold truncate mb-1">
                            <a href="{{ route('products.show', $product) }}">
                                {{ Str::limit($product->name, 40) }}
                            </a>
                        </h3>

                        <p class="text-sm font-segoe mb-1">
                            {{ $product->subcategory->name }}
                        </p>

                        <p class="text-xs font-segoe mb-1">
                            Queda {{ $product->stock }} productos
                        </p>

                        <div class="mb-4 flex justify-between items-center gap-2 text-sm font-semibold text-gray-800">
                            <span class="inline-flex items-center px-3 py-1 rounded-full border border-blue-300">
                                <div>
                                    <span
                                        class="text-gray-900 font-bold">${{ number_format($product->price, 2) }}</span>
                                    <span class="line-through text-gray-500">
                                        ${{ number_format($product->price + $product->price * 0.25, 2) }}
                                    </span>
                                </div>

                            </span>
                            <button type="button" class="flex items-center justify-center border-1">
                                <a href="{{ route('products.show', $product) }}"
                                    class="flex items-center gap-1 text-blue-600  hover:text-blue-800 transition">
                                    <i class="fas fa-eye text-xl"></i>
                                    <span>Ver</span>
                                </a>
                            </button>


                        </div>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
        <hr>
    @else
        <div class="mb-4 h-48 flex justify-center items-center  shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>

    @endif
</div>
