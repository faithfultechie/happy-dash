<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;

class Settings extends Component
{
    public $brand;

    public function mount()
    {
        $this->brand = Brand::first();
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
