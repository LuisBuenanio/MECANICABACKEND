<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Investigador;

use Livewire\WithPagination;

class InvestigadorIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

        
    public function render()
    {
        $investigadores = Investigador::where(function($query){
            $query->where('nombre', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('email', 'LIKE', '%'. $this->search . '%' )
                        ->orWhereHas('tipo_investigador', function ($query) {
                            $query->where('descripcion', 'LIKE', '%'.$this->search.'%');
                            });
        })
        ->orderBy('id','desc')                
        ->paginate(10);
        return view('livewire.admin.investigador-index', ['investigadores' => $investigadores]);
    }
}


