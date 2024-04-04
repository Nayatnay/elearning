@section('title', 'Admin Cursos | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Administrar cursos') }}
            </h2>
            @livewire('admin.crear-admincursos')
        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>

        <!-- Tabla -->

        <div class="mt-10">
            @if ($cursos->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-xs text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($cursos as $curso)
                                <tr class="h-12 hover:bg-gray-200 active:bg-gray-300">
                                    <td class="w-[48px] pl-2 cursor-pointer" wire:click="prueba({{ $curso }})">
                                        <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt=""
                                            title="" class="rounded w-full">
                                    </td>

                                    <td class="pl-2 w-48 min-w-48 font-bold uppercase cursor-pointer"
                                        wire:click="prueba({{ $curso }})">{{ $curso->nombre }}</td>

                                    <td class="pl-2 w-96 min-w-96 cursor-pointer"
                                        wire:click="prueba({{ $curso }})">{{ $curso->descripcion }}</td>

                                    <td class="px-2 w-20 min-w-20 text-right cursor-pointer"
                                        wire:click="prueba({{ $curso }})">
                                        ${{ number_format($curso->costo, 2, ',', '.') }}</td>

                                    <td class="w-14 text-center">
                                        <a href="#" title="Eliminar" wire:click="delete({{ $curso }})">
                                            <i class="fa-solid fa-trash text-gray-500"></i>
                                        </a>
                                    </td>
                                    <td class="w-14 text-center">
                                        <a href="#" wire:click="edit({{ $curso }})" title="Editar"
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

            @if ($cursos->hasPages())
                <div class="px-4 py-2 text-center mt-4">
                    {{ $cursos->onEachSide(0)->links() }}
                </div>
            @endif

        </div>

        <div class="mt-10 flex items-center border-y p-2 text-sm font-bold bg-white uppercase">
            <div class="w-[72px] mr-4">
                <img src="{{ asset('/storage/cursos/' . $imgc) }}" alt="" title=""
                    class="rounded w-full">
            </div>
            <p>{{ $nombrec }}</p>
        </div>

        <!-- Tabla Requisitos -->

        <div class="">

            <div
                class="flex items-center justify-between text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto border-b border-gray-600">
                <p class="font-bold uppercase">Requisitos</p>
                <a href="{{ route('selec_requisitos', $ident) }}"
                    class="bg-lime-600 text-white font-extrabold rounded px-1.5">+</a>
            </div>

            @if ($reqcurso->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($reqcurso as $requisito)
                                <tr class="h-8 hover:bg-gray-200 active:bg-gray-300">

                                    <td class="px-2">{{ $requisito->requisito->descripcion }}</td>

                                    <td class="w-12 md:w-20 text-center">
                                        <a href="#" title="Eliminar" wire:click="deletereq({{ $requisito }})"
                                            class="bg-red-500 text-white font-extrabold rounded px-1.5">-</a>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-sm text-gray-700 sm:px-7 px-5 py-2">
                    <span>Sin resultados</span>
                </div>
            @endif

        </div>

        <!-- Tabla Alcances -->

        <div class="mt-8">

            <div
                class="flex items-center justify-between text-sm px-4 md:px-8 py-1 max-w-screen-xl mx-auto  border-b border-gray-600">
                <p class="font-bold uppercase">Alcances</p>
                <a href="{{ route('selec_alcances', $ident) }}"
                    class="bg-lime-600 text-white font-extrabold rounded px-1.5">+</a>
            </div>


            @if ($alcurso->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($alcurso as $alcance)
                                <tr class="h-8 hover:bg-gray-200 active:bg-gray-300">

                                    <td class="px-2">{{ $alcance->alcance->descripcion }}</td>

                                    <td class="w-12 md:w-20  text-center">
                                        <a href="#" title="Eliminar" wire:click="deletealc({{ $alcance }})"
                                            class="bg-red-500 text-white font-extrabold rounded px-1.5">-</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-sm text-gray-700 sm:px-7 px-5 py-2">
                    <span>Sin resultados</span>
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
            ¿Está seguro de proceder con la eliminación del curso?
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
            <p class="font-bold text-left pb-4 border-b">Actualizar curso</p>
        </x-slot>

        <x-slot name="content">

            <div class="flex flex-col md:flex-row">

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
                            <img src="{{ asset('../storage/cursos/' . $imagen) }}" alt="" title=""
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

                    <div class="mb-4 md:mb-0">
                        <x-label for="costo" value="{{ __('Costo') }}" class="text-zinc-800" />
                        <x-input id="costo"
                            class="w-40 block mt-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                            type="number" step="any" name="costo" wire:model="costo" required autofocus />
                        <x-input-error for="costo" />
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
