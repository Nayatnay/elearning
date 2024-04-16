<?php

namespace App\Livewire\Cursos;

use App\Models\Alcurso;
use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Reqcurso;
use Livewire\Component;

class DetalleCurso extends Component
{
    public $curso, $clase, $inscrito;

    public function mount(Curso $curso, Clacurso $clase)
    {
        $this->curso = $curso;
        $this->clase = $clase;
        $this->inscrito = 0;
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
        if (auth()->user()) {
            $inscrip = Inscripcion::where('id_user', '=', auth()->user()->id)
                ->where('id_curso', '=', $this->curso->id)->first();
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

        $inscrito = $this->inscrito;
        $curso = $this->curso;
        $requisitos = Reqcurso::where('id_curso', '=', $curso->id)->get();
        $alcances = Alcurso::where('id_curso', '=', $curso->id)->get();
        $clases = Clacurso::where('id_curso', '=', $curso->id)->get();

        return view('livewire.cursos.detalle-curso', compact('curso', 'requisitos', 'alcances', 'clases', 'inscrito'));
    }
}
