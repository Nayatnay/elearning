@section('title', 'Admin Recetas | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Administrar recetas') }}
            </h2>
            @livewire('admin.crear-adminrecetas')
        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>


        <!-- Tabla -->

        <div class="mt-10">
            @if ($recetas->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($recetas as $receta)
                                <tr class="h-16 hover:bg-gray-50">
                                    <td class="w-[64px] pl-2">
                                        <img src="{{ asset('/storage/recetas/' . $receta->imagen) }}" alt=""
                                            title="" class="rounded w-full">
                                    </td>

                                    <td class="pl-2 w-48 min-w-48 font-bold uppercase">
                                        {{ $receta->nombre }}
                                    </td>

                                    <td class="px-2 w-80 min-w-80">
                                        {{ $receta->descripcion }}
                                    </td>

                                    <td class="pl-2 w-20 min-w-20">
                                        {{ $receta->tiempo }}
                                    </td>

                                    @if ($receta->porciones > 1)
                                        <td class="pl-2 w-32 min-w-32">
                                            {{ $receta->porciones }} porciones
                                        </td>
                                    @else
                                        <td class="pl-2 w-80 min-w-80">
                                            {{ $receta->porciones }} porción
                                        </td>
                                    @endif



                                    <td class="w-10 text-center">
                                        <a href="#" title="Eliminar" wire:click="delete({{ $receta }})"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="#" wire:click="edit({{ $receta }})" title="Editar"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-pen"></i> </a>
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="{{ route('selec_ingredientes', $receta) }}" title="Ingredientes"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-pepper-hot"></i>
                                        </a>
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="{{ route('selec_indicaciones', $receta) }}" title="Indicaciones"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-book-open-reader"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2 shadow">
                    <span>No hay resultados</span>
                </div>
            @endif

            @if ($recetas->hasPages())
                <div class="px-4 py-2 text-center mt-4">
                    {{ $recetas->onEachSide(0)->links() }}
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
            ¿Está seguro de proceder con la eliminación de la receta?
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
            <p class="font-bold text-left pb-4 border-b">Actualizar receta</p>
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-col md:flex-row">

                <div class="mb-4 mr-0 md:mr-4 md:mb-0 w-full md:w-[420px] rounded border p-4 bg-white">
                    <div class="text-xs text-left lg:text-sm">
                        <label for="{{ $identificador }}" class="recetar-pointer hover:underline">Selecciona una
                            Imagen</label>
                    </div>

                    <div class="mt-4 min-h-32">
                        @if ($imagenva)
                            <img src="{{ $imagenva->temporaryUrl() }}"
                                class="w-full p-2 border border-zinc-500 rounded" width="240px">
                        @else
                            <img src="{{ asset('../storage/recetas/' . $imagen) }}" alt="" title=""
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

                <div class="w-full border p-4 bg-white rounded">

                    <div class="mb-4">
                        <x-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            wire:model="nombre" required autofocus />
                        <x-input-error for="nombre" />
                    </div>

                    <div class="mb-4">
                        <x-label for="descripcion" value="{{ __('Descripción') }}" />
                        <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
                            wire:model="descripcion" required autofocus />
                        <x-input-error for="descripcion" />
                    </div>


                    <div class="mb-4">
                        <x-label for="tiempo" value="{{ __('Tiempo de preparación') }}" />
                        <x-input id="tiempo" class="block mt-1 w-full" type="text" name="tiempo"
                            wire:model="tiempo" required autofocus />
                        <x-input-error for="tiempo" />
                    </div>


                    <div class="mb-4">
                        <x-label for="porciones" value="{{ __('Porciones') }}" />
                        <x-input id="porciones" class="block mt-1 w-full" type="text" name="porciones"
                            wire:model="porciones" required autofocus />
                        <x-input-error for="porciones" />
                    </div>

                </div>
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
