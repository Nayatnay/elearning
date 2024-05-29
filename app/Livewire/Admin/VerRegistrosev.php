<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use App\Models\Eventouser;
use Livewire\WithPagination;
use Livewire\Component;

class VerRegistrosev extends Component
{
    use WithPagination;

    public $evento, $eventousuario, $fecha;
    public $sort = 'id';
    public $direc = 'desc';
    public $open = false;

    public function mount($evento)
    {
        $this->evento = Evento::find($evento);
        $this->fecha = date("Y-m", strtotime(now()));
    }

    public function aviso(Eventouser $insc)
    {
        $this->eventousuario = $insc;
        $this->open = true;
    }

    public function updatingFecha()
    {
        $this->resetPage();
    }

    public function nvofecha()
    {
        $this->fecha = "01-" . $this->fecha;
        $this->fecha = date("Y-m", strtotime($this->fecha));
    }

    public function eliminar()
    {
        $this->eventousuario->delete();
        $this->reset(['open']);  //cierra el modal     
    }

    public function render()
    {
        $evento = $this->evento;

        $totinscritos = count(Eventouser::where('id_evento', '=', $evento->id)
        ->where('updated_at', 'LIKE', '%' . $this->fecha . '%')->get());

        $inscritos = Eventouser::where('id_evento', '=', $evento->id)
        ->Where(function ($query) {
            $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
        })->orderBy($this->sort, $this->direc)->paginate(10, ['*'], 'inscrip');

        return view('livewire.admin.ver-registrosev', compact('evento', 'totinscritos', 'inscritos'));
    }
}
