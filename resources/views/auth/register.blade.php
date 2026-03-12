<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <!-- Logo + título -->
            <div class="flex flex-col items-center mb-6">
                <div class="bg-orange-500 text-white p-4 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.28 0 4.14-1.86 4.14-4.14S14.28 3.72 12 3.72 7.86 5.58 7.86 7.86 9.72 12 12 12zm0 0c-3.9 0-7.14 2.52-7.14 5.63V20h14.28v-2.37c0-3.11-3.24-5.63-7.14-5.63z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mt-4">Crea tu cuenta ✨</h2>
                <p class="text-sm text-gray-500">Regístrate y empieza a comprar de inmediato</p>
            </div>

            <!-- Validaciones -->
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <x-label for="name" value="Nombre completo" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-input id="name" class="block mt-1 w-full rounded-xl pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                 type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                        </svg>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="Correo electrónico" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-input id="email" class="block mt-1 w-full rounded-xl pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                 type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m-7-7h14" />
                        </svg>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-label for="password" value="Contraseña" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-input id="password" class="block mt-1 w-full rounded-xl pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                 type="password" name="password" required autocomplete="new-password" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 4v4" />
                        </svg>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-label for="password_confirmation" value="Confirmar contraseña" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-input id="password_confirmation" class="block mt-1 w-full rounded-xl pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                 type="password" name="password_confirmation" required autocomplete="new-password" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 4v4" />
                        </svg>
                    </div>
                </div>

                <!-- Terms -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 flex items-start">
                        <x-checkbox name="terms" id="terms" required class="text-orange-500 focus:ring-orange-400" />
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            Acepto los 
                            <a target="_blank" href="{{ route('terms.show') }}" class="text-orange-600 hover:text-orange-800">Términos de servicio</a> 
                            y la 
                            <a target="_blank" href="{{ route('policy.show') }}" class="text-orange-600 hover:text-orange-800">Política de privacidad</a>.
                        </label>
                    </div>
                @endif

                <!-- Botón -->
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-gray-600 hover:text-orange-600 font-medium" href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>

                    <x-button class="bg-orange-500 hover:bg-orange-600 focus:bg-orange-700 text-white font-bold py-2 px-6 rounded-xl shadow-md transition">
                        Registrarme
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
