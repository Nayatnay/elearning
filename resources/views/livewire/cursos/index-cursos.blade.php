@section('title', 'Cursos | LeConcaseé')
<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4 px-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>



        <div class="max-w-screen-xl mx-auto mt-8 flex justify-end text-xs sm:text-sm px-4">
            <div class="text-sm border border-gray-500 rounded-lg">
                <select name="filtro" id="filtro" wire:change="order" wire:model="filtro"
                    class="sm:w-[210px] rounded-lg border-none text-xs sm:text-sm focus:ring-0 focus:outline-none hover:cursor-pointer 
                 bg-transparent">
                    <option value="0">Ordenar por</option>
                    <option value="1">Precio de menor a mayor</option>
                    <option value="2">Precio de mayor a menor</option>
                </select>
            </div>
        </div>

        <!-- muestra cursos -->
        <div class="max-w-7xl mx-auto">

            @if ($cursos->count())

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
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
