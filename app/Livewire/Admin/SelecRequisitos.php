<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Reqcurso;
use App\Models\Requisito;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SelecRequisitos extends Component
{
    public $curso, $requisito, $descripcion;
    public $open_edit = false;

    protected function rules()
    {
        return [
            'descripcion' => 'required',
        ];
    }

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }


    public function edit(Reqcurso $requisito)
    {
        $this->requisito = $requisito;
        $this->descripcion = $requisito->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->requisito->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario
        $this->dispatch('selec-requisitos');
    }

    public function delete(Reqcurso $requisito)
    {
        $requisito->delete();
        $this->dispatch('selec-requisitos');
    }

    public function render()
    {
        $curso = $this->curso;
        $requisitos = Reqcurso::where('id_curso', '=', $curso->id)->get();

        return view('livewire.admin.selec-requisitos', compact('requisitos', 'curso'));
    }
}
