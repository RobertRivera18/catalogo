<div x-data="{ showSuccess: false }" 
     @cart-updated.window="showSuccess = true; setTimeout(() => showSuccess = false, 2000)"
     class="w-full sm:w-auto">

    <button type="button" 
            wire:click="addItem" 
            wire:loading.attr="disabled"
            x-bind:disabled="!$wire.quantity || showSuccess"
            class="relative inline-flex h-9 w-full sm:w-auto sm:min-w-[105px] items-center justify-center rounded-xl px-3 text-xs font-bold text-white shadow-2xs transition-all duration-200 active:scale-[0.97] disabled:cursor-not-allowed disabled:opacity-50 disabled:active:scale-100"
            :class="showSuccess ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-slate-900 hover:bg-slate-800'">

        <!-- Estado Normal -->
        <span wire:loading.remove wire:target="addItem" x-show="!showSuccess" class="flex items-center justify-center gap-1.5">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span>Agregar</span>
        </span>

        <!-- Estado Cargando -->
        <span wire:loading wire:target="addItem" class="flex items-center justify-center gap-1.5">
            <svg class="h-3.5 w-3.5 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-[11px]">Cargando</span>
        </span>

        <!-- Estado Éxito -->
        <span x-show="showSuccess" x-cloak class="flex items-center justify-center gap-1 font-bold text-white">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-[11px]">¡Listo!</span>
        </span>
    </button>
</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/add-cart.blade.php ENDPATH**/ ?>