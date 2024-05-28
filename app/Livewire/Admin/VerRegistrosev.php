<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use App\Models\Eventouser;
use Livewire\WithPagination;
use Livewire\Component;

class VerRegistrosev extends Component
{
    use WithPagination;

    public $evento, $fecha;
    public $sort = 'id';
    public $direc = 'desc';
    public $open = false;

    public function mount($evento)
    {
        $this->evento = Evento::find($evento);
        $this->fecha = date("Y-m", strtotime(now()));
    }


    public function render()
    {
        $evento = $this->evento;

        $totinscritos = count(Eventouser::where('id_evento', '=', $evento->id)->get());
        $inscritos = Eventouser::where('id_evento', '=', $evento->id)
        ->orderBy($this->sort, $this->direc)->paginate(10, ['*'], 'inscrip');

        return view('livewire.admin.ver-registrosev', compact('evento', 'totinscritos', 'inscritos'));
    }
}
