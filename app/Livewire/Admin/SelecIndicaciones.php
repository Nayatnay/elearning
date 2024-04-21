<?php

namespace App\Livewire\Admin;

use App\Models\Indicacion;
use App\Models\Receta;
use Livewire\Component;

class SelecIndicaciones extends Component
{
    public $receta, $descripcion, $indicacion;
    public $open_edit = false;

    protected function rules()
    {
        return [
            'descripcion' => 'required',
        ];
    }

    public function mount($receta)
    {
        $this->receta = Receta::find($receta);
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }

    public function edit(Indicacion $indicacion)
    {
        $this->indicacion = $indicacion;
        $this->descripcion = $indicacion->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->indicacion->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario
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
