<div>

    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-700">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-gray-800 text-xl leading-tight">
                    Editar Producto
                </h1>

                <x-danger-button wire:click="$emit('deleteProduct')">
                    Eliminar
                </x-danger-button>
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-xl text-center font-semibold mb-8">
            Actualice la información del producto
        </h1>


        <!-- DROPZONE -->
        <div class="mb-6" wire:ignore>
            <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone">
            </form>
        </div>


        <!-- GALERÍA -->
        @if ($product->images->count())

            <section class="bg-white shadow-xl rounded-lg p-6 mb-6">

                <h2 class="text-lg font-semibold text-center mb-4">
                    Imágenes del Producto
                </h2>

                <ul class="flex flex-wrap gap-3">

                    @foreach ($product->images as $image)
                        <li class="relative" wire:key="image-{{ $image->id }}">

                            <img class="w-32 h-20 rounded object-cover" src="{{ Storage::url($image->url) }}">

                            <x-danger-button class="absolute right-1 top-1 px-2 py-1 text-xs"
                                wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-danger-button>

                        </li>
                    @endforeach

                </ul>

            </section>

        @endif


        @livewire('admin.status-product', ['product' => $product], key('status-product-' . $product->id))


        <!-- FORMULARIO -->
        <div class="bg-white rounded-lg shadow-lg p-6">

            <div class="grid grid-cols-2 gap-6 mb-6">

                <!-- CATEGORÍA -->
                <div>
                    <x-label value="Categorías" />

                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="category_id">

                        <option value="" disabled>
                            Seleccione una categoría
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    <x-input-error for="category_id" />

                </div>


                <!-- SUBCATEGORÍA -->
                <div>

                    <x-label value="Subcategorías" />

                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="product.subcategory_id">

                        <option value="" disabled>
                            Seleccione una subcategoría
                        </option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">
                                {{ $subcategory->name }}
                            </option>
                        @endforeach

                    </select>

                    <x-input-error for="product.subcategory_id" />

                </div>

            </div>


            <!-- NOMBRE -->
            <div class="mb-6">

                <x-label value="Nombre" />

                <x-input type="text" class="w-full" wire:model="product.name"
                    placeholder="Ingrese nombre del Producto" />

                <x-input-error for="product.name" />

            </div>


            <!-- SLUG -->
            <div class="mb-6">

                <x-label value="Slug" />

                <x-input type="text" disabled wire:model="slug" class="w-full bg-gray-200" />

                <x-input-error for="slug" />

            </div>


            <!-- DESCRIPCIÓN CON QUILL -->
            <div class="mb-6" wire:ignore>

                <x-label value="Descripción del producto" class="mb-2" />

                <div x-data x-ref="quillEditor" class="bg-white border border-gray-300 rounded-lg"
                    x-init="quill = new Quill($refs.quillEditor, {
                        theme: 'snow',
                        placeholder: 'Escribe la descripción del producto...',
                    });
                    
                    quill.root.innerHTML = @js($product->description ?? '');
                    
                    quill.on('text-change', function() {
                        @this.set('product.description', quill.root.innerHTML);
                    });" style="min-height: 180px;">
                </div>

                <x-input-error for="product.description" />

            </div>


            <!-- MARCA Y PRECIO -->
            <div class="mb-6 grid grid-cols-2 gap-6">

                <div>

                    <x-label value="Marca" />

                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="product.brand_id">

                        <option value="" disabled>
                            Seleccione una Marca
                        </option>

                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>
                        @endforeach

                    </select>

                    <x-input-error for="product.brand_id" />

                </div>


                <div>

                    <x-label value="Precio" />

                    <x-input type="number" class="w-full" step=".01" wire:model="product.price" />

                    <x-input-error for="product.price" />

                </div>

            </div>


            <!-- CANTIDAD -->
            @if ($this->subcategory)

                @if (!$this->subcategory->color && !$this->subcategory->size)
                    <div class="mb-6">

                        <x-label value="Cantidad" />

                        <x-input type="number" class="w-full" wire:model="product.quantity" />

                        <x-input-error for="product.quantity" />

                    </div>
                @endif

            @endif

            <!-- ESPECIFICACIONES -->
            <div class="mb-6">

                <div class="flex justify-between items-center mb-2">
                    <x-label value="Especificaciones del producto" />

                    <button type="button" wire:click="addSpecification"
                        class="text-sm bg-indigo-500 text-white px-3 py-1 rounded-lg hover:bg-indigo-600">
                        + Agregar
                    </button>
                </div>

                <div class="space-y-3">

                    @foreach ($specifications as $index => $spec)
                        <div class="flex gap-2 items-center">

                            <input type="text" wire:model.defer="specifications.{{ $index }}.name"
                                placeholder="Ej: Voltaje" class="w-1/2 border-gray-300 rounded-lg shadow-sm">

                            <input type="text" wire:model.defer="specifications.{{ $index }}.value"
                                placeholder="Ej: 220V" class="w-1/2 border-gray-300 rounded-lg shadow-sm">

                            <button type="button" wire:click="removeSpecification({{ $index }})"
                                class="text-red-500 text-lg hover:text-red-700">
                                ✕
                            </button>

                        </div>
                    @endforeach

                </div>

            </div>
            {{-- ===================== ACCESORIOS ===================== --}}
            <div class="bg-white rounded-lg shadow-lg p-6 mt-6">

                <h2 class="text-lg font-semibold text-gray-800 mb-4">Accesorios del Producto</h2>

                @foreach (['included' => 'Accesorios Incluídos', 'optional' => 'Accesorios Opcionales'] as $type => $label)
                    <div class="mb-8">

                        {{-- Título + botón agregar --}}
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="font-semibold text-gray-700">{{ $label }}</h3>
                            <button type="button" wire:click="addAccessory('{{ $type }}')"
                                class="text-sm bg-indigo-500 text-white px-3 py-1 rounded-lg hover:bg-indigo-600">
                                + Agregar
                            </button>
                        </div>

                        {{-- Accesorios ya guardados en BD --}}
                        @if ($product->accessories->where('type', $type)->count())
                            <div class="flex flex-wrap gap-3 mb-4">
                                @foreach ($product->accessories->where('type', $type) as $acc)
                                    <div class="relative border rounded-lg p-2 text-center w-28"
                                        wire:key="acc-{{ $acc->id }}">

                                        @if ($acc->image)
                                            <img src="{{ Storage::url($acc->image) }}"
                                                class="w-20 h-16 object-cover rounded mx-auto mb-1">
                                        @endif

                                        <p class="text-xs text-gray-600 truncate">{{ $acc->name }}</p>

                                        <button type="button" wire:click="deleteAccessory({{ $acc->id }})"
                                            class="absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-700">
                                            ✕
                                        </button>

                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Filas nuevas (aún no guardadas) --}}
                        <div class="space-y-2">
                            @foreach ($newAccessories[$type] as $index => $item)
                                <div class="flex gap-2 items-center"
                                    wire:key="new-{{ $type }}-{{ $index }}">

                                    <input type="text"
                                        wire:model.defer="newAccessories.{{ $type }}.{{ $index }}.name"
                                        placeholder="Nombre del accesorio"
                                        class="w-1/2 border-gray-300 rounded-lg shadow-sm text-sm">

                                    <input type="file"
                                        wire:model="accessoryImages.{{ $type }}.{{ $index }}"
                                        accept="image/*" class="w-1/2 border-gray-300 rounded-lg shadow-sm text-sm">

                                    <button type="button"
                                        wire:click="removeNewAccessory('{{ $type }}', {{ $index }})"
                                        class="text-red-500 hover:text-red-700 text-lg">
                                        ✕
                                    </button>

                                </div>

                                {{-- Preview de imagen temporal --}}
                                @if (!empty($accessoryImages[$type][$index]))
                                    <img src="{{ $accessoryImages[$type][$index]->temporaryUrl() }}"
                                        class="w-20 h-16 object-cover rounded mt-1 ml-1">
                                @endif
                            @endforeach
                        </div>

                    </div>
                @endforeach

                {{-- Botón guardar accesorios --}}
                @if (count($newAccessories['included']) || count($newAccessories['optional']))
                    <div class="flex justify-end mt-2">
                        <x-action-message class="mr-3" on="accessoriesSaved">
                            Accesorios guardados ✓
                        </x-action-message>

                        <x-button wire:click="saveAccessories" wire:loading.attr="disabled"
                            wire:target="saveAccessories">
                            Guardar Accesorios
                        </x-button>
                    </div>
                @endif

            </div>
            <!-- BOTÓN -->
            <div class="flex mt-6 justify-end items-center">

                <x-action-message class="mr-3" on="saved">
                    Actualizado
                </x-action-message>

                <x-button wire:target="save" wire:loading.attr="disabled" wire:click="save">

                    Actualizar Producto

                </x-button>

            </div>

        </div>


        <!-- VARIACIONES -->
        @if ($this->subcategory)

            @if ($this->subcategory->size)
                @livewire('admin.size-product', ['product' => $product], key('size-product-' . $product->id))
            @elseif($this->subcategory->color)
                @livewire('admin.color-product', ['product' => $product], key('color-product-' . $product->id))
            @endif

        @endif


    </div>


    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {

                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },

                dictDefaultMessage: "Arrastre una imagen al recuadro",

                acceptedFiles: 'image/*',

                paramName: "file",

                maxFilesize: 2,

                complete: function(file) {
                    this.removeFile(file);
                },

                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }

            };


            Livewire.on('deleteProduct', () => {
                swal.fire({
                        title: '¿Eliminar producto?',
                        text: 'Esta acción no se puede deshacer.',
                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: '<i class="fas fa-trash-alt mr-2"></i> Sí, eliminar',
                        cancelButtonText: '<i class="fas fa-times mr-2"></i> Cancelar',

                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',

                        reverseButtons: true,
                        focusCancel: true,

                        background: '#ffffff',
                        backdrop: `
        rgba(0,0,0,0.6)
        left top
        no-repeat
    `,

                        customClass: {
                            popup: 'rounded-xl shadow-xl',
                            confirmButton: 'px-4 py-2 rounded-lg',
                            cancelButton: 'px-4 py-2 rounded-lg'
                        }
                    })

                    .then((result) => {

                        if (result.isConfirmed) {

                            Livewire.emitTo('admin.edit-product', 'delete');

                            Swal.fire(
                                'Eliminado!',
                                'Este elemento ha sido eliminado exitosamente.',
                                'success'
                            )

                        }

                    })

            })
        </script>
    @endpush

</div>
