@section('title', 'Contáctanos | Le Concassé')
<div>
    <div class="max-w-7xl mx-auto py-10 px-4 lg:px-8">
        <div class="md:w-1/2 mx-auto">

            <form method="POST" action="{{ route('contactanos') }}" onsubmit="ani()">
                @csrf

                <div class="mt-4">
                    <p class="font-bold text-4xl">Escríbenos</p>
                    <p class="font-light">Déjanos un mensaje y te responderemos a la brevedad</p>
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
                    <x-label for="mensaje" value="{{ __('Mensaje') }}" />
                    <textarea name="mensaje" id="editor" class="mt-1"></textarea>
                    <x-input-error for="mensaje" />
                </div>

                <div class="mt-8 flex items-center">
                    <x-button id="myButton">
                        {{ __('Enviar mensaje') }}
                    </x-button>

                    @if (session('info'))
                        <p class="mensaje ml-4 text-sm font-bold">
                            Mensaje enviado
                        </p>
                    @endif

                </div>


            </form>
        </div>
    </div>

    <!-- Pie de pagina -->
    <x-footer></x-footer>

    <!-- MOSTRAR MENSAJE POR 3 SEGUNDOS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".mensaje").fadeOut(1500);
            }, 3000);
        });
    </script>

    <!-- OCULTAR BOTON SUBMIT Y MOSTRAR MENSAJE DENTRO DEL BOTON -->
    <script>
        function ani() {
            const myButton = document.getElementById('myButton');
            myButton.disabled = true;
            myButton.style.opacity = 0.8;
            myButton.textContent = 'Espere...';
        }
    </script>

    <!-- CKEDITOR 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))

            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- ////////// -->

    

</div>
