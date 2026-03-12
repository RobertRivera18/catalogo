<div>
    <div class="flex flex-col max-w-xl p-8 shadow-sm rounded-xl lg:p-12 dark:bg-gray-900 dark:text-gray-100">
        <div class="flex flex-col w-full">
            <h2 class="text-xl font-semibold text-center">Reseña del Producto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 sm:gap-6 items-center">
                <div class="text-center text-yellow-400">
                    <p class="text-6xl font-bold"><?php echo e($product->reviews->count()); ?></p>
                    <ul class="flex items-center space-x-1 text-xs justify-center">

                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                    </ul>
                    <p class="text-lg font-semibold">Valoraciones</p>
                </div>

                <ul class="col-span-1 sm:col-span-3">

                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:100%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                        </ul>

                        <?php if($product->reviews->count() > 0): ?>
                        <span class="w-16">
                            <?php echo e(($ratingsCount[5]*100)/$product->reviews->count()); ?>%
                        </span>
                        <?php else: ?>
                        0%
                        <?php endif; ?>
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>

                        </ul>

                        <?php if($product->reviews->count() > 0): ?>
                        <span class="w-16">
                            <?php echo e(($ratingsCount[4]*100)/$product->reviews->count()); ?>%
                        </span>
                        <?php else: ?>
                        0%
                        <?php endif; ?>

                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul>
                        <?php if($product->reviews->count() > 0): ?>
                        <span class="w-16">
                            <?php echo e(($ratingsCount[3]*100)/$product->reviews->count()); ?>%
                        </span>
                        <?php else: ?>
                        0%
                        <?php endif; ?>
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul>

                        <?php if($product->reviews->count() > 0): ?>
                        <span class="w-16">
                            <?php echo e(($ratingsCount[2]*100)/$product->reviews->count()); ?>%
                        </span>
                        <?php else: ?>
                        0%
                        <?php endif; ?>
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul>

                        <?php if($product->reviews->count() > 0): ?>
                        <span class="w-16">
                            <?php echo e(($ratingsCount[1]*100)/$product->reviews->count()); ?>%
                        </span>
                        <?php else: ?>
                        0%
                        <?php endif; ?>
                    </li>

                </ul>
            </div>

        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/review-product.blade.php ENDPATH**/ ?>