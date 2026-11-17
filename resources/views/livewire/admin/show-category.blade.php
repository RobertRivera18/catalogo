<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-700 py-8 space-y-8">
    
    {{-- FORMULARIO DE CREACIÓN --}}
    <x-form-section submit="save" class="mb-6">
        <x-slot name="title">
            <span class="text-lg font-bold text-gray-900">Crear nueva Subcategoría</span>
        </x-slot>

        <x-slot name="description">
            Complete la información requerida para registrar una subcategoría en el sistema.
        </x-slot>

        <x-slot name="form">
            {{-- Nombre --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="Nombre" class="font-medium text-gray-700" />
                <x-input id="name" wire:model="createForm.name" type="text" class="w-full mt-1.5 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg shadow-sm border-gray-300" placeholder="Ej. Zapatillas, Relojes..." />
                <x-input-error for="createForm.name" class="mt-1" />
            </div>

            {{-- Slug --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="slug" value="Slug (Generado automáticamente)" class="font-medium text-gray-500" />
                <x-input id="slug" disabled wire:model="createForm.slug" type="text" class="w-full mt-1.5 bg-gray-100 text-gray-500 border-gray-200 rounded-lg cursor-not-allowed" />
                <x-input-error for="createForm.slug" class="mt-1" />
            </div>

            {{-- Selección de Color (Radio Cards) --}}
            <div class="col-span-6 sm:col-span-4 space-y-2">
                <x-label value="¿Esta subcategoría requiere especificación de color?" class="font-medium text-gray-700" />
                <div class="grid grid-cols-2 gap-3">
                    <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer transition-all hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600">
                        <div class="flex items-center gap-2">
                            <input wire:model.defer="createForm.color" type="radio" name="color_create" value="1" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-gray-800">Sí</span>
                        </div>
                        <span class="text-xs text-gray-400">Aplica variante</span>
                    </label>

                    <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer transition-all hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600">
                        <div class="flex items-center gap-2">
                            <input wire:model.defer="createForm.color" type="radio" name="color_create" value="0" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-gray-800">No</span>
                        </div>
                        <span class="text-xs text-gray-400">Sin color</span>
                    </label>
                </div>
                <x-input-error for="createForm.color" />
            </div>

            {{-- Selección de Talla (Radio Cards) --}}
            <div class="col-span-6 sm:col-span-4 space-y-2">
                <x-label value="¿Esta subcategoría requiere especificación de talla/tamaño?" class="font-medium text-gray-700" />
                <div class="grid grid-cols-2 gap-3">
                    <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer transition-all hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600">
                        <div class="flex items-center gap-2">
                            <input wire:model.defer="createForm.size" type="radio" name="size_create" value="1" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-gray-800">Sí</span>
                        </div>
                        <span class="text-xs text-gray-400">Aplica variante</span>
                    </label>

                    <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer transition-all hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40 has-[:checked]:ring-1 has-[:checked]:ring-indigo-600">
                        <div class="flex items-center gap-2">
                            <input wire:model.defer="createForm.size" type="radio" name="size_create" value="0" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-semibold text-gray-800">No</span>
                        </div>
                        <span class="text-xs text-gray-400">Sin talla</span>
                    </label>
                </div>
                <x-input-error for="createForm.size" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3 text-emerald-600 font-medium" on="saved">
                Subcategoría creada con éxito.
            </x-action-message>

            <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-sm rounded-xl shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Agregar subcategoría</span>
            </button>
        </x-slot>
    </x-form-section>

    {{-- LISTADO DE SUBCATEGORÍAS --}}
    <x-action-section>
        <x-slot name="title">
            <span class="text-lg font-bold text-gray-900">Subcategorías registradas</span>
        </x-slot>

        <x-slot name="description">
            Gestione las subcategorías activas pertenecientes a esta categoría.
        </x-slot>

        <x-slot name="content">
            <div class="overflow-x-auto rounded-lg border border-gray-100">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-3 font-semibold text-gray-700">Nombre</th>
                            <th scope="col" class="px-4 py-3 font-semibold text-gray-700 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($subcategories as $subcategory)
                            <tr class="hover:bg-gray-50/80 transition">
                                <td class="px-4 py-3.5 font-semibold text-gray-800">
                                    {{ $subcategory->name }}
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <button wire:click="edit('{{ $subcategory->id }}')" class="inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            Editar
                                        </button>

                                        <button wire:click="$emit('deleteSubcategory', '{{ $subcategory->id }}')" class="inline-flex items-center gap-1 text-xs font-semibold text-rose-600 hover:text-rose-800 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-lg transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-8 text-center text-gray-400">
                                    No hay subcategorías registradas aún.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-action-section>

    {{-- MODAL DE EDICIÓN --}}
    <x-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            <span class="text-lg font-bold text-gray-900">Editar Subcategoría</span>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4 py-2">
                <div>
                    <x-label value="Nombre" class="font-medium text-gray-700" />
                    <x-input wire:model="editForm.name" type="text" class="w-full mt-1.5 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg shadow-sm border-gray-300" />
                    <x-input-error for="editForm.name" class="mt-1" />
                </div>

                <div>
                    <x-label value="Slug" class="font-medium text-gray-500" />
                    <x-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1.5 bg-gray-100 text-gray-500 border-gray-200 rounded-lg cursor-not-allowed" />
                    <x-input-error for="editForm.slug" class="mt-1" />
                </div>

                <div class="space-y-2">
                    <x-label value="¿Requiere color?" class="font-medium text-gray-700" />
                    <div class="grid grid-cols-2 gap-3">
                        <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40">
                            <div class="flex items-center gap-2">
                                <input wire:model.defer="editForm.color" type="radio" name="color_edit" value="1" class="text-indigo-600 focus:ring-indigo-500">
                                <span class="text-sm font-semibold text-gray-800">Sí</span>
                            </div>
                        </label>
                        <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40">
                            <div class="flex items-center gap-2">
                                <input wire:model.defer="editForm.color" type="radio" name="color_edit" value="0" class="text-indigo-600 focus:ring-indigo-500">
                                <span class="text-sm font-semibold text-gray-800">No</span>
                            </div>
                        </label>
                    </div>
                    <x-input-error for="editForm.color" />
                </div>

                <div class="space-y-2">
                    <x-label value="¿Requiere talla?" class="font-medium text-gray-700" />
                    <div class="grid grid-cols-2 gap-3">
                        <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40">
                            <div class="flex items-center gap-2">
                                <input wire:model.defer="editForm.size" type="radio" name="size_edit" value="1" class="text-indigo-600 focus:ring-indigo-500">
                                <span class="text-sm font-semibold text-gray-800">Sí</span>
                            </div>
                        </label>
                        <label class="relative flex items-center justify-between p-3 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50/40">
                            <div class="flex items-center gap-2">
                                <input wire:model.defer="editForm.size" type="radio" name="size_edit" value="0" class="text-indigo-600 focus:ring-indigo-500">
                                <span class="text-sm font-semibold text-gray-800">No</span>
                            </div>
                        </label>
                    </div>
                    <x-input-error for="editForm.size" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex justify-end gap-2">
                <x-secondary-button wire:click="$set('editForm.open', false)">
                    Cancelar
                </x-secondary-button>

                <button type="button" wire:click="update" wire:loading.attr="disabled" wire:target="update" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-xs uppercase tracking-widest rounded-lg shadow-sm transition">
                    Actualizar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteSubcategory', subcategoryId => {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "La subcategoría seleccionada será eliminada permanentemente.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#ef4444',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.show-category', 'delete', subcategoryId);
                        Swal.fire('¡Eliminado!', 'La subcategoría ha sido eliminada.', 'success');
                    }
                });
            });
        </script>
    @endpush
</div>