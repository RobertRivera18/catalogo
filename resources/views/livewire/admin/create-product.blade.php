<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="bg-white shadow-lg rounded-2xl border border-gray-100 p-8">

        <!-- Título -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 text-center">
                Crear nuevo producto
            </h1>
            <p class="text-sm text-gray-500 text-center mt-1">
                Complete la información para registrar un nuevo producto
            </p>
        </div>

        <!-- Categorías -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

            <div>
                <x-label value="Categoría" class="mb-1"/>
                <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    wire:model="category_id">

                    <option value="" selected disabled>Seleccione una categoría</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

                <x-input-error for="category_id" />
            </div>

            <div>
                <x-label value="Subcategoría" class="mb-1"/>

                <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    wire:model="subcategory_id">

                    <option value="" selected disabled>Seleccione una subcategoría</option>

                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
                    @endforeach

                </select>

                <x-input-error for="subcategory_id" />
            </div>

        </div>

        <!-- Nombre -->
        <div class="mb-6">
            <x-label value="Nombre del producto" class="mb-1"/>
            <x-input type="text"
                class="w-full"
                wire:model="name"
                placeholder="Ej: Laptop Lenovo IdeaPad 3" />

            <x-input-error for="name" />
        </div>

        <!-- Slug -->
        <div class="mb-6">
            <x-label value="Slug (URL del producto)" class="mb-1"/>
            <x-input type="text"
                wire:model="slug"
                class="w-full bg-gray-100"
                placeholder="ejemplo-producto" />

            <x-input-error for="slug" />
        </div>

        <!-- Descripción -->
        <div class="mb-6" wire:ignore>
            <x-label value="Descripción del producto" class="mb-2"/>

            <div x-data x-ref="quillEditor" class="bg-white border border-gray-300 rounded-lg"
                x-init="quill = new Quill($refs.quillEditor, {
                    theme: 'snow',
                    placeholder: 'Escribe la descripción del producto...',
                });

                quill.root.innerHTML = @js($description ?? '');

                quill.on('text-change', function() {
                    @this.set('description', quill.root.innerHTML);
                });"

                style="min-height: 180px;">
            </div>

            <x-input-error for="description" />
        </div>

        <!-- Marca y Precio -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

            <div>
                <x-label value="Marca" class="mb-1"/>

                <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    wire:model="brand_id">

                    <option value="" selected disabled>Seleccione una marca</option>

                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">
                            {{ $brand->name }}
                        </option>
                    @endforeach

                </select>

                <x-input-error for="brand_id" />
            </div>

            <div>
                <x-label value="Precio ($)" class="mb-1"/>

                <x-input type="number"
                    class="w-full"
                    step=".01"
                    wire:model="price"
                    placeholder="0.00"/>

                <x-input-error for="price" />
            </div>

        </div>

        <!-- Cantidad -->
        @if ($subcategory_id)

            @if (!$this->subcategory->color && !$this->subcategory->size)

                <div class="mb-6">
                    <x-label value="Cantidad disponible" class="mb-1"/>
                    <x-input type="number"
                        class="w-full"
                        wire:model="quantity"
                        placeholder="Cantidad en inventario"/>

                    <x-input-error for="quantity" />
                </div>

            @endif

        @endif

        <!-- Botón -->
        <div class="flex justify-end pt-4 border-t border-gray-100">

            <x-button
                class="px-6 py-2 text-sm font-semibold"
                wire:target="save"
                wire:loading.attr="disabled"
                wire:click="save">

                Crear producto

            </x-button>

        </div>

    </div>

</div>