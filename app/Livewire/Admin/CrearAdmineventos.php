<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class CrearAdmineventos extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $nombre, $imagen, $registrar;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'nombre' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'nombre', 'imagen', 'registrar']);
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();       
        
        if ($this->registrar == true)  
        {
            $this->registrar = 1;
        } else{
            $this->registrar = 0;
        }  

        $fileName = time() . '.' . $this->imagen->extension();
        $this->imagen->storeAs('public/eventos', $fileName);

        Evento::create([
            'nombre' => $this->nombre,
            'imagen' => $fileName,
            'registrar' => $this->registrar,
        ]);

        $this->reset(['open', 'nombre', 'imagen', 'registrar']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre de la imagen seleccionada anteriormente
        return redirect()->route('admin_eventos');
    }

    public function render()
    {
        return view('livewire.admin.crear-admineventos');
    }
}
