<div>
    <div class="max-w-7xl mx-auto px-4 pt-10 pb-20">

        <p class="mt-4 text-2xl">Mis cursos matriculados</p>
        
        @if ($miscursos->count())         

            <div
                class="mt-4 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($miscursos as $micurso)
                    <a href="#" wire:click="buscar({{ $micurso }})">

                        <div class="">
                            <img src="{{ asset('/storage/cursos/' . $micurso->curso->imagen) }}" alt=""
                                title="" class="rounded-lg w-full h-48">
                            <p class="text-ellipsis line-clamp-2 font-normal py-1">{{ $micurso->curso->nombre }}</p>
                        </div>

                    </a>
                @endforeach
            </div>
        @else
            <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2">
                <span>No hay resultados</span>
            </div>
        @endif

        @if ($miscursos->hasPages())
            <div class="w-1/2 mx-auto px-4 py-2 text-center">
                {{ $miscursos->onEachSide(0)->links() }}
            </div>
        @endif

    </div>

    <div class="max-w-7xl mx-auto px-4 pt-10 pb-20">

        <p class="mt-4 text-2xl">Mis eventos inscritos</p>
        
        @if ($miseventos->count())         

            <div
                class="mt-4 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($miseventos as $evento)
                    <a href="{{route('detallevento', $evento->evento->slug )}}">

                        <div class="">
                            <img src="{{ asset('/storage/eventos/' . $evento->evento->imagen) }}" alt=""
                                title="" class="rounded-lg w-full h-48">
                            <p class="text-ellipsis line-clamp-2 font-normal py-1">{{ $evento->evento->nombre }}</p>
                        </div>

                    </a>
                @endforeach
            </div>
        @else
            <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2">
                <span>No hay resultados</span>
            </div>
        @endif

    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
