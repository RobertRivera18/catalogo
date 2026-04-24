<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">
        <div class="bg-white rounded-2xl border border-gray-200 p-7">

            
            <div class="flex items-center gap-3 mb-6 pb-5 border-b border-gray-100">
                <div
                    class="w-9 h-9 rounded-xl bg-gray-50 border border-gray-200 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-file-invoice text-gray-500 text-sm"></i>
                </div>
                <div>
                    <h2 class="text-[15px] font-medium text-gray-900 leading-none">Facturación y envío</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Datos de contacto para tu pedido</p>
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                        Nombre de contacto
                    </label>
                    <div class="relative">
                        <i
                            class="far fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'text','wire:model.defer' => 'contact','placeholder' => 'Ej: Juan Pérez']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'text','wire:model.defer' => 'contact','placeholder' => 'Ej: Juan Pérez']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <span class="text-[11px] text-gray-400">Nombre completo del destinatario</span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'contact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'contact']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                
                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                        Teléfono de contacto
                    </label>
                    <div class="relative">
                        <i
                            class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'tel','wire:model.defer' => 'phone','placeholder' => 'Ej: 0999 999 999']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'tel','wire:model.defer' => 'phone','placeholder' => 'Ej: 0999 999 999']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <span class="text-[11px] text-gray-400">Número celular o fijo con código de área</span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'phone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'phone']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                
                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                        Tipo de identificación
                    </label>
                    <div class="relative">
                        <i
                            class="far fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <select wire:model.defer="identification_type"
                            class="w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition">
                            <option value="">Seleccionar</option>
                            <option value="cedula">Cédula</option>
                            <option value="ruc">RUC</option>
                        </select>
                    </div>
                    <span class="text-[11px] text-gray-400">Seleccione el tipo de documento</span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'identification_type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'identification_type']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

                
                <div class="flex flex-col gap-1.5">
                    <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                        Número de identificación
                    </label>
                    <div class="relative">
                        <i
                            class="fas fa-hashtag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'text','wire:model.defer' => 'identification_number','placeholder' => 'Ej: 0102030405']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full pl-9 h-10 rounded-xl bg-gray-50 border-gray-200 text-sm
                focus:bg-white focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition','type' => 'text','wire:model.defer' => 'identification_number','placeholder' => 'Ej: 0102030405']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <span class="text-[11px] text-gray-400">Ingrese cédula o RUC sin espacios</span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'identification_number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'identification_number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>

            </div>
        </div>

        <div x-data="{ envio_type: <?php if ((object) ('envio_type') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('envio_type'->value()); ?>')<?php echo e('envio_type'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('envio_type'); ?>')<?php endif; ?> }">

            <p class="mt-6 mb-3 text-[13px] font-medium text-gray-500 uppercase tracking-widest">Envíos</p>

            
            <label
                class="group flex items-center gap-3 bg-white border rounded-xl px-4 py-3.5 mb-2 cursor-pointer transition-all"
                :class="envio_type == 1 ?
                    'border-[1.5px] border-gray-800 bg-gray-50' :
                    'border-gray-200 hover:border-gray-300'">

                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="sr-only">

                
                <div class="w-4 h-4 rounded-full border-[1.5px] flex items-center justify-center flex-shrink-0 transition-colors"
                    :class="envio_type == 1 ? 'border-gray-800' : 'border-gray-300'">
                    <div class="w-2 h-2 rounded-full bg-gray-800 transition-opacity"
                        :class="envio_type == 1 ? 'opacity-100' : 'opacity-0'"></div>
                </div>

                
                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors"
                    :class="envio_type == 1 ? 'bg-gray-800' : 'bg-gray-100 border border-gray-200'">
                    <i class="fas fa-store text-sm transition-colors"
                        :class="envio_type == 1 ? 'text-white' : 'text-gray-500'"></i>
                </div>

                
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-800">Recojo en tienda</p>
                    <p class="text-xs text-gray-400 mt-0.5">Calle Falsa 123 · Lun–Sáb, 9am–6pm</p>
                </div>

                <span class="text-sm font-medium text-green-700">Gratis</span>
            </label>

            
            <label
                class="group flex items-center gap-3 bg-white border rounded-xl px-4 py-3.5 cursor-pointer transition-all"
                :class="envio_type == 2 ?
                    'border-[1.5px] border-gray-800 bg-gray-50 rounded-b-none border-b-0' :
                    'border-gray-200 hover:border-gray-300'">

                <input x-model="envio_type" type="radio" value="2" name="envio_type" class="sr-only">

                <div class="w-4 h-4 rounded-full border-[1.5px] flex items-center justify-center flex-shrink-0 transition-colors"
                    :class="envio_type == 2 ? 'border-gray-800' : 'border-gray-300'">
                    <div class="w-2 h-2 rounded-full bg-gray-800 transition-opacity"
                        :class="envio_type == 2 ? 'opacity-100' : 'opacity-0'"></div>
                </div>

                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors"
                    :class="envio_type == 2 ? 'bg-gray-800' : 'bg-gray-100 border border-gray-200'">
                    <i class="fas fa-truck text-sm transition-colors"
                        :class="envio_type == 2 ? 'text-white' : 'text-gray-500'"></i>
                </div>

                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-800">Envío a domicilio (Servientrega)</p>
                    <p class="text-xs text-gray-400 mt-0.5">Entrega en 2–4 días hábiles</p>
                </div>

                <span class="text-sm text-gray-400">Calcular</span>
            </label>

            
            <div x-show="envio_type == 2" x-cloak x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                class="bg-gray-50 border border-[1.5px] border-gray-800 border-t-0 rounded-b-xl px-4 pb-5 pt-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Provincia
                        </label>

                        <div class="relative">
                            <i class="fas fa-map text-gray-400 text-sm absolute left-3 top-1/2 -translate-y-1/2"></i>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model' => 'provincia','type' => 'text','placeholder' => 'Ej: Pichincha','class' => 'w-full pl-9 h-10 rounded-xl border-gray-200 text-sm
                focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'provincia','type' => 'text','placeholder' => 'Ej: Pichincha','class' => 'w-full pl-9 h-10 rounded-xl border-gray-200 text-sm
                focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'provincia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'provincia']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Ciudad (texto)
                        </label>

                        <div class="relative">
                            <i class="fas fa-city text-gray-400 text-sm absolute left-3 top-1/2 -translate-y-1/2"></i>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model' => 'ciudad','type' => 'text','placeholder' => 'Ej: Quito','class' => 'w-full pl-9 h-10 rounded-xl border-gray-200 text-sm
                focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'ciudad','type' => 'text','placeholder' => 'Ej: Quito','class' => 'w-full pl-9 h-10 rounded-xl border-gray-200 text-sm
                focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'ciudad']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'ciudad']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Departamento
                        </label>

                        <select wire:model="department_id"
                            class="h-10 w-full rounded-xl border-gray-200 bg-white text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition">

                            <option value="" disabled selected>Selecciona...</option>

                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'department_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'department_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Ciudad (catálogo)
                        </label>

                        <select wire:model="city_id"
                            class="h-10 w-full rounded-xl border-gray-200 bg-white text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition">

                            <option value="" disabled selected>Selecciona...</option>

                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'city_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'city_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Distrito
                        </label>

                        <select wire:model="district_id"
                            class="h-10 w-full rounded-xl border-gray-200 bg-white text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition">

                            <option value="" disabled selected>Selecciona...</option>

                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'district_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'district_id']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Dirección
                        </label>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model' => 'address','type' => 'text','placeholder' => 'Av. Principal 456, Dpto 3B','class' => 'w-full h-10 rounded-xl border-gray-200 text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'address','type' => 'text','placeholder' => 'Av. Principal 456, Dpto 3B','class' => 'w-full h-10 rounded-xl border-gray-200 text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'address']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'address']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">
                            Referencia
                        </label>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model' => 'references','type' => 'text','placeholder' => 'Ej: Frente al parque, edificio azul','class' => 'w-full h-10 rounded-xl border-gray-200 text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'references','type' => 'text','placeholder' => 'Ej: Frente al parque, edificio azul','class' => 'w-full h-10 rounded-xl border-gray-200 text-sm
            focus:ring-2 focus:ring-black/10 focus:border-gray-400 transition']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'references']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'references']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                </div>
            </div>

        </div>




    </div>
    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden mb-4">

            
            <div class="bg-gray-900 px-5 py-3.5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-receipt text-white text-xs"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white leading-none">Resumen de compra</p>
                        <p class="text-[11px] text-white/50 mt-0.5"><?php echo e(Cart::content()->count()); ?> producto(s)</p>
                    </div>
                </div>
                <a href="<?php echo e(route('orders.create')); ?>"
                    class="w-7 h-7 rounded-md border border-white/15 flex items-center justify-center
                      text-white/60 hover:text-white hover:bg-white/10 transition text-xs">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>

            
            <div class="divide-y divide-gray-100 px-4">
                <?php $__empty_1 = true; $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center gap-3 py-3">
                        <figure class="flex-shrink-0">
                            <img class="w-12 h-12 rounded-lg border border-gray-100 object-cover"
                                src="<?php echo e($item->options->image); ?>" alt="<?php echo e($item->name); ?>">
                        </figure>

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-800 truncate"><?php echo e($item->name); ?></p>
                            <p class="text-xs text-gray-400 mt-0.5">$<?php echo e($item->price); ?></p>

                            <?php if(isset($item->options['color']) || isset($item->options['size'])): ?>
                                <div class="flex items-center gap-1.5 mt-1.5 flex-wrap">
                                    <?php if(isset($item->options['color'])): ?>
                                        <span
                                            class="text-[10px] font-medium px-2 py-0.5 rounded bg-gray-100
                                                 border border-gray-200 text-gray-600">
                                            Color: <?php echo e($item->options['color']); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(isset($item->options['size'])): ?>
                                        <span
                                            class="text-[10px] font-medium px-2 py-0.5 rounded bg-gray-100
                                                 border border-gray-200 text-gray-600">
                                            Talla: <?php echo e($item->options['size']); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div
                            class="w-6 h-6 rounded-md bg-gray-100 border border-gray-200 flex items-center
                                justify-center text-xs font-medium text-gray-600 flex-shrink-0">
                            <?php echo e($item->qty); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="py-8 text-center">
                        <i class="fas fa-cart-shopping text-gray-300 text-2xl mb-2 block"></i>
                        <p class="text-sm text-gray-400">No hay productos en el carrito</p>
                    </div>
                <?php endif; ?>
            </div>

            
            <?php
                $subtotal = floatval(str_replace(',', '', Cart::subTotal()));
                $iva = $subtotal * 0.15;
                $shipping = $envio_type == 1 ? 0 : $shipping_cost;
                $total = $subtotal + $iva + $shipping;
            ?>

            <div class="bg-gray-50 border-t border-gray-100 px-5 py-4 space-y-2.5">

                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">Subtotal</span>
                    <span class="font-medium text-gray-800">
                        $<?php echo e(number_format($subtotal, 2)); ?>

                    </span>
                </div>

                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">IVA (15%)</span>
                    <span class="font-medium text-gray-800">
                        $<?php echo e(number_format($iva, 2)); ?>

                    </span>
                </div>

                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">Envío</span>
                    <span class="font-medium <?php echo e($shipping == 0 ? 'text-green-700' : 'text-gray-800'); ?>">
                        <?php echo e($shipping == 0 ? 'Gratis' : '$' . number_format($shipping, 2)); ?>

                    </span>
                </div>

                <div class="h-px bg-gray-200"></div>

                <div class="flex justify-between items-baseline pt-1">
                    <span class="text-sm font-semibold text-gray-800">Total</span>
                    <span class="text-xl font-bold text-gray-900">
                        $<?php echo e(number_format($total, 2)); ?>

                    </span>
                </div>

            </div>
        </div>

        
        <button wire:click="create_order" wire:loading.attr="disabled"
            class="w-full h-11 flex items-center justify-center gap-2 bg-gray-900 hover:bg-gray-800
               text-white text-sm font-medium rounded-xl transition active:scale-[0.99]
               disabled:opacity-60 disabled:cursor-not-allowed">
            <span wire:loading.remove wire:target="create_order">
                Confirmar pedido <i class="fas fa-arrow-right text-xs ml-1"></i>
            </span>
            <span wire:loading wire:target="create_order" class="flex items-center gap-2">
                <i class="fas fa-spinner fa-spin text-xs"></i> Procesando...
            </span>
        </button>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/create-order.blade.php ENDPATH**/ ?>