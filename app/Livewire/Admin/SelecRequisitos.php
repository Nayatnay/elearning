<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Requisito;
use Livewire\Component;

class SelecRequisitos extends Component
{
    public $curso;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function render()
    {
        $curso = $this->curso;
        $requisitos = Requisito::all();

        return view('livewire.admin.selec-requisitos', compact('requisitos', 'curso'));
    }
}
