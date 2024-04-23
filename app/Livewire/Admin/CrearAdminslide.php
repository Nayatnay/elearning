<?php

namespace App\Livewire\Admin;

use App\Models\Imageslide;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearAdminslide extends Component
{
    use WithFileUploads;

    public $identificador, $imagen;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=1920,max_height=1280|max:2048',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'imagen']);
        $this->identificador = rand();
    }

    public function save()
    {
    
        $this->validate();       

        $fileName = time() . '.' . $this->imagen->extension();
        $this->imagen->storeAs('public/diapositivas', $fileName);

        Imageslide::create([
            'estado' => 0,
            'imagen' => $fileName,
        ]);

        $this->reset(['open', 'imagen']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre de la imagen seleccionada anteriormente
        return redirect()->route('admin_slides');
    }

    public function render()
    {
        return view('livewire.admin.crear-adminslide');
    }
}
