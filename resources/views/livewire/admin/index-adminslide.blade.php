@section('title', 'Admin Diapositivas | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Administrar Diapositivas') }}
            </h2>
            @livewire('admin.crear-adminslide')
        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- grid -->

        @if ($imgslides->count())

            <div
                class="grid gap-x-4 gap-y-4 md:gap-y-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 
        xl:grid-cols-4 items-center justify-center">

                @foreach ($imgslides as $imgslide)
                    <div class="border border-gray-300 rounded-lg bg-gray-100">

                        <div>

                            <img src="{{ asset('/storage/diapositivas/' . $imgslide->imagen) }}" alt=""
                                title="" class="rounded w-full">

                        </div>

                        <div class="w-full p-2 flex items-center justify-between border-t border-gray-200 bg-gray-200">
                            <div class="flex items-center">
                                <a href="#" title="Eliminar" class="px-2"
                                    wire:click="delete({{ $imgslide }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #7d7d7d
                                            }
                                        </style>
                                        <path
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </a>
                                <a href="#" wire:click="edit({{ $imgslide }})" title="Editar"
                                    class="group text-center px-2">
                                    <span
                                        class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                    <span
                                        class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                    <span
                                        class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                </a>
                            </div>

                            <div class="text-sm font-bold">
                                @if ($imgslide->estado == 0)
                                    <a href="#" wire:click="habilitar({{ $imgslide }})" title="habilitar"
                                        class="text-lime-600 hover:underline">
                                        Habilitar
                                    </a>
                                @else
                                    <a href="#" wire:click="deshabilitar({{ $imgslide }})"
                                        title="deshabilitar" class="text-orange-600 hover:underline">
                                        Deshabilitar
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2 shadow">
                <span>No hay resultados</span>
            </div>
        @endif

    </div>

    <!--Modal delete -->

    <x-confirmation-modal wire:model="open_delete">

        <x-slot name="title">
            Esta acción no podrá ser reversada
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la eliminación de la imagen?
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
            <p class="font-bold text-left pb-4 border-b">Actualizar imagen</p>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4 mr-0 md:mr-4 md:mb-0 w-full md:w-[420px] rounded border p-4 bg-white">
                <div class="text-xs text-left lg:text-sm">
                    <label for="{{ $identificador }}" class="cursor-pointer hover:underline">Selecciona una
                        Imagen</label>
                </div>

                <div class="mt-4 min-h-32">
                    @if ($imagenva)
                        <img src="{{ $imagenva->temporaryUrl() }}" class="w-full p-2 border border-zinc-500 rounded"
                            width="240px">
                    @else
                        <img src="{{ asset('../storage/diapositivas/' . $imagen) }}" alt="" title=""
                            class="w-full p-2 border border-zinc-500 rounded" width="240px">
                    @endif
                </div>

                <div wire:loading wire:target="imagenva" class="w-full mt-2 text-xs font-medium">
                    <strong>¡Cargando Imagen! </strong>
                    <span>Espere mientras se carga la imagen...</span>
                </div>

                <input id="{{ $identificador }}" type="file" style="visibility:hidden" name="imagenva"
                    wire:model="imagenva" class="text-[8px]" required />
                <x-input-error for="imagenva" />

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
