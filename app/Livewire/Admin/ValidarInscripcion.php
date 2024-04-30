<?php

namespace App\Livewire\Admin;

use App\Models\Inscripcion;
use Livewire\Component;

class ValidarInscripcion extends Component
{
    public $open = false;
    public $open_cancel = false;
    public $inscripcion;

    public function validar(Inscripcion $inscripcion)
    {
        $this->inscripcion = $inscripcion;
        $this->open = true;
    }

    public function anular(Inscripcion $inscripcion)
    {
        $this->inscripcion = $inscripcion;
        $this->open_cancel = true;
    }


    public function playplay()
    {
        $this->inscripcion->liberado = 1;
        $this->inscripcion->update();
        
        $this->reset(['open']);  //cierra el modal     
        return redirect()->route('admin_validar');
    }

    public function playanular()
    {
        $this->inscripcion->delete();
        
        $this->reset(['open_cancel']);  //cierra el modal     
        return redirect()->route('admin_validar');
    }

    public function render()
    {
        $inscripciones = Inscripcion::where('liberado', '=', 0)->paginate(8);

        return view('livewire.admin.validar-inscripcion', compact('inscripciones'));
    }
}
