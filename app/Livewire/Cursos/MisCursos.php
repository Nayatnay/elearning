<?php

namespace App\Livewire\Cursos;

use App\Models\Clacurso;
use App\Models\Curso;
use App\Models\Inscripcion;
use Livewire\Component;

class MisCursos extends Component
{
    public $micurso;

    public function buscar(Inscripcion $micurso)
    {
        //dd($micurso);
        $curso = Curso::where('id', '=', $micurso->id_curso)->first();
        $inscrito = $micurso->liberado;
        $firstclase = Clacurso::where('id_curso', '=', $micurso->id_curso)->first();
        $clase = $firstclase->id;

        return redirect()->route('clasesdelcurso', compact('curso', 'clase', 'inscrito'));
    }

    public function render()
    {
        $miscursos = Inscripcion::where('id_user', '=', auth()->user()->id)
            ->where('liberado', '=', 1)->paginate(8);

        return view('livewire.cursos.mis-cursos', compact('miscursos'));
    }
}
