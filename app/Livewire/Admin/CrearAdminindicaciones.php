<?php

namespace App\Livewire\Admin;

use App\Models\Indicacion;
use App\Models\Receta;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CrearAdminindicaciones extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $descripcion;
    public $receta;
    public $open = false;
    public $identificador, $imagen;

    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required',
        //'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
    ];

    public function mount(Receta $receta)
    {
        $this->receta = $receta;
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'descripcion', 'imagen']);
    }

    public function save()
    {
        $this->validate();

        if ($this->imagen <> null) {
        $fileName = time() . '.' . $this->imagen->extension();
        $this->imagen->storeAs('public/pasos', $fileName);
        }else{
            $fileName = null;
        }
        
        Indicacion::create([
            'id_receta' => $this->receta->id,
            'descripcion' => $this->descripcion,
            'imagen' => $fileName,
        ]);

        $receta = $this->receta;

        $this->reset(['open', 'descripcion', 'imagen']);
        $this->identificador = rand();

        return redirect()->route('selec_indicaciones', compact('receta'));
    }

    public function render()
    {
        $receta = $this->receta;

        return view('livewire.admin.crear-adminindicaciones', compact('receta'));
    }
}
