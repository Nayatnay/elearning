@section('title', 'Admin Párrafos Evento | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between px-4 md:px-8 py-3 max-w-screen-xl mx-auto">

            <div class="flex items-center">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="text-sm font-medium ml-4 uppercase">{{ $evento->nombre }}</p>
            </div>

            {{-- @livewire('admin.crear-adminparrafos', ['evento' => $evento->id]) --}}

        </div>

    </div>

    <div class="mt-4 pt-4 px-4 pb-20 max-w-screen-xl mx-auto">

        <div class="px-4">
            <a href="{{ route('admin_eventos') }}"
                class="px-2 py-1 bg-red-700 text-white rounded-lg hover:bg-red-600">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <div>
            <form action="" wire:submit="actuinfo">

                <div class="mt-8 text-sm px-4 py-1 max-w-screen-xl mx-auto flex items-center justify-between">
                    <p class="font-bold uppercase">Descripción del Evento, Artículo o noticia</p>
                    <x-button id="myButton" title="Guardar" class="mx-1">
                        <i class="text-lg fa-regular fa-floppy-disk"></i>
                    </x-button>
                </div>

                <div class="">
                    <textarea name="info" id="editor"
                        class="focus:border-gray-300 focus:ring-0 mt-1 w-full h-screen resize-none p-4 rounded-lg" wire:model="info"></textarea>
                </div>

            </form>
        </div>

    </div>


    <!--Modal edit -->

    <x-dialog-modal wire:model="open_edit">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b">Actualizar Párrafo</p>
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
                    wire:model="descripcion" required autofocus />
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
