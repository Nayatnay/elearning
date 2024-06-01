<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CrearAdmincursos extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $nombre, $descripcion, $imagen, $slug, $costo;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
        'costo' => 'required',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'nombre', 'descripcion', 'imagen', 'costo']);
        $this->identificador = rand();
    }

    public function save()
    {
    
        $this->validate();       

        $fileName = time() . '.' . $this->imagen->extension();
        $this->imagen->storeAs('public/cursos', $fileName);

        $this->slug = str::slug($this->nombre, '-');

        Curso::create([
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'descripcion' => $this->descripcion,
            'imagen' => $fileName,
            'costo' => $this->costo,
            'publicado' => 0,
        ]);

        $this->reset(['open', 'nombre', 'descripcion', 'imagen', 'costo']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre de la imagen seleccionada anteriormente
        return redirect()->route('admin_cursos');
    }

    public function render()
    {
        return view('livewire.admin.crear-admincursos');
    }
}
