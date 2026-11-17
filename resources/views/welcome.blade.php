<x-app-layout title="Catálogo de Productos">
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-6 py-2 sm:py-6">
        <!-- Slider main container -->
        <div class="swiper relative w-full mb-8">
            <!-- Wrapper de los slides -->
            <div class="swiper-wrapper">
                @foreach ($covers as $cover)
                    <div class="swiper-slide">
                        <img src="{{ $cover->image }}"
                            class="w-full aspect-[16/9] sm:aspect-[21/9] md:aspect-[3/1] object-cover object-center rounded-2xl shadow-md transition-transform duration-300 hover:scale-[1.01]"
                            alt="Cover image">
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="swiper-pagination !bottom-2"></div>

            <div class="swiper-button-prev !hidden md:!flex !text-white drop-shadow-md"></div>
            <div class="swiper-button-next !hidden md:!flex !text-white drop-shadow-md"></div>
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
