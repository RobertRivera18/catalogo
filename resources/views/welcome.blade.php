<x-app-layout>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        {{-- <!-- Slider main container -->
        <div class="swiper relative w-full mb-12">
            <!-- Wrapper de los slides -->
            <div class="swiper-wrapper">
                @foreach ($covers as $cover)
                    <div class="swiper-slide">
                        <img src="{{ $cover->image }}"
                            class="w-full aspect-[3/1] object-center object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-105 hover:rounded-lg"
                            alt="Cover image">
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="swiper-pagination !bottom-2"></div>

            <!-- Botones de navegación -->
            <div class="swiper-button-prev !text-white"></div>
            <div class="swiper-button-next !text-white"></div>


        </div> --}}



        {{-- 
        <h2 class="text-2xl">Categorias Destacadas</h2>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-2">
                @foreach ($categories as $category)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-6">
                        <div class="h-80 bg-center bg-cover rounded-lg overflow-hidden shadow-md flex flex-col justify-end p-6 text-white"
                            style="background-image: url('{{ Storage::url($category->image) }}')">

                            <div class="bg-black bg-opacity-50 p-4 rounded">
                                <h2 class="font-bold text-xl mb-2">{{ $category->name ?? 'Categoría' }}</h2>
                                <p>
                                    Get Upto
                                    <span class="font-bold">{{ $category->discount ?? '30%' }}</span>
                                    Off
                                </p>
                                <div class="mt-4">
                                    <a href="{{ route('categories.show', $category) }}"
                                        class="inline-flex items-center gap-x-2 bg-white text-gray-800 px-4 py-2 rounded hover:bg-gray-200 transition">
                                        Ver
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}


        {{-- 
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg  font-bold text-gray-700">{{ $category->name }}</h1>
                    <a class="text-orange-500 ml-2 font-semibold cursor-pointer hover:text-orange-400 hover:underline"
                        href="{{ route('categories.show', $category) }}">Ver más</a>
                </div> --}}

        {{-- @livewire('category-products', ['category' => $category]) --}}
        {{--                 
            </section>
        @endforeach --}}

        @livewire('products-home')
    </div>

    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                loop: true,
                speed: 600,
                effect: 'Cube', // o 'slide', 'cube', 'coverflow', 'flip'
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,

                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true,
                },
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },
                grabCursor: true,
            });
        </script>
    @endpush


</x-app-layout>
