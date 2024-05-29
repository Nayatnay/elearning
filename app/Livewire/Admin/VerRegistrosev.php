<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use App\Models\Eventouser;
use Livewire\WithPagination;
use Livewire\Component;

class VerRegistrosev extends Component
{
    use WithPagination;

    public $evento, $eventousuario;
    public $sort = 'id';
    public $direc = 'desc';
    public $open = false;

    public function mount($evento)
    {
        $this->evento = Evento::find($evento);
    }

    public function aviso(Eventouser $insc)
    {
        $this->eventousuario = $insc;
        $this->open = true;
    }

    public function eliminar()
    {
        $this->eventousuario->delete();
        $this->reset(['open']);  //cierra el modal     
    }

    public function render()
    {
        $evento = $this->evento;

        $totinscritos = count(Eventouser::where('id_evento', '=', $evento->id)->get());
        $inscritos = Eventouser::where('id_evento', '=', $evento->id)
            ->orderBy($this->sort, $this->direc)->paginate(20, ['*'], 'inscrip');

        return view('livewire.admin.ver-registrosev', compact('evento', 'totinscritos', 'inscritos'));
    }
}
