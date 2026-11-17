<style>
    #navigation-menu {
        height: calc(100vh - 4rem);
    }

    .navigation-link:hover .navigation-submenu {
        display: block !important;
    }
</style>

<header class="bg-gray-900 sticky top-0 z-[900]" x-data="dropdown()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center h-16 justify-between gap-2">

        <!-- Logo principal -->
        <h1 class="text-white">
            <a href="/" class="inline-flex flex-col items-start md:items-end">
                <span class="md:text-3xl text-lg leading-4 md:leading-6 font-semibold">Catalogo</span>
                <span class="text-xs md:text-base">Digital</span>
            </a>
        </h1>

        <!-- Buscador en escritorio -->
        <div class="flex-1 hidden md:block mx-4">
            @livewire('search')
        </div>

        <div class="flex items-center space-x-3 md:space-x-4">

            <div class="flex items-center">
                @livewire('dropdown-cart')
            </div>

            <div class="relative hidden md:block">
                @auth
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex items-center gap-2 p-1 text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-slate-300 transition active:scale-95">
                                    <img class="h-9 w-9 rounded-full object-cover ring-2 ring-slate-200/80 shadow-sm"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button type="button"
                                    class="inline-flex items-center gap-2 px-3.5 py-2 border border-slate-200/80 text-sm font-medium rounded-xl text-slate-700 bg-white/80 hover:bg-slate-50 focus:outline-none transition active:scale-95 shadow-sm">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-1">
                                <!-- Cabecera de usuario -->
                                <div class="px-3 py-2 border-b border-slate-100 mb-1">
                                    <p class="text-xs font-semibold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email }}</p>
                                </div>

                                <!-- Enlaces principales -->
                                <x-dropdown-link href="{{ route('profile.show') }}"
                                    class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    {{ __('Ver Perfil') }}
                                </x-dropdown-link>

                                @role('admin')
                                    <x-dropdown-link href="{{ route('admin.index') }}"
                                        class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 18H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 12h9.75" />
                                        </svg>
                                        {{ __('Administrador') }}
                                    </x-dropdown-link>
                                @endrole

                                <x-dropdown-link href="{{ route('orders.index') }}"
                                    class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    {{ __('Mis pedidos') }}
                                </x-dropdown-link>

                                <div class="border-t border-slate-100 my-1"></div>

                                <!-- Cerrar Sesión -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        class="flex items-center gap-2.5 rounded-lg text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click.prevent="$root.submit();">
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        {{ __('Cerrar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button type="button"
                                class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-slate-700 bg-white/80 hover:bg-slate-100 border border-slate-200/80 rounded-xl transition active:scale-95 shadow-sm">
                                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ __('Cuenta') }}</span>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="p-1">
                                <x-dropdown-link href="{{ route('login') }}"
                                    class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    {{ __('Iniciar Sesión') }}
                                </x-dropdown-link>
                                @if (Route::has('register'))
                                    <x-dropdown-link href="{{ route('register') }}"
                                        class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235 serve" />
                                        </svg>
                                        {{ __('Registrarse') }}
                                    </x-dropdown-link>
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Botón de menú hamburguesa -->
            <button :class="{ 'bg-opacity-100 text-gray-500': open }" x-on:click="show()"
                class="flex flex-col items-center justify-center p-2 rounded-md bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-10 w-10 md:w-auto md:h-full md:px-4">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="text-sm hidden md:block">Categorías</span>
            </button>
        </div>
    </div>

    <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }" x-show="open"
        class="bg-zinc-700 w-full absolute hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full hidden md:block pt-3 pb-8">
            <div x-on:click.away="close()"
                class="grid grid-cols-4 bg-white/95 backdrop-blur-2xl rounded-3xl border border-slate-200/80 shadow-2xl overflow-hidden min-h-[420px] relative">

                {{-- Lista de categorías (Columna 1) --}}
                <ul class="col-span-1 bg-slate-50/50 p-3 border-r border-slate-100 space-y-1">
                    @foreach ($categories as $category)
                        <li class="navigation-link group">
                            <a href="{{ route('categories.show', $category) }}"
                                class="flex items-center gap-3 py-2.5 px-3 rounded-2xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-white hover:shadow-sm transition-all duration-200">
                                <span
                                    class="flex items-center justify-center w-7 h-7 rounded-xl bg-slate-200/60 text-slate-600 group-hover:bg-slate-900 group-hover:text-white transition-colors duration-200 text-xs">
                                    {!! $category->icon !!}
                                </span>
                                <span class="truncate">{{ $category->name }}</span>
                            </a>

                            {{-- Submenú al hover (Cubre las 3 columnas de la derecha limpiamente) --}}
                            <div
                                class="navigation-submenu bg-white absolute top-0 right-0 w-3/4 h-full hidden group-hover:block z-20">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>

                {{-- Panel por defecto (Columna 2, 3 y 4) --}}
                <div class="col-span-3 bg-white">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>

            </div>
        </div>

        <!-- Móvil -->
        <div
            class="bg-white/95 backdrop-blur-2xl h-screen overflow-y-auto block md:hidden px-4 pt-3 pb-24 shadow-2xl border-b border-slate-200/80">

            <div class="py-2 mb-4">
                @livewire('search')
            </div>

            <span
                class="text-[11px] font-semibold tracking-widest text-slate-400 uppercase block px-1 mb-2">Categorías</span>

            <ul class="space-y-2">
                @foreach ($categories as $category)
                    <li x-data="{ open: false }"
                        class="rounded-2xl bg-slate-50/70 border border-slate-100 overflow-hidden transition-all duration-200">

                        {{-- Cabecera de la Categoría --}}
                        <div @click="open = !open"
                            class="flex items-center justify-between p-3 text-slate-800 cursor-pointer hover:bg-slate-100/80 active:bg-slate-100 transition-colors">
                            <div class="flex items-center gap-3">
                                <span
                                    class="flex items-center justify-center w-8 h-8 rounded-xl bg-slate-200/70 text-slate-700 text-xs">
                                    {!! $category->icon !!}
                                </span>
                                <span
                                    class="text-sm font-semibold tracking-tight text-slate-800">{{ $category->name }}</span>
                            </div>

                            <i :class="open ? 'fa-chevron-up text-slate-900' : 'fa-chevron-down text-slate-400'"
                                class="fas text-xs transition-transform duration-200"></i>
                        </div>

                        {{-- Acordeón de Subcategorías --}}
                        <div x-show="open" x-transition class="bg-white border-t border-slate-100/80">
                            <x-navigation-subcategories :category="$category" />
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Opciones de Usuario en Menú Móvil -->
            <span
                class="text-[11px] font-semibold tracking-widest text-slate-400 uppercase block px-1 mt-7 mb-2">Cuenta</span>

            <div class="space-y-1">
                @auth()
                    <a href="{{ route('profile.show') }}"
                        class="py-2.5 px-3.5 flex items-center gap-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                        <span class="w-5 text-center text-slate-400"><i class="fas fa-address-card"></i></span> Perfil
                    </a>

                    <a href="{{ route('orders.index') }}"
                        class="py-2.5 px-3.5 flex items-center gap-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                        <span class="w-5 text-center text-slate-400"><i class="fas fa-shopping-bag"></i></span> Mis
                        Pedidos
                    </a>

                    @role('admin')
                        <a href="{{ route('admin.index') }}"
                            class="py-2.5 px-3.5 flex items-center gap-3 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                            <span class="w-5 text-center text-slate-400"><i class="fas fa-user-shield"></i></span>
                            Administrador
                        </a>
                    @endrole

                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="py-2.5 px-3.5 flex items-center gap-3 rounded-xl text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors cursor-pointer">
                        <span class="w-5 text-center text-red-400"><i class="fas fa-sign-out-alt"></i></span> Cerrar
                        Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                @else
                    <a href="{{ route('login') }}"
                        class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-slate-900 text-white font-semibold text-xs tracking-wide uppercase shadow-sm active:scale-95 transition-all mt-2">
                        <i class="fas fa-user-circle text-sm"></i> Iniciar Sesión
                    </a>
                @endauth
            </div>
        </div>
    </nav>
</header>

