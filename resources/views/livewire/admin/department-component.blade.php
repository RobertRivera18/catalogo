<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-form-section class="mb-6" submit="save">
        <x-slot name="title">
            Agregar un nuevo Departamento
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesaria para poder agregar un nuevo departamento.
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 md:col-span-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input type="text" wire:model="createForm.name" class="w-full mt-1" />
                <x-input-error for="createForm.name" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message on="saved" class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                Departamento agregado
            </x-action-message>

            <x-button>
                Agregar
            </x-button>
        </x-slot>

    </x-form-section>

    <x-action-section>
        <x-slot name="title">
            Lista de categorías
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las categorías agregadas
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
                    @foreach ($departments as $department)
                    <tr>
                        <td class="py-2">
                            
                            <a  href="{{route('admin.departments.show',$department)}}"
                                class="cursor-pointer uppercase underline hover:text-blue-600">
                                {{$department->name}}
                            </a>
                        </td>
                        <td class="py-2">
                            <div class="flex divide-x divide-gray-300 font-semibold">
                                <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                    wire:click="edit({{$department}})">Editar</a>
                                <a class="pl-2 hover:text-red-600 cursor-pointer"
                                    wire:click="$emit('deleteDepartment', '{{$department->id}}')">Eliminar</a>
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
            Editar Departamento
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
        Livewire.on('deleteDepartment', departmentId =>{
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
    Livewire.emitTo('admin.department-component','delete',departmentId)
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