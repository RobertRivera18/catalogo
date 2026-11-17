<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-900 tracking-tight">
                    {{ __('Configuración del Perfil') }}
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    {{ __('Gestiona la información de tu cuenta y la seguridad.') }}
                </p>
            </div>
            
            <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-slate-100/80 backdrop-blur-md border border-slate-200/60 rounded-full text-slate-700 text-xs font-medium shadow-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>{{ Auth::user()->name ?? __('Usuario') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/60 min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 sm:p-8 border border-slate-200/60 shadow-sm transition-all duration-300 hover:shadow-md">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 sm:p-8 border border-slate-200/60 shadow-sm transition-all duration-300 hover:shadow-md">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            {{-- 
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 sm:p-8 border border-slate-200/60 shadow-sm transition-all duration-300 hover:shadow-md">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif 
            --}}

        </div>
    </div>
</x-app-layout>