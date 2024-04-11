<?php

namespace App\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCursos extends Component
{
    use WithPagination;

    public $sort = 'id';
    public $direc = 'asc';
    public $filtro, $costo;
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
            $this->sort = 'costo';
            $this->direc = 'asc';
        }

        if ($this->filtro == 2) {
            $this->sort = 'costo';
            $this->direc = 'desc';
        }
    }

    public function render()
    {
        $cursos = Curso::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy($this->sort, $this->direc)->paginate(8);

        return view('livewire.cursos.index-cursos', compact('cursos'));
    }
}
