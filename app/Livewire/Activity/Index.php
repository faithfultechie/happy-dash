<?php

namespace App\Livewire\Activity;

use Livewire\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        return view('livewire.activity.index');
    }
}
