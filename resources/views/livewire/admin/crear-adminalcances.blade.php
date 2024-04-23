<div>
    <div class="cursor-point font-light ">
        <p wire:click="$set('open', true)"
            class="border-b-2 border-transparent hover:border-red-700 cursor-pointer">Crear alcance</p>
    </div>

    <!--Modal crear -->
    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b text-zinc-800">Crear Nuevo Alcance</p>
        </x-slot>

        <x-slot name="content" class="">

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

                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

</div>
