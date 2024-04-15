<?php

namespace App\Livewire\Cursos;

use App\Models\Alcurso;
use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use App\Models\Reqcurso;
use Livewire\Component;

class DetalleCurso extends Component
{
    public $curso;

    public function mount(Curso $curso) 
    {
        $this->curso = $curso;         
    }

    public function verificalog()
    {
        if (auth()->user()) {
            $curso = $this->curso;
            $clas_selec = Clase::where('id', '=', $this->clase->id_clase)->first();
            $clases = Clacurso::where('id_curso', '=', $curso->id)->get();
            return redirect(route('clasesdelcurso', compact('curso', 'clases', 'clas_selec')));
        } else {
            return redirect(route('login'));
        }
    }

    public function render()
    {
        $curso = $this->curso;
        $requisitos = Reqcurso::where('id_curso', '=', $curso->id)->get();
        $alcances = Alcurso::where('id_curso', '=', $curso->id)->get();
        $clases = Clacurso::where('id_curso', '=', $curso->id)->get();      
        
        return view('livewire.cursos.detalle-curso', compact('curso', 'requisitos', 'alcances', 'clases'));
    }
}
