<div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm p-6 transition-all hover:shadow-md">
    <!-- ENCABEZADO Y BADGE DE ESTADO ACTUAL -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 mb-5 border-b border-gray-100">
        <div>
            <h2 class="text-base font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Visibilidad del Producto
            </h2>
            <p class="text-xs text-gray-500 mt-0.5">Controla si el producto está visible en la tienda o en modo borrador.</p>
        </div>

        <!-- Indicador visual rápido según estado -->
        <div>
            @if(($status ?? 1) == 2)
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Publicado
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200/60">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    Borrador
                </span>
            @endif
        </div>
    </div>

    <!-- OPCIONES SELECCIONABLES (TARJETAS RADIO) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
        <!-- Opciones: Borrador (value="1") -->
        <label class="relative flex items-start p-4 rounded-xl border-2 cursor-pointer transition-all duration-150 hover:bg-gray-50/80 group">
            <div class="flex items-center h-5">
                <input wire:model.defer="status" type="radio" name="status" value="1"
                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 focus:ring-offset-0">
            </div>
            <div class="ml-3">
                <span class="block text-sm font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors">
                    Borrador
                </span>
                <span class="block text-xs text-gray-500 mt-0.5">
                    Oculto al público. Ideal para editar o subir imágenes antes de lanzar.
                </span>
            </div>
        </label>

        <!-- Opciones: Publicado (value="2") -->
        <label class="relative flex items-start p-4 rounded-xl border-2 cursor-pointer transition-all duration-150 hover:bg-gray-50/80 group">
            <div class="flex items-center h-5">
                <input wire:model.defer="status" type="radio" name="status" value="2"
                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 focus:ring-offset-0">
            </div>
            <div class="ml-3">
                <span class="block text-sm font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors">
                    Publicado
                </span>
                <span class="block text-xs text-gray-500 mt-0.5">
                    Visible inmediatamente en el catálogo y disponible para compra.
                </span>
            </div>
        </label>
    </div>

    <!-- BOTÓN Y MENSAJE DE FEEDBACK -->
    <div class="flex justify-end items-center gap-3 pt-4 border-t border-gray-100">
        <x-action-message class="text-sm font-medium text-emerald-600 flex items-center gap-1" on="saved">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Estado actualizado
        </x-action-message>

        <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
            class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-sm transition-all">
            <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Actualizar Estado
        </x-button>
    </div>
</div>