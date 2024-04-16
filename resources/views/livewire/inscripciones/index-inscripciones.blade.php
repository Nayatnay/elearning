<div>
    <div class="w-full py-10 ">
        <div class="max-w-7xl mx-auto py-0 md:py-10 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-center md:flex-row">

                <div class="w-full md:w-[60%] text-4xl sm:text-5xl mr-4">

                    <span class="font-bold mb-10">Curso: </span>
                    <span class="text-red-800">{{ $curso->nombre }}</span>

                    <div class="flex flex-col justify-center mt-6">
                        @if ($inscrip == null)
                            <div class="flex items-center">
                                <div
                                    class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-red-800 rounded-full">
                                    <p class="text-lg md:text-2xl text-white font-bold">1</p>
                                </div>
                                <p class="ml-3 text-red-800 font-bold text-xs sm:text-base">Ingresa el
                                    turno de tu preferencia
                                </p>
                            </div>

                            <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                            <div class="flex items-center">
                                <div
                                    class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                    <p class="text-lg md:text-2xl text-white font-bold">2</p>
                                </div>
                                <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Te contactaremos para
                                    formalizar la inscripción</p>
                            </div>

                            <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                            <div class="flex items-center">
                                <div
                                    class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                    <p class="text-lg md:text-2xl text-white font-bold">3</p>
                                </div>
                                <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">¡Estás listo! Comienza tu
                                    aprendizaje</p>
                            </div>
                        @else
                            @if ($inscrip->liberado == 0)
                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">1</p>
                                    </div>
                                    <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Ingresa
                                        el turno de tu preferencia
                                    </p>
                                </div>

                                <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-red-800 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">2</p>
                                    </div>
                                    <p class="ml-3 text-red-800 font-bold text-xs sm:text-base">Te
                                        contactaremos para
                                        formalizar la inscripción</p>
                                </div>

                                <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">3</p>
                                    </div>
                                    <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">¡Estás listo!
                                        Comienza tu
                                        aprendizaje</p>
                                </div>
                            @else
                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">1</p>
                                    </div>
                                    <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Ingresa
                                        el turno de tu preferencia
                                    </p>
                                </div>

                                <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-gray-700 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">2</p>
                                    </div>
                                    <p class="ml-3 text-xs font-medium sm:text-base sm:font-light">Te
                                        contactaremos para
                                        formalizar la inscripción</p>
                                </div>

                                <div class="border-l border-red-800 ml-4 md:ml-5 pb-3"></div>

                                <div class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-8 h-8 md:w-10 md:h-10 bg-red-800 rounded-full">
                                        <p class="text-lg md:text-2xl text-white font-bold">3</p>
                                    </div>
                                    <p class="ml-3 text-red-800 font-bold text-xs sm:text-base">¡Estás
                                        listo!
                                        Comienza tu aprendizaje</p>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="mt-12 md:mt-0 text-5xl w-full md:w-[35%]">
                    @if ($inscrip == null)
                        <div class="border rounded-lg shadow-lg bg-white">

                            <div class="p-3 bg-red-800 text-white text-center rounded-tl-lg rounded-tr-lg">
                                <p class="uppercase font-bold text-sm">Envíanos el turno de tu preferencia</p>
                            </div>

                            <div class="mt-6 px-4">
                                <select name="turno" wire:model="turno"
                                    class="pl-4 block mt-1 w-full border-gray-800 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
                                    type="text" :value="old('turno')" required autocomplete="turno">
                                    <option value="">Selecciona un turno</option>
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="En Línea">En línea</option>
                                </select>
                                <x-input-error for="turno" />
                            </div>

                            <div class="pb-4 px-4">
                                <x-button wire:click="save">
                                    {{ __('Enviar') }}
                                </x-button>
                            </div>

                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-20 mb-10 border border-gray-400 bg-gray-200 shadow-lg rounded-xl p-8 ">
                <div class="flex flex-col items-center justify-center lg:flex-row ">
                    <div class="w-full lg:mr-4 text-center lg:text-left">
                        <p class="text-4xl">¡Da el primer paso!</p>
                        <p class="text-2xl mt-2">Una extensa variedad de categorías a escoger</p>

                    </div>
                    <a href="{{ route('cursos') }}">
                        <div
                            class="mt-6 rounded-full w-60 border-4 border-transparent  bg-white hover:bg-gray-200 active:bg-gray-300 hover:border-white px-10 py-4 text-center font-bold text-base">
                            Comienza aquí
                        </div>
                    </a>
                </div>
                <p class="mt-6 text-xs font-medium text-center lg:text-left"> Repostería tradicional, gastronomía
                    exótica, comida internacional y exquisiteces de la India
                <p>
            </div>
        </div>
    </div>
    <!-- Pie de pagina -->
    <x-footer></x-footer>
</div>
