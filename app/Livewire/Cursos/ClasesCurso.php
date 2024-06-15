<?php

namespace App\Livewire\Cursos;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use App\Models\Inscripcion;
use Livewire\Component;

class ClasesCurso extends Component
{
    public $curso, $clase, $inscrito;

    public function mount(Clacurso $clase)
    {
        $this->clase = $clase;
        $this->inscrito = 0;
        
        if (auth()->user()) {

            $inscrip = Inscripcion::where('id_user', '=', auth()->user()->id)
                ->where('id_curso', '=', $this->clase->id_curso)->first();
                
            if ($inscrip == null) {
                $this->inscrito = 0;
            } else {

                if ($inscrip->liberado == 1) {
                    $this->inscrito = 1;
                } else {
                    $this->inscrito = 0;
                }
            }
        }
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
        $clas_selec = Clacurso::where('id', '=', $this->clase->id)
        ->where('id_curso', '=', $this->clase->id_curso)->first();
        $clases = Clacurso::where('id_curso', '=', $this->clase->id_curso)->get();
        
        return view('livewire.cursos.clases-curso', compact('clases', 'clas_selec', 'inscrito'));
    }
}
