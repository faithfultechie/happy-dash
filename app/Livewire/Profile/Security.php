<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class Security extends Component
{
    public bool $cardModal = false;

    public function render()
    {
        return view('livewire.profile.security');
    }
}
