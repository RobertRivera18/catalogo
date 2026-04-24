<div>
    <?php if($product->pdf): ?>
        <button wire:click="download"
            class="w-full flex items-center justify-center gap-2.5 bg-gray-900 hover:bg-black text-white text-sm font-semibold py-3.5 px-5 rounded-xl transition-all duration-150 shadow-sm active:scale-[.98]">

            
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 16v-8m0 8l-3-3m3 3l3-3M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
            </svg>

            Descargar ficha técnica (PDF)

        </button>
    <?php else: ?>
        <div
            class="w-full flex items-center justify-center gap-2 text-xs text-gray-400 bg-gray-100 border border-gray-200 py-3 rounded-xl">
            No hay ficha técnica disponible
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/product/download-pdf.blade.php ENDPATH**/ ?>