@section('title', 'Detalles del Evento | LeConcaseé')
<div>
    <div class="text-sm sm:text-base font-semibold py-2 shadow">

        <div class="max-w-screen-xl md:mx-auto px-6">

            <div class="flex items-center">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="md:hidden text-xl font-medium mr-4 pl-1 md:pl-0 text-ellipsis line-clamp-2">
                    {{ $evento->nombre }}</p>
            </div>

        </div>
    </div>


    <div class="max-w-screen-xl md:mx-auto my-8 p-6 ">

        <div class="flex flex-col md:flex-row">

            <div class="min-w-[100px] md:min-w-[512px]">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title=""
                    width="" class="rounded w-full">
            </div>

            <div class="w-full md:px-6">
                <p class="hidden md:block text-xl lg:text-2xl text-orange-700 uppercase">{{ $evento->nombre }}</p>
                
                @if ($parrafos->count())
                    <div class="mt-10 md:mt-4 text-sm md:text-base">
                        @foreach ($parrafos as $parrafo)
                            <p class="mt-2 md:mt-1 text-justify">{{ $parrafo->descripcion }}</p>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

        
    </div>
    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
