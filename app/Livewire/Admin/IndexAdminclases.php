<?php

namespace App\Livewire\Admin;

use App\Models\Clase;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class IndexAdminclases extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $clase;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador, $identif_poster, $video, $poster, $tema;
    public $videovo, $postervo;

    protected function rules()
    {
        return [
            'tema' => 'required',
            'video' => 'required',
            'poster' => 'required',
        ];
    }

    public function mount(Clase $clase)
    {
        $this->clase = $clase;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre del video seleccionado anteriormente en el modal
        $this->identif_poster = rand(); // Lo estoy usando para eliminar el nombre del poster del video
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function delete(clase $clase)
    {
        $this->clase = $clase;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->clase->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        return redirect()->route('admin_clases');
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'tema', 'video', 'poster']);
        $this->identificador = rand();
        $this->identif_poster = rand();

        $this->postervo = null;
        $this->videovo = null;
    }

    public function edit(Clase $clase)
    {
        $this->clase = $clase;
        $this->tema = $clase->tema;
        $this->poster = $clase->poster;
        $this->video = $clase->video;
        $this->open_edit = true;
    }

    public function update()
    {
        if ($this->postervo <> null) {
            $this->poster = $this->postervo;
            $fileName = time() . '.' . $this->poster->extension();
            $this->poster->storeAs('public/clases', $fileName);
            $this->poster = $fileName;
        }

        if ($this->videovo <> null) {
            $this->video = $this->videovo;
            $fileNamevid = time() . '.' . $this->video->extension();
            $this->video->storeAs('public/clases', $fileNamevid);
            $this->video = $fileNamevid;
        }

        $validatedData = $this->validate();
        $this->clase->update($validatedData);

        $this->postervo = null;
        $this->videovo = null;

        $this->reset(['open_edit', 'tema', 'video', 'poster']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->identif_poster = rand();
        return redirect()->route('admin_clases');
    }

    public function render()
    {
        $clases = Clase::where('tema', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(8);

        return view('livewire.admin.index-adminclases', compact('clases'));
    }
}
