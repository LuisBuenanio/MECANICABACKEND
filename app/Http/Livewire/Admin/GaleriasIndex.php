<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Galeria;

use Livewire\WithPagination;

class GaleriasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $galerias = Galeria::latest('fecha_creacion')
        ->where('nombre', 'LIKE', '%'. $this->search . '%' )
        ->paginate(10);
        return view('livewire.admin.galerias-index', compact('galerias'));
    }
}
