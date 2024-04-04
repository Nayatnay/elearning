@section('title', 'Admin requisitos y alcances | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Selección de alcances del curso') }} <strong class="font-bold">"{{ $curso->nombre }}"</strong>
            </h2>
        </div>
    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <div class=" my-2 text-red-700 hover:text-lime-700">
            <a href="{{route('admin_cursos')}}" class="px-4"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <div class="text-sm font-bold uppercase p-2 border-b border-gray-300">
            <p>Lista de Alcances</p>
        </div>

        @if ($alcances->count())

            <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm">

                <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                    <tbody class="text-left">

                        @foreach ($alcances as $alcance)
                            <tr class="h-10 hover:bg-gray-200 active:bg-gray-300">

                                <td class="w-24">
                                    <a href="#" title="Eliminar" wire:click="chequear({{ $alcance }})"
                                        class="bg-lime-700 text-white rounded p-2">
                                        Seleccionar
                                    </a>
                                </td>
                                <td class="px-2">{{ $alcance->descripcion }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2 shadow">
                <span>Sin resultados</span>
            </div>
        @endif

    </div>

</div>
