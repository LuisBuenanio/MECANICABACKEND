<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\GrupoInvestigacion;

use Livewire\WithPagination;

class GruposInvestigacionIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $grupos_investigaciones = GrupoInvestigacion::where(function($query){
            $query->where('codigo', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('siglas', 'LIKE', '%'. $this->search . '%' )                        
                        ->orwhere('nombre', 'LIKE', '%'. $this->search . '%' )
                        ;
        })
        ->orderBy('id','asc')                
        ->paginate(5);
     
        return view('livewire.admin.grupos-investigacion-index',['grupos_investigaciones' => $grupos_investigaciones]);
    }
}


