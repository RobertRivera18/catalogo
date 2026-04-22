<div x-data="{ showSuccess: false, addingToCart: false }" class="space-y-4">

    <!-- Fila principal -->
    <div class="flex items-center justify-between gap-4 bg-white border border-gray-200 rounded-xl p-4">

        <!-- Stock -->
        <div class="flex flex-col">
            <span class="text-xs text-gray-500">Stock</span>
            <div class="flex items-center gap-2">
                <span class="text-lg font-semibold text-gray-900">
                    <?php echo e($quantity ?: $product->stock); ?>

                </span>

                <?php if(($quantity ?: $product->stock) > 10): ?>
                    <span class="text-[11px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                        Disponible
                    </span>
                <?php elseif(($quantity ?: $product->stock) > 0): ?>
                    <span class="text-[11px] text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">
                        Bajo
                    </span>
                <?php else: ?>
                    <span class="text-[11px] text-red-600 bg-red-50 px-2 py-0.5 rounded-full">
                        Agotado
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Cantidad -->
        <div class="flex items-center border border-gray-200 rounded-lg px-2 py-1">
            <button type="button"
                wire:click="decrement"
                x-bind:disabled="$wire.qty <= 1"
                class="px-2 text-gray-500 hover:text-black disabled:opacity-30">
                −
            </button>

            <span class="px-3 text-sm font-medium text-gray-900">
                <?php echo e($qty); ?>

            </span>

            <button type="button"
                wire:click="increment"
                x-bind:disabled="$wire.qty >= $wire.quantity"
                class="px-2 text-gray-500 hover:text-black disabled:opacity-30">
                +
            </button>
        </div>

        <!-- Botón -->
        <button type="button"
            wire:click="addItem"
            x-bind:disabled="!$wire.quantity"
            @click="if($wire.quantity){ addingToCart=true; setTimeout(()=>{addingToCart=false; showSuccess=true; setTimeout(()=>showSuccess=false,2000)},600)}"
            class="bg-black text-white text-sm px-5 py-2.5 rounded-lg font-medium hover:bg-gray-800 transition disabled:opacity-40 whitespace-nowrap">

            <span x-show="!addingToCart">
                Agregar
            </span>

            <span x-show="addingToCart" class="flex items-center gap-2">
                <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24"></svg>
            </span>
        </button>

    </div>

    <!-- Success -->
    <div x-show="showSuccess"
        x-transition
        class="text-sm text-green-600 bg-green-50 border border-green-200 rounded-lg px-4 py-2">
        Producto agregado correctamente
    </div>

</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/add-cart-item.blade.php ENDPATH**/ ?>