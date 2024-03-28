@section('title', 'Escuela de Cocina | Le Concassé')
<x-ppa-layout>

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
    </div>

    <div class="w-full py-10">

        <div class="max-w-7xl mx-auto">

            <p class="text-center text-xl">Contenido</p>

            <div class="grid gap-x-4 gap-y-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-4 py-8">

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
                            Recetas
                        </p>
                    </a>
                </div>
                <div class="rounded-md border border-gray-300 bg-gray-100">
                    <a href="{{ route('eventos') }}">
                        <img src="{{ asset('/img/eventos.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Eventos
                        </p>
                    </a>
                </div>
                <div class="rounded-md border border-gray-300 bg-gray-100">
                    <a href="{{ route('inscripciones') }}">
                        <img src="{{ asset('/img/inscripciones.jpg') }}" alt="" title=""
                            class="w-full rounded-tl-md rounded-tr-md">
                        <p class="p-4">
                            Inscríbete
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full md:py-10">

        <div class="max-w-7xl mx-auto flex items-start justify-center flex-wrap">
            <div class="p-4 max-w-[460px]">
                <img src="{{ asset('/img/img1.png') }}" alt="" title="" class="w-full">
            </div>
            <div class="p-4 font-extralight text-5xl max-w-[420px]">
                <p class="font-bold">Comienza ya</p>
                <p class="text-3xl mt-1">Aprende a defenderte como un chef*</p>

                <div class="my-8 border rounded-lg shadow-lg bg-white">

                    <div class="mb-8 p-3 bg-lime-600 text-white text-center rounded-tl-lg rounded-tr-lg">
                        <p class="uppercase font-bold text-base">Inscríbete en uno de nuestros cursos en línea o
                            presencial
                        </p>
                    </div>

                    <form method="POST" action="" class="text-sm m-4">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Nombre y Apellido') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autocomplete="name" />
                            <x-input-error for="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="email" />
                            <x-input-error for="email" />
                        </div>

                        <div class="mt-4">
                            <x-label for="doc" value="{{ __('Documento Identidad') }}" />
                            <x-input id="doc" class="block mt-1 w-full" type="text" name="doc"
                                :value="old('doc')" required autocomplete="doc" />
                            <x-input-error for="doc" />
                        </div>

                        <div class="mt-4 w-48">
                            <x-label for="fechanac" value="{{ __('Fecha de Nacimiento') }}"
                                class="ml-4 text-zinc-800" />
                            <x-input id="fechanac" class="block mt-1 w-full" type="date" name="fechanac"
                                :value="old('fechanac')" required autocomplete="fechanac" />
                            <x-input-error for="fechanac" />
                        </div>

                        <div class="mt-4">
                            <x-label for="telf" value="{{ __('Teléfono Personal') }}" />
                            <x-input id="telf" class="block mt-1 w-full" type="text" name="telf"
                                :value="old('telf')" required autocomplete="telf" />
                        </div>

                        <div class="mt-8">
                            <select name="curso" wire:model.defer="curso"
                                class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                                type="text" name="curso" :value="old('curso')" required autocomplete="curso">
                                <option value="">Cursos</option>
                                <option value="1">Curso prueba 1</option>
                                <option value="1">Curso prueba 2</option>
                                <option value="1">Curso prueba 3</option>
                            </select>
                            <x-input-error for="curso" />
                        </div>

                        <div class="mt-8">
                            <select name="turno"
                                class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                                type="text" name="turno" :value="old('turno')" required autocomplete="turno">
                                <option value="">Turnos</option>
                                <option value="1">Mañana</option>
                                <option value="1">Tarde</option>
                            </select>
                            <x-input-error for="turno" />
                        </div>

                        <x-button class="mt-8">
                            {{ __('Enviar') }}
                        </x-button>
                    </form>
                </div>

            </div>

        </div>
    </div>


    <!-- muestra cursos -->
    <div class="max-w-7xl mx-auto ">

        <div class="my-4">
            <p class="text-center text-xl">cursos</p>
        </div>

        @if ($cursos->count())

                <div
                    class="text-black grid gap-x-4 gap-y-4 md:gap-y-8 grid-cols-1 sm:grid-cols-2 
                lg:grid-cols-3 xl:grid-cols-4 px-2 pt-4">

                    @foreach ($cursos as $curso)
                        <div
                            class="flex flex-col items-center justify-between border border-gray-200 rounded-lg bg-gray-100">

                            <div class="flex h-[50%] items-start">
                                <a href="#">
                                    <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt=""
                                        title="" class="w-full rounded-tl-lg rounded-tr-lg" width="">
                                </a>
                            </div>

                            <div class="w-full p-4 font-bold text-lg">
                                <a href="#">
                                    <p class="text-ellipsis line-clamp-1">{{ $curso->nombre }}</p>
                                </a>
                                
                                <div class="flex items-start mt-2">
                                    <span class="text-sm font-normal mt-0.5 mr-0.5">US$</span>
                                    <span class="text-3xl font-semibold">
                                        {{ intval($curso->costo) }}</strong></span>
                                    @php
                                        $decimal = substr($curso->costo, -2);
                                    @endphp
                                    @if ($decimal != 0)
                                        <span
                                            class="mt-0.5 ml-0.5 text-sm font-light">{{ substr($curso->costo, -2) }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="w-full pt-6 pb-2 pl-6 border-b text-orange-600 font-medium">
                    <p>Lo sentimos, no existen cursos con el filtro seleccionado</p>
                </div>

            @endif


    </div>






    <!-- Pie de pagina -->
    <x-footer></x-footer>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</x-ppa-layout>
