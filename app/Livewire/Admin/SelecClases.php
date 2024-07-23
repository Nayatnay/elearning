<?php

namespace App\Livewire\Admin;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SelecClases extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $curso, $clase, $descripcion, $video;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador;
    public $videovo;

    protected function rules()
    {
        return [
            //'video' => 'required|file|mimes:mp4|max:102400',
            'descripcion' => 'required|unique:clacursos,descripcion,' . $this->clase->id,
        ];
    }

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
        //$this->clase = $clase;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre del video seleccionado anteriormente en el modal
    }

    public function delete(Clacurso $clase)
    {
        $this->clase = $clase;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->clase->delete();
        $this->reset(['open_delete']);  //cierra el modal
        $this->dispatch('selec-clases');
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion', 'video']);
        $this->identificador = rand();

        $this->videovo = null;
    }

    public function edit(Clacurso $clase)
    {
        $this->clase = $clase;
        $this->descripcion = $clase->descripcion;
        $this->video = $clase->video;
        $this->open_edit = true;
    }

    public function update()
    {
        
        if ($this->videovo <> null) {
            $this->video = $this->videovo;
            $fileName = time() . '.' . $this->video->extension();
            $this->video->storeAs('public/clases', $fileName);
            $this->video = $fileName;
        }
        
        $this->clase->descripcion = $this->descripcion;
        $this->clase->slug = str::slug($this->descripcion, '-');
        $this->clase->video = $this->video;
        


        $validatedData = $this->validate();
        $this->clase->update($validatedData);
        
        $this->videovo = null;

        $this->reset(['open_edit', 'descripcion', 'video']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        
        $curso = $this->curso;
        $clase = $this->clase;
        
        return redirect()->route('selec_clases', compact('curso'));
    }

    public function render()
    {
        $curso = $this->curso;
        $clases = Clacurso::where('id_curso', '=', $curso->id)->paginate(8);

        return view('livewire.admin.selec-clases', compact('clases', 'curso'));
    }
}
