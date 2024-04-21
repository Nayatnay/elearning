@section('title', 'Admin Indicaciones | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">

            <div class="flex items-center">
                <img src="{{ asset('/storage/Recetas/' . $receta->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="text-sm font-medium ml-4">{{ $receta->nombre }}</p>
            </div>

            @livewire('admin.crear-adminindicaciones', ['receta' => $receta->id])

        </div>

    </div>

    <div class="mt-4 p-4 max-w-screen-xl mx-auto">

        <div>
            <a href="{{ route('admin_recetas') }}"
                class="px-2 py-1 text-red-700 border border-transparent rounded-lg hover:text-lime-700 hover:border-lime-700">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <div>
            <!-- Tabla indicaciones -->

            <div class="mt-8 text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto border-b border-gray-600">
                <p class="font-bold uppercase">Lista de Indicaciones</p>

            </div>

            <div class="my-4">

                @if ($indicaciones->count())

                    <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-base text-gray-600">

                        <table class="table-fixed w-full rounded font-light text-left h-auto border-collapse">

                            <tbody class="text-left">

                                @foreach ($indicaciones as $indicacion)
                                    
                                <tr class="h-16 hover:bg-gray-200 active:bg-gray-300">

                                        <td class="px-2">{{ $indicacion->descripcion }}</td>
                                        
                                        <td class="w-[64px] pl-2">
                                            <img src="{{ asset('/storage/pasos/' . $indicacion->imagen) }}" alt=""
                                                title="" class="rounded w-full">
                                        </td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Editar" wire:click="edit({{ $indicacion }})">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </td>

                                        <td class="w-12 md:w-20 text-center">
                                            <a href="#" title="Eliminar" wire:click="delete({{ $indicacion }})">
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
            <p class="font-bold text-left pb-4 border-b">Actualizar indicacion</p>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4 mr-0 md:mr-4 md:mb-0 w-full md:w-[420px] rounded border p-4 bg-white">
                <div class="text-xs text-left lg:text-sm">
                    <label for="{{ $identificador }}" class="cursor-pointer hover:underline">Selecciona una
                        Imagen</label>
                </div>

                <div class="mt-4 min-h-32">
                    @if ($imagenva)
                        <img src="{{ $imagenva->temporaryUrl() }}"
                            class="w-full p-2 border border-zinc-500 rounded" width="240px">
                    @else
                        <img src="{{ asset('../storage/pasos/' . $imagen) }}" alt="" title=""
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
