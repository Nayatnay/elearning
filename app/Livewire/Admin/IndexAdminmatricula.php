<?php

namespace App\Livewire\Admin;

use App\Models\Inscripcion;
use App\Models\User;
use Livewire\Component;

class IndexAdminmatricula extends Component
{
    public $usuario, $curso;
    public $open_suspender = false;

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function suspender(Inscripcion $curso)
    {
        $this->curso = $curso;
        $this->open_suspender = true;
    }

    public function desliberar()
    {
        $this->curso->liberado = 0;
        $this->curso->update();
        $this->reset(['open_suspender']);  //cierra el modal     
        $this->dispatch('index-adminmatricula');
    }

    public function render()
    {
        $usuario = $this->usuario;
        $cursosinscritos = Inscripcion::where('id_user', '=', $usuario->id)->get();

        return view('livewire.admin.index-adminmatricula', compact('usuario', 'cursosinscritos'));
    }
}
