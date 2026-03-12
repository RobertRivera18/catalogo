<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-gray-700">

    <!-- CREAR SUBCATEGORIA -->
    <div class="bg-white shadow-xl rounded-2xl p-8 mb-10 border border-gray-100">

        <x-form-section submit="save">

            <x-slot name="title">
                <span class="text-xl font-semibold text-gray-800">
                    Crear nueva Subcategoría
                </span>
            </x-slot>

            <x-slot name="description">
                <span class="text-gray-500">
                    Complete la información necesaria para registrar una nueva subcategoría.
                </span>
            </x-slot>

            <x-slot name="form">

                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label class="font-semibold text-gray-700">
                        Nombre
                    </x-label>

                    <x-input wire:model="createForm.name"
                        type="text"
                        placeholder="Ej: Camisetas deportivas"
                        class="w-full mt-2 rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500"/>

                    <x-input-error for="createForm.name" />
                </div>

                <!-- Slug -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label class="font-semibold text-gray-700">
                        Slug
                    </x-label>

                    <x-input disabled
                        wire:model="createForm.slug"
                        type="text"
                        class="w-full mt-2 bg-gray-100 rounded-lg"/>

                    <x-input-error for="createForm.slug" />
                </div>

                <!-- Color -->
                <div class="col-span-6 sm:col-span-4">

                    <div class="flex items-center justify-between bg-gray-50 border rounded-xl p-4">

                        <p class="text-sm font-medium text-gray-700">
                            ¿Esta subcategoría necesita color?
                        </p>

                        <div class="flex items-center gap-6">

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input wire:model.defer="createForm.color"
                                    type="radio"
                                    name="color"
                                    value="1"
                                    class="text-orange-600 focus:ring-orange-500">

                                <span class="text-sm">Sí</span>
                            </label>

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input wire:model.defer="createForm.color"
                                    type="radio"
                                    name="color"
                                    value="0"
                                    class="text-orange-600 focus:ring-orange-500">

                                <span class="text-sm">No</span>
                            </label>

                        </div>

                    </div>

                    <x-input-error for="createForm.color" />
                </div>

                <!-- Talla -->
                <div class="col-span-6 sm:col-span-4">

                    <div class="flex items-center justify-between bg-gray-50 border rounded-xl p-4">

                        <p class="text-sm font-medium text-gray-700">
                            ¿Esta subcategoría necesita talla?
                        </p>

                        <div class="flex items-center gap-6">

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input wire:model.defer="createForm.size"
                                    type="radio"
                                    name="size"
                                    value="1"
                                    class="text-orange-600 focus:ring-orange-500">

                                <span class="text-sm">Sí</span>
                            </label>

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input wire:model.defer="createForm.size"
                                    type="radio"
                                    name="size"
                                    value="0"
                                    class="text-orange-600 focus:ring-orange-500">

                                <span class="text-sm">No</span>
                            </label>

                        </div>

                    </div>

                    <x-input-error for="createForm.size" />
                </div>

            </x-slot>

            <x-slot name="actions">

                <x-action-message class="mr-3 text-green-600 font-medium" on="saved">
                    Subcategoría creada correctamente
                </x-action-message>

                <x-button class="bg-orange-600 hover:bg-orange-700 transition rounded-lg px-6">
                    Agregar
                </x-button>

            </x-slot>

        </x-form-section>

    </div>


    <!-- LISTA -->
    <div class="bg-white shadow-xl rounded-2xl border border-gray-100 px-6 py-4">

        <x-action-section>

            <x-slot name="title">
                <span class="text-xl font-semibold text-gray-800">
                    Lista de Subcategorías
                </span>
            </x-slot>

            <x-slot name="description">
                <span class="text-gray-500">
                    Aquí encontrará todas las subcategorías registradas en el sistema.
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

                            @foreach ($subcategories as $subcategory)

                            <tr class="hover:bg-gray-50 transition">

                                <td class="py-3 px-4">

                                    <span class="font-medium uppercase hover:text-orange-600 cursor-pointer">
                                        {{$subcategory->name}}
                                    </span>

                                </td>

                                <td class="py-3 px-4">

                                    <div class="flex items-center gap-4 font-medium">

                                        <button
                                            class="text-blue-600 hover:text-blue-800 transition"
                                            wire:click="edit('{{$subcategory->id}}')">

                                            Editar
                                        </button>

                                        <button
                                            class="text-red-600 hover:text-red-800 transition"
                                            wire:click="$emit('deleteSubcategory', '{{$subcategory->id}}')">

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

</div>