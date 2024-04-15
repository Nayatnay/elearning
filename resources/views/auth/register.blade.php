@section('title', 'Registrarse | Le Concassé')
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <p class="font-bold text-2xl">Registro</p>
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Nombre y Apellido') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name')" required autocomplete="name" />
                <x-input-error for="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autocomplete="email" />
                <x-input-error for="email" />
            </div>

            <div class="mt-4">
                <x-label for="doc" value="{{ __('Documento Identidad') }}" />
                <x-input id="doc" class="block mt-1 w-full" type="text" name="doc"
                    :value="old('doc')" required autocomplete="doc" />
                <x-input-error for="doc" />
            </div>

            <div class="mt-4 w-48">
                <x-label for="fechanac" value="{{ __('Fecha de Nacimiento') }}"
                    class="ml-4 text-zinc-800" />
                <x-input id="fechanac" class="block mt-1 w-full" type="date" name="fechanac"
                    :value="old('fechanac')" required autocomplete="fechanac" />
                <x-input-error for="fechanac" />
            </div>

            <div class="mt-4">
                <x-label for="telf" value="{{ __('Teléfono Personal') }}" />
                <x-input id="telf" class="block mt-1 w-full" type="text" name="telf"
                    :value="old('telf')" required autocomplete="telf" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado(a)?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>

            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
