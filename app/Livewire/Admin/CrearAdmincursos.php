<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CrearAdmincursos extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $nombre, $descripcion, $imagen, $costo;

    protected $listeners = ['render'];

    protected $rules = [
        'nombre' => 'required|unique:productos',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
        'costo' => 'required',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function render()
    {
        return view('livewire.admin.crear-admincursos');
    }
}
