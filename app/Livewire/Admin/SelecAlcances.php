<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Curso;
use Livewire\Component;

class SelecAlcances extends Component
{
    public $curso;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function render()
    {
        $curso = $this->curso;
        $alcances = Alcance::all();
        return view('livewire.admin.selec-alcances', compact('alcances'));
    }
}
