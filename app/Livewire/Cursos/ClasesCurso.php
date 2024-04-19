<?php

namespace App\Livewire\Cursos;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;

class ClasesCurso extends Component
{
    public $curso, $clase, $inscrito;

    public function mount(Curso $curso, Clacurso $clase, $inscrito)
    {
        $this->curso = $curso;
        $this->clase = $clase;
        $this->inscrito = $inscrito;
    }

    public function verifylogin()
    {
        $curso = $this->curso;
        if (auth()->user()) {
            return redirect(route('inscripciones', compact('curso')));
        } else {
            return redirect(route('login'));
        }
    }
    
    public function render()
    {
            $curso = $this->curso;
            $inscrito = $this->inscrito;
            //$clas_selec = Clase::where('id', '=', $this->clase->id_clase)->first();
            $clas_selec = Clacurso::where('id', '=', $this->clase->id)->first();
            $clases = Clacurso::where('id_curso', '=', $curso->id)->get();

            return view('livewire.cursos.clases-curso', compact('curso', 'clases', 'clas_selec', 'inscrito'));
    }
}
