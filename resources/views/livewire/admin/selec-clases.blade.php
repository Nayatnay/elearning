@section('title', 'Admin requisitos y alcances | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Clases del curso') }} <strong class="font-bold uppercase">"{{ $curso->nombre }}"</strong>
            </h2>
        </div>
    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <div class=" my-2 text-red-700 hover:text-lime-700">
            <a href="{{route('admin_cursos')}}" class="px-4"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <div>
            <!-- Tabla Clases -->

            <div class="my-4">

                <div
                    class="flex items-center justify-between text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto border-b border-gray-600">
                    <p class="font-bold uppercase">Clases Asignadas</p>

                </div>

                @if ($cursocla->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                        <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($cursocla as $curcla)
                                    <tr class="h-8 hover:bg-gray-200 active:bg-gray-300">

                                        <td class="px-2">{{ $curcla->clase->tema }}</td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Eliminar"
                                                wire:click="deletecla({{ $curcla }})"
                                                class="bg-red-500 text-white font-extrabold rounded px-1.5">-</a>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-sm text-gray-700 sm:px-7 px-5 py-2">
                        <span>Sin resultados</span>
                    </div>
                @endif

            </div>
        </div>

        <div
            class="flex items-center justify-between text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto border-b border-gray-600">
            <p class="font-bold uppercase">Clases No Asignadas</p>

        </div>

        @if ($clases->count())

            <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm">

                <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                    <tbody class="text-left">

                        @foreach ($clases as $clase)
                            <tr class="h-10 hover:bg-gray-200 active:bg-gray-300">

                                <td class="w-24">
                                    <a href="#" title="Eliminar" wire:click="chequear({{ $clase }})"
                                        class="bg-lime-700 text-white rounded p-2">
                                        Asignar
                                    </a>
                                </td>
                                <td class="px-2">{{ $clase->tema }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="mt-4 text-base font-semibold sm:px-10 px-5 py-2 ">
                <span>Sin resultados</span>
            </div>
        @endif

    </div>

</div>
