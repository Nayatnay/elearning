<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use App\Models\Alcurso;
use App\Models\Clacurso;
use App\Models\Curso;
use App\Models\Reqcurso;
use App\Models\Requisito;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use Livewire\Component;

class IndexAdmincursos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $curso, $slug;
    public $tostada;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador, $imagen, $nombre, $descripcion, $costo;
    public $imagenva;
    public $chequeo;

    protected function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'costo' => 'required',
        ];
    }

    public function mount(Curso $curso)
    {
        $this->curso = $curso;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal

    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'nombre', 'descripcion', 'imagen', 'costo']);
        $this->identificador = rand();
    }

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

    public function edit(curso $curso)
    {
        $this->curso = $curso;
        $this->nombre = $curso->nombre;
        $this->descripcion = $curso->descripcion;
        $this->imagen = $curso->imagen;
        $this->costo = $curso->costo;
        $this->open_edit = true;
    }

    public function update()
    {
        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/cursos', $fileName);
            $this->imagen = $fileName;
        }

        $this->curso->slug = str::slug($this->nombre, '-');

        $validatedData = $this->validate();
        $this->curso->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'nombre', 'descripcion', 'imagen', 'costo']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-admincursos');
    }

    public function postear(Curso $curso)
    {
        $requisitos = Reqcurso::where('id_curso', '=', $curso->id)->first();
        $alcances = Alcurso::where('id_curso', '=', $curso->id)->first();
        $clases = Clacurso::where('id_curso', '=', $curso->id)->first();

        $this->tostada = null;

        if ($requisitos == null) {
            $this->tostada = 1;
        }elseif ($alcances == null) {
            $this->tostada = 2;
        }elseif ($clases == null) {
            $this->tostada = 3;
        }
        
        if ($requisitos <> null && $alcances <> null && $clases <> null) {
            $curso->publicado = 1;
            $curso->update();
        }
    }

    public function pausar(Curso $curso)
    {
        $curso->publicado = 0;
        $curso->update();
    }

    public function render()
    {
        $cursos = Curso::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin.index-admincursos', compact('cursos'));
    }

}
