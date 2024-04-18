<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Alcurso;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminalcances extends Component
{
    use WithPagination;

    public $alcance, $descripcion;
    public $curso;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required',
    ];

    public function mount(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function cancelar()
    {
        $this->reset(['open', 'descripcion']);
    }

    public function save()
    {
      
        $this->validate();

        Alcurso::create([
            'id_curso' => $this->curso->id,
            'descripcion' => $this->descripcion,
        ]);

        $curso = $this->curso;

        $this->reset(['open', 'descripcion']);
        return redirect()->route('selec_alcances', compact('curso'));
    }

    public function render()
    {
        $curso = $this->curso;
        return view('livewire.admin.crear-adminalcances', compact('curso'));
    }
}
