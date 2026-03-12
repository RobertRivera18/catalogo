<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700 space-y-6">

        
        <div class="flex justify-end">
            <a href="<?php echo e(route('admin.covers.create')); ?>"
                class="inline-block px-5 py-2.5 text-sm font-semibold text-white bg-gray-800 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 transition">
                + Nuevo
            </a>
        </div>

        
        <ul class="space-y-6" id="covers">
            <?php $__currentLoopData = $covers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cover): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="bg-white rounded-2xl shadow-md overflow-hidden cursor-move"  data-id="<?php echo e($cover->id); ?>">
                    <div class="lg:flex">
                        
                        <img src="<?php echo e($cover->image); ?>" alt="Imagen de portada"
                            class="w-full lg:w-64 aspect-[3/1] object-cover object-center">

                        
                        <div class="p-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between flex-1">

                            
                            <div class="space-y-1">
                                <h2 class="text-lg font-semibold"><?php echo e($cover->title); ?></h2>
                                <?php if($cover->is_active): ?>
                                    <span
                                        class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-0.5 rounded">
                                        Activo
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-3 py-0.5 rounded">
                                        Inactivo
                                    </span>
                                <?php endif; ?>
                            </div>

                            
                            <div class="space-y-1 text-sm">
                                <p><span class="font-bold">Inicio:</span> <?php echo e($cover->start_at->format('d/m/Y')); ?></p>
                                <p><span class="font-bold">Finaliza:</span>
                                    <?php echo e($cover->end_at ? $cover->end_at->format('d/m/Y') : '-'); ?></p>
                            </div>

                            
                            <div>
                                <a href="<?php echo e(route('admin.covers.edit', $cover)); ?>"
                                    class="inline-block px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                                    Editar
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
  <?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.6/Sortable.min.js"></script>
    <script>
        const covers = document.getElementById('covers');

        new Sortable(covers, {
            animation: 150,
            ghostClass: 'bg-blue-100',
            onEnd: function () {
                const sorts = [];
                covers.querySelectorAll('li').forEach((el) => {
                    sorts.push(el.dataset.id);
                });

                axios.post("<?php echo e(route('api.sort.covers')); ?>", {
                    sorts: sorts
                })
                .then(() => {
                    console.log("Orden guardado correctamente");
                })
                .catch((error) => {
                    console.error("Error al guardar el orden", error);
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/admin/covers/index.blade.php ENDPATH**/ ?>