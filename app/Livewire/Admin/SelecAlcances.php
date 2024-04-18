<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Alcurso;
use App\Models\Curso;
use Livewire\Component;

class SelecAlcances extends Component
{
    public $curso, $alcance, $descripcion;
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


    public function edit(Alcurso $alcance)
    {
        $this->alcance = $alcance;
        $this->descripcion = $alcance->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->alcance->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario
        $this->dispatch('selec-alcances');
    }

    public function delete(Alcurso $alcance)
    {
        $alcance->delete();
        $this->dispatch('selec-alcances');
    }

    public function render()
    {
        $curso = $this->curso;
        $alcances = Alcurso::where('id_curso', '=', $curso->id)->get();

        return view('livewire.admin.selec-alcances', compact('alcances', 'curso'));
    }
}
