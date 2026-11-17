<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <figure class="mb-8">
            <div
                class="relative w-full aspect-[16/9] sm:aspect-[21/9] md:aspect-[3/1] overflow-hidden rounded-3xl bg-slate-900 shadow-xl border border-slate-100/80 group">

                <!-- Fondo ambiental desenfocado (Toma la misma imagen para rellenar los bordes elegante) -->
                <img class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-40 scale-125 select-none pointer-events-none"
                    src="{{ Storage::url($category->image) }}" alt="" aria-hidden="true">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent z-10"></div>

                <div class="relative z-10 w-full h-full p-4 sm:p-6 flex items-center justify-center">
                    <img class="max-h-full max-w-full object-contain object-center drop-shadow-2xl transition-transform duration-700 ease-out group-hover:scale-105"
                        src="{{ Storage::url($category->image) }}" alt="Categoría {{ $category->name }}" loading="lazy">
                </div>

                <div class="absolute bottom-6 left-6 sm:left-8 z-20">
                    <span class="text-[11px] font-semibold tracking-widest text-white/70 uppercase block mb-0.5">
                        Categoría
                    </span>
                    <h1 class="text-white text-2xl sm:text-3xl font-bold tracking-tight drop-shadow-md">
                        {{ $category->name }}
                    </h1>
                </div>

            </div>
        </figure>

        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>
