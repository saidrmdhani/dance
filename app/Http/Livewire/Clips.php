<?php

namespace App\Http\Livewire;

use App\Clip;
use Livewire\Component;
use Livewire\WithPagination;

class Clips extends Component
{
    use WithPagination;

    protected $listeners = ['clipCreated'];

    public function clipCreated() {

    }

    public function render()
    {
        return view('livewire.clips', [
            'clips' => Clip::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
