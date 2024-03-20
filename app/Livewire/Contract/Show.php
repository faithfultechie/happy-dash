<?php

namespace App\Livewire\Contract;

use App\Models\Contract;
use Livewire\Component;

class Show extends Component
{
    public Contract $contract;

    public function render()
    {
        return view('livewire.contract.show');
    }
}
