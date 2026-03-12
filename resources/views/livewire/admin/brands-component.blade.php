<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-gray-700">

    <!-- CREAR MARCA -->
    <div class="bg-white border border-gray-100 shadow-xl rounded-2xl p-8 mb-10">

        <x-form-section submit="save">

            <x-slot name="title">
                <span class="text-xl font-semibold text-gray-800">
                    Agregar nueva Marca
                </span>
            </x-slot>

            <x-slot name="description">
                <span class="text-gray-500">
                    En esta sección podrá registrar una nueva marca en el sistema.
                </span>
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4">
                    <x-label class="font-semibold text-gray-700">
                        Nombre
                    </x-label>

                    <x-input
                        type="text"
                        placeholder="Ej: Nike, Adidas, Puma"
                        class="w-full mt-2 rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        wire:model="createForm.name"
                    />

                    <x-input-error for="createForm.name" />
                </div>

            </x-slot>

            <x-slot name="actions">

                <x-button class="bg-gray-600 hover:bg-gray-700 transition rounded-lg px-6">
                    Agregar
                </x-button>

            </x-slot>

        </x-form-section>

    </div>



    <!-- LISTA DE MARCAS -->
    <div class="bg-white border border-gray-100 shadow-xl rounded-2xl px-4 py-6">

        <x-action-section>

            <x-slot name="title">
                <span class="text-xl font-semibold text-gray-800">
                    Lista de Marcas
                </span>
            </x-slot>

            <x-slot name="description">
                <span class="text-gray-500">
                    Aquí encontrará todas las marcas registradas en el sistema.
                </span>
            </x-slot>

            <x-slot name="content">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b">
                            <tr class="text-left text-gray-600">
                                <th class="py-3 px-4 font-semibold">
                                    Nombre
                                </th>

                                <th class="py-3 px-4 font-semibold w-40">
                                    Acción
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @foreach ($brands as $brand)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="py-3 px-4">

                                    <span class="font-medium uppercase hover:text-orange-600 cursor-pointer">
                                        {{$brand->name}}
                                    </span>

                                </td>

                                <td class="py-3 px-4">

                                    <div class="flex items-center gap-4 font-medium">

                                        <button
                                            class="text-blue-600 hover:text-blue-800 transition"
                                            wire:click="edit('{{$brand->id}}')">
                                            Editar
                                        </button>

                                        <button
                                            class="text-red-600 hover:text-red-800 transition"
                                            wire:click="$emit('deleteBrand', '{{$brand->id}}')">
                                            Eliminar
                                        </button>

                                    </div>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </x-slot>

        </x-action-section>

    </div>



    <!-- MODAL EDITAR -->
    <x-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            <span class="text-lg font-semibold text-gray-800">
                Editar Marca
            </span>
        </x-slot>

        <x-slot name="content">

            <div class="space-y-4">

                <div>

                    <x-label class="font-semibold text-gray-700">
                        Nombre
                    </x-label>

                    <x-input
                        wire:model="editForm.name"
                        type="text"
                        class="w-full mt-2 rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                    />

                    <x-input-error for="editForm.name" />

                </div>

            </div>

        </x-slot>

        <x-slot name="footer">

            <x-danger-button
                wire:click="update"
                wire:loading.attr="disabled"
                wire:target="update"
                class="rounded-lg px-6">
                Actualizar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>



    @push('script')
    <script>

        Livewire.on('deleteBrand', brandId =>{

        Swal.fire({
        title: '¿Estás seguro?',
        text: "La marca será eliminada permanentemente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ea580c',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Sí, eliminar'
        }).then((result) => {

            if (result.isConfirmed) {

                Livewire.emitTo('admin.brands-component','delete',brandId)

                Swal.fire(
                    'Eliminado',
                    'La marca ha sido eliminada.',
                    'success'
                )

            }

        })

        });

    </script>
    @endpush

</div>