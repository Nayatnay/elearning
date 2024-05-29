@section('title', 'Admin Inscritos | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <div class="flex items-center">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="text-sm font-medium ml-4">{{ $evento->nombre }}</p>
            </div>
        </div>
    </div>

    <div class="mt-4 pb-20 px-4 max-w-screen-xl mx-auto">

        <x-retro></x-retro>

        <div class="mt-8 text-2xl px-4">
            <p>Usuarios inscritos <strong class="text-red-700 ml-2"> {{ $totinscritos }} </strong></p>
        </div>

        <!-- Tabla Inscritos diurno -->

        @if ($inscritos->count())
            @php
                $con = 0;
            @endphp
            <div class="mt-4 w-full min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse bg-white">

                    <tbody class="text-left">

                        @foreach ($inscritos as $insc)
                            @php
                                $con++;
                            @endphp
                            <tr class="h-10 hover:bg-gray-50">
                                <td class="w-12 px-4 bg-red-800 text-white text-center">{{ $con }}.</td>
                                <td class="w-40 px-2">{{ $insc->user->name }}</td>
                                <td class="w-60 px-2">{{ $insc->user->email }}</td>
                                <td class="w-20 px-2">{{ $insc->user->doc }}</td>
                                <td class="w-32 px-2">{{ $insc->user->telf }}</td>
                                <td class="w-32 px-2">{{ date('d-m-Y', strtotime($insc->updated_at)) }}</td>
                                <td class="w-12 md:w-20 text-center">
                                    <a href="#" title="Dar de baja"
                                        wire:click="aviso({{ $insc }})"
                                        class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                        <i class="fa-solid fa-trash"></i>
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

        @if ($inscritos->hasPages())
            <div class="px-4 py-2 text-center mt-4">
                {{ $inscritos->onEachSide(0)->links() }}
            </div>
        @endif

    </div>

    <!--Modal validar -->

    <x-confirmation-modal wire:model="open">

        <x-slot name="title">
            El usuario será retirado del evento
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la acción?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="eliminar" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                Aceptar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>
