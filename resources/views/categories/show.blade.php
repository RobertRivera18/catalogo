<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <figure class="mb-8">
    <div class="relative w-full aspect-[16/7] overflow-hidden rounded-2xl bg-gray-100 shadow-sm">

        <!-- Imagen -->
        <img 
            class="w-full h-full object-cover object-center transition-transform duration-500 ease-out hover:scale-110"
            src="{{ Storage::url($category->image) }}"
            alt="Categoría {{ $category->name }}"
            loading="lazy"
        >

        <!-- Overlay degradado para mejorar legibilidad -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>

        <!-- Título encima de la imagen (UX moderna) -->
        <div class="absolute bottom-4 left-6">
            <h2 class="text-white text-2xl font-semibold tracking-wide drop-shadow">
                {{ $category->name }}
            </h2>
        </div>

    </div>
</figure>
        @livewire('category-filter', ['category' => $category])
    </div>


</x-app-layout>
