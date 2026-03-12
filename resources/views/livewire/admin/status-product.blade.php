<div class="bg-white shadow-lg rounded-lg p-6 mb-4">
    <h1 class="text-xl text-center font-semibold mb-2">Estado del Producto</h1>
    <div class="flex items-center justify-center">
        <label class="mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar Producto como Borrador
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Marcar Producto como Publicado
        </label>
    </div>
    <div class="flex justify-end items-center">
        <x-action-message 
            class="mr-3 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300" 
            on="saved">

            Actualizado
        </x-action-message>
        <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">Actualizar</x-button>
    </div>
</div>