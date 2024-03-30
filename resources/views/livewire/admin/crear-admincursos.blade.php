@section('title', 'Crear Cursos | Le Concassé')
<div class="min-h-screen">
    <div class="bg-gray-100 shadow sticky top-24 z-[100]">
        <div class="flex items-center justify-between text-lg px-4 md:px-8 py-3 max-w-screen-xl mx-auto">
            <h2 class="font-light">
                {{ __('Crear nuevo curso') }}
            </h2>
        </div>
    </div>
    
    <div class="my-8 max-w-screen-xl mx-auto p-4">
        <form method="POST" action="{{ route('admin_crearcursos') }}">
            @csrf
            <div class="flex flex-col md:flex-row">

                <div class="mb-4 mr-0 md:mr-4 md:mb-0 w-full min-w-[280px] md:w-[280px] rounded border p-4 bg-white">
                    <div class="text-xs text-left lg:text-sm">
                        <label for="{{$identificador}}" class="cursor-pointer hover:underline">Selecciona una Imagen</label>
                        <input id="{{$identificador}}" type="file" style="visibility:hidden;" name="imagen" wire:model="imagen" class="" required />
                        <x-input-error for="imagen" />
                    </div>
        
                    <div wire:loading wire:target="imagen" class="w-full text-xs font-normal">
                        <strong>¡Cargando Imagen! </strong>
                        <span>Espere mientras se carga la imagen...</span>
                    </div>
        
                    <div class="mt-4 h-44 max-h-44">
                        @if ($imagen)
                        <img src="{{$imagen->temporaryUrl()}}" class="p-2 border border-zinc-500 rounded" width="240">
                        @endif
                    </div>          
        
                </div>
                               
                <div class="w-full border p-4 bg-white rounded">
                    <div class="mb-4">
                        <x-label for="nombre" value="{{ __('nombre') }}" />
                        <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                            required autofocus autocomplete="nombre" />
                    </div>
    
                    <div class="mb-4">
                        <x-label for="descripcion" value="{{ __('Descripción') }}" />
                        <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')"
                            required autofocus autocomplete="descripcion" />
                    </div>
    
                    <div class="mb-4">
                        <x-label for="costo" value="{{ __('Costo') }}" class="text-zinc-800" />
                        <x-input id="costo"
                            class="w-full block mt-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                            type="number" step="any" name="costo" wire:model.defer="costo" required autofocus />
                        <x-input-error for="costo" />
                    </div>
                </div>

                
            </div>


            <x-button class="ms-4">
                {{ __('Register') }}
            </x-button>
    </div>
    </form>

</div>

</div>
