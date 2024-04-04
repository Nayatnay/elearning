@section('title', 'Admin requisitos y alcances | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Selección de requisitos') }}
            </h2>

            {{ $curso->nombre }}

        </div>

    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <div class="text-sm font-bold uppercase p-2 border-b border-gray-300">
            <p>Requisitos</p>
        </div>

        @if ($requisitos->count())

            <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-xs text-gray-600">

                <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                    <tbody class="text-left">

                        @foreach ($requisitos as $requisito)
                            <tr class="h-8 hover:bg-gray-200 active:bg-gray-300">

                                <td class="pl-2 w-4 cursor-pointer">
                                    <i class="fa-regular fa-square"></i>
                                </td>
                                <td class="pl-2 w-48 min-w-48 font-bold uppercase cursor-pointer">
                                    {{ $requisito->descripcion }}
                                </td>


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
