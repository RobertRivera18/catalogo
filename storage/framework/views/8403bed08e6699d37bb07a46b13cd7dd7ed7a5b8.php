<div class="w-full">
    <div class="w-full p-4 sm:p-5 bg-white shadow rounded-xl">

        <h2 class="text-sm sm:text-base font-semibold text-center mb-4">
            Reseña del Producto
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">

            <!-- Total reseñas -->
            <div class="text-center text-yellow-400">

                <p class="text-3xl md:text-4xl font-bold">
                    <?php echo e($product->reviews->count()); ?>

                </p>

            </div>

            <!-- Barras de rating -->
            <ul class="md:col-span-3 space-y-2 text-xs sm:text-sm">

                <?php for($stars = 5; $stars >= 1; $stars--): ?>

                    <?php
                        $total = $product->reviews->count();
                        $percentage = $total > 0 ? ($ratingsCount[$stars] * 100) / $total : 0;
                    ?>

                    <li class="flex items-center gap-2">

                        <!-- Estrellas -->
                        <div class="flex items-center space-x-1 w-20">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <i class="fas fa-star <?php echo e($i <= $stars ? 'text-yellow-400' : 'text-gray-300'); ?>"></i>
                            <?php endfor; ?>
                        </div>

                        <!-- Barra -->
                        <div class="flex-1">
                            <div class="h-2 bg-gray-200 rounded">
                                <div
                                    style="width: <?php echo e($percentage); ?>%"
                                    class="h-2 bg-orange-500 rounded transition-all duration-500">
                                </div>
                            </div>
                        </div>

                        <!-- Porcentaje -->
                        <span class="w-10 text-right text-gray-600">
                            <?php echo e(number_format($percentage,0)); ?>%
                        </span>

                    </li>

                <?php endfor; ?>

            </ul>

        </div>

    </div>
</div><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/livewire/review-product.blade.php ENDPATH**/ ?>