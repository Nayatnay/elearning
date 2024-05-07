@section('title', 'Solicitud de empleo | Le Concassé')
<div>
    <div class="max-w-7xl mx-auto py-10 px-4 lg:px-8">
        <div class="md:w-1/2 mx-auto">
            <form method="POST" action="{{ route('solicitud_empleo') }}" enctype="multipart/form-data">
                @csrf

                <div class="mt-4">
                    <p class="font-bold text-4xl">Formulario de solicitud de empleo</p>
                    <p class="font-light">Rellena el formulario, carga tu CV en formato PDF y envía</p>
                </div>

                <div class="mt-8">
                    <x-label for="nombre" value="{{ __('Nombre y Apellido') }}" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                        required autocomplete="nombre" />
                    <x-input-error for="nombre" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="email" />
                    <x-input-error for="email" />
                </div>

                <div class="mt-4">
                    <x-label for="telf" value="{{ __('Teléfono Personal') }}" />
                    <x-input id="telf" class="block mt-1 w-full" type="text" name="telf" :value="old('telf')"
                        required autocomplete="telf" />
                </div>

                <div class="mt-4 w-48">
                    <x-label for="fechanac" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="fechanac" class="block mt-1 w-full" type="date" name="fechanac" :value="old('fechanac')"
                        required autocomplete="fechanac" />
                    <x-input-error for="fechanac" />
                </div>

                <div class="mt-8 ">

                    <div class="flex items-center justify-between">
                        <div class="mr-4">
                            <label for="{{ $identificador }}" onclick="myfunction()"
                                class="bg-red-800 text-white px-4 py-1 rounded text-sm cursor-pointer hover:bg-red-700">Cargar
                                CV</label>
                        </div>
                        <div>
                            <x-button class="">{{ __('Enviar') }}</x-button>
                        </div>

                    </div>
                    <div class="mt-4 text-orange-600 text-sm ">
                        @if ($archivo)
                            <p id="fileName"></p>
                        @endif
                    </div>

                    @if (session('info'))
                        <p class="mensaje text-sm font-bold text-orange-600">
                            Su información fue enviada satisfactoriamente
                        </p>
                    @endif

                    <div wire:loading wire:target="archivo" class="w-full mt-4 text-xs font-medium text-orange-600">
                        <strong>¡Cargando Archivo! </strong>
                        <span>Espere mientras se carga el archivo...</span>
                    </div>

                    @if ($archivo)
                        <div class="mt-4 block text-gray-800 font-bold text-xs" id="etiq">
                            <p id="fileName"></p>
                            <p>El Archivo fue cargado satisfactoriamente</p>
                        </div>
                    @endif

                    <input id="{{ $identificador }}" type="file" style="visibility:hidden" name="archivo"
                        wire:model="archivo" class="text-[8px]" required onChange="onLoadFile(event.target.files)" />
                    <x-input-error for="archivo" />

                </div>



            </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

    <script>
        function onLoadFile(files) {
            document.getElementById('fileName').innerHTML = files[0].name

        }
    </script>

    <script>
        function myfunction() {
            document.getElementById("etiq").style.display = "none";
            document.getElementById('fileName') = document.getElementById('. $identificador .').files[0].name;
        }
    </script>

    <!-- MOSTRAR MENSAJE POR 3 SEGUNDOS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".mensaje").fadeOut(1500);
            }, 3000);
        });
    </script>


</div>
