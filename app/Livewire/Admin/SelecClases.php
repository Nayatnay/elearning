<?php

namespace App\Livewire\Admin;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;

class SelecClases extends Component
{
    public $curso, $clase;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function chequear(Clase $clase)
    {
        $consu = Clacurso::where('id_curso', '=', $this->curso->id)
            ->where('id_clase', '=', $clase->id)->first();

        if ($consu == null) {
            Clacurso::create([
                'id_curso' => $this->curso->id,
                'id_clase' => $clase->id,
            ]);
        }

        $this->dispatch('selec-clases');
    }

    public function deletecla(Clacurso $curcla)
    {
        $curcla->delete();
        $this->dispatch('selec-clases');
    }

    public function render()
    {
        $curso = $this->curso;
       
        $cla_curso = Clacurso::where('id_curso', '=', $curso->id)->pluck('id_clase')->toArray();
       
        if ($cla_curso <> null) {
            $clases = Clase::all()->whereNotIn('id', $cla_curso);
        } else {
            $clases = Clase::all();
        }

        $cursocla = Clacurso::where('id_curso', '=', $curso->id)->get();

        return view('livewire.admin.selec-clases', compact('clases', 'curso', 'cursocla'));
    }
}
