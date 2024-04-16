<?php

namespace App\Livewire\Inscripciones;

use App\Models\Curso;
use App\Models\Inscripcion;
use Livewire\Component;

class IndexInscripciones extends Component
{
    public $curso, $turno;

    protected $rules = [
        'turno' => 'required',
    ];

    public function mount(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function save()
    {
        if ($this->turno <> null) {
            
            $this->validate();

            Inscripcion::create([
                'id_user' => auth()->user()->id,
                'id_curso' => $this->curso->id,
                'turno' => $this->turno,
                'liberado' => 0,
            ]);
        }
    }

    public function render()
    {
        $curso = $this->curso;
        
        $inscrip = Inscripcion::where('id_curso', '=', $curso->id)
        ->where('id_user', '=', auth()->user()->id,)->first();

        return view('livewire.inscripciones.index-inscripciones', compact('curso', 'inscrip'));
    }
}
