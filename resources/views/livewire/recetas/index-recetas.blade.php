@section('title', 'Recetas | LeConcaseé')
<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4 px-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>



        <div class="max-w-screen-xl mx-auto mt-8 flex justify-end text-xs sm:text-sm px-4">
            <div class="text-sm border border-gray-500 rounded-lg">
                <select name="filtro" id="filtro" wire:change="order" wire:model="filtro"
                    class="sm:w-[210px] rounded-lg border-none text-xs sm:text-sm focus:ring-0 focus:outline-none hover:recetar-pointer 
                 bg-transparent">
                    <option value="0">Ordenar</option>
                    <option value="1">A - Z</option>
                    <option value="2">Z - A</option>
                </select>
            </div>
        </div>

        <!-- muestra recetas -->
        <div class="max-w-7xl mx-auto">

            @if ($recetas->count())

                <div
                    class="text-black grid gap-x-4 gap-y-4 md:gap-y-8 grid-cols-1 sm:grid-cols-2 
                    lg:grid-cols-3 xl:grid-cols-5 px-4 py-8 text-sm">

                    @foreach ($recetas as $receta)
                        <div>
                            <a href="{{ route('detallereceta', $receta) }}">
                                <div>

                                    <img src="{{ asset('/storage/recetas/' . $receta->imagen) }}" alt=""
                                        title="" class="w-full rounded-lg" width="">

                                </div>
                                <div class="px-1 mt-1 font-bold ">
                                    <div class="text-xl">
                                        <p class="text-ellipsis line-clamp-2">{{ $receta->nombre }}</p>
                                    </div>
                                    <div class="w-full font-bold text-yellow-300">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="font-light">
                                        @if ($receta->porciones > 1)
                                            <p>{{ $receta->tiempo }} {{ $receta->porciones }} porciones</p>
                                        @else
                                            <p>{{ $receta->tiempo }} {{ $receta->porciones }} porción</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-8 bg-white text-base font-semibold sm:px-10 px-5 py-2">
                    <span>No hay resultados</span>
                </div>
            @endif

            @if ($recetas->hasPages())
                <div class="w-1/2 mx-auto px-4 py-2 text-center">
                    {{ $recetas->onEachSide(0)->links() }}
                </div>
            @endif

        </div>
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
