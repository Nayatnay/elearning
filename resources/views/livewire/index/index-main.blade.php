<div>

    <div id="default-carousel" class="relative" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class=" overflow-hidden relative h-48 sm:h-64 xl:h-[430px]">
            <!-- Item 1 -->
            @php
                $itm = 0;
            @endphp
            @foreach ($slides as $slide)
                @php
                    $itm++;
                @endphp
                @if ($itm == $slideactive)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('/storage/diapositivas/' . $slide->imagen) }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                @else
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('/storage/diapositivas/' . $slide->imagen) }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                @endif
            @endforeach
        </div>
        <!-- Slider indicators -->
        @php
            $a = 0;
            $b = 1;
        @endphp
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            @foreach ($slides as $slide)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                    aria-label="Slide {{ $b }}" data-carousel-slide-to="{{ $a }}"></button>
                @php
                    $a++;
                    $b++;
                @endphp
            @endforeach

        </div>
        <!-- Slider controls -->
        <button type="button"
            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button"
            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                    </path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>


    {{-- <!-- sliders originales -->

    <div id="default-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class=" overflow-hidden relative h-48 sm:h-64 xl:h-[430px]">
            <!-- Item 1 -->
            <div class="hidden ease-in-out duration-700" data-carousel-item>
                <img src="{{ asset('img/1.jpg') }}"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden ease-in-out duration-700" data-carousel-item="active">
                <img src="{{ asset('img/2.jpg') }}"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden ease-in-out duration-700" data-carousel-item>
                <img src="{{ asset('img/3.jpg') }}"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button"
            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                    </path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div> --}}

    <div class="w-full py-10">

        <div class="max-w-7xl mx-auto">

            <p class="text-center text-2xl uppercase mb-5">Contenido</p>

            <div
                class="grid gap-x-4 gap-y-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-4 py-8 text-xl text-gray-700 font-medium">

                <div class="rounded-md border border-gray-300 bg-gray-100">

                    <a href="{{ route('cursos') }}">
                        <img src="{{ asset('/img/cursos.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Cursos online y presenciales
                        </p>
                    </a>
                </div>
                <div class="rounded-md border border-gray-300 bg-gray-100">
                    <a href="{{ route('recetas') }}">
                        <img src="{{ asset('/img/recetas.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Recetas paso a paso
                        </p>
                    </a>
                </div>
                <div class="rounded-md border border-gray-300 bg-gray-100">
                    <a href="{{ route('eventos') }}">
                        <img src="{{ asset('/img/eventos.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Eventos y Noticias
                        </p>
                    </a>
                </div>
                <div class="rounded-md border border-gray-300 bg-gray-100">
                    <a href="{{ route('empleos') }}">
                        <img src="{{ asset('/img/empleos.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Empleos
                        </p>
                    </a>
                </div>

            </div>
        </div>


        <div class="py-10 md:py-20 max-w-7xl mx-auto ">

            <div class="flex items-center justify-center flex-wrap">
                <div class="p-4 max-w-[460px] md:mr-2">
                    <img src="{{ asset('/img/img1.png') }}" alt="" title="" class="w-full">
                </div>
                <div class="p-4  text-5xl md:ml-2 max-w-[512px]">
                    <p class="font-bold">Comienza ya</p>
                    <p class="text-2xl md:text-3xl mt-1">Aprende a defenderte como un chef</p>
                    <p class="text-base mt-4 text-gray-700">Regístrate y adquiere nuestros cursos en línea o presencial
                    </p>

                    <a href="{{ route('register') }}">
                        <div
                            class="md:inline-block my-8 px-12 py-2 border-2 border-gray-300 bg-gradient-to-r from-lime-800 via-lime-700 to-lime-800 text-white fontextra-light hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800  text-center rounded-full ">
                            <p class="font-bold text-2xl ">Regístrate aquí</p>

                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- muestra cursos -->

        <div class="max-w-7xl mx-auto">

            @if ($cursos->count())

                <p class="text-center text-2xl uppercase">Cursos disponibles</p>

                <div
                    class="text-black grid gap-x-4 gap-y-4 md:gap-y-8 grid-cols-1 sm:grid-cols-2 
                lg:grid-cols-3 xl:grid-cols-4 px-4 py-8">

                    @foreach ($cursos as $curso)
                        <div
                            class="flex flex-col items-center justify-between border border-gray-300 rounded-lg bg-gray-100">

                            <div class="flex flex-col h-[50%] items-start">
                                <a href="{{ route('detalledelcurso', $curso) }}">
                                    <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt=""
                                        title="" class="w-full rounded-tl-lg rounded-tr-lg" width="">
                                </a>
                                <a href="{{ route('detalledelcurso', $curso) }}" class="p-4 text-lg">
                                    <p class="text-ellipsis line-clamp-2 font-normal">{{ $curso->nombre }}</p>
                                </a>
                            </div>

                            <div class="w-full p-4 font-bold text-lg">

                                <div class="text-sm text-yellow-300">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <div class="flex items-start mt-2">
                                    <span class="text-sm font-normal mt-0.5 mr-0.5">US$</span>
                                    <span class="text-3xl font-semibold">
                                        {{ intval($curso->costo) }}</span>
                                    @php
                                        $numero = number_format($curso->costo, 2, '.', '');
                                        $decimal = substr($numero, -2);
                                    @endphp
                                    @if ($decimal != 0)
                                        <span class="mt-0.5 ml-0.5 text-sm font-light">{{ $decimal }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('detalledelcurso', $curso) }}">
                                    <div class="my-2 text-center bg-gray-300 p-2 rounded text-sm">
                                        Ver Información
                                    </div>
                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>

                @if ($cursos->hasPages())
                    <div class="w-1/2 mx-auto px-4 py-2 text-center">
                        {{ $cursos->onEachSide(0)->links() }}
                    </div>
                @endif

            @endif
        </div>

        <div class="max-w-7xl mx-auto p-4 my-10">
            @if ($info == 0)
                <!--Formulario de Suscripcion -->

                {{-- <div
                    class="md:h-60 flex flex-col items-center justify-center border border-gray-400 rounded-2xl text-3xl md:text-4xl text-center px-4 py-10 bg-no-repeat bg-cover bg-center" 
                    style="background-image:linear-gradient(rgba(237, 237, 237, 0.1), rgba(255, 244, 244, 0.4)), url(img/chef.jpg)">
                --}}
                <div
                    class="my-10 md:h-60 flex flex-col items-center justify-center border-4 border-gray-200 rounded-2xl text-3xl md:text-4xl text-center px-4 py-10 bg-gray-400 text-white shadow shadow-gray-700">
                    <p class="font-black">Suscríbete a nuestro <strong class="text-red-800">boletín</strong></p>
                    <p class="text-base md:text-lg my-4 font-normal">¡Manténte al día! Recibe noticias sobre la
                        disponibilidad de nuestros cursos, nuevos eventos y ofertas exclusivas.</p>

                    <form action="" method="" wire:submit="arch "
                        class="flex flex-col items-center justify-center md:flex-row text-gray-800">
                        <x-input type="email" name="email" id="" wire:model.defer="email"
                            class="rounded-lg w-60 m-2" placeholder="Ingresa tu e-mail" required />
                        <input type="submit" value="Suscribir"
                            class="m-2 cursor-pointer text-base border rounded-lg px-6 font-bold py-2 bg-red-800 text-white">

                    </form>
                    <x-input-error for="email" />
                </div>
            @else
                <!--Suscriptor gracias -->
                <div
                    class="my-10 md:h-60 flex flex-col items-center justify-center border-4 border-gray-200 rounded-2xl text-3xl md:text-4xl text-center px-4 py-10 bg-gray-400 text-white shadow shadow-gray-700">
                    <p class="font-black"><strong class="text-red-800">¡Gracias </strong>por suscribirse!</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
