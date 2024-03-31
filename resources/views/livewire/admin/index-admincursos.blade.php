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

    <div class="my-8 p-4 max-w-screen-xl mx-auto">
        
        <!-- formulario de busqueda -->

        <div class="md:flex items-center mt-8 mb-4">
            <x-input type="text" wire:model.live="buscar" class="w-full" placeholder="Buscar en la lista" />
        </div>

        @if ($cursos->count())

            <div class="my-12 grid gap-x-8 md:gap-x-16 gap-y-4 md:gap-y-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">

                @foreach ($cursos as $curso)
                        <div
                            class="flex flex-col items-center justify-between border border-gray-600 rounded-lg bg-white">

                            <div class="flex h-[50%] items-start">
                                <a href="#">
                                    <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt=""
                                        title="" class="w-full rounded-tl-lg rounded-tr-lg" width="">
                                </a>
                            </div>

                            <div class="w-full p-4 font-bold text-xl">
                                <a href="#">
                                    <p class="text-ellipsis line-clamp-1 font-normal">{{ $curso->nombre }}</p>
                                </a>

                                <div class="flex items-start mt-2">
                                    <span class="text-sm font-normal mt-0.5 mr-0.5">US$</span>
                                    <span class="text-3xl font-semibold">
                                        {{ intval($curso->costo) }}</span>
                                    @php
                                    $numero = number_format($curso->costo, 2, '.', '');
                                        $decimal = substr($numero, -2);
                                    @endphp
                                    @if ($decimal != 0)
                                        <span
                                        class="mt-0.5 ml-0.5 text-sm font-light">{{ $decimal }}</span>
                                    @endif
                                </div>
                                <div class="mt-2 pt-4 text-lg w-full flex items-center justify-between border-t border-gray-200">
                                    <a href="#" title="Eliminar" class="px-2"
                                        wire:click="delete({{ $curso }})">
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
                                    <a href="#" wire:click="edit({{ $curso }})" title="Editar"
                                        class="group text-center px-2">
                                        <span
                                            class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                        <span
                                            class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                        <span
                                            class="h-2 w-2 bg-lime-600 rounded-full inline-block group-hover:bg-orange-600"></span>
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endforeach

            </div>
        @else
            <div class="mt-4 bg-white text-base font-semibold sm:px-10 px-5 py-2 shadow">
                <span>0 resultados para </span> <span class="text-red-700"> "{{ $buscar }}" </span>
            </div>

        @endif

        @if ($cursos->hasPages())
            <div class="px-4 py-2 text-center mt-10">
                {{ $cursos->onEachSide(0)->links() }}
            </div>
        @endif

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('creado') == 'ok')
        <script>
            Swal.fire({
                icon: 'success',
                text: 'curso creado satisfactoriamente.',
                confirmButtonColor: '#65a30d',
                confirmButtonText: 'OK'
            })
        </script>
    @endif

    @if (session('eliminado') == 'ok')
        <script>
            Swal.fire({
                text: 'El curso fue eliminado con éxito',
                confirmButtonColor: '#65a30d',
                confirmButtonText: 'OK'
            })
        </script>
    @endif

    @if (session('actualizado') == 'ok')
        <script>
            Swal.fire({
                icon: 'success',
                text: 'curso Actualizado con éxito',
                confirmButtonColor: '#65a30d',
                confirmButtonText: 'OK'
            })
        </script>
    @endif

</div>
