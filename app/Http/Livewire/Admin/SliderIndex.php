<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;

use Livewire\WithPagination;

class SliderIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $sliders = Slider::latest('id')
        ->where('name', 'LIKE', '%'. $this->search . '%' )
        ->paginate(10);
        return view('livewire.admin.slider-index', compact('sliders'));
    }
}
