<x-app-layout>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <style>
            /* Animaciones personalizadas */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeInUp {
                animation: fadeInUp 0.6s ease-out;
            }

            /* Contenedor flexslider */
            .flexslider {
                border: none !important;
                box-shadow: none !important;
                background: transparent !important;
                overflow: visible !important;
                /* evita que las flechas se corten */
            }

            /* Imagen principal */
            .flexslider .slides img {
                border-radius: 1rem !important;
            }

            /* Flechas navegación */
            .flex-direction-nav a {
                width: 40px;
                height: 40px;
                border-radius: 9999px;
                background: rgba(0, 0, 0, 0.6);
                color: white !important;
                display: flex !important;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                transition: all .25s ease;
                backdrop-filter: blur(4px);
                box-shadow: 0 4px 10px rgba(0, 0, 0, .2);
            }

            /* Hover flechas */
            .flex-direction-nav a:hover {
                background: rgba(0, 0, 0, 0.8);
            }

            /* Posición flechas */
            .flex-direction-nav .flex-prev {
                left: 10px !important;
            }

            .flex-direction-nav .flex-next {
                right: 10px !important;
            }

            /* Miniaturas */
            .flex-control-thumbs {
                margin-top: 1rem !important;
                gap: 0.5rem;
            }

            /* Cada miniatura */
            .flex-control-thumbs li {
                border-radius: 0.5rem !important;
                overflow: hidden;
                border: 2px solid transparent !important;
                transition: all 0.3s ease;
            }

            /* Hover miniatura */
            .flex-control-thumbs li:hover {
                border-color: #9ca3af !important;
            }

            /* Miniatura activa */
            .flex-control-thumbs li.flex-active {
                border-color: #111827 !important;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important;
            }

            /* Contenedor de la imagen principal */
            .flexslider .slides li {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 420px;
                background: #f9fafb;
                border-radius: 1rem;
            }

            /* Imagen principal */
            .flexslider .slides img {
                max-height: 360px;
                width: auto;
                object-fit: contain;
            }

            /* Miniaturas */
            .flex-control-thumbs img {
                height: 70px !important;
                object-fit: contain;
                background: #f9fafb;
                padding: 2px;
            }
        </style>
    @endpush

    <x-container class="px-4 py-4">
        {{-- Breadcrumb Mejorado --}}
        <nav class="mb-8 animate-fadeInUp" aria-label="Breadcrumb">
            <ol
                class="flex flex-wrap items-center gap-2 text-sm bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100">
                <li class="flex items-center">
                    <a href="/"
                        class="flex items-center gap-2 text-gray-600 hover:text-orange-500 transition-colors group">
                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        <span class="font-medium">Inicio</span>
                    </a>
                </li>

                <li class="text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('categories.show', $product->subcategory->category->slug) }}"
                        class="text-gray-600 hover:text-orange-500 transition-colors font-medium">
                        {{ $product->subcategory->category->name }}
                    </a>
                </li>

                <li class="text-gray-400">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </li>

                <li class="text-gray-500 font-medium truncate max-w-[200px]" aria-current="page">
                    {{ $product->subcategory->name }}
                </li>
            </ol>
        </nav>
        
    </x-container>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            {{-- Galería de Imágenes Mejorada --}}
            <div class="animate-fadeInUp">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 sticky top-6">

                    <div class="flexslider relative">

                        <ul class="slides">

                            @foreach ($product->images as $image)
                                <li data-thumb="{{ Storage::url($image->url) }}">

                                    <div
                                        class="relative h-[420px] bg-gray-50 rounded-xl flex items-center justify-center">

                                        <img src="{{ Storage::url($image->url) }}"
                                            alt="Imagen del producto {{ $product->name }}"
                                            class="max-h-full max-w-full object-contain rounded-lg">

                                    </div>

                                </li>
                            @endforeach

                        </ul>

                    </div>

                    {{-- Badge descuento --}}
                    <div
                        class="absolute top-6 right-6 bg-red-500 text-white px-3 py-1.5 rounded-full shadow-md font-semibold text-xs">
                        -25% OFF
                    </div>

                </div>
            </div>

            {{-- Información del Producto Mejorada --}}
            <div class="animate-fadeInUp space-y-6">
                {{-- Header del producto --}}
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    {{-- Categoría y Estado --}}
                    <div class="flex items-center justify-between mb-4">
                        <span
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700 text-xs font-bold px-3 py-1.5 rounded-full border border-indigo-200">
                            <i class="fas fa-tag"></i>
                            {{ $product->subcategory->name }}
                        </span>

                        <span
                            class="inline-flex items-center gap-2 text-sm font-semibold px-3 py-1.5 rounded-full {{ $product->status == 2 ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-50 text-gray-700 border border-gray-200' }}">
                            <span
                                class="w-2 h-2 rounded-full {{ $product->status == 2 ? 'bg-green-500 animate-pulse' : 'bg-gray-500' }}"></span>
                            {{ $product->status == 2 ? 'Disponible' : 'No disponible' }}
                        </span>
                    </div>

                    {{-- Nombre del producto --}}
                    <h1 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $product->name }}
                    </h1>

                    {{-- Marca y Rating --}}
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-gray-200">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 font-medium">Marca:</span>
                            <a href="#"
                                class="text-orange-600 hover:text-orange-700 font-bold capitalize underline decoration-2 underline-offset-2 transition-colors">
                                {{ $product->brand->name }}
                            </a>
                        </div>

                        @php
                            $averageRating = round($product->reviews->avg('rating') ?? 5, 1);
                            $reviewCount = $product->reviews->count();
                        @endphp

                        <div class="flex items-center gap-3 bg-amber-50 px-4 py-2 rounded-full border border-amber-200">
                            <div class="flex items-center gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                        class="fas fa-star text-sm {{ $averageRating >= $i ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                            <span class="text-sm font-bold text-gray-700">
                                {{ number_format($averageRating, 1) }}
                            </span>
                            <span class="text-sm text-gray-600">
                                ({{ $reviewCount }} {{ $reviewCount === 1 ? 'reseña' : 'reseñas' }})
                            </span>
                        </div>
                    </div>

                    {{-- Precios --}}
                    <div class="py-3">
                        <div class="flex items-end gap-4">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Precio anterior:</p>
                                <span class="text-2xl line-through text-gray-400 font-medium">
                                    ${{ number_format($product->price + $product->price * 0.25, 2) }}
                                </span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-green-600 font-semibold mb-1">¡Ahorra 25%!</p>
                                <span
                                    class="text-3xl font-black bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>

                        </div>
                        
                    </div>
                    {{-- <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        @if ($product->subcategory->size)
                            @livewire('add-cart-item-size', ['product' => $product])
                        @elseif ($product->subcategory->color)
                            @livewire('add-cart-item-color', ['product' => $product])
                        @else
                            @livewire('add-cart-item', ['product' => $product])
                        @endif
                    </div> --}}
                    <a 
    href="https://wa.me/593997433070?text={{ urlencode('Hola, estoy interesado en este producto: ' . $product->name . ' ' . url()->current()) }}" 
    target="_blank"
    class="flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition">

    <i class="fab fa-whatsapp text-lg"></i>
    Consultar por WhatsApp
</a>
                </div>

                {{-- Componente de agregar al carrito --}}


                {{-- Información adicional --}}
                {{-- <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-200 p-6">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-shield-alt text-blue-600"></i>
                        Garantía y Seguridad
                    </h3>
                    <ul class="space-y-3 text-sm text-gray-700">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Garantía de 30 días</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-truck text-blue-500"></i>
                            <span>Envío gratuito en compras mayores a $50</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-lock text-orange-500"></i>
                            <span>Pago 100% seguro</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-undo text-purple-500"></i>
                            <span>Devoluciones fáciles</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

                {{-- Tabs Mejorados --}}
                <div x-data="{ activeTab: 'description' }" class="mt-12 mb-10">
                    {{-- Navegación de tabs --}}
                    <div class="bg-white rounded-t-2xl shadow-lg border border-gray-100 border-b-0">
                        <ul class="flex flex-wrap gap-2 p-4" role="tablist">
                            <li role="presentation">
                                <button @click="activeTab = 'description'"
                                    :class="activeTab === 'description'
                                        ?
                                        'bg-gray-900 text-white shadow-md' :
                                        'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-semibold transition-all duration-200 active:scale-95"
                                    type="button">

                                    <i class="fas fa-info-circle"></i>
                                    <span>Descripción</span>

                                </button>
                            </li>

                            <li role="presentation">
                                <button @click="activeTab = 'specs'"
                                    :class="activeTab === 'specs'
                                        ?
                                        'bg-gray-900 text-white shadow-md' :
                                        'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-semibold transition-all duration-200 active:scale-95"
                                    type="button">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span>Especificaciones</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    {{-- Contenido de tabs --}}
                    <div class="bg-white rounded-b-2xl shadow-lg border border-gray-100 border-t-0 p-4">
                        {{-- Tab: Descripción --}}
                        <div x-show="activeTab === 'description'" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            class="prose prose-sm max-w-none
    prose-p:text-sm
    prose-li:text-sm
    prose-h1:text-base
    prose-h2:text-sm
    prose-h3:text-sm
    prose-p:my-1
    prose-ul:my-1
    prose-li:my-0">

                            {!! $product->description !!}

                        </div>




                        {{-- Tab: Especificaciones --}}
                        <div x-show="activeTab === 'specs'" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100">

                            <div class="grid md:grid-cols-2 gap-4">

                                <!-- Información del producto -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">

                                    <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                                        <i class="fas fa-box text-blue-500 text-sm"></i>
                                        Información del Producto
                                    </h4>

                                    <dl class="space-y-2 text-sm">

                                        <div class="flex justify-between items-center py-1 border-b border-gray-200">
                                            <dt class="text-gray-500">SKU</dt>
                                            <dd class="text-gray-900 font-medium">{{ $product->id }}</dd>
                                        </div>

                                        <div class="flex justify-between items-center py-1 border-b border-gray-200">
                                            <dt class="text-gray-500">Marca</dt>
                                            <dd class="text-gray-900 font-medium capitalize">
                                                {{ $product->brand->name }}
                                            </dd>
                                        </div>

                                        <div class="flex justify-between items-center py-1 border-b border-gray-200">
                                            <dt class="text-gray-500">Categoría</dt>
                                            <dd class="text-gray-900 font-medium">
                                                {{ $product->subcategory->category->name }}
                                            </dd>
                                        </div>



                                    </dl>

                                </div>


                                <!-- Envío -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">

                                    <h4 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                                        <i class="fas fa-truck text-green-500 text-sm"></i>
                                        Envío y Entrega
                                    </h4>

                                    <ul class="space-y-2 text-sm text-gray-600">

                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check text-green-500 mt-1 text-xs"></i>
                                            <span>Envío estándar: 3-5 días hábiles</span>
                                        </li>

                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check text-green-500 mt-1 text-xs"></i>
                                            <span>Envío express: 1-2 días hábiles</span>
                                        </li>

                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check text-green-500 mt-1 text-xs"></i>
                                            <span>Envío gratis en compras mayores a $50</span>
                                        </li>

                                        <li class="flex items-start gap-2">
                                            <i class="fas fa-check text-green-500 mt-1 text-xs"></i>
                                            <span>Rastreo del pedido disponible</span>
                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @push('script')
                <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor.create(document.querySelector('#editor'), {
                        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                        heading: {
                            options: [{
                                    model: 'paragraph',
                                    title: 'Párrafo',
                                    class: 'ck-heading_paragraph'
                                },
                                {
                                    model: 'heading1',
                                    view: 'h1',
                                    title: 'Encabezado 1',
                                    class: 'ck-heading_heading1'
                                },
                                {
                                    model: 'heading2',
                                    view: 'h2',
                                    title: 'Encabezado 2',
                                    class: 'ck-heading_heading2'
                                }
                            ]
                        }
                    }).catch(error => console.log(error));
                </script>
                <script>
                    $(document).ready(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails",
                            slideshow: false,
                            animationSpeed: 400,
                            directionNav: true,
                        });
                    });
                </script>
            @endpush
</x-app-layout>
