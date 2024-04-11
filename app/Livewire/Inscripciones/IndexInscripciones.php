<?php

namespace App\Livewire\Inscripciones;

use App\Models\Curso;
use Livewire\Component;

class IndexInscripciones extends Component
{
    public function render()
    {
        $cursos = Curso::orderBy('id', 'desc')->paginate(8);

        return view('livewire.inscripciones.index-inscripciones', compact('cursos'));
    }
}
