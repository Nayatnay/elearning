<div>
    <div class="cursor-point font-light ">
        <p wire:click="$set('open', true)"
            class="border-b-2 border-transparent hover:border-red-700 cursor-pointer">Crear receta</p>
    </div>

    <!--Modal crear -->
    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b text-zinc-800">Crear Nueva Receta</p>
        </x-slot>

        <x-slot name="content" class="">

            <div class="flex flex-col md:flex-row">

                <div class="mb-4 mr-0 md:mr-4 md:mb-0 w-full md:w-[420px] rounded border p-4 bg-white">
                    <div class="text-xs text-left lg:text-sm">
                        <label for="{{ $identificador }}" class="cursor-pointer hover:underline">Selecciona una
                            Imagen</label>

                    </div>

                    <div class="mt-4 min-h-32">
                        @if ($imagen)
                            <img src="{{ $imagen->temporaryUrl() }}" class="w-full p-2 border border-zinc-500 rounded"
                                width="240px">
                        @endif
                    </div>

                    <div wire:loading wire:target="imagen" class="w-full mt-2 text-xs font-medium">
                        <strong>¡Cargando Imagen! </strong>
                        <span>Espere mientras se carga la imagen...</span>
                    </div>
                    <input id="{{ $identificador }}" type="file" style="visibility:hidden" name="imagen"
                        wire:model="imagen" class="text-[8px]" required />
                    <x-input-error for="imagen" />

                </div>

                <div class="w-full border p-4 bg-white rounded">
                    
                    <div class="mb-4">
                        <x-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" wire:model.defer="nombre"
                        required
                            autofocus />
                        <x-input-error for="nombre" />
                    </div>

                    <div class="mb-4">
                        <x-label for="descripcion" value="{{ __('Descripción') }}" />
                        <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" 
                        wire:model.defer="descripcion" required autofocus />
                        <x-input-error for="descripcion" />
                    </div>

                    <div class="mb-4">
                        <x-label for="tiempo" value="{{ __('Tiempo de preparación') }}" />
                        <x-input id="tiempo" class="block mt-1 w-full" type="text" name="tiempo" 
                        wire:model.defer="tiempo" required autofocus />
                        <x-input-error for="tiempo" />
                    </div>

                    <div class="mb-4">
                        <x-label for="porciones" value="{{ __('Porciones') }}" />
                        <x-input id="porciones" class="block mt-1 w-full" type="text" name="porciones" 
                        wire:model.defer="porciones" required autofocus />
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

                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save, imagen">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
