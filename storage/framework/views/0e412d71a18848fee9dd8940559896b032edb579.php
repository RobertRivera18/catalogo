<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12 font-sans text-slate-900 tracking-tight antialiased selection:bg-slate-900 selection:text-white">

    
    <?php if(session('success')): ?>
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-2xl text-xs font-medium flex items-center justify-between">
            <span><?php echo e(session('success')); ?></span>
            <i class="fas fa-check-circle"></i>
        </div>
    <?php endif; ?>

    
    <header class="mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-slate-200/60 pb-6">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">
                <span>Orden de compra</span>
                <span class="text-slate-300">•</span>
                <span class="font-mono text-slate-600">#<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-semibold text-slate-900 tracking-tight">
                Detalle del Pedido
            </h1>
        </div>

        
        <div>
            <?php if($order->status == 5): ?>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-medium bg-rose-50 text-rose-600 border border-rose-200/50 shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    Anulado
                </span>
            <?php elseif($order->status == 4): ?>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-600 border border-emerald-200/50 shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Entregado
                </span>
            <?php elseif($order->status == 3): ?>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-medium bg-sky-50 text-sky-600 border border-sky-200/50 shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                    En Camino
                </span>
            <?php else: ?>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200/50 shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    Procesando
                </span>
            <?php endif; ?>
        </div>
    </header>

    
    <section class="bg-white/70 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-8 sm:p-10 mb-8 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)]">
        <div class="relative flex items-center justify-between max-w-xl mx-auto">
            
            
            <div class="absolute top-5 left-0 w-full h-[2px] bg-slate-100 -translate-y-1/2 z-0"></div>

            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 <?php echo e($order->status >= 2 && $order->status != 5 ? 'bg-slate-900 text-white shadow-sm ring-4 ring-white' : 'bg-slate-100 text-slate-300 ring-4 ring-white'); ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p class="mt-3 text-xs font-semibold <?php echo e($order->status >= 2 && $order->status != 5 ? 'text-slate-900' : 'text-slate-400'); ?>">Recibido</p>
            </div>

            
            <div class="flex-1 h-[2px] z-10 transition-all duration-500 <?php echo e($order->status >= 3 && $order->status != 5 ? 'bg-slate-900' : 'bg-transparent'); ?>"></div>

            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 <?php echo e($order->status >= 3 && $order->status != 5 ? 'bg-slate-900 text-white shadow-sm ring-4 ring-white' : 'bg-slate-100 text-slate-300 ring-4 ring-white'); ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <p class="mt-3 text-xs font-semibold <?php echo e($order->status >= 3 && $order->status != 5 ? 'text-slate-900' : 'text-slate-400'); ?>">Enviado</p>
            </div>

            
            <div class="flex-1 h-[2px] z-10 transition-all duration-500 <?php echo e($order->status >= 4 && $order->status != 5 ? 'bg-slate-900' : 'bg-transparent'); ?>"></div>

            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 <?php echo e($order->status >= 4 && $order->status != 5 ? 'bg-slate-900 text-white shadow-sm ring-4 ring-white' : 'bg-slate-100 text-slate-300 ring-4 ring-white'); ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p class="mt-3 text-xs font-semibold <?php echo e($order->status >= 4 && $order->status != 5 ? 'text-slate-900' : 'text-slate-400'); ?>">Entregado</p>
            </div>

        </div>

        <?php if($order->status == 5): ?>
            <div class="mt-8 bg-rose-50/60 border border-rose-100/80 rounded-2xl p-4 text-center">
                <p class="text-xs font-medium text-rose-600">
                    Esta orden se encuentra anulada.
                </p>
            </div>
        <?php endif; ?>
    </section>

    
    <section class="bg-slate-100/70 p-1.5 rounded-2xl mb-10 border border-slate-200/50">
        <form wire:submit.prevent="update">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-1">
                
                
                <label class="cursor-pointer">
                    <input wire:model="status" type="radio" name="status" value="2" class="peer sr-only">
                    <div class="py-2.5 px-3 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-white peer-checked:text-slate-900 peer-checked:shadow-sm peer-checked:font-semibold hover:text-slate-900">
                        Recibido
                    </div>
                </label>

                
                <label class="cursor-pointer">
                    <input wire:model="status" type="radio" name="status" value="3" class="peer sr-only">
                    <div class="py-2.5 px-3 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-white peer-checked:text-slate-900 peer-checked:shadow-sm peer-checked:font-semibold hover:text-slate-900">
                        Enviado
                    </div>
                </label>

                
                <label class="cursor-pointer">
                    <input wire:model="status" type="radio" name="status" value="4" class="peer sr-only">
                    <div class="py-2.5 px-3 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-white peer-checked:text-slate-900 peer-checked:shadow-sm peer-checked:font-semibold hover:text-slate-900">
                        Entregado
                    </div>
                </label>

                
                <label class="cursor-pointer">
                    <input wire:model="status" type="radio" name="status" value="5" class="peer sr-only">
                    <div class="py-2.5 px-3 text-center rounded-xl text-xs font-medium text-slate-600 transition-all duration-200 peer-checked:bg-rose-500 peer-checked:text-white peer-checked:shadow-sm peer-checked:font-semibold hover:text-slate-900">
                        Anulado
                    </div>
                </label>
            </div>

            <div class="mt-3 flex justify-end">
                <button type="submit" class="px-5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-medium transition-all active:scale-[0.98]">
                    Actualizar Estado
                </button>
            </div>
        </form>
    </section>

    
    <div class="grid sm:grid-cols-2 gap-6 mb-10">
        
        
        <div class="bg-white/70 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-6 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)]">
            <h3 class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-4">Entrega</h3>
            
            <?php if($order->envio_type == 1): ?>
                <div class="space-y-1">
                    <p class="text-sm font-semibold text-slate-900">Retiro en Tienda</p>
                    <p class="text-xs text-slate-500">Calle Falsa y Avenida 123</p>
                    <p class="text-[11px] text-slate-400 pt-1">Horario: Lun-Vie 9:00 AM - 6:00 PM</p>
                </div>
            <?php else: ?>
                <div class="space-y-1">
                    <p class="text-sm font-semibold text-slate-900">Envío a Domicilio</p>
                    <p class="text-xs text-slate-600"><?php echo e($order->address); ?></p>
                    <?php if(isset($order->department->name, $order->city->name, $order->district->name)): ?>
                        <p class="text-[11px] text-slate-400 pt-1">
                            <?php echo e($order->department->name); ?> • <?php echo e($order->city->name); ?> • <?php echo e($order->district->name); ?>

                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="bg-white/70 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-6 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)]">
            <h3 class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-4">Contacto</h3>
            
            <div class="space-y-1">
                <p class="text-sm font-semibold text-slate-900"><?php echo e($order->contact); ?></p>
                <a href="tel:<?php echo e($order->phone); ?>" class="text-xs text-slate-500 hover:text-slate-900 transition-colors inline-block">
                    <?php echo e($order->phone); ?>

                </a>
            </div>
        </div>

    </div>

    
    <section class="bg-white/70 backdrop-blur-xl rounded-3xl border border-slate-200/70 p-6 sm:p-8 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)]">
        <h3 class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-6">Resumen de Compras</h3>

        <div class="divide-y divide-slate-100">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-4 first:pt-0 last:pb-0 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4 min-w-0">
                        <img class="w-12 h-12 object-cover rounded-2xl bg-slate-50 border border-slate-100/80 shrink-0"
                             src="<?php echo e($item->options->image ?? asset('img/default.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                        <div class="min-w-0">
                            <p class="text-xs sm:text-sm font-semibold text-slate-900 truncate"><?php echo e($item->name); ?></p>
                            
                            <div class="flex items-center gap-2 mt-0.5">
                                <?php if(isset($item->options->color)): ?>
                                    <span class="text-[10px] text-slate-500 bg-slate-100/80 px-2 py-0.5 rounded-md font-medium">
                                        <?php echo e($item->options->color); ?>

                                    </span>
                                <?php endif; ?>

                                <?php if(isset($item->options->size)): ?>
                                    <span class="text-[10px] text-slate-500 bg-slate-100/80 px-2 py-0.5 rounded-md font-medium">
                                        <?php echo e($item->options->size); ?>

                                    </span>
                                <?php endif; ?>
                                <span class="text-[11px] text-slate-400">Cant: <?php echo e($item->qty); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="text-right shrink-0">
                        <p class="text-xs sm:text-sm font-semibold text-slate-900">$<?php echo e(number_format($item->price * $item->qty, 2)); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="mt-8 pt-6 border-t border-slate-100 space-y-2">
            <div class="flex justify-between text-xs text-slate-500">
                <span>Subtotal</span>
                <span>$<?php echo e(number_format(collect($items)->sum(fn($item) => $item->price * $item->qty), 2)); ?></span>
            </div>
            <div class="flex justify-between text-xs text-slate-500">
                <span>Envío</span>
                <span class="text-emerald-600 font-medium">Gratis</span>
            </div>
            <div class="flex justify-between text-sm font-semibold text-slate-900 pt-3 border-t border-slate-100">
                <span>Total</span>
                <span class="text-xl text-slate-900 tracking-tight">
                    $<?php echo e(number_format(collect($items)->sum(fn($item) => $item->price * $item->qty), 2)); ?>

                </span>
            </div>
        </div>
    </section>

</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/status-order.blade.php ENDPATH**/ ?>