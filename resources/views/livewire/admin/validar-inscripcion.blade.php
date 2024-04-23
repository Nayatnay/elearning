@section('title', 'Admin Cursos | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Validar Inscripciones') }}
            </h2>
            
        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- Tabla -->

        <div class="mt-10">
            @if ($inscripciones->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($inscripciones as $inscripcion)
                                <tr class="hover:bg-gray-50 active:bg-gray-300 border-b border-black h-16">

                                    <td class="pl-2 w-80 min-w-80 font-bold uppercase">
                                        <p>{{ $inscripcion->user->name }}</p> 
                                        <p class="text-red-800 lowercase">{{ $inscripcion->user->email }}</p>
                                        <p class="">{{ $inscripcion->user->telf }}</p>
                                    </td>

                                    <td class="pl-2 w-60 min-w-60 text-lg">
                                        {{ $inscripcion->curso->nombre }}
                                    </td>

                                    <td class="pl-2 w-60 min-w-60 text-red-800 font-medium">
                                        USD${{number_format($inscripcion->curso->costo, 2, '.', '')}}
                                    </td>

                                    <td class="pl-2 w-20 min-w-20">
                                        {{ $inscripcion->turno }}
                                    </td>

                                    <td class="w-14 min-w-14 text-center">
                                        <a href="#" title="Eliminar" wire:click="validar({{ $inscripcion }})"
                                            class="p-2 hover:underline text-red-800 font-medium">
                                            Validar
                                        </a>
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

            @if ($inscripciones->hasPages())
                <div class="px-4 py-2 text-center mt-4">
                    {{ $inscripciones->onEachSide(0)->links() }}
                </div>
            @endif

        </div>

    </div>

    <!--Modal delete -->

    <x-confirmation-modal wire:model="open">

        <x-slot name="title">
            Esta acción no podrá ser reversada
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la validación?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="playplay" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                Aceptar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>
