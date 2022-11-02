<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Integrante;

use Livewire\WithPagination;

class IntegranteIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $integrantes = Integrante::latest('id')
        ->where('nombre', 'LIKE', '%'. $this->search . '%' )
        ->paginate(10);
        return view('livewire.admin.integrante-index', compact('integrantes'));
    }
}
