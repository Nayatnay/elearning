@section('title', 'Admin Inscritos | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <div class="flex items-center">
                <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="text-sm font-medium ml-4">{{ $curso->nombre }}</p>
            </div>
        </div>
    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <x-retro></x-retro>

        <div class="flex items-center justify-between mt-4">
            
            <div class="text-2xl">
                <p><strong class="text-red-700">{{$totinscritos}} Inscritos</strong>  {{date('m-Y', strtotime($fecha))}}</p>
            </div>

            <div>
                <select name="fecha" wire:model="fecha" wire:change="nvofecha"
                class="w-28 text-xs text-white rounded shadow border border-gray-100 
                focus:border-gray-300 focus:ring-gray-200 bg-red-800"
                type="text" required autocomplete="fecha">
                <option value="" >{{date('m-Y', strtotime($fecha))}}</option>
                @for ($i = 2024; $i <= 2026; $i++)
                    @for ($m = 1; $m <= 12; $m++)
                        <option class="" value="{{ str_pad($m,2, 0, STR_PAD_LEFT) }}-{{$i}}">{{ str_pad($m,2, 0, STR_PAD_LEFT) }}-{{$i}}</option>
                    @endfor
                @endfor
            </select>
            <x-input-error for="fecha" />
            </div>
           
        </div>

        <div>

            <!-- Tabla Inscritos diurno -->

            <div
                class="flex items-center justify-between mt-8 bg-gray-200 shadow text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto">
                <p class="font-bold">Turno Mañana</p>
                <p class="text-orange-600">Inscritos: {{ $inscritosm }}</p>
            </div>

            <div>

                @if ($manana->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                        <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($manana as $manan)
                                    <tr class="h-10">

                                        <td class="w-40 px-2">{{ $manan->user->name }}</td>
                                        <td class="w-60 px-2">{{ $manan->user->email }}</td>
                                        <td class="w-20 px-2">{{ $manan->user->doc }}</td>
                                        <td class="w-32 px-2">{{ $manan->user->telf }}</td>
                                        <td class="w-32 px-2">{{ date('d-m-Y', strtotime($manan->updated_at)) }}</td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Cambiar de turno"
                                                wire:click="cambio({{ $manan }})"
                                                class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                                <i class="fa-solid fa-rotate"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-sm text-gray-700 sm:px-7 px-5 py-2 bg-white">
                        <span>No hay resultados</span>
                    </div>
                @endif

                @if ($manana->hasPages())
                    <div class="px-4 py-2 text-center mt-4">
                        {{ $manana->onEachSide(0)->links() }}
                    </div>
                @endif

            </div>

            <!-- Tabla Inscritos tarde -->

            <div
                class="flex items-center justify-between shadow mt-12 bg-gray-200 text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto">
                <p class="font-bold">Turno Tarde</p>
                <p class="text-orange-600">Inscritos: {{ $inscritost }}</p>
            </div>

            <div>

                @if ($tarde->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                        <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($tarde as $manan)
                                    <tr class="h-10">

                                        <td class="w-40 px-2">{{ $manan->user->name }}</td>
                                        <td class="w-60 px-2">{{ $manan->user->email }}</td>
                                        <td class="w-20 px-2">{{ $manan->user->doc }}</td>
                                        <td class="w-32 px-2">{{ $manan->user->telf }}</td>
                                        <td class="w-32 px-2">{{ date('d-m-Y', strtotime($manan->updated_at)) }}</td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Cambiar de turno"
                                                wire:click="cambio({{ $manan }})"
                                                class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                                <i class="fa-solid fa-rotate"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-sm text-gray-700 sm:px-7 px-5 py-2 bg-white">
                        <span>No hay resultados</span>
                    </div>
                @endif

                @if ($tarde->hasPages())
                    <div class="px-4 py-2 text-center mt-4">
                        {{ $tarde->onEachSide(0)->links() }}
                    </div>
                @endif

            </div>

            <!-- Tabla Inscritos online -->

            <div
                class="flex items-center justify-between mt-12 bg-gray-200 shadow text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto">
                <p class="font-bold">En Línea</p>
                <p class="text-orange-600">Inscritos: {{ $inscritoso }}</p>
            </div>

            <div>

                @if ($online->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                        <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($online as $manan)
                                    <tr class="h-10">

                                        <td class="w-40 px-2">{{ $manan->user->name }}</td>
                                        <td class="w-60 px-2">{{ $manan->user->email }}</td>
                                        <td class="w-20 px-2">{{ $manan->user->doc }}</td>
                                        <td class="w-32 px-2">{{ $manan->user->telf }}</td>
                                        <td class="w-32 px-2">{{ date('d-m-Y', strtotime($manan->updated_at)) }}</td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Cambiar de turno"
                                                wire:click="cambio({{ $manan }})"
                                                class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                                <i class="fa-solid fa-rotate"></i>
                                            </a>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-sm text-gray-700 sm:px-7 px-5 py-2 bg-white">
                        <span>No hay resultados</span>
                    </div>
                @endif

                @if ($online->hasPages())
                    <div class="px-4 py-2 text-center mt-4">
                        {{ $online->onEachSide(0)->links() }}
                    </div>
                @endif

            </div>

        </div>

    </div>

    <!--Modal crear -->
    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b text-zinc-800">Cambiar de turno</p>
        </x-slot>

        <x-slot name="content" class="">

            <div class="mt-4 px-4">
                <select name="turno" wire:model="turno"
                    class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                    type="text" :value="old('turno')" required autocomplete="turno">
                    <option value="">Selecciona un turno</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="En Línea">En línea</option>
                </select>
                <x-input-error for="turno" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex">
                <x-secondary-button wire:click="cancelar" wire:target="cancelar" class="mr-4">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
