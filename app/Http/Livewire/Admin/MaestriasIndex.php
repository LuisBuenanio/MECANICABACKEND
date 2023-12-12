<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Maestria;

use Livewire\WithPagination;

class MaestriasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $maestrias = Maestria::where(function($query){
            $query->where('nombre', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('titulo', 'LIKE', '%'. $this->search . '%' )                        
                        ->orwhere('duracion', 'LIKE', '%'. $this->search . '%' )
                        ;
        })
        ->orderBy('nombre','asc')                
        ->paginate(5);
     
        return view('livewire.admin.maestrias-index',['maestrias' => $maestrias]);
    }
}


