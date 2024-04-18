<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Reqcurso;
use App\Models\Requisito;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminrequisitos extends Component
{
    use WithPagination;

    public $requisito, $descripcion;
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

        Reqcurso::create([
            'id_curso' => $this->curso->id,
            'descripcion' => $this->descripcion,
        ]);

        $curso = $this->curso;

        $this->reset(['open', 'descripcion']);
        return redirect()->route('selec_requisitos', compact('curso'));
    }

    public function render()
    {
        $curso = $this->curso;
        return view('livewire.admin.crear-adminrequisitos', compact('curso'));
    }
}
