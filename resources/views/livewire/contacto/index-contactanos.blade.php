@section('title', 'Contáctanos | Le Concassé')
<div>
    <div class="max-w-7xl mx-auto py-10 px-4 lg:px-8">
        <div class="md:w-1/2 mx-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mt-4">
                    <p class="font-bold text-4xl">Escríbenos</p>
                    <p class="font-light">Déjanos un mensaje y te responderemos a la brevedad</p>
                </div>

                <div class="mt-8">
                    <x-label for="name" value="{{ __('Nombre y Apellido') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autocomplete="name" />
                    <x-input-error for="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="email" />
                    <x-input-error for="email" />
                </div>

                <div class="mt-4">
                    <x-label for="mensaje" value="{{ __('Mensaje') }}" />
                    <textarea name="mensaje" id="" class="block mt-1 w-full rounded"></textarea>
                </div>
                
                <x-button class="mt-8">
                    {{ __('Enviar mensaje') }}
                </x-button>

            </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

</div>
