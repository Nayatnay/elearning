<?php

namespace App\Livewire\Eventos;

use App\Models\Evento;
use App\Models\Eventouser;
use App\Models\Parrevento;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class DetalleEvento extends Component
{
    public $evento, $email, $reg, $emailreg, $name, $telf, $doc, $fechanac, $password;
    public $regsi = false;
    public $regno = false;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'doc' => ['required', 'string', 'max:255', 'unique:users'],
        'telf' => ['required', 'string', 'max:255'],
        'fechanac' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'min:8'],
    ];

    public function mount(Evento $evento)
    {
        $this->evento = $evento;
        $this->email = null;
        $this->reg = null;
    }

    public function consulta()
    {
        $usuario = User::where('email', '=', $this->email)->first();
        if ($usuario == null) {
            $this->emailreg = $this->email;
            $this->regno = true;
        } else {           
            $this->regsi = true;
        }
    }

    public function inscribir()
    {
        $this->reg = null;

        $usuario = User::where('email', '=', $this->email)->first();
        $consulta = Eventouser::where('id_user', '=', $usuario->id)->where('id_evento', '=', $this->evento->id)->first();

        if ($consulta == null) {
            Eventouser::create([
                'id_user' => $usuario->id,
                'id_evento' => $this->evento->id,
            ]);
            $this->reg = 1;
        } else {
            $this->reg = 2;
        }

        $this->reset(['regsi']);
        $this->dispatch('detalle-evento');
    }

    public function cancelar()
    {
        $this->reset(['regsi']);
        $this->email = null;
    }

    public function cancelareg()
    {
        $this->reset(['regno', 'emailreg', 'name', 'telf', 'doc', 'fechanac', 'password']);
        $this->email = null;
    }

    public function save()
    {
        $this->email = $this->emailreg;
        
        $this->validate();
        
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'doc' => $this->doc,
            'telf' => $this->telf,
            'fechanac' => $this->fechanac,
            'password' => $this->password,
        ]);

        $usuario = User::where('email', '=', $this->email)->first();
        Eventouser::create([
            'id_user' => $usuario->id,
            'id_evento' => $this->evento->id,
        ]);

        $this->reg = 1;

        $this->reset(['regno', 'emailreg', 'name', 'telf', 'doc', 'fechanac', 'password']);
        $this->dispatch('detalle-evento');
    }

    public function render()
    {
        $evento = $this->evento;
        $parrafos = Parrevento::where('id_evento', '=', $evento->id)->get();

        return view('livewire.eventos.detalle-evento', compact('evento', 'parrafos'));
    }
}
