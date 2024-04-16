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
        $curso = $micurso;
        $inscrito = $curso->liberado;
        $firstclase = Clacurso::where('id_curso', '=', $curso->id)->first();
        $clase = $firstclase->id_clase;

        return redirect()->route('clasesdelcurso', compact('curso', 'clase', 'inscrito'));
    }

    public function render()
    {
        $miscursos = Inscripcion::where('id_user', '=', auth()->user()->id)
            ->where('liberado', '=', 1)->paginate(8);

        return view('livewire.cursos.mis-cursos', compact('miscursos'));
    }
}
