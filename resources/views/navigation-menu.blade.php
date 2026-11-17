<nav x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/80 transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="transition-transform duration-200 active:scale-95">
                        <x-application-mark class="block h-8 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:flex items-center">
                    <x-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Productos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.orders.index') }}" :active="request()->routeIs('admin.orders.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Órdenes') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.covers.index') }}" :active="request()->routeIs('admin.covers.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Portadas') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Categorías') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.brands.index') }}" :active="request()->routeIs('admin.brands.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Marcas') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.departments.index') }}" :active="request()->routeIs('admin.departments.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Departamentos') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')"
                        class="rounded-xl px-3 py-2 text-sm font-medium transition-all">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 gap-3">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-xl shadow-sm">
                                    <button type="button"
                                        class="inline-flex items-center px-3.5 py-1.5 border border-slate-200/80 text-xs font-semibold rounded-xl text-slate-700 bg-slate-50/80 hover:bg-slate-100 focus:outline-none transition active:scale-95">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-3.5 w-3.5 text-slate-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60 p-1">
                                    <!-- Team Management -->
                                    <div
                                        class="block px-3 py-1.5 text-[10px] font-bold tracking-wider uppercase text-slate-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                        class="rounded-lg">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}" class="rounded-lg">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-slate-100 my-1"></div>

                                    <!-- Team Switcher -->
                                    <div
                                        class="block px-3 py-1.5 text-[10px] font-bold tracking-wider uppercase text-slate-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-white/80 rounded-full focus:outline-none ring-2 ring-slate-200/60 transition-transform active:scale-95">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-xl">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-1.5 border border-slate-200/80 text-xs font-semibold rounded-xl text-slate-700 bg-slate-50/80 hover:bg-slate-100 focus:outline-none transition active:scale-95">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-3.5 w-3.5 text-slate-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-1">
                                <!-- Account Management -->
                                <div
                                    class="block px-3 py-1.5 text-[10px] font-bold tracking-wider uppercase text-slate-400">
                                    {{ __('Gestion de Cuenta') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}"
                                    class="flex items-center gap-2.5 rounded-lg text-slate-600 hover:text-slate-900">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    {{ __('Ver Perfil') }}
                                </x-dropdown-link>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}" class="rounded-lg">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-slate-100 my-1"></div>

                                <!-- Authentication -->
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
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100/80 focus:outline-none transition active:scale-95">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden bg-white/95 backdrop-blur-2xl border-b border-slate-200/80 shadow-xl">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')" class="rounded-xl">
                {{ __('Productos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.orders.index') }}" :active="request()->routeIs('admin.orders.*')" class="rounded-xl">
                {{ __('Órdenes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.covers.index') }}" :active="request()->routeIs('admin.covers.*')" class="rounded-xl">
                {{ __('Portadas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.*')"
                class="rounded-xl">
                {{ __('Categorías') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.brands.index') }}" :active="request()->routeIs('admin.brands.*')" class="rounded-xl">
                {{ __('Marcas') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.departments.index') }}" :active="request()->routeIs('admin.departments.*')"
                class="rounded-xl">
                {{ __('Departamentos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')" class="rounded-xl">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-slate-100 bg-slate-50/50 px-3">
            <div class="flex items-center px-2 mb-3">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover ring-2 ring-slate-200"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-semibold text-sm text-slate-800 tracking-tight">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-slate-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="rounded-xl">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')"
                        class="rounded-xl">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                        class="rounded-xl text-red-600 hover:bg-red-50 hover:text-red-700"
                        @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-slate-200/60 my-2"></div>

                    <div class="block px-3 py-1 text-[10px] font-bold tracking-wider uppercase text-slate-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')" class="rounded-xl">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" class="rounded-xl">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-slate-200/60 my-2"></div>

                    <!-- Team Switcher -->
                    <div class="block px-3 py-1 text-[10px] font-bold tracking-wider uppercase text-slate-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
