<div>
    <div class="w-full py-10 ">
        <div class="max-w-7xl mx-auto py-0 md:py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-center md:flex-row">

                <div class="p-4 w-full md:w-[60%] text-4xl sm:text-5xl ">

                    <p class="font-bold mb-8">Estudia cocina en la escuela #1 de la zona</p>

                    <div class="flex flex-col justify-center ">

                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-lime-600 rounded-full">
                                <p class="text-lg md:text-2xl text-white font-bold">1</p>
                            </div>
                            <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Ingresa tus datos en el
                                formulario</p>
                        </div>
                        <div class="border-l border-lime-600 ml-4 md:ml-5 pb-3"></div>

                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-lime-600 rounded-full">
                                <p class="text-lg md:text-2xl text-white font-bold">2</p>
                            </div>
                            <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Ingresa una contraseña (Sólo
                                primera vez)</p>
                        </div>
                        <div class="border-l border-lime-600 ml-4 md:ml-5 pb-3"></div>

                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-lime-600 rounded-full">
                                <p class="text-lg md:text-2xl text-white font-bold">3</p>
                            </div>
                            <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Realiza el pago</p>
                        </div>
                        <div class="border-l border-lime-600 ml-4 md:ml-5 pb-3"></div>

                        <div class="flex items-center">
                            <div
                                class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-lime-600 rounded-full">
                                <p class="text-lg md:text-2xl text-white font-bold">4</p>
                            </div>
                            <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">¡Estás listo! Comienza tu
                                aprendizaje</p>
                        </div>

                    </div>
                </div>

                <div class="p-4 font-extralight text-5xl w-full md:w-[35%]">

                    <div class="border rounded-md shadow-md bg-white">

                        <p class="mb-6 p-3 bg-lime-400 text-lg font-medium text-center">Inscribe uno de nuestros cursos
                            en línea o presencial</p>

                        <form method="POST" action="" class="text-sm m-4">
                            @csrf

                            <div>
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

                            <div class="mt-8">
                                <select name="curso" wire:model.defer="curso"
                                    class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                                    type="text" name="curso" :value="old('curso')" required autocomplete="curso">
                                    <option value="">Cursos</option>
                                    <option value="1">Curso prueba 1</option>
                                    <option value="1">Curso prueba 2</option>
                                    <option value="1">Curso prueba 3</option>
                                </select>
                                <x-input-error for="curso" />
                            </div>

                            <div class="mt-8">
                                <select name="turno"
                                    class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                                    type="text" name="turno" :value="old('turno')" required autocomplete="turno">
                                    <option value="">Turnos</option>
                                    <option value="1">Mañana</option>
                                    <option value="1">Tarde</option>
                                </select>
                                <x-input-error for="turno" />
                            </div>

                            <x-button class="mt-8">
                                {{ __('Enviar') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
