<?php

namespace App\Livewire\Recetas;

use App\Models\Indicacion;
use App\Models\Ingrediente;
use App\Models\Receta;
use Livewire\Component;

class DetalleReceta extends Component
{
    public $receta;

    public function mount(Receta $receta)
    {
        $this->receta = $receta;
    }


    public function render()
    {
        $receta = $this->receta;
        $ingredientes = Ingrediente::where('id_receta', '=', $receta->id)->get();
        $indicaciones = Indicacion::where('id_receta', '=', $receta->id)->get();
        
        return view('livewire.recetas.detalle-receta', compact('receta', 'ingredientes', 'indicaciones'));
    }
}
