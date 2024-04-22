<?php

namespace App\Livewire\Eventos;

use App\Models\Evento;
use App\Models\Parrevento;
use Livewire\Component;

class DetalleEvento extends Component
{
    public $evento;

    public function mount(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function render()
    {
        $evento = $this->evento;
        $parrafos = Parrevento::where('id_evento', '=', $evento->id)->get();
    
        return view('livewire.eventos.detalle-evento', compact('evento', 'parrafos'));
    }
}
