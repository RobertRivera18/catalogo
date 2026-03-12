<div>


    <header class="bg-whitre shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-700">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-gray-800 text-xl leading-tight">Productos</h1>

                <x-danger-button wire:click="$emit('deleteProduct')">Eliminar</x-danger-button>
            </div>
        </div>
    </header>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <h1 class="text-xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>


        <div class="mb-4" wire:ignore>
            <form action="{{route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>
        @if($product->images->count())
        <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-xl text-center font-semibold mb-2">Imagenes del Producto</h1>
            <ul class="flex flex-wrap">
                @foreach($product->images as $image)
                <li class="relative" wire:key="image-{{$image->id}}">
                    <img class="w-32 h-20 rounded-sm object-cover" src="{{Storage::url($image->url)}}" alt="">
                    <x-danger-button class="absolute right-2 top-2" wire:click="deleteImage({{$image->id}})"
                        wire:loading.attr="disabled" wire.target="deleteImage({{$image->id}})">
                        x
                    </x-danger-button>
                </li>
                @endforeach
            </ul>
        </section>
        @endif


        @livewire('admin.status-product',['product'=>$product],key('status-product-'.$product->id))


        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-label value="Categorías" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="category_id">
                        <option value="" selected disabled>Seleccione una categoría</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <x-input-error for="category_id" />
                </div>


                {{-- Subcategoría --}}
                <div>
                    <x-label value="Subcategorías" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="product.subcategory_id">
                        <option value="" selected disabled>Seleccione una subcategoría</option>

                        @foreach ($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    </select>

                    <x-input-error for="product.subcategory_id" />
                </div>


            </div>

            <div class="mb-4">
                <x-label value="Nombre" />
                <x-input type="text" class="w-full" wire:model="product.name"
                    placeholder="Ingrese nombre del Producto" />
                <x-input-error for="product.name" />
            </div>

            <div class="mb-4">
                <x-label value="Slug" />
                <x-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Ingrese del Slug del Producto" />
                <x-input-error for="slug" />
            </div>

            {{---Descripcion--}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-label value="Descripcion" />
                    <textarea class="w-full form-control" rows="4" wire:model="product.description" x-data x-init="ClassicEditor.create($refs.miEditor)
        .then(function(editor){
            editor.model.document.on('change:data', () => {
                @this.set('product.description', editor.getData())
            })
        })
        .catch( error => {
            console.error( error );
        } );" x-ref="miEditor">
    </textarea>
                </div>
                <x-input-error for="product.description" />

            </div>


            <div class="mb-4 grid grid-cols-2 gap-6">
                <div>
                    {{---Marca---}}
                    <x-label value="Marca" />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        wire:model="product.brand_id">
                        <option value="" selected disabled>Seleccione una Marca</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
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




            @if($this->subcategory)
            @if (!$this->subcategory->color && !$this->subcategory->size)
            <div>
                <x-label value="Cantidad" />
                <x-input type="number" class="w-full" wire:model="product.quantity" />
                <x-input-error for="product.quantity" />
            </div>
            @endif
            @endif


            <div class="flex mt-4 justify-end items-center">
                <x-action-message class="mr-3" on="saved">
                    Actualizado
                </x-action-message>
                <x-button wire:target="save" wire:loading.attr="disabled" wire:click="save">
                    Actualizar Producto
                </x-button>
            </div>
        </div>

        @if($this->subcategory)
        @if($this->subcategory->size)
        @livewire('admin.size-product',['product'=>$product],key('size-product-'.$product->id))
        @elseif($this->subcategory->color)
        @livewire('admin.color-product',['product'=>$product],key('color-product-'.$product->id))
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
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        complete: function(file) {
            this.removeFile(file);
        },
        queuecomplete: function() {
            Livewire.emit('refreshProduct');
        }
    };
    Livewire.on('deleteProduct', () => {
        Swal.fire({
            title: 'Estas seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3E8D23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
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
    Livewire.on('deleteSize', sizeId => {
        Swal.fire({
            title: 'Estas seguro?',
            //text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3E8D23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.size-product', 'delete', sizeId);
                Swal.fire(
                    'Eliminado!',
                    'Este elemento ha sido eliminado exitosamente.',
                    'success'
                )
            }
        })
    })
    Livewire.on('deletePivot', pivot => {
        Swal.fire({
            title: 'Estas seguro?',
            //text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3E8D23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.color-product', 'delete', pivot);
                Swal.fire(
                    'Eliminado!',
                    'Este elemento ha sido eliminado exitosamente.',
                    'success'
                )
            }
        })
    })
    Livewire.on('deleteColorSize', pivot => {
        Swal.fire({
            title: 'Estas seguro?',
            //text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3E8D23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.color-size', 'delete', pivot);
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