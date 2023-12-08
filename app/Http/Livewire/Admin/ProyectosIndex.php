<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Proyecto;

use Livewire\WithPagination;

class ProyectosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

        
    public function render()
    {
        $proyectos = Proyecto::where(function($query){
            $query->where('nombre', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('coordinador', 'LIKE', '%'. $this->search . '%' )
                        ->orWhereHas('tipo_proyecto', function ($query) {
                            $query->where('descripcion', 'LIKE', '%'.$this->search.'%');
                            });
        })
        ->orderBy('id','desc')                
        ->paginate(10);
        return view('livewire.admin.proyectos-index', ['proyectos' => $proyectos]);
    }
}
