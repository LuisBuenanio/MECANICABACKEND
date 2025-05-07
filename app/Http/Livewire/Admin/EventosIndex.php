<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Evento;

use Livewire\WithPagination;

class EventosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $eventos = Evento::where(function($query){
            $query->where('titulo', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('descripcion', 'LIKE', '%'. $this->search . '%' );
        })
        ->orderBy('id','desc')                
        ->paginate(5);
     
        return view('livewire.admin.eventos-index',['eventos' => $eventos]);
    }
    
}
