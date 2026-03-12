<div class="space-y-10">

    <!-- CREAR CATEGORIA -->
    <x-form-section submit="save" class="bg-white shadow-sm border border-gray-200 rounded-xl p-6">

        <x-slot name="title">
            <div class="text-xl font-semibold text-gray-800">
                Crear nueva categoría
            </div>
        </x-slot>

        <x-slot name="description">
            <p class="text-gray-500 text-sm">
                Complete la información para registrar una nueva categoría en el sistema.
            </p>
        </x-slot>


        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-label value="Nombre" />

                <x-input wire:model="createForm.name" type="text" class="w-full mt-2"
                    placeholder="Ej: Electrónica" />

                <x-input-error for="createForm.name" />
            </div>


            <div class="col-span-6 sm:col-span-3">
                <x-label value="Slug" />

                <x-input disabled wire:model="createForm.slug" type="text" class="w-full mt-2 bg-gray-100" />

                <x-input-error for="createForm.slug" />
            </div>


            <div class="col-span-6 sm:col-span-3">
                <x-label value="Ícono (FontAwesome)" />

                <x-input wire:model.defer="createForm.icon" type="text" class="w-full mt-2"
                    placeholder="Ej: <i class='fas fa-tv'></i>" />

                <x-input-error for="createForm.icon" />
            </div>



            <div class="col-span-6">

                <x-label value="Marcas asociadas" />

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mt-3">

                    @foreach ($brands as $brand)
                        <label
                            class="flex items-center gap-2 bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-lg border border-gray-200 cursor-pointer">

                            <x-checkbox wire:model.defer="createForm.brands" value="{{ $brand->id }}" />

                            <span class="text-sm text-gray-700">
                                {{ $brand->name }}
                            </span>

                        </label>
                    @endforeach

                </div>

                <x-input-error for="createForm.brands" />

            </div>



            <div class="col-span-6 sm:col-span-3">

                <x-label value="Imagen de la categoría" />

                <input wire:model="createForm.image" accept="image/*" type="file"
                    class="mt-2 block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50" />

                <x-input-error for="createForm.image" />

            </div>

        </x-slot>



        <x-slot name="actions">

            <x-action-message class="mr-3 text-green-600" on="saved">
                Categoría creada correctamente
            </x-action-message>

            <x-button class="px-6">
                Agregar categoría
            </x-button>

        </x-slot>

    </x-form-section>



    <!-- LISTA DE CATEGORIAS -->

    <x-action-section class="bg-white shadow-sm border border-gray-200 rounded-xl p-6">

        <x-slot name="title">
            <div class="text-xl font-semibold text-gray-800">
                Lista de categorías
            </div>
        </x-slot>

        <x-slot name="description">
            <p class="text-gray-500 text-sm">
                Administración de categorías registradas.
            </p>
        </x-slot>



        <x-slot name="content">

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm text-gray-600">

                    <thead class="bg-gray-50 border-b">

                        <tr>

                            <th class="px-4 py-3 text-left font-semibold">
                                Categoría
                            </th>

                            <th class="px-4 py-3 text-right font-semibold">
                                Acciones
                            </th>

                        </tr>

                    </thead>



                    <tbody class="divide-y">

                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-4 py-3 flex items-center gap-3">

                                    <span class="text-lg text-gray-600">
                                        {!! $category->icon !!}
                                    </span>

                                    <a href="{{ route('admin.show.categories', $category) }}"
                                        class="font-medium text-gray-800 hover:text-blue-600">

                                        {{ $category->name }}

                                    </a>

                                </td>


                                <td class="px-4 py-3">

                                    <div class="flex justify-end gap-4 text-sm font-medium">

                                        <button wire:click="edit('{{ $category->slug }}')"
                                            class="text-blue-600 hover:text-blue-800">

                                            Editar

                                        </button>

                                        <button wire:click="$emit('deleteCategory', '{{ $category->slug }}')"
                                            class="text-red-600 hover:text-red-800">

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



    <!-- MODAL EDITAR -->

    <x-dialog-modal wire:model="editForm.open">

        <x-slot name="title">
            Editar categoría
        </x-slot>


        <x-slot name="content">

            <div class="space-y-5">

                <div>

                    @if ($editImage)
                        <img class="w-full h-56 rounded-lg object-cover shadow" src="{{ $editImage->temporaryUrl() }}">
                    @else
                        <img class="w-full h-56 rounded-lg object-cover shadow"
                            src="{{ Storage::url($editForm['image']) }}">
                    @endif

                </div>



                <div>

                    <x-label value="Nombre" />

                    <x-input wire:model="editForm.name" type="text" class="w-full mt-2" />

                    <x-input-error for="editForm.name" />

                </div>



                <div>

                    <x-label value="Slug" />

                    <x-input disabled wire:model="editForm.slug" type="text" class="w-full mt-2 bg-gray-100" />

                    <x-input-error for="editForm.slug" />

                </div>



                <div>

                    <x-label value="Ícono" />

                    <x-input wire:model.defer="editForm.icon" type="text" class="w-full mt-2" />

                    <x-input-error for="editForm.icon" />

                </div>



                <div>

                    <x-label value="Marcas asociadas" />

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-3">

                        @foreach ($brands as $brand)
                            <label
                                class="flex items-center gap-2 bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-lg border border-gray-200 cursor-pointer">

                                <x-checkbox wire:model.defer="editForm.brands" value="{{ $brand->id }}" />

                                {{ $brand->name }}

                            </label>
                        @endforeach

                    </div>

                    <x-input-error for="editForm.brands" />

                </div>



                <div>

                    <x-label value="Imagen nueva" />

                    <input wire:model="editImage" accept="image/*" type="file"
                        class="mt-2 block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50" />

                    <x-input-error for="editImage" />

                </div>

            </div>

        </x-slot>



        <x-slot name="footer">

            <x-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">

                Actualizar categoría

            </x-danger-button>

        </x-slot>

    </x-dialog-modal>

</div>
