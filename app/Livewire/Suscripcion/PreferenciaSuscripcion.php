<?php

namespace App\Livewire\Suscripcion;

use App\Models\Suscripcion;
use Livewire\Component;

class PreferenciaSuscripcion extends Component
{

    public $email;

    public function mount($email)
    {
        $this->email = $email;
    }

    public function anular()
    {
        $suscripcion = Suscripcion::where('email', '=', $this->email)->first();
        if ($suscripcion <> null) {
            $suscripcion->delete();
        }
        return redirect()->route('debaja');
    }

    public function render()
    {
        $email = $this->email;

        return view('livewire.suscripcion.preferencia-suscripcion', compact('email'));
    }
}
