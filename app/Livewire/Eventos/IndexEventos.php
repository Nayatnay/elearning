<?php

namespace App\Livewire\Eventos;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEventos extends Component
{
    use WithPagination;

    public $sort = 'id';
    public $direc = 'asc';
    public $filtro;
    public $buscar;

    protected $listeners = ['render'];

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function order()
    {
        $this->resetPage();

        if ($this->filtro == 0) {
            $this->sort = 'id';
            $this->direc = 'asc';
        }

        if ($this->filtro == 1) {
            $this->sort = 'nombre';
            $this->direc = 'asc';
        }

        if ($this->filtro == 2) {
            $this->sort = 'nombre';
            $this->direc = 'desc';
        }
    }

    public function render()
    {
        $eventos = Evento::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orderby($this->sort, $this->direc)->paginate(5);
    
        return view('livewire.eventos.index-eventos', compact('eventos'));
    }
}
