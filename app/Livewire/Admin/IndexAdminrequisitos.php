<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Requisito;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAdminrequisitos extends Component
{
    use WithPagination;

    public $buscar, $requisito;
    //public $curso;
    public $open_delete = false;
    public $open_edit = false;
    public $descripcion;

    protected function rules()
    {
        return [
            // 'curso' => 'required',
            'descripcion' => 'required',
        ];
    }

    public function mount(Requisito $requisito)
    {
        $this->requisito = $requisito;
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }

    public function delete(Requisito $requisito)
    {
        $this->requisito = $requisito;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->requisito->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminrequisitos');
    }

    public function edit(requisito $requisito)
    {
        //$this->curso = $requisito->id_curso;
        $this->requisito = $requisito;
        $this->descripcion = $requisito->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        //$this->requisito->id_curso = $this->curso;

        $validatedData = $this->validate();
        $this->requisito->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario

        $this->dispatch('index-adminrequisitos');
    }

    public function render()
    {
        $requisitos = Requisito::where('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);

        //$cursos = Curso::all()->sortBy('nombre');

        return view('livewire.admin.index-adminrequisitos', compact('requisitos'));
    }
}
