<div>
    <div class="w-full">
        <div class="max-w-7xl mx-auto py-12 px-4 md:px-8 text-2xl md:text-4xl">
            <p>Preferencias de suscripción a Newsletter Le Concaseé</p>
            <p class="mt-2 text-base font-light text-red-700">Correos para: {{ $email }}</p>

            <div class="mt-12 text-xl flex items-center">
                <div class="inline-block w-40 md:w-12">
                    <i class="fas fa-regular fa-check bg-red-800 text-white p-1 rounded"></i>
                </div>
                <div class="text-lg">
                    <p class="font-bold">Noticias y Eventos</p>
                    <p>Te encuentras suscrito para recibir las novedades, eventos y noticias
                        exclusivas de Le concaseé.
                    </p>
                </div>
            </div>

            <div class="mt-20 text-base px-6">
                <a href="#" wire:click="anular" class="px-6 py-2 rounded-full border-2 bg-red-800 hover:bg-red-700 text-white">No quiero recibir ningún tipo de email promocional</a>
            </div>
            <div class="mt-5 mb-20 text-sm px-6">
                <p>Importante: En caso de anular su suscripción actual, debe realizar una nueva para recibir nuevamente nuestros emails. </p>
            </div>
        </div>

    </div>
    <!-- Pie de pagina -->
    <x-footer></x-footer>
</div>
