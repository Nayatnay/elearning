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
        if (auth()->user()) {
            dd('listo');
        } else {
            return redirect(route('login'));
        }
    }

    /*public function verifyinsc()
    {
        //dd($this->curso->id);
        $inscrip = Inscripcion::where('id_user', '=', auth()->user()->id)
            ->where('id_curso', '=', $this->curso->id)->first();
        if ($inscrip == null) {
            $this->inscrito = 0;
        } else {
            $this->inscrito = 1;
        }
    }
*/
    public function render()
    {

        if (auth()->user()) {
            $inscrip = Inscripcion::where('id_user', '=', auth()->user()->id)
                ->where('id_curso', '=', $this->curso->id)->first();
            if ($inscrip == null) {
                $this->inscrito = 0;
            } else {
                $this->inscrito = 1;
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
