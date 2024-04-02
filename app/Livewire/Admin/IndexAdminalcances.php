<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAdminalcances extends Component
{
    use WithPagination;

    public $buscar, $alcance, $curso;
    public $open_delete = false;
    public $open_edit = false;
    public $descripcion;

    protected function rules()
    {
        return [
            'curso' => 'required',
            'descripcion' => 'required',
        ];
    }

    public function mount(Alcance $alcance)
    {
        $this->alcance = $alcance;
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }

    public function delete(Alcance $alcance)
    {
        $this->alcance = $alcance;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->alcance->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminalcances');
    }

    public function edit(Alcance $alcance)
    {
        $this->curso = $alcance->id_curso;
        $this->alcance = $alcance;
        $this->descripcion = $alcance->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->alcance->id_curso = $this->curso;

        $validatedData = $this->validate();
        $this->alcance->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario

        $this->dispatch('index-adminalcances');
    }

    public function render()
    {
        $alcances = Alcance::where('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);
            $cursos = Curso::all()->sortBy('nombre');

        return view('livewire.admin.index-adminalcances', compact('alcances', 'cursos'));
    }
}
