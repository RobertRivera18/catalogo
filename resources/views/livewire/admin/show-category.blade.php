<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-700 py-12">
    <x-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva SubCategoría
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder crear una nueva Subcategoría
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Nombre
                </x-label>

                <x-input wire:model="createForm.name" type="text" class="w-full mt-1" />

                <x-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Slug
                </x-label>

                <x-input disabled wire:model="createForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                <x-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta subcategoria necesita que le especifiques un color?</p>
                    <div class="ml-auto">
                        <label>
                            <input wire:model.defer="createForm.color" type="radio" name="color" value="1">
                            Sí
                        </label>

                        <label>
                            <input wire:model.defer="createForm.color" type="radio" name="color" value="0">
                            No
                        </label>
                    </div>
                </div>
                <x-input-error for="createForm.color" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <div class="flex items-center">
                    <p>¿Esta subcategoria necesita que le especifiques una talla?</p>
                    <div class="ml-auto">
                        <label>
                            <input wire:model.defer="createForm.size" type="radio" name="size" value="1">
                            Sí
                        </label>

                        <label>
                            <input wire:model.defer="createForm.size" type="radio" name="size" value="0">
                            No
                        </label>
                    </div>
                </div>
                <x-input-error for="createForm.size" />
            </div>
        </x-slot>


        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">
                SubCategoría creada
            </x-action-message>

            <x-button>
                Agregar
            </x-button>
        </x-slot>
    </x-form-section>


    <x-action-section>
        <x-slot name="title">
            Lista de SubCategorías
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las SubCategorías agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($subcategories as $subcategory)
                    <tr>
                        <td class="py-2">

                            <span class="uppercase underline hover:text-blue-600">
                                {{$subcategory->name}}
                            </span>
                        </td>
                        <td class="py-2">
                            <div class="flex divide-x divide-gray-300 font-semibold">
                                <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                    wire:click="edit('{{$subcategory->id}}')">Editar</a>
                                <a class="pl-2 hover:text-red-600 cursor-pointer"
                                    wire:click="$emit('deleteSubcategory', '{{$subcategory->id}}')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-action-section>

    <x-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Subcategoría
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-label>
                        Nombre
                    </x-label>

                    <x-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                    <x-input-error for="editForm.name" />
                </div>

                <div>
                    <x-label>
                        Slug
                    </x-label>

                    <x-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100" />
                    <x-input-error for="editForm.slug" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <div class="flex items-center">
                        <p>¿Esta subcategoria necesita que le especifiques un color?</p>
                        <div class="ml-auto">
                            <label>
                                <input wire:model.defer="editForm.color" type="radio" name="color" value="1">
                                Sí
                            </label>

                            <label>
                                <input wire:model.defer="editForm.color" type="radio" name="color" value="0">
                                No
                            </label>
                        </div>
                    </div>
                    <x-input-error for="editForm.color" />
                </div>


                <div class="col-span-6 sm:col-span-4">
                    <div class="flex items-center">
                        <p>¿Esta subcategoria necesita que le especifiques una talla?</p>
                        <div class="ml-auto">
                            <label>
                                <input wire:model.defer="editForm.size" type="radio" name="size" value="1">
                                Sí
                            </label>

                            <label>
                                <input wire:model.defer="editForm.size" type="radio" name="size" value="0">
                                No
                            </label>
                        </div>
                    </div>
                    <x-input-error for="editForm.size" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
    @push('script')
    <script>
        Livewire.on('deleteSubcategory', subcategoryId =>{
        Swal.fire({
        title: 'Estás Seguro?',
        text: "El elemento que has seleccionado sera eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    Livewire.emitTo('admin.show-category','delete',subcategoryId)
    Swal.fire(
      'Eliminado!',
      'El elemento ha sido eliminado.',
      'success'
    )
  }
})
});
    </script>
    @endpush
</div>