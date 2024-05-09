<?php

namespace App\Livewire\Admin;

use App\Models\Inscripcion;
use App\Models\Suscripcion;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class IndexAdminusuarios extends Component
{
    use WithPagination;

    public $buscar, $usuario, $name, $email, $telf;
    public $open_edit = false;
    public $open_delete = false;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->usuario->id,
            'telf' => 'required',
        ];
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'name', 'email', 'telf']);
    }

    public function delete(User $usuario)
    {
        $this->usuario = $usuario;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->usuario->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminusuarios');
    }

    public function edit(User $usuario)
    {
        $this->usuario = $usuario;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->telf = $usuario->telf;
        
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->usuario->update($validatedData);

        $this->reset(['open_edit', 'name', 'email', 'telf']);  //cierra el modal y limpia los campos del formulario
        
        $this->dispatch('index-adminusuarios');
    }


    public function render()
    {
        $usuarios = User::where('name', 'LIKE', '%' . $this->buscar . '%')
        ->orwhere('email', 'LIKE', '%' . $this->buscar . '%')
        ->orwhere('doc', 'LIKE', '%' . $this->buscar . '%')
        ->orwhere('fechanac', 'LIKE', '%' . $this->buscar . '%')
        ->orwhere('telf', 'LIKE', '%' . $this->buscar . '%')->paginate(3);

        $totusers = count(User::all());
        $totsuscripciones = count(Suscripcion::all());
        $totestudiantes = count(Inscripcion::where('liberado', '=', 1)->distinct()->get(['id_user'])); //cuenta los usuarios inscritos en varios cursos como uno solo.

        return view('livewire.admin.index-adminusuarios', compact('usuarios', 'totusers', 'totsuscripciones', 'totestudiantes'));
    }
}
