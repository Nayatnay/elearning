@section('title', 'Admin Alcances | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Administrar alcances') }}
            </h2>

            @livewire('admin.crear-adminalcances')
        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>

        <!-- Tabla -->

        <div class="mt-10">
            @if ($alcances->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-xs text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($alcances as $alcance)
                                <tr class="h-12 hover:bg-gray-200 active:bg-gray-300">

                                    <td class="pl-2 w-48 min-w-48 font-bold uppercase cursor-pointer">
                                        {{ $alcance->descripcion }}
                                    </td>
                                    
                                    <td class="w-14 text-center">
                                        <a href="#" title="Eliminar" wire:click="delete({{ $alcance }})">
                                            <i class="fa-solid fa-trash text-gray-500"></i>
                                        </a>
                                    </td>

                                    <td class="w-14 text-center">
                                        <a href="#" wire:click="edit({{ $alcance }})" title="Editar"
                                            class="group text-center">
                                            <span
                                                class="h-1 w-1 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                            <span
                                                class="h-1 w-1 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                            <span
                                                class="h-1 w-1 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
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

            @if ($alcances->hasPages())
                <div class="px-4 py-2 text-center mt-4">
                    {{ $alcances->onEachSide(0)->links() }}
                </div>
            @endif

        </div>
    </div>

    <!--Modal delete -->

    <x-confirmation-modal wire:model="open_delete">

        <x-slot name="title">
            Esta acción no podrá ser reversada
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la eliminación del alcance?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open_delete', false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="destroy" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                Aceptar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <!--Modal edit -->

    <x-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b">Actualizar alcance</p>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
                    wire:model.defer="descripcion" required autofocus />
                <x-input-error for="descripcion" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex">
                <x-secondary-button wire:click="cancelar" wire:target="cancelar" class="mr-4">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
