<?php

namespace App\Livewire\Company;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.company.index');
    }
}
