@section('title', 'Iniciar sesión | Le Concassé')
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-4">
                <p class="font-bold text-2xl">Inicia sesión</p>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Iniciar sesión') }}
                </x-button>

            </div>

            <div class="mt-10 border-t border-gray-600 py-2 text-center text-sm font-light">
                <p class="mb-2">¿Eres nuevo por acá?</p>
                <a class="text-sm hover:underline bg-gray-400 text-black border border-gray-500 rounded block w-full p-2 ring-zinc-500 focus:ring"
                 href="{{ route('register') }}">
                    Crea tu cuenta
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
