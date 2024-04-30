<?php

namespace App\Livewire\Admin;

use App\Models\Curso;
use App\Models\Inscripcion;
use Carbon\Month;
use Livewire\Component;
use Livewire\WithPagination;

class VerInscritos extends Component
{
    use WithPagination;

    public $curso, $turno, $manan, $fecha;
    public $sort = 'id';
    public $direc = 'desc';
    public $open = false;

    public function mount($curso)
    {
        $this->curso = Curso::find($curso);
        $this->fecha = date("Y-m", strtotime(now()));
    }

    public function cancelar()
    {
        $this->reset(['open', 'turno']);
    }

    public function updatingFecha()
    {
        $this->resetPage();
    }

    public function nvofecha()
    {
        $this->fecha = "01-" . $this->fecha;
        $this->fecha = date("Y-m", strtotime($this->fecha));
    }


    public function cambio(Inscripcion $manan)
    {
        $this->manan = $manan;
        $this->open = true;
    }

    public function save()
    {
        if ($this->turno <> null) {
            $this->manan->turno = $this->turno;
            $this->manan->update();

            $this->reset(['open', 'turno']);  //cierra el modal     
            //return redirect()->route('admin_validar');
        }
    }


    public function render()
    {
        $curso = $this->curso;

        $inscritosm = count(Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'Mañana')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->get());

        $inscritost = count(Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'Tarde')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->get());

        $inscritoso = count(Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'En Línea')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->get());


        $manana = Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'Mañana')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->orderBy($this->sort, $this->direc)->paginate(10, ['*'], 'manana');;

        $tarde = Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'Tarde')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->orderBy($this->sort, $this->direc)->paginate(10, ['*'], 'tarde');

        $online = Inscripcion::where('id_curso', '=', $curso->id)
            ->where('turno', '=', 'En Línea')->where('liberado', '=', 1)
            ->Where(function ($query) {
                $query->where('updated_at', 'LIKE', '%' . $this->fecha . '%');
            })->orderBy($this->sort, $this->direc)->paginate(10, ['*'], 'online');

        return view('livewire.admin.ver-inscritos', compact('curso', 'inscritosm', 'inscritost', 'inscritoso', 'manana', 'tarde', 'online'));
    }
}
