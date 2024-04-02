<div>
    <div class="text-sm cursor-point font-light ">
        <p wire:click="$set('open', true)"
            class="text-base border-b-2 border-transparent hover:border-red-700 cursor-pointer">Crear alcance</p>
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

            <div class=" mb-4">
                <x-label for="curso" value="{{ __('Curso') }}" class="text-zinc-800" />
                <select name="curso" wire:model.defer="curso"
                    class="w-full px-2 py-3 text-sm rounded-md border border-gray-200 focus:border-gray-300 focus:ring-0 text-zinc-800">
                    <option value="">Seleccionar un Curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error for="curso" />
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
