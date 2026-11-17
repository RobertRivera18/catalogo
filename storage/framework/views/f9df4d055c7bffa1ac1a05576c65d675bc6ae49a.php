<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-900 tracking-tight">
                    <?php echo e(__('Configuración del Perfil')); ?>

                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    <?php echo e(__('Gestiona la información de tu cuenta y la seguridad.')); ?>

                </p>
            </div>
            
            <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-slate-100/80 backdrop-blur-md border border-slate-200/60 rounded-full text-slate-700 text-xs font-medium shadow-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span><?php echo e(Auth::user()->name ?? __('Usuario')); ?></span>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-10 bg-slate-50/60 min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <?php if(Laravel\Fortify\Features::canUpdateProfileInformation()): ?>
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 sm:p-8 border border-slate-200/60 shadow-sm transition-all duration-300 hover:shadow-md">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.update-profile-information-form')->html();
} elseif ($_instance->childHasBeenRendered('FTvJxXh')) {
    $componentId = $_instance->getRenderedChildComponentId('FTvJxXh');
    $componentTag = $_instance->getRenderedChildComponentTagName('FTvJxXh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FTvJxXh');
} else {
    $response = \Livewire\Livewire::mount('profile.update-profile-information-form');
    $html = $response->html();
    $_instance->logRenderedChild('FTvJxXh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            <?php endif; ?>

            <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords())): ?>
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 sm:p-8 border border-slate-200/60 shadow-sm transition-all duration-300 hover:shadow-md">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('profile.update-password-form')->html();
} elseif ($_instance->childHasBeenRendered('MpDCftB')) {
    $componentId = $_instance->getRenderedChildComponentId('MpDCftB');
    $componentTag = $_instance->getRenderedChildComponentTagName('MpDCftB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MpDCftB');
} else {
    $response = \Livewire\Livewire::mount('profile.update-password-form');
    $html = $response->html();
    $_instance->logRenderedChild('MpDCftB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            <?php endif; ?>

            

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\catalogo\resources\views/profile/show.blade.php ENDPATH**/ ?>