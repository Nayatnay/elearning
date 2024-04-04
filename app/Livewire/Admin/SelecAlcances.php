<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Alcurso;
use App\Models\Curso;
use Livewire\Component;

class SelecAlcances extends Component
{
    public $curso, $alcance;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function chequear(Alcance $alcance,)
    {
        $consu = Alcurso::where('id_curso', '=', $this->curso->id)
            ->where('id_alcance', '=', $alcance->id)->first();

        if ($consu == null) {
            Alcurso::create([
                'id_curso' => $this->curso->id,
                'id_alcance' => $alcance->id,
            ]);
        }

        $this->dispatch('selec-alcances');
    }


    public function render()
    {
        $curso = $this->curso;
       
        $alc_curso = Alcurso::where('id_curso', '=', $curso->id)->pluck('id_alcance')->toArray();
       
        if ($alc_curso <> null) {
            $alcances = Alcance::all()->whereNotIn('id', $alc_curso);
        } else {
            $alcances = Alcance::all();
        }

        return view('livewire.admin.selec-alcances', compact('alcances', 'curso'));
    }
}
