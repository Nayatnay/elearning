<?php

namespace App\Livewire\Admin;

use App\Models\Indicacion;
use App\Models\Receta;
use Livewire\Component;
use Livewire\WithFileUploads;

class SelecIndicaciones extends Component
{
    use WithFileUploads;
    
    public $receta, $descripcion, $imagen, $indicacion;
    public $open_edit = false;
    public $identificador, $imagenva;

    protected function rules()
    {
        return [
            'descripcion' => 'required',
            'imagen' => 'required',
        ];
    }

    public function mount($receta)
    {
        $this->receta = Receta::find($receta);
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion', 'imagen']);
    }

    public function edit(Indicacion $indicacion)
    {
        $this->indicacion = $indicacion;
        $this->descripcion = $indicacion->descripcion;
        if ($indicacion->imagen == null) {
            $this->imagen = 'x';
        }else{
            $this->imagen = $indicacion->imagen;
        }
        
        $this->open_edit = true;
    }

    public function update()
    {        
        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/pasos', $fileName);
            $this->imagen = $fileName;
        }       
       
        $validatedData = $this->validate();
        $this->indicacion->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'descripcion', 'imagen']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('selec-indicaciones');
    }

    public function delete(indicacion $indicacion)
    {
        $this->indicacion = $indicacion;
        $this->indicacion->delete();
        $this->dispatch('selec-indicaciones');
    }

    public function render()
    {
        $receta = $this->receta;
        $indicaciones = Indicacion::where('id_receta', '=', $receta->id)->get();

        return view('livewire.admin.selec-indicaciones', compact('receta', 'indicaciones'));
    }
}
