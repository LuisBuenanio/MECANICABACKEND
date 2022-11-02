<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Noticia;

use Livewire\WithPagination;


class NoticiasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $noticias = Noticia::latest('fecha_publicacion')
        ->where('titulo', 'LIKE', '%'. $this->search . '%' )
        ->paginate(10);
        return view('livewire.admin.noticias-index', compact('noticias'));
    }
}
