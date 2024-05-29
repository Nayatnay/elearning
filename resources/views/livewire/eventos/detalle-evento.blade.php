@section('title', 'Detalles del Evento | Le Concassé')
<div>
    <div class="text-sm sm:text-base font-semibold py-2 shadow">

        <div class="max-w-screen-xl md:mx-auto px-6">

            <div class="flex items-center">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title="" width="56px"
                    class="hidden md:block rounded w-[60px]">
                <p class="md:hidden text-xl font-medium mr-4 pl-1 md:pl-0 text-ellipsis line-clamp-2">
                    {{ $evento->nombre }}</p>
            </div>

        </div>
    </div>


    <div class="max-w-screen-xl md:mx-auto my-8 p-6">

        <div class="flex flex-col md:flex-row">

            <div class="min-w-[100px] md:min-w-[512px]">
                <img src="{{ asset('/storage/eventos/' . $evento->imagen) }}" alt="" title=""
                    width="" class="rounded w-full">
            </div>

            <div class="w-full md:px-6 md:ml-4">
                <p class="hidden md:block text-xl lg:text-2xl text-orange-700 uppercase">{{ $evento->nombre }}</p>
                <textarea
                    class="text-justify info mt-10 md:mt-4 bg-transparent border-none p-0 resize-none w-full min-h-full focus:border-0 focus:ring-0">{{ $evento->info }}</textarea>
            </div>

        </div>
    </div>

    <!-- Registro de evento -->
    @if ($evento->registrar == 1)
        <div class="bg-white">
            <div class="max-w-screen-xl md:mx-auto my-8 px-6 py-10">
                <p class="text-2xl md:text-4xl font-bold text-red-800">Regístrate</p>
                <p class="text-lg md:text-2xl mt-1">Consultaremos si eres un usuario registrado</p>

                <div class="mt-6">
                    <form action="" wire:submit="consulta">
                        <x-input class="block mt-1 w-full md:w-96" wire:model="email" id="email" type="email"
                            name="email" required autocomplete="email" placeholder="Introduce tu email" />

                        <div class="mt-6">
                            <x-buttonred>
                                Consultar Email
                            </x-buttonred>
                        </div>

                    </form>
                </div>

                <div class="mt-4 text-xs">
                    @if ($reg == 1)
                        <p class="">Inscripción realizada satisfactoriamente. Consulte en el menú
                            <strong>Mis cursos y eventos del usuario</strong>
                        </p>
                    @endif
                    @if ($reg == 2)
                        <p class="text-red-700">El usuario ya se encuentra registrado en el evento. Consulte en el menú
                            <strong>Mis cursos y eventos del usuario</strong>
                        </p>
                    @endif
                </div>

            </div>

        </div>
    @endif

    <!-- Pie de pagina -->

    <x-footer></x-footer>

    <!--Modal registrar evento -->

    <x-confirmation-modal wire:model="regsi">

        <x-slot name="title">
            Estimado usuario: Se procederá a realizar la inscripción en el Evento.
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de Continuar?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cancelar" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="inscribir" wire:loading.attr="disabled" class="disabled:opacity-25 ml-2">
                Aceptar
            </x-danger-button>
        </x-slot>

    </x-confirmation-modal>


    <!--Modal registrar usuario y evento -->
    <x-dialog-modal wire:model="regno">

        <x-slot name="title">
            <p class="font-bold text-left pb-4 border-b text-zinc-800">Rellene el formulario</p>
        </x-slot>

        <x-slot name="content" class="">

            <div class="">

                <div class="mt-4">
                    <x-label for="emailreg" value="{{ __('Email') }}" />
                    <x-input id="emailreg" class="block mt-1 w-full" type="email" name="emailreg"
                        wire:model.defer="emailreg" required disabled />
                    <x-input-error for="emailreg" />
                </div>

                <div class="mt-4">
                    <x-label for="name" value="{{ __('Nombre y Apellido') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        wire:model.defer="name" required autocomplete="name" />
                    <x-input-error for="name" />
                </div>

                <div class="mt-4">
                    <x-label for="doc" value="{{ __('Documento Identidad') }}" />
                    <x-input id="doc" class="block mt-1 w-full" type="text" name="doc"
                        wire:model.defer="doc" required autocomplete="doc" />
                    <x-input-error for="doc" />
                </div>

                <div class="mt-4 w-48">
                    <x-label for="fechanac" value="{{ __('Fecha de Nacimiento') }}" class="ml-4 text-zinc-800" />
                    <x-input id="fechanac" class="block mt-1 w-full" type="date" name="fechanac"
                        wire:model.defer="fechanac" required />
                    <x-input-error for="fechanac" />
                </div>

                <div class="mt-4">
                    <x-label for="telf" value="{{ __('Teléfono Personal') }}" />
                    <x-input id="telf" class="block mt-1 w-full" type="text" name="telf"
                        wire:model.defer="telf" required />
                    <x-input-error for="telf" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        wire:model.defer="password" required />
                    <x-input-error for="password" />
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex">
                <x-secondary-button wire:click="cancelareg" wire:target="cancelareg" class="mr-4">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    Aceptar
                </x-button>
            </div>
        </x-slot>

    </x-dialog-modal>

    <!-- texarea ajustado al contenido -->
    <script>
        let area = document.querySelectorAll(".info")

        window.addEventListener("DOMContentLoaded", () => {
            area.forEach((elemento) => {
                elemento.style.height = `${elemento.scrollHeight}px`
            })
        })
    </script>

</div>
