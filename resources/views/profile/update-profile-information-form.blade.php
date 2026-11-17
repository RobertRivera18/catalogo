<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu cuenta y tu dirección de correo electrónico.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Foto de Perfil') }}" class="font-semibold text-slate-700" />

                <div class="mt-3 flex items-center gap-4">
                    <!-- Current Profile Photo -->
                    <div x-show="! photoPreview" class="relative group">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover ring-4 ring-slate-100 shadow-sm transition group-hover:opacity-90">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center ring-4 ring-indigo-50 shadow-sm"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <x-secondary-button type="button" class="rounded-xl border-slate-200 text-xs font-semibold hover:bg-slate-50 active:scale-95 transition" x-on:click.prevent="$refs.photo.click()">
                            <svg class="w-4 h-4 mr-1.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                            {{ __('Seleccionar Nueva Foto') }}
                        </x-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-secondary-button type="button" class="rounded-xl border-red-200 text-red-600 hover:bg-red-50 hover:text-red-700 active:scale-95 transition text-xs font-semibold" wire:click="deleteProfilePhoto">
                                <svg class="w-4 h-4 mr-1.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                {{ __('Eliminar') }}
                            </x-secondary-button>
                        @endif
                    </div>
                </div>

                <x-input-error for="photo" class="mt-2 text-xs" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre Completo') }}" class="font-semibold text-slate-700" />
            <x-input id="name" type="text" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500/20 text-sm shadow-sm transition" wire:model.defer="state.name" autocomplete="name" placeholder="Tu nombre" />
            <x-input-error for="name" class="mt-1.5 text-xs" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo Electrónico') }}" class="font-semibold text-slate-700" />
            <x-input id="email" type="email" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500/20 text-sm shadow-sm transition" wire:model.defer="state.email" autocomplete="username" placeholder="correo@ejemplo.com" />
            <x-input-error for="email" class="mt-1.5 text-xs" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-amber-50/80 border border-amber-200/80 rounded-xl">
                    <p class="text-xs text-amber-800 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <span>{{ __('Tu dirección de correo electrónico no está verificada.') }}</span>
                    </p>

                    <button type="button" class="mt-2 text-xs font-semibold text-amber-900 underline hover:text-amber-700 transition focus:outline-none" wire:click.prevent="sendEmailVerification">
                        {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                    </button>

                    @if ($this->verificationLinkSent)
                        <p class="mt-2 font-medium text-xs text-emerald-700 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 text-emerald-600 font-medium text-sm flex items-center gap-1" on="saved">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            {{ __('Guardado correctamente.') }}
        </x-action-message>

        <x-button class="rounded-xl px-4 py-2 bg-slate-900 hover:bg-slate-800 active:scale-95 transition shadow-sm" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar Cambios') }}
        </x-button>
    </x-slot>
</x-form-section>