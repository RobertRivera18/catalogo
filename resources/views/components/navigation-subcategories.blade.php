@props(['category'])

<div class="grid grid-cols-1 md:grid-cols-4 p-4 gap-4">
    {{-- Subcategorías --}}
    <div class="md:col-span-1">
        <p class="text-md font-bold text-left text-gray-900 mb-2">Subcategorías</p>
        <hr>
        <ul class="space-y-1">
            @foreach($category->subcategories as $subcategory)
                <li class="text-left">
                    <a href="{{ route('categories.show', $category) . '?subcategoria=' . $subcategory->slug }}"
                       class="block text-zinc-500 font-semibold text-sm hover:text-orange-500">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Imagen: solo en escritorio --}}
    <div class="col-span-3 hidden md:block">
        <img src="{{ Storage::url($category->image) }}"
             class="bg-gray-800 h-64 w-full object-cover object-center rounded-lg"
             alt="">
    </div>
</div>
