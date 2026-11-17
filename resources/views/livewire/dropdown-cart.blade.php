<div x-data="{ open: false }" class="relative inline-block">
    <!-- Icono Carrito Trigger -->
    <button @click="open = true" type="button" aria-label="Ver carrito de compras"
        class="relative cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 rounded-full p-2 transition-transform active:scale-95 flex items-center">
        <x-cart color="white" size="28" />
        @if (Cart::count())
            <span
                class="absolute top-1 right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-[10px] font-black text-white bg-red-600 rounded-full shadow-md animate-pulse">
                {{ Cart::count() }}
            </span>
        @else
            <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white"></span>
        @endif
    </button>

    <!-- BACKDROP OSCURO DE FONDO -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-[9998]" style="display: none;"></div>

    <!-- PANEL LATERAL DERECHO (DRAWER FULL HEIGHT) -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-screen w-full sm:w-[420px] z-[9999] shadow-2xl bg-slate-50 flex flex-col justify-between overflow-hidden"
        style="display: none;">

        <!-- ================= PASO 1: CARRITO ================= -->
        @if ($paso === 1)
            <div class="flex flex-col h-full justify-between">
                <!-- HEADER FIJO -->
                <div
                    class="bg-white p-4 flex items-center justify-between border-b border-slate-200/80 shadow-xs shrink-0">
                    <div class="flex items-center gap-3">
                        <button @click="open = false" type="button" aria-label="Cerrar carrito"
                            class="p-1.5 rounded-lg text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                            Carrito de Compras
                            <span class="text-xs font-semibold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">
                                {{ Cart::count() }}
                            </span>
                        </h2>
                    </div>
                    @if (Cart::count())
                        <button wire:click="destroy" wire:loading.attr="disabled"
                            class="text-xs font-medium text-red-500 hover:text-red-700 hover:underline transition-colors disabled:opacity-50">
                            Vaciar Carrito
                        </button>
                    @endif
                </div>

                <!-- LISTA DE PRODUCTOS SCROLLABLE -->
                <div class="p-4 overflow-y-auto flex-1 space-y-3">
                    @forelse (Cart::content() as $item)
                        <div
                            class="p-3 bg-white rounded-xl border border-slate-200/80 shadow-2xs flex gap-3 items-center relative">
                            <!-- Overlay de Carga por Ítem -->
                            <div wire:loading wire:target="delete('{{ $item->rowId }}')"
                                class="absolute inset-0 bg-white/70 backdrop-blur-2xs rounded-xl flex items-center justify-center z-10">
                                <svg class="animate-spin h-5 w-5 text-slate-700" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>

                            <img class="w-16 h-16 object-cover rounded-lg border border-slate-100 flex-shrink-0 bg-slate-50"
                                src="{{ $item->options->image }}" alt="{{ $item->name }}">

                            <div class="flex-1 min-w-0 flex flex-col justify-between h-full">
                                <div class="flex justify-between items-start gap-1">
                                    <h3
                                        class="text-xs font-semibold text-slate-800 uppercase line-clamp-2 leading-snug">
                                        {{ $item->name }}
                                    </h3>
                                    <button wire:click="delete('{{ $item->rowId }}')" title="Eliminar producto"
                                        class="p-1 -mr-1 text-slate-400 hover:text-red-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-sm font-extrabold text-slate-900">
                                        $ {{ number_format($item->price * $item->qty, 2) }}
                                    </span>

                                    <div
                                        class="flex items-center border border-slate-200 rounded-lg bg-slate-50 px-1 py-0.5">
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-20 flex flex-col items-center justify-center text-center">
                            <div
                                class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mb-3">
                                <x-cart color="currentColor" size="32" />
                            </div>
                            <p class="text-slate-600 font-semibold text-sm">Tu carrito está vacío</p>
                            <p class="text-slate-400 text-xs mt-1">Explora nuestros productos y agrega algo al pedido.
                            </p>
                        </div>
                    @endforelse
                </div>

                <!-- FOOTER FIJO -->
                @if (Cart::count())
                    <div class="p-4 bg-white border-t border-slate-200/80 shrink-0">
                        <button wire:click="irAFormulario" type="button" wire:loading.attr="disabled"
                            class="w-full flex items-center justify-between bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white py-3.5 px-4 rounded-xl text-sm font-bold shadow-md shadow-emerald-600/20 transition-all transform active:scale-[0.99] disabled:opacity-50">
                            <span
                                class="bg-emerald-800/40 px-2 py-0.5 rounded-md text-xs font-medium">{{ Cart::count() }}
                                items</span>
                            <span>Continuar con el Pedido</span>
                            <span class="font-black">$
                                {{ number_format(floatval(str_replace(',', '', Cart::subtotal())), 2) }} ›</span>
                        </button>
                      
                    </div>
                @endif
            </div>
        @endif

        <!-- ================= PASO 2: FORMULARIO ================= -->
        @if ($paso === 2)
            <div class="flex flex-col h-full justify-between">
                <!-- HEADER FIJO -->
                <div
                    class="bg-white p-4 flex items-center justify-between border-b border-slate-200/80 shadow-xs shrink-0">
                    <button wire:click="volverAlCarrito" type="button"
                        class="text-xs font-bold text-slate-600 hover:text-slate-900 flex items-center gap-1 uppercase tracking-wider transition-colors">
                        ← Volver
                    </button>
                    <h2 class="text-xs font-black text-slate-800 uppercase tracking-wider">Datos de Contacto</h2>
                    <button @click="open = false" type="button" aria-label="Cerrar drawer"
                        class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- FORMULARIO SCROLLABLE -->
                <div class="p-5 overflow-y-auto flex-1 bg-white">
                    <form id="whatsapp-form" wire:submit.prevent="enviarWhatsApp" class="space-y-4">
                        <div>
                            <label
                                class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1.5">Tipo
                                de Entrega *</label>
                            <div class="grid grid-cols-2 gap-2.5">
                                <label
                                    class="flex items-center justify-center gap-2 p-3 border rounded-xl cursor-pointer text-xs font-bold transition-all {{ $tipoEntrega === 'Domicilio' ? 'border-emerald-600 bg-emerald-50/60 text-emerald-700 ring-1 ring-emerald-600' : 'border-slate-200 hover:border-slate-300 text-slate-600' }}">
                                    <input type="radio" wire:model.defer="tipoEntrega" wire:click="$refresh"
                                        value="Domicilio" class="hidden">
                                    🚚 Domicilio
                                </label>
                                <label
                                    class="flex items-center justify-center gap-2 p-3 border rounded-xl cursor-pointer text-xs font-bold transition-all {{ $tipoEntrega === 'Recoger' ? 'border-emerald-600 bg-emerald-50/60 text-emerald-700 ring-1 ring-emerald-600' : 'border-slate-200 hover:border-slate-300 text-slate-600' }}">
                                    <input type="radio" wire:model.defer="tipoEntrega" wire:click="$refresh"
                                        value="Recoger" class="hidden">
                                    🛍️ Recoger
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="nombre_input"
                                class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Nombre
                                Completo *</label>
                            <input id="nombre_input" type="text" wire:model.defer="nombre"
                                placeholder="Ej: Juan Pérez"
                                class="w-full px-3.5 py-2.5 rounded-xl border {{ $errors->has('nombre') ? 'border-red-400 bg-red-50/30' : 'border-slate-200' }} text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium text-slate-800">
                            @error('nombre')
                                <span class="text-red-500 text-[10px] font-semibold mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="celular_input"
                                class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Celular
                                / WhatsApp *</label>
                            <input id="celular_input" type="tel" wire:model.defer="celular"
                                placeholder="Ej: 0991234567"
                                class="w-full px-3.5 py-2.5 rounded-xl border {{ $errors->has('celular') ? 'border-red-400 bg-red-50/30' : 'border-slate-200' }} text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium text-slate-800">
                            @error('celular')
                                <span class="text-red-500 text-[10px] font-semibold mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($tipoEntrega === 'Domicilio')
                            <div>
                                <label for="direccion_input"
                                    class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Dirección
                                    de Entrega *</label>
                                <input id="direccion_input" type="text" wire:model.defer="direccion"
                                    placeholder="Calle principal, secundaria y # de casa"
                                    class="w-full px-3.5 py-2.5 rounded-xl border {{ $errors->has('direccion') ? 'border-red-400 bg-red-50/30' : 'border-slate-200' }} text-xs focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium text-slate-800">
                                @error('direccion')
                                    <span
                                        class="text-red-500 text-[10px] font-semibold mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div>
                            <label for="comentarios_input"
                                class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Notas
                                / Referencias</label>
                            <textarea id="comentarios_input" wire:model.defer="comentarios" rows="2"
                                placeholder="Indicaciones para la entrega o entrega del producto..."
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs resize-none focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium text-slate-800"></textarea>
                        </div>
                    </form>
                </div>

                <!-- FOOTER FIJO DE ENVÍO -->
                <div class="p-4 bg-white border-t border-slate-200/80 shrink-0">
                    <button form="whatsapp-form" type="submit" wire:loading.attr="disabled"
                        class="w-full flex items-center justify-between bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white py-3.5 px-5 rounded-xl text-xs font-bold uppercase tracking-wider shadow-md shadow-emerald-600/20 transition-all transform active:scale-[0.99] disabled:opacity-50">
                        <span wire:loading.remove wire:target="enviarWhatsApp" class="flex items-center gap-1.5">
                            <i class="fa fa-whatsapp"></i> Hacer Pedido por WhatsApp
                        </span>
                        
                        <span wire:loading wire:target="enviarWhatsApp" class="flex items-center gap-1.5">
                            <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Procesando...
                        </span>
                        <span class="font-black text-sm">$
                            {{ number_format(floatval(str_replace(',', '', Cart::subtotal())), 2) }} ›</span>
                    </button>
                </div>
            </div>
        @endif

    </div>
</div>
