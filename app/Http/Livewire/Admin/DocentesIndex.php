<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Docente;

use Livewire\WithPagination;

class DocentesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $docentes = Docente::where(function($query){
            $query->where('nombre', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('email', 'LIKE', '%'. $this->search . '%' )                        
                        ->orwhere('titulo', 'LIKE', '%'. $this->search . '%' )
                        ;
        })
        ->orderBy('nombre','asc')                
        ->paginate(5);
     
        return view('livewire.admin.docentes-index',['docentes' => $docentes]);
    }
}
