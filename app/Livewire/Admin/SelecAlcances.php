<?php

namespace App\Livewire\Admin;

use App\Models\Alcance;
use Livewire\Component;

class SelecAlcances extends Component
{
    public function render()
    {
        $alcances = Alcance::all();
        return view('livewire.admin.selec-alcances', compact('alcances'));
    }
}
