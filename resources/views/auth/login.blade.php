<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <!-- Logo e ícono -->
            <div class="flex flex-col items-center mb-6">
                <div class="bg-orange-500 text-white p-4 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7a1 1 0 00.9 1.45h12.9M7 13L5.4 5M16 16a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mt-4">Inicia sesión en tu tienda</h2>
                <p class="text-sm text-gray-500">Accede a tu cuenta y sigue comprando</p>
            </div>

            <!-- Errores -->
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" value="Correo electrónico" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-input id="email" class="block mt-1 w-full rounded-xl pl-10 border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                 type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
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
                                 type="password" name="password" required autocomplete="current-password" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 4v4" />
                        </svg>
                    </div>
                </div>

                <!-- Remember me -->
                <div class="flex items-center mb-4">
                    <x-checkbox id="remember_me" name="remember" class="text-orange-500 focus:ring-orange-400" />
                    <span class="ml-2 text-sm text-gray-600">Recuérdame</span>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-600 hover:text-orange-800 font-medium" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-button class="bg-orange-500 hover:bg-orange-600 focus:bg-orange-700 text-white font-bold py-2 px-6 rounded-xl shadow-md transition">
                        Iniciar sesión
                    </x-button>
                </div>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <hr class="flex-grow border-gray-300">
                <span class="px-2 text-gray-400 text-sm">o</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Register link -->
            <p class="text-center text-sm text-gray-600">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-orange-600 font-semibold hover:text-orange-800">
                    Crear cuenta
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
