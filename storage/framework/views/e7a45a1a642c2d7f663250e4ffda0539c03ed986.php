<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <div class="min-h-screen flex flex-col justify-between bg-[#F5F5F7] px-4 py-8 font-['Inter',sans-serif] text-[#1D1D1F] antialiased">
        
        
        <div class="flex justify-center pt-4">
            <div class="w-10 h-10 bg-black/5 rounded-2xl flex items-center justify-center backdrop-blur-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#1D1D1F]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>

        
        <div class="w-full max-w-[440px] mx-auto my-auto bg-white/80 backdrop-blur-2xl rounded-3xl p-8 sm:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-black/[0.04]">
            
            <div class="text-center mb-8">
                <h1 class="text-2xl sm:text-[26px] font-semibold tracking-tight text-[#1D1D1F]">
                    Inicia sesión en tu cuenta
                </h1>
                <p class="text-[14px] text-[#86868B] mt-1.5 font-normal">
                    Ingresa tus credenciales para acceder a la tienda.
                </p>
            </div>

            
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-4 text-xs text-red-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4 text-xs text-red-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if(session('status')): ?>
                <div class="mb-4 text-xs font-medium text-[#2997FF] text-center">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                
                <div>
                    <label for="email" class="block text-[12px] font-medium text-[#86868B] mb-1.5 ml-1">Correo electrónico</label>
                    <input id="email" name="email" type="email"
                           class="w-full h-12 bg-[#F5F5F7] border-0 rounded-2xl px-4 text-[15px] text-[#1D1D1F] placeholder-[#86868B] transition-all duration-200 focus:bg-white focus:ring-2 focus:ring-[#0071E3] focus:outline-none"
                           value="<?php echo e(old('email')); ?>"
                           placeholder="nombre@ejemplo.com"
                           required autofocus autocomplete="username" />
                </div>

                
                <div>
                    <div class="flex justify-between items-center mb-1.5 ml-1">
                        <label for="password" class="block text-[12px] font-medium text-[#86868B]">Contraseña</label>
                        <?php if(Route::has('password.request')): ?>
                            <a class="text-[12px] font-normal text-[#0071E3] hover:underline transition-colors" href="<?php echo e(route('password.request')); ?>">
                                ¿Olvidaste tu contraseña?
                            </a>
                        <?php endif; ?>
                    </div>
                    <input id="password" name="password" type="password"
                           class="w-full h-12 bg-[#F5F5F7] border-0 rounded-2xl px-4 text-[15px] text-[#1D1D1F] placeholder-[#86868B] transition-all duration-200 focus:bg-white focus:ring-2 focus:ring-[#0071E3] focus:outline-none"
                           placeholder="••••••••"
                           required autocomplete="current-password" />
                </div>

                
                <div class="pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer select-none" for="remember_me">
                        <input id="remember_me" name="remember" type="checkbox" 
                               class="w-4 h-4 rounded-md text-[#0071E3] border-gray-300 focus:ring-0 focus:ring-offset-0 cursor-pointer" />
                        <span class="text-[13px] text-[#515154] font-normal">Permanecer conectado</span>
                    </label>
                </div>

                
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full h-12 bg-[#0071E3] hover:bg-[#0077ED] text-white rounded-2xl text-[15px] font-medium tracking-normal transition-all duration-200 active:scale-[0.98]">
                        Continuar
                    </button>
                </div>
            </form>


        </div>

        
        <div class="text-center text-[12px] text-[#86868B] pb-2">
            Copyright © <?php echo e(date('Y')); ?> Tu Tienda Inc. Todos los derechos reservados.
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/auth/login.blade.php ENDPATH**/ ?>