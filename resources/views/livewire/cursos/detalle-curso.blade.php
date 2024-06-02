@section('title', 'Detalles del Curso | Le Concassé')
<div>
    <div class="text-sm sm:text-base font-semibold py-2 shadow">

        <div class="max-w-screen-xl md:mx-auto flex items-center md:justify-between px-6">

            <div class="flex items-center">
                <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="md:hidden text-xs font-medium mr-4 pl-1 md:pl-0 text-ellipsis line-clamp-2">
                    {{ $curso->nombre }}</p>
                <p class="hidden md:block text-xs font-medium mx-4 text-ellipsis line-clamp-2">
                    {{ $curso->descripcion }}</p>

            </div>
            <div class="flex items-center md:justify-end w-[30%]">

                <div class="hidden md:flex items-start text-orange-600">
                    <span class="text-sm font-normal mt-0.5 mr-0.5">US$</span>
                    <span class="text-2xl font-semibold"> {{ intval($curso->costo) }}</strong></span>
                    @php
                        $numero = number_format($curso->costo, 2, '.', '');
                        $decimal = substr($numero, -2);
                    @endphp
                    @if ($decimal != 0)
                        <span class="mt-0.5 ml-0.5 text-sm font-light">{{ $decimal }}</span>
                    @endif

                </div>
            </div>

        </div>
    </div>

    <div
        class="my-8 md:my-12 md:max-w-screen-xl md:mx-auto flex flex-col md:flex-row items-center md:items-start md:justify-between px-4 md:px-6">

        <div class="min-w-[100px] xl:min-w-[360px]">
            <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt="" title="" width=""
                class="rounded w-full">
        </div>

        <div class="w-full mt-4 md:mt-0 mx-4 px-4">
            <p class="hidden md:block text-xl lg:text-3xl text-orange-700 uppercase">{{ $curso->nombre }}</p>
            <p class="hidden md:block text-xl lg:text-3xl">{{ $curso->descripcion }}</p>

            <div class="flex items-start text-orange-600 pt-2">
                <span class="text-base text-gray-800 mr-2">costo:</span>
                <span class="text-xl font-semibold">US$</span>
                <span class="text-xl font-semibold"> {{ number_format($curso->costo, 2, '.', '') }}</span>
            </div>
            <div class="text-lg mt-4 font-medium">
                <p>Requisitos</p>
            </div>
            @if ($requisitos->count())
                <div class="mt-2 text-sm md:text-base">
                    @foreach ($requisitos as $requisito)
                        <p>▪ {{ $requisito->descripcion }}</p>
                    @endforeach
                </div>
            @endif
            <div class="text-lg mt-4 font-medium">
                <p>Alcances</p>
            </div>
            @if ($alcances->count())
                <div class="mt-2 text-sm md:text-base">
                    @foreach ($alcances as $alcance)
                        <p>▪ {{ $alcance->descripcion }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mt-0 w-full md:w-[520px] h-full">

            <div class="mt-6 md:mt-0 rounded-lg md:border border-gray-300 w-full text-center text-sm md:p-6 pb-4">
                @auth
                    <p class="mb-4">Usuario <strong>{{ ucwords(Auth::user()->name) }}</strong></p>
                @endauth
                {{-- <div class="mt-8 w-full">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $curso->id }}">
                            <input type="submit" value="Agregar al carrito"
                                class="cursor-pointer w-full block text-xs font-medium px-4 py-2 border rounded-full bg-yellow-300 hover:bg-yellow-200">
                        </form>
                    </div> --}}
                <div class="w-full">
                    <a href="#" wire:click="verifylogin"
                        class="block text-xs font-medium px-4 py-2 border rounded-full bg-orange-600 hover:bg-orange-500 text-white">Comprar
                        ahora</a>
                </div>
            </div>

        </div>
    </div>
    <div class="max-w-screen-xl md:mx-auto text-base mx-4 md:pt-4 pb-10">
        <div class="text-2xl font-medium">
            <p>Temario del curso</p>
        </div>
        <div class="mt-4">

            @foreach ($clases as $clase)
                <div class="p-1">
                    <a href="{{ route('clasesdelcurso', ['clase' => $clase, 'inscrito' => $inscrito]) }}"
                        class="hover:text-blue-600"><i
                            class="fa-solid fa-circle-play mr-2"></i>{{ $clase->descripcion }}</a>
                </div>
            @endforeach

        </div>

    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
