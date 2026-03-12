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
        <form action="{{route('admin.products.files', $product)}}" 
              method="POST"
              class="dropzone"
              id="my-awesome-dropzone">
        </form>
    </div>


    <!-- GALERÍA -->
    @if($product->images->count())

    <section class="bg-white shadow-xl rounded-lg p-6 mb-6">

        <h2 class="text-lg font-semibold text-center mb-4">
            Imágenes del Producto
        </h2>

        <ul class="flex flex-wrap gap-3">

            @foreach($product->images as $image)

            <li class="relative" wire:key="image-{{$image->id}}">

                <img
                    class="w-32 h-20 rounded object-cover"
                    src="{{Storage::url($image->url)}}"
                >

                <x-danger-button
                    class="absolute right-1 top-1 px-2 py-1 text-xs"
                    wire:click="deleteImage({{$image->id}})"
                    wire:loading.attr="disabled"
                    wire:target="deleteImage({{$image->id}})">
                    x
                </x-danger-button>

            </li>

            @endforeach

        </ul>

    </section>

    @endif


    @livewire('admin.status-product',['product'=>$product],key('status-product-'.$product->id))


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
                        <option value="{{$category->id}}">
                            {{$category->name}}
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

                        <option value="{{$subcategory->id}}">
                            {{$subcategory->name}}
                        </option>

                    @endforeach

                </select>

                <x-input-error for="product.subcategory_id" />

            </div>

        </div>


        <!-- NOMBRE -->
        <div class="mb-6">

            <x-label value="Nombre" />

            <x-input
                type="text"
                class="w-full"
                wire:model="product.name"
                placeholder="Ingrese nombre del Producto"
            />

            <x-input-error for="product.name" />

        </div>


        <!-- SLUG -->
        <div class="mb-6">

            <x-label value="Slug" />

            <x-input
                type="text"
                disabled
                wire:model="slug"
                class="w-full bg-gray-200"
            />

            <x-input-error for="slug" />

        </div>


        <!-- DESCRIPCIÓN CON QUILL -->
        <div class="mb-6" wire:ignore>

            <x-label value="Descripción del producto" class="mb-2"/>

            <div
                x-data
                x-ref="quillEditor"
                class="bg-white border border-gray-300 rounded-lg"
                x-init="quill = new Quill($refs.quillEditor, {
                    theme: 'snow',
                    placeholder: 'Escribe la descripción del producto...',
                });

                quill.root.innerHTML = @js($product->description ?? '');

                quill.on('text-change', function() {
                    @this.set('product.description', quill.root.innerHTML);
                });"

                style="min-height: 180px;">
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

                    @foreach($brands as $brand)

                        <option value="{{$brand->id}}">
                            {{$brand->name}}
                        </option>

                    @endforeach

                </select>

                <x-input-error for="product.brand_id" />

            </div>


            <div>

                <x-label value="Precio" />

                <x-input
                    type="number"
                    class="w-full"
                    step=".01"
                    wire:model="product.price"
                />

                <x-input-error for="product.price" />

            </div>

        </div>


        <!-- CANTIDAD -->
        @if($this->subcategory)

            @if (!$this->subcategory->color && !$this->subcategory->size)

            <div class="mb-6">

                <x-label value="Cantidad" />

                <x-input
                    type="number"
                    class="w-full"
                    wire:model="product.quantity"
                />

                <x-input-error for="product.quantity" />

            </div>

            @endif

        @endif


        <!-- BOTÓN -->
        <div class="flex mt-6 justify-end items-center">

            <x-action-message class="mr-3" on="saved">
                Actualizado
            </x-action-message>

            <x-button
                wire:target="save"
                wire:loading.attr="disabled"
                wire:click="save">

                Actualizar Producto

            </x-button>

        </div>

    </div>


    <!-- VARIACIONES -->
    @if($this->subcategory)

        @if($this->subcategory->size)

            @livewire(
                'admin.size-product',
                ['product'=>$product],
                key('size-product-'.$product->id)
            )

        @elseif($this->subcategory->color)

            @livewire(
                'admin.color-product',
                ['product'=>$product],
                key('color-product-'.$product->id)
            )

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
  Swal.fire({
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