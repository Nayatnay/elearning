<?php

namespace App\Livewire\Admin;

use App\Models\Receta;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CrearAdminrecetas extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $nombre, $descripcion, $tiempo, $porciones, $imagen, $slug;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'nombre' => 'required|unique:recetas',
        'descripcion' => 'required',
        'tiempo' => 'required',
        'porciones' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'nombre', 'descripcion', 'tiempo', 'porciones', 'imagen']);
        $this->identificador = rand();
    }

    public function save()
    {
    
        $this->validate();       

        $fileName = time() . '.' . $this->imagen->extension();
        $this->imagen->storeAs('public/recetas', $fileName);

        $this->slug = str::slug($this->nombre, '-');

        Receta::create([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'descripcion' => $this->descripcion,
            'tiempo' => $this->tiempo,
            'porciones' => $this->porciones,
            'imagen' => $fileName,
        ]);

        $this->reset(['open', 'nombre', 'descripcion', 'tiempo', 'porciones', 'imagen']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre de la imagen seleccionada anteriormente
        return redirect()->route('admin_recetas');
    }

    public function render()
    {
        return view('livewire.admin.crear-adminrecetas');
    }
}
