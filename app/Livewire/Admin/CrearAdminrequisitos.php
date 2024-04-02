<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Requisito;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminrequisitos extends Component
{
    use WithPagination;

    public $descripcion, $curso;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'curso' => 'required',
        'descripcion' => 'required',
    ];

    public function cancelar()
    {
        $this->reset(['open', 'descripcion']);
    }

    public function save()
    {    
        $this->validate();       

        Requisito::create([
            'id_curso' => $this->curso,
            'descripcion' => $this->descripcion,
        ]);

        $this->reset(['open', 'descripcion']);
        return redirect()->route('admin_requisitos');
    }

    public function render()
    {
        $cursos = Curso::all()->sortBy('nombre');
        return view('livewire.admin.crear-adminrequisitos', compact('cursos'));
    }
}
