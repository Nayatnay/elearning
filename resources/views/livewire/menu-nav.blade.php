<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow sticky top-0 z-[200]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition cursor-pointer"
                        href="#" data-turbo="false">
                        Cursos
                    </a>

                    <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition cursor-pointer"
                        href="#" data-turbo="false">
                        Recetas
                    </a>

                    <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition cursor-pointer"
                        href="#" data-turbo="false">
                        Eventos
                    </a>

                    <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition cursor-pointer"
                        href="#" data-turbo="false">
                        Inscripciones
                    </a>
                </div>



            </div>

            <!-- menu derecho -->

            <div class="hidden sm:flex sm:items-center sm:ml-6 ">

                <!-- Cart dropdown -->

                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition">

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" version="1.0"
                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" class="fill-gray-600"
                            stroke="none">
                            <path
                                d="M115 4885 c-117 -55 -150 -198 -68 -296 52 -62 62 -64 357 -69 l270 -5 314 -1315 c338 -1417 318 -1346 396 -1404 27 -21 29 -21 1573 -24 l1546 -2 44 21 c83 40 74 11 335 1067 257 1039 253 1015 207 1088 -11 19 -40 45 -63 59 l-43 25 -1896 0 c-1257 0 -1898 3 -1902 10 -3 6 -46 177 -95 381 -98 405 -104 420 -180 459 -37 19 -59 20 -402 20 -291 -1 -369 -4 -393 -15z m4565 -1242 c0 -5 -83 -341 -183 -748 l-183 -740 -1341 -3 -1341 -2 -16 67 c-8 38 -87 369 -176 738 -88 368 -160 675 -160 682 0 11 333 13 1700 13 935 0 1700 -3 1700 -7z">
                            </path>
                            <path
                                d="M1560 1467 c-435 -130 -604 -653 -323 -1004 136 -170 318 -252 532 -240 170 9 302 68 423 190 53 52 78 89 112 160 52 109 66 168 66 285 0 175 -62 325 -186 449 -57 57 -90 80 -165 116 -52 25 -118 50 -147 56 -89 18 -227 13 -312 -12z m285 -382 c191 -92 192 -357 1 -458 -57 -30 -165 -30 -222 0 -79 42 -144 145 -144 228 0 48 33 128 68 167 54 60 122 90 197 85 33 -2 78 -12 100 -22z">
                            </path>
                            <path
                                d="M3902 1476 c-102 -26 -217 -92 -296 -170 -60 -59 -82 -90 -119 -167 -53 -110 -67 -169 -67 -284 0 -106 14 -171 55 -262 112 -243 347 -385 614 -370 168 9 294 65 414 184 74 73 119 144 155 245 23 64 26 88 27 198 0 102 -4 138 -22 195 -60 188 -208 341 -401 413 -55 20 -89 26 -187 28 -78 2 -139 -1 -173 -10z m248 -387 c201 -91 210 -359 16 -462 -57 -30 -165 -30 -222 0 -204 108 -187 386 31 470 48 18 125 15 175 -8z">
                            </path>
                        </g>

                    </svg>

                </button>
            </div>

        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="lg:hidden max-h-[calc(100vh-4rem)] overflow-auto hidden">
        <div class="pt-2 pb-3 space-y-1">

            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="#" data-turbo="false">
                Cursos
            </a>
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="#" data-turbo="false">
                Recetas
            </a>

            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="#" data-turbo="false">
                Eventos
            </a>
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="#" data-turbo="false">
                Inscripciones
            </a>
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="https://codersfree.com/cart" data-turbo="false">
                Carrito de compras
            </a>
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="https://codersfree.com/login" data-turbo="false">
                Iniciar sesión
            </a>
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="https://codersfree.com/register" data-turbo="false">
                Registrarse
            </a>
        </div>
    </div>
    </div>
</nav>
