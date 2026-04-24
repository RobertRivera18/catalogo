<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <style>
            .thumbSwiper .swiper-slide {
                transition: all .25s ease;
            }

            .thumbSwiper .swiper-slide-thumb-active {
                border-color: #e2e6ed;
                transform: scale(1.05);
                border-radius: 10px;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 14px;
                font-weight: bold;
            }
        </style>
    @endpush

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-24">

        {{-- ─── BREADCRUMB ─── --}}
        <nav class="mb-8" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-2 text-xs text-gray-500">
                <li>
                    <a href="/"
                        class="flex items-center gap-1.5 text-gray-500 hover:text-gray-900 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Inicio
                    </a>
                </li>
                <li class="text-gray-300">›</li>
                <li>
                    <a href="{{ route('categories.show', $product->subcategory->category->slug) }}"
                        class="hover:text-gray-900 transition-colors">
                        {{ $product->subcategory->category->name }}
                    </a>
                </li>
                <li class="text-gray-300">›</li>
                <li class="text-gray-900 font-medium truncate max-w-[180px]" aria-current="page">
                    {{ $product->subcategory->name }}
                </li>
            </ol>
        </nav>

        {{-- ─── GRID PRINCIPAL ─── --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14">

            {{-- ══════ GALERÍA ══════ --}}
            <div class="lg:sticky lg:top-6 self-start">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-md p-4">

                    <!-- SLIDER PRINCIPAL -->
                    <div class="relative">
                        <span
                            class="absolute top-4 left-4 z-20 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                            −25% OFF
                        </span>

                        <div class="swiper mainSwiper rounded-xl overflow-hidden">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide flex items-center justify-center bg-gray-100 h-[420px]">
                                        <img src="{{ Storage::url($image->url) }}" class="max-h-[360px] object-contain"
                                            alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next !text-white !w-10 !h-10 !bg-black/60 rounded-full"></div>
                            <div class="swiper-button-prev !text-white !w-10 !h-10 !bg-black/60 rounded-full"></div>
                        </div>
                    </div>

                    <!-- THUMBNAILS -->
                    <div class="swiper thumbSwiper mt-3">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $image)
                                <div
                                    class="swiper-slide cursor-pointer border-2 border-transparent rounded-xl overflow-hidden">
                                    <img src="{{ Storage::url($image->url) }}"
                                        class="h-[70px] w-full object-contain bg-gray-100 p-2">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            {{-- ══════ INFO DEL PRODUCTO ══════ --}}
            <div class="flex flex-col gap-5">

                {{-- Card principal --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col gap-5">

                    {{-- Badges: categoría + estado --}}
                    <div class="flex items-center justify-between flex-wrap gap-2">
                        <span
                            class="text-[11px] font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200 px-3 py-1 rounded-full tracking-wide">
                            {{ $product->subcategory->name }}
                        </span>

                        @if ($product->status == 2)
                            <span
                                class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Disponible
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-gray-500 bg-gray-100 border border-gray-200 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                No disponible
                            </span>
                        @endif
                    </div>

                    {{-- Nombre --}}
                    <h1 class="text-2xl font-bold text-gray-900 leading-snug tracking-tight">
                        {{ $product->name }}
                    </h1>

                    {{-- Marca + Rating --}}
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pb-5 border-b border-gray-100">
                        <p class="text-sm text-gray-500">
                            Marca:
                            <span class="text-orange-600 font-bold uppercase tracking-wide ml-1">
                                {{ $product->brand->name }}
                            </span>
                        </p>

                        @php
                            $avg = round($product->reviews->avg('rating') ?? 5, 1);
                            $count = $product->reviews->count();
                        @endphp

                        <div
                            class="inline-flex items-center gap-2 bg-amber-50 border border-amber-200 px-3 py-1.5 rounded-full">
                            <div class="flex items-center gap-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-3 h-3 {{ $avg >= $i ? 'text-amber-400' : 'text-gray-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-xs font-bold text-gray-700">{{ number_format($avg, 1) }}</span>
                            <span class="text-xs text-gray-400">({{ $count }}
                                {{ $count === 1 ? 'reseña' : 'reseñas' }})</span>
                        </div>
                    </div>

                    {{-- Precio --}}
                    <div
                        class="flex items-center justify-between bg-gray-50 rounded-xl px-5 py-4 border border-gray-100">
                        <div>
                            <p class="text-xs text-gray-400 line-through mb-0.5">
                                ${{ number_format($product->price * 1.25, 2) }}
                            </p>
                            <p class="text-3xl font-black text-gray-900 tracking-tight">
                                ${{ number_format($product->price, 2) }}
                            </p>
                        </div>
                        <span
                            class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-full whitespace-nowrap">
                            Ahorras ${{ number_format($product->price * 0.25, 2) }}
                        </span>
                    </div>
                    @livewire('add-cart-item', ['product' => $product])
                    <div class="flex space-x-2">
                        @livewire('download-p-d-f', ['product' => $product])
                        <a href="https://wa.me/593997433070?text={{ urlencode('Hola, estoy interesado en: ' . $product->name . ' — ' . url()->current()) }}"
                            target="_blank"
                            class="flex items-center justify-center gap-2.5 bg-[#25D366] hover:bg-[#1ebe5d] active:scale-[.98] text-white font-semibold text-sm py-3.5 px-5 rounded-xl transition-all duration-150 shadow-sm">
                            <svg class="w-5 h-5 fill-white shrink-0" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            Consultar por WhatsApp
                        </a>
                    </div>
                    {{-- CTA WhatsApp --}}


                </div>

                {{-- ─── TABS ─── --}}
                <div x-data="{ tab: 'descripcion' }"
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                    {{-- Nav --}}
                    <div class="flex border-b border-gray-100">
                        <button @click="tab = 'descripcion'"
                            :class="tab === 'descripcion' ? 'border-b-2 border-gray-900 text-gray-900 font-semibold' :
                                'text-gray-400 hover:text-gray-600 border-b-2 border-transparent'"
                            class="flex-1 flex items-center justify-center gap-2 text-sm py-3.5 px-4 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Descripción
                        </button>
                        <button @click="tab = 'specs'"
                            :class="tab === 'specs' ? 'border-b-2 border-gray-900 text-gray-900 font-semibold' :
                                'text-gray-400 hover:text-gray-600 border-b-2 border-transparent'"
                            class="flex-1 flex items-center justify-center gap-2 text-sm py-3.5 px-4 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Especificaciones
                        </button>
                    </div>

                    {{-- Tab: Descripción --}}
                    <div x-show="tab === 'descripcion'" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="p-5 prose prose-sm max-w-none
                               prose-p:text-gray-600 prose-p:text-sm prose-p:leading-relaxed prose-p:my-1.5
                               prose-li:text-gray-600 prose-li:text-sm prose-li:my-0
                               prose-h1:text-base prose-h2:text-sm prose-h3:text-sm
                               prose-ul:my-1.5 prose-ol:my-1.5">
                        {!! $product->description !!}
                    </div>

                    {{-- Tab: Especificaciones --}}
                    <div x-show="tab === 'specs'" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="p-5">
                        <table class="w-full text-sm">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="py-2.5 pr-4 text-gray-400 w-2/5">SKU</td>
                                    <td class="py-2.5 text-gray-900 font-medium text-right">{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 pr-4 text-gray-400">Marca</td>
                                    <td class="py-2.5 text-gray-900 font-medium text-right capitalize">
                                        {{ $product->brand->name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2.5 pr-4 text-gray-400">Categoría</td>
                                    <td class="py-2.5 text-gray-900 font-medium text-right">
                                        {{ $product->subcategory->category->name }}</td>
                                </tr>

                                @if ($product->specifications->count())
                                    <tr>
                                        <td colspan="2" class="pt-5 pb-1">
                                            <span
                                                class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                                Especificaciones técnicas
                                            </span>
                                        </td>
                                    </tr>
                                    @foreach ($product->specifications as $spec)
                                        <tr>
                                            <td class="py-2.5 pr-4 text-gray-400">{{ $spec->name }}</td>
                                            <td class="py-2.5 text-gray-900 font-medium text-right">
                                                {{ $spec->value }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

        {{-- ═══════════════════════════════════════════
             ACCESORIOS
        ═══════════════════════════════════════════ --}}
        @if ($product->accessories->count())
            <div class="mt-10 space-y-5">

                @if ($product->includedAccessories->count())
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="flex items-center gap-2.5 px-5 py-3.5 border-b border-gray-100">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-gray-700">Accesorios incluídos
                            </h3>
                        </div>
                        <div class="p-5 flex flex-wrap gap-4">
                            @foreach ($product->includedAccessories as $acc)
                                <div class="flex flex-col items-center gap-2 w-20 group">
                                    <div
                                        class="w-16 h-16 rounded-xl border-2 border-emerald-200 bg-gray-50 flex items-center justify-center overflow-hidden group-hover:border-emerald-400 transition-colors">
                                        @if ($acc->image)
                                            <img src="{{ Storage::url($acc->image) }}" alt="{{ $acc->name }}"
                                                class="w-full h-full object-contain p-1">
                                        @else
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <span
                                        class="text-[10px] font-semibold text-gray-600 text-center uppercase leading-tight tracking-wide">
                                        {{ $acc->name }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if ($product->optionalAccessories->count())
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="flex items-center gap-2.5 px-5 py-3.5 border-b border-gray-100">
                            <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                            <h3 class="text-xs font-bold uppercase tracking-widest text-gray-500">Accesorios opcionales
                            </h3>
                        </div>
                        <div class="p-5 flex flex-wrap gap-4">
                            @foreach ($product->optionalAccessories as $acc)
                                <div class="flex flex-col items-center gap-2 w-20 group">
                                    <div
                                        class="w-16 h-16 rounded-xl border-2 border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden group-hover:border-gray-400 transition-colors">
                                        @if ($acc->image)
                                            <img src="{{ Storage::url($acc->image) }}" alt="{{ $acc->name }}"
                                                class="w-full h-full object-contain p-1">
                                        @else
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <span
                                        class="text-[10px] font-semibold text-gray-400 text-center uppercase leading-tight tracking-wide">
                                        {{ $acc->name }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        @endif

        {{-- ═══════════════════════════════════════════
             PRODUCTOS RELACIONADOS
        ═══════════════════════════════════════════ --}}
        @if ($relacionados->count())
            <div class="mt-10">

                <div class="flex items-center justify-between mb-5">
                    <h3 class="flex items-center gap-2.5 text-sm font-bold uppercase tracking-widest text-gray-700">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                        Productos relacionados
                    </h3>
                    <a href="{{ route('categories.show', $product->subcategory->category->slug) }}"
                        class="text-xs text-indigo-600 hover:text-indigo-800 transition-colors">
                        Ver todos →
                    </a>
                </div>

                <div class="swiper relatedSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($relacionados as $related)
                            <div class="swiper-slide pb-2">

                                <div
                                    class="group flex flex-col bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-200 h-full">

                                    {{-- Imagen --}}
                                    <a href="{{ route('products.show', $related->slug) }}" class="block">
                                        <div class="h-[130px] flex items-center justify-center bg-gray-50 p-3">
                                            @if ($related->images->first())
                                                <img src="{{ Storage::url($related->images->first()->url) }}"
                                                    alt="{{ $related->name }}"
                                                    class="max-h-[110px] object-contain transition-transform duration-300 group-hover:scale-105">
                                            @else
                                                <svg class="w-10 h-10 text-gray-200" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>
                                            @endif
                                        </div>
                                    </a>

                                    {{-- Info --}}
                                    <a href="{{ route('products.show', $related->slug) }}"
                                        class="p-3 flex flex-col gap-1.5 flex-1">
                                        <span
                                            class="text-[10px] font-semibold text-indigo-700 bg-indigo-50 border border-indigo-200 px-2 py-0.5 rounded-full w-fit">
                                            {{ $related->subcategory->name }}
                                        </span>
                                        <p class="text-xs font-medium text-gray-800 leading-snug line-clamp-2">
                                            {{ $related->name }}
                                        </p>
                                        <p class="text-sm font-black text-gray-900 mt-auto pt-1">
                                            ${{ number_format($related->price, 2) }}
                                        </p>
                                    </a>

                                    {{-- CTA WhatsApp --}}
                                    <div class="px-3 pb-3 pt-1">
                                        <a href="https://wa.me/593997433070?text={{ urlencode('Hola, me interesa: ' . $related->name . ' — ' . route('products.show', $related->slug)) }}"
                                            target="_blank"
                                            class="flex items-center justify-center gap-1.5 bg-[#25D366] hover:bg-[#1ebe5d] active:scale-[.98] text-white text-[10px] font-semibold py-2 rounded-xl transition-all duration-150 w-full">
                                            <svg class="w-3.5 h-3.5 fill-white shrink-0" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                            </svg>
                                            Consultar
                                        </a>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @endif

    </div>


    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const thumbs = new Swiper(".thumbSwiper", {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    freeMode: true,
                    watchSlidesProgress: true,
                    preloadImages: false,
                    lazy: true,
                    breakpoints: {
                        640: {
                            slidesPerView: 5
                        },
                        1024: {
                            slidesPerView: 6
                        },
                    }
                });

                const main = new Swiper(".mainSwiper", {
                    spaceBetween: 10,
                    loop: true,
                    preloadImages: false,
                    lazy: {
                        loadPrevNext: true
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    thumbs: {
                        swiper: thumbs
                    }
                });

                new Swiper(".relatedSwiper", {
                    spaceBetween: 12,
                    slidesPerView: 2,
                    breakpoints: {
                        640: {
                            slidesPerView: 3
                        },
                        1024: {
                            slidesPerView: 4
                        },
                    }
                });

            });
        </script>
    @endpush

</x-app-layout>
