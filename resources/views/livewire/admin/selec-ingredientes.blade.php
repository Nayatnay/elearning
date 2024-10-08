@section('title', 'Admin Ingredientes | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between px-4 md:px-8 py-3 max-w-screen-xl mx-auto">

            <div class="flex items-center">
                <img src="{{ asset('/storage/Recetas/' . $receta->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="text-sm font-medium ml-4">{{ $receta->nombre }}</p>
            </div>

            @livewire('admin.crear-adminingredientes', ['receta' => $receta->id])

        </div>

    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <div class="px-4">
            <a href="{{ route('admin_recetas') }}"
                class="px-2 py-1 bg-red-700 text-white rounded-lg hover:bg-red-600">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <div>
            <!-- Tabla Ingredientes -->

            <div class="mt-8 text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto border-b border-gray-600">
                <p class="font-bold uppercase">Lista de Ingredientes</p>

            </div>

            <div class="my-4">

                @if ($ingredientes->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-base text-gray-600">

                        <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($ingredientes as $ingrediente)
                                    <tr class="h-8 hover:bg-gray-200 active:bg-gray-300">

                                        <td class="px-2">{{ $ingrediente->descripcion }}</td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Editar" wire:click="edit({{ $ingrediente }})">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Eliminar" wire:click="delete({{ $ingrediente }})">
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

            </div>
        </div>

    </div>


    <!--Modal edit -->

    <x-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b">Actualizar ingrediente</p>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" wire:model="descripcion"
                    required autofocus />
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
