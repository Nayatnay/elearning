<?php

namespace App\Livewire\Cursos;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;

class ClasesCurso extends Component
{
    public $curso, $clase, $inscrito;

    public function mount(Clacurso $clase, $inscrito)
    {
        //$this->curso = $curso;
        $this->clase = $clase;
        $this->inscrito = $inscrito;
    }

    public function verifylogin()
    {
        $curso = Curso::where('id', '=', $this->clase->id_curso)->first();
        if (auth()->user()) {
            return redirect(route('inscripciones', compact('curso')));
        } else {
            return redirect(route('login'));
        }
    }

    public function render()
    {

        //$curso = Curso::where('id', '=', $this->clase->id_curso)->first();

        $inscrito = $this->inscrito;
        $clas_selec = Clacurso::where('id', '=', $this->clase->id)->first();
        $clases = Clacurso::where('id_curso', '=', $this->clase->id_curso)->get();
        
        return view('livewire.cursos.clases-curso', compact('clases', 'clas_selec', 'inscrito'));
    }
}
