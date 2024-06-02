@section('title', 'Clases del Curso | Le Concassé')
<div>
    <div class="text-sm sm:text-base font-semibold py-2 shadow">

        <div
            class="my-8 md:my-12 md:max-w-screen-xl md:mx-auto flex flex-col md:flex-row items-center
         md:items-start md:justify-between px-4 md:px-6">

            <div class="md:mr-4">
                @auth
                    @if ($inscrito == 1)
                        <div class="min-w-[100px] xl:min-w-[840px] border border-gray-800">
                            <video controls preload="metadata" autoplay>
                                <source src="{{ URL::asset('/storage/clases/' . $clas_selec->video) }}" type="video/mp4">
                                Su navegador no soporta la etiqueta de vídeo.
                            </video>
                        </div>
                        
                    @else
                        <div class="relative min-w-[100px] xl:min-w-[840px] border border-gray-800">

                            <video preload="metadata">
                                <source src="{{ URL::asset('/storage/clases/' . $clas_selec->video) . '#t=6' }}"
                                    type="video/mp4">
                                Su navegador no soporta la etiqueta de vídeo.
                            </video>

                            <div
                                class="w-full h-full flex flex-col items-center justify-center absolute top-0 z-10 
                                md:text-2xl p-10 text-center uppercase border border-gray-800 bg-black text-white 
                                bg-opacity-50 ">
                                <p>Adquiere este curso para tener acceso a todas las lecciones</p>
                                <div class="w-full mt-8">
                                    <a href="#" wire:click="verifylogin"
                                        class="md:text-xl font-medium px-4 py-2 border rounded-full bg-orange-600 hover:bg-orange-500 text-white">Comprar
                                        ahora</a>
                                </div>
                            </div>

                        </div>
                    @endif
                    <div>
                        <p class="bg-white p-2 text-2xl text-gray-700 font-bold">{{ $clas_selec->descripcion }}</p>
                    </div>
                @else
                    <div class="relative min-w-[100px] xl:min-w-[840px] border border-gray-800">

                        <video preload="metadata">
                            <source src="{{ URL::asset('/storage/clases/' . $clas_selec->video) . '#t=6' }}"
                                type="video/mp4">
                            Su navegador no soporta la etiqueta de vídeo.
                        </video>

                        <div
                            class="w-full h-full flex flex-col items-center justify-center absolute top-0 z-10 md:text-2xl p-10 text-center uppercase 
                        border border-gray-800 bg-black text-white bg-opacity-50 ">
                            <p>Adquiere este curso para tener acceso a todas las lecciones</p>
                            <div class="w-full mt-8">
                                <a href="#" wire:click="verifylogin"
                                    class="md:text-xl font-medium px-4 py-2 border rounded-full bg-orange-600 hover:bg-orange-500 text-white">Comprar
                                    ahora</a>
                            </div>
                        </div>

                    </div>
                    <div>
                        <p class="bg-white p-2 text-2xl text-gray-700 font-bold">{{ $clas_selec->descripcion }}</p>
                    </div>
                @endauth

            </div>

            <div class="w-full mt-10 md:mt-0 md:ml-4 border rounded-xl bg-white shadow p-4">

                <p class="text-xl lg:text-2xl text-orange-700 uppercase">{{ $clas_selec->curso->nombre }}</p>
                <p class="text-xl">{{ $clas_selec->curso->descripcion }}</p>


                <div class="mt-10 md:mt-0 text-sm md:pt-4 pb-10 text-gray-700">
                    <div class="text-xl font-medium">
                        <p>Temario del curso</p>
                    </div>
                    <div class="mt-4">
                        @foreach ($clases as $clase)
                            @if ($clase->id == $clas_selec->id)
                                <div class="p-1">
                                    <a href="{{ route('clasesdelcurso', ['clase' => $clase, 'inscrito' => $inscrito]) }}"
                                        class="text-blue-600">
                                        <i class="fa-solid fa-circle-play mr-2"></i>
                                        {{ $clase->descripcion }}
                                    </a>
                                </div>
                            @else
                                <div class="p-1">
                                    <a href="{{ route('clasesdelcurso', ['clase' => $clase, 'inscrito' => $inscrito]) }}"
                                        class="hover:text-blue-600">
                                        <i class="fa-solid fa-circle-play mr-2"></i>
                                        {{ $clase->descripcion }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="px-4">
        <div class="md:max-w-screen-xl md:mx-auto my-20 border border-gray-400 bg-gray-200 shadow-lg rounded-xl p-8 ">
            <div class="flex flex-col items-center justify-center lg:flex-row ">
                <div class="w-full lg:mr-4 text-center lg:text-left">
                    <p class="text-4xl">¡Aprendizaje a tu alcance!</p>
                    <p class="text-2xl mt-2">Escoge un curso en nuestra lista de categorías </p>

                </div>
                <a href="{{ route('cursos') }}">
                    <div
                        class="mt-6 rounded-full w-60 border-4 border-transparent  bg-white hover:bg-gray-200 active:bg-gray-300 hover:border-white px-10 py-4 text-center font-bold text-base">
                        Comienza aquí
                    </div>
                </a>
            </div>
            <p class="mt-6 text-sm font-medium text-center lg:text-left"> Repostería tradicional, gastronomía exótica,
                comida internacional y exquisiteces de la India
            <p>
        </div>

    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>


</div>
