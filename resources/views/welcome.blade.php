<x-app-layout title="Teinsersa - Catálogo de Productos">
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
         <!-- Slider main container -->
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


        </div>


        @livewire('products-home')
    </div>

    @push('script')
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
