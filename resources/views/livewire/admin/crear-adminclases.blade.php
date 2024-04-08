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

            <div class="flex mb-4 ">

                <div class="basis-1/2 mr-1 rounded border p-2 bg-white">

                    <div class="text-xs lg:text-sm">
                        <label for="{{ $identif_poster }}" class="cursor-pointer hover:underline">Cargar Poster del
                            Video</label>
                        <input id="{{ $identif_poster }}" type="file" style="visibility:hidden" name="poster"
                            wire:model="poster" class="text-[8px]" required />
                        <x-input-error for="poster" />
                    </div>

                    <div class="my-2 min-h-32 w-40">
                        @if ($poster)
                            <img src="{{ $poster->temporaryUrl() }}" class="w-full p-2 border border-zinc-500 rounded"
                                width="160px">
                        @endif
                    </div>

                    <div wire:loading wire:target="poster" class="w-full mt-2 text-xs font-medium">
                        <strong>¡Cargando poster! </strong>
                        <span>Espere mientras se carga el poster...</span>
                    </div>

                </div>

                <div class="basis-1/2 ml-1 rounded border p-2 bg-white">

                    <div class="text-xs lg:text-sm w-40">
                        <label for="{{ $identificador }}" class="cursor-pointer hover:underline">Cargar Video</label>
                        <input id="{{ $identificador }}" type="file" style="visibility:hidden" name="video"
                            wire:model="video" class="text-[8px]" required />
                        <x-input-error for="video" />
                    </div>

                    <div class="my-2 min-h-32">
                        @if ($video)
                            <video width="320" height="240" controls poster="img/poster.png">
                                <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                            </video>
                        @endif
                    </div>

                    <div wire:loading wire:target="video" class="w-full mt-2 text-xs font-medium">
                        <strong>¡Cargando video! </strong>
                        <span>Espere mientras se carga el video...</span>
                    </div>

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

</div>
