<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Reqcurso;
use App\Models\Requisito;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SelecRequisitos extends Component
{
    public $curso, $requisito;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function chequear(Requisito $requisito,)
    {
        $consu = Reqcurso::where('id_curso', '=', $this->curso->id)
            ->where('id_requisito', '=', $requisito->id)->first();

        if ($consu == null) {
            Reqcurso::create([
                'id_curso' => $this->curso->id,
                'id_requisito' => $requisito->id,
            ]);
        }

        $this->dispatch('selec-requisitos');
    }

    public function deletereq(Reqcurso $cureq)
    {
        $cureq->delete();
        $this->dispatch('selec-requisitos');
    }

    public function render()
    {
        $curso = $this->curso;

        $req_curso = Reqcurso::where('id_curso', '=', $curso->id)->pluck('id_requisito')->toArray();

        if ($req_curso <> null) {
            $requisitos = Requisito::all()->whereNotIn('id', $req_curso);
        } else {
            $requisitos = Requisito::all();
        }

        $cursoreq = Reqcurso::where('id_curso', '=', $curso->id)->get();

        return view('livewire.admin.selec-requisitos', compact('requisitos', 'curso', 'cursoreq'));
    }
}
