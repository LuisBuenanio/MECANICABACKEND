<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Convenio;

use Livewire\WithPagination;

class ConveniosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
       $convenios = Convenio::where(function($query){
            $query->where('nombre', 'LIKE', '%'. $this->search . '%' )        
                    ->orwhere('coordinador', 'LIKE', '%'. $this->search . '%' )
                    ->orwhere('objetivo', 'LIKE', '%'. $this->search . '%' )
                        ->orWhereHas('tipo_convenio', function ($query) {
                            $query->where('descripcion', 'LIKE', '%'.$this->search.'%');
                            });
        })
        ->orderBy('id','desc')                
        ->paginate(10);
        return view('livewire.admin.convenios-index', ['convenios' => $convenios]);
    }
}
