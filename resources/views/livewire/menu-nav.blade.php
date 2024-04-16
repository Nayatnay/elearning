@php

    $nav_links = [
        [
            'name' => 'cursos',
            'route' => route('cursos'),
            'active' => request()->routeIs('cursos', 'detalledelcurso', 'clasesdelcurso'),
        ],

        [
            'name' => 'recetas',
            'route' => route('recetas'),
            'active' => request()->routeIs('recetas'),
        ],

        [
            'name' => 'eventos',
            'route' => route('eventos'),
            'active' => request()->routeIs('eventos'),
        ],

       /* [
            'name' => 'inscripciones',
            'route' => route('inscripciones'),
            'active' => request()->routeIs('inscripciones'),
        ],
        */
    ];
@endphp
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100  shadow sticky top-0 z-[200]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between ">
            <div class="flex text-gray-600">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @foreach ($nav_links as $nav_link)
                        <x-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-nav-link>
                    @endforeach

                </div>
            </div>
            <!-- menu derecho -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <!-- Cart -->
                
                {{--<button class=" w-8 h-8 text-xl text-gray-400 hover:text-red-800 transition ease-in-out duration-150">
                    <a href="{{ route('carrito') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </button>--}}
                @if (Route::has('login'))
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="ms-3 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">

                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="w-8 h-8 text-xl bg-red-700 text-white rounded-full  hover:text-gray-200 focus:outline-none focus:bg-gray-300 active:bg-gray-300 focus:text-red-700 active:text-red-700 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-user"></i>
                                        </button>
                                    </span>

                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Administrar cuenta') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('miscursos') }}">
                                        {{ __('Mis cursos') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('admin_cursos') }}">
                                        {{ __('Administrar Cursos') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('admin_requisitos') }}">
                                        {{ __('Requisitos') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('admin_alcances') }}">
                                        {{ __('Alcances') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('admin_clases') }}">
                                        {{ __('Clases') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('admin_validar') }}">
                                        {{ __('Validaciones') }}
                                    </x-dropdown-link>

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Cerrar sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <!-- Session -->
                        <button
                            class="w-8 h-8 text-xl border border-gray-400 rounded-full text-gray-400 hover:text-red-800 transition ease-in-out duration-150">
                            <a href="{{ route('login') }}">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </button>
                    @endauth
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden max-h-[calc(100vh-4rem)] overflow-auto hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Route::has('login'))
                @auth
                    <div class="border-y py-1">
                        @foreach ($nav_links as $nav_link)
                            <x-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-responsive-nav-link>
                        @endforeach
                    </div>
                    {{--<a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('carrito') }}" data-turbo="false">
                        Carrito de compras
                    </a>--}}
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('profile.show') }}" data-turbo="false">
                        Perfil
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('miscursos') }}" data-turbo="false">
                        Mis cursos
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('admin_cursos') }}" data-turbo="false">
                        Administrar Cursos
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('admin_requisitos') }}" data-turbo="false">
                        Requisitos
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('admin_alcances') }}" data-turbo="false">
                        Alcances
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('admin_clases') }}" data-turbo="false">
                        Clases
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('admin_validar') }}" data-turbo="false">
                        Validaciones
                    </a>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <div class="border-y py-1s">
                        @foreach ($nav_links as $nav_link)
                            <x-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                {{ $nav_link['name'] }}
                            </x-responsive-nav-link>
                        @endforeach
                    </div>
                    {{--<a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('carrito') }}" data-turbo="false">
                        Carrito de compras
                    </a>--}}
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('login') }}" data-turbo="false">
                        Iniciar sesión
                    </a>
                    <a class="block ps-3 pe-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-red-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-red-300 transition"
                        href="{{ route('register') }}" data-turbo="false">
                        Registrarse
                    </a>
                @endauth
            @endif
        </div>
    </div>
</nav>
