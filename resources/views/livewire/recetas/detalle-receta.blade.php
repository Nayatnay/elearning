@section('title', 'Detalles de la Receta | LeConcaseé')
<div>
    <div class="text-sm sm:text-base font-semibold py-2 shadow">

        <div class="max-w-screen-xl md:mx-auto px-6">

            <div class="flex items-center">
                <img src="{{ asset('/storage/recetas/' . $receta->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="md:hidden text-xl font-medium mr-4 pl-1 md:pl-0 text-ellipsis line-clamp-2">
                    {{ $receta->nombre }}</p>
                <p class="hidden md:block text-xs font-medium mx-4 text-ellipsis line-clamp-2">
                    {{ $receta->descripcion }}</p>

            </div>

        </div>
    </div>


    <div class="max-w-screen-xl md:mx-auto my-8 p-6 ">

        <div class="flex flex-col md:flex-row">

            <div class="min-w-[100px] md:min-w-[512px]">
                <img src="{{ asset('/storage/recetas/' . $receta->imagen) }}" alt="" title=""
                    width="" class="rounded w-full">
            </div>

            <div class="w-full md:px-6">
                <p class="hidden md:block text-xl lg:text-2xl text-orange-700 uppercase">{{ $receta->nombre }}</p>
                <p class="hidden md:block text-xl lg:text-2xl">{{ $receta->descripcion }}</p>


                <div class="text-lg mt-4 font-medium">
                    <p>Ingredientes</p>
                </div>
                @if ($ingredientes->count())
                    <div class="mt-2 text-sm md:text-base">
                        @foreach ($ingredientes as $ingrediente)
                            <p>▪ {{ $ingrediente->descripcion }}</p>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

        <div class="text-3xl mt-4 font-medium">
            <p>Indicaciones</p>

            @if ($indicaciones->count())
                <div class="mt-2 text-sm md:text-base">
                    @foreach ($indicaciones as $indicacion)
                        <p>▪ {{ $indicacion->descripcion }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
