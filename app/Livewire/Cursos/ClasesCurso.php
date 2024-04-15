<?php

namespace App\Livewire\Cursos;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;

class ClasesCurso extends Component
{
    public $curso, $clase;

    public function mount(Curso $curso, Clacurso $clase)
    {
        $this->curso = $curso;
        $this->clase = $clase;
    }

    public function render()
    {
            $curso = $this->curso;
            $clas_selec = Clase::where('id', '=', $this->clase->id_clase)->first();
            $clases = Clacurso::where('id_curso', '=', $curso->id)->get();

            return view('livewire.cursos.clases-curso', compact('curso', 'clases', 'clas_selec'));
    }
}
