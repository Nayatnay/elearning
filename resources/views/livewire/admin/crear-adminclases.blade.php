<div>
    <div class="text-sm cursor-point font-light ">
        <p wire:click="$set('open', true)"
            class="text-base border-b-2 border-transparent hover:border-red-700 cursor-pointer">Crear clase</p>
    </div>

    <!--Modal crear -->
    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b text-zinc-800">Crear Nueva Clase</p>
        </x-slot>

        <x-slot name="content" class="">

            <div class="mb-4 p-2">

                <div class="text-xs lg:text-sm">
                    <label for="{{ $identificador }}" 
                    class="bg-gray-700 text-white p-2 rounded cursor-pointer hover:underline"
                    onclick="myfunction()">Cargar Video</label>
                    <input id="{{ $identificador }}" type="file" style="visibility:hidden" name="video"
                        wire:model="video" class="text-[8px]" required />
                    <x-input-error for="video" />
                </div>

                @if ($video)
                    <div class="block text-gray-800 font-medium text-xs p-1" id="etiq">
                        <p>Video cargado satisfactoriamente</p>
                    </div>
                @endif

                <div class="text-red-700 text-xs p-1 font-medium" wire:loading wire:target="video">
                    <p><strong>¡Cargando video! </strong>Espere mientras se carga el video...</p>
                </div>

            </div>

            <div class="mb-4">
                <x-label for="tema" value="{{ __('tema') }}" />
                <x-input id="tema" class="block mt-1 w-full" type="text" name="tema" wire:model.defer="tema"
                    required autofocus />
                <x-input-error for="tema" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex">
                <x-secondary-button wire:click="cancelar" wire:target="cancelar" class="mr-4">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save, video">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

    <script>
        function myfunction() {
            document.getElementById("etiq").style.display = "none";
        }
    </script>

</div>
