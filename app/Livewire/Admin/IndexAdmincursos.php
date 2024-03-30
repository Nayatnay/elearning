<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Livewire\Component;

class IndexAdmincursos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $curso;
    public $open_delete;

    public function delete(Curso $curso)
    {
        $this->curso = $curso;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->curso->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-admincursos');
    }

    public function render()
    {
        $cursos = Curso::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(8);

        return view('livewire.admin.index-admincursos', compact('cursos'));
    }
}
