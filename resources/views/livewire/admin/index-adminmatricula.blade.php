@section('title', 'Cursos Matrículados | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="text-red-700 font-bold">
                {{ $usuario->name }}
            </h2>
        </div>
    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <div>
            <a href="{{ route('admin_usuarios') }}"
                class="px-2 py-1 text-red-700 border border-transparent rounded-lg hover:border-red-700">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <p class="mt-4 px-4">Cursos matriculados</p>

        <!-- Tabla -->

        <div class="mt-10">
            @if ($cursosinscritos->count())
                @php
                    $contador = 0;
                @endphp
                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600 border-t">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($cursosinscritos as $curso)
                                @php
                                    $contador++;
                                @endphp
                                <tr class="h-10 hover:bg-gray-50">

                                    <td class="pl-2 w-10 min-w-10">
                                        {{ $contador }}.-
                                    </td>
                                    
                                    <td class="pl-2 w-64 min-w-64">
                                        {{ $curso->curso->nombre }}
                                    </td>

                                    @if ($curso->liberado == 1)
                                        <td class="px-2 w-60 min-w-60">
                                            Validado <i class="fa-solid fa-stamp mx-1"></i> {{ date('d-m-Y', strtotime($curso->updated_at)) }}
                                        </td>
                                        <td class="w-20 text-center">
                                            <a href="#" title="Suspender" wire:click="suspender({{ $curso }})"
                                                class="bg-sky-600 text-white text-xs p-2 border border-white rounded-lg hover:border-gray-300">
                                                Suspender
                                            </a>
                                        </td>
                                    @else
                                        <td class="px-2 w-60 min-w-60 text-red-700">
                                            Validación pendiente <i class="fa-regular fa-clock mx-1"></i>
                                        </td>
                                        <td class="w-20 text-center"></td>
                                    @endif

                                    

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="mt-2 bg-white text-sm font-semibold sm:px-10 px-5 py-2">
                    <span>No hay resultados</span>
                </div>
            @endif

        </div>

    </div>

    <!--Modal suspender -->

    <x-confirmation-modal wire:model="open_suspender">

        <x-slot name="title">
            El estudiante será suspendido de este curso. Su acceso será bloqueado.
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la suspensión?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_suspender', false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="desliberar" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                Aceptar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>
