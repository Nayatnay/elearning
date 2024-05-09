@section('title', 'Admin Usuarios | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Administración de usuarios') }}
            </h2>

        </div>
    </div>

    <div class="mt-8 p-4 max-w-screen-xl mx-auto">

        <!-- Buscador -->

        <div class="md:flex items-center mb-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>


        <!-- Tabla -->

        <div class="mt-10">
            @if ($usuarios->count())

                <div class="w-full p-1 min-h-0 overflow-auto rounded-lg text-sm text-gray-600">

                    <table class="table-fixed  w-full rounded font-light text-left h-auto border-collapse">

                        <tbody class="text-left">

                            @foreach ($usuarios as $usuario)
                                <tr class="h-10 hover:bg-gray-50 border-b border-gray-300">

                                    <td class="pl-2 w-80 min-w-80">
                                        {{ $usuario->name }} <i class="fa-solid fa-id-card-clip mx-1"></i> {{ $usuario->doc }}
                                    </td>

                                    <td class="pl-2 w-96 min-w-96">
                                        {{ $usuario->email }} <i class="fa-solid fa-phone ml-1"></i> {{ $usuario->telf }}
                                    </td>

                                    <td class="pl-2 w-32 min-w-32 uppercase">
                                        {{ date('d-m-Y', strtotime($usuario->fechanac)) }}
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="#" title="Eliminar" wire:click="delete({{ $usuario }})"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="#" wire:click="edit({{ $usuario }})" title="Editar"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-pen"></i> </a>
                                    </td>

                                    <td class="w-10 text-center">
                                        <a href="{{ route('ver_matricula', $usuario) }}" title="Cursos matriculados"
                                            class="p-2 border border-transparent rounded-lg hover:border-gray-800">
                                            <i class="fa-solid fa-book"></i>
                                        </a>
                                    </td>

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

            @if ($usuarios->hasPages())
                <div class="px-4 py-2 text-center mt-4">
                    {{ $usuarios->onEachSide(0)->links() }}
                </div>
            @endif

            <div class="mt-16 border-t-2 px-2 py-4 text-gray-600 flex flex-wrap text-sm">
                <div class="mr-4">
                    <p>Usuarios registrados: <strong>{{$totusers}}</strong></p>             
                </div>
                <div class="mr-4">
                    <p>Número de suscripciones: <strong>{{$totsuscripciones}}</strong></p>
                </div>
                <div>
                    <p>Estudiantes: <strong>{{$totestudiantes}}</strong></p>
                </div>
            </div>
        </div>

    </div>

    <!--Modal delete -->

    <x-confirmation-modal wire:model="open_delete">

        <x-slot name="title">
            Esta acción no podrá ser reversada
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de proceder con la eliminación del usuario?
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
            <p class="font-bold text-left pb-4 border-b">Actualizar usuario</p>
        </x-slot>

        <x-slot name="content">

            <div class="w-full border p-4 bg-white rounded">

                <div class="mb-4">
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name"
                        required autofocus />
                    <x-input-error for="name" />
                </div>

                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="text" name="email"
                        wire:model="email" required autofocus />
                    <x-input-error for="email" />
                </div>

                <div class="mb-4">
                    <x-label for="telf" value="{{ __('Teléfono de contacto') }}" />
                    <x-input id="telf" class="block mt-1 w-full" type="text" name="telf"
                        wire:model="telf" required autofocus />
                    <x-input-error for="telf" />
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
