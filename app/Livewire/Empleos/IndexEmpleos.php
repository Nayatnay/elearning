<?php

namespace App\Livewire\Empleos;

use Livewire\Component;
use Livewire\WithFileUploads;

class IndexEmpleos extends Component
{
    use WithFileUploads;

    public $identificador, $archivo;

    public function mount() // Lo estoy usando para eliminar el nombre deL ARCHIVO seleccionado anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function render()
    {
        return view('livewire.empleos.index-empleos');
    }
}
