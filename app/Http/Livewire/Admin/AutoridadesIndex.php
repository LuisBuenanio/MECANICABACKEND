<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Autoridad;

use Livewire\WithPagination;

class AutoridadesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $autoridades = Autoridad::latest('id')
        ->where('nombre', 'LIKE', '%'. $this->search . '%' )
        ->paginate(10);
        return view('livewire.admin.autoridades-index',compact('autoridades'));
    }
}
