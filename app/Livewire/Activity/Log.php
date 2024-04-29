<?php

namespace App\Livewire\Activity;

use Livewire\Component;
use Jenssegers\Agent\Agent;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\DB;

class Log extends Component
{
    public function render()
    {
        return view('livewire.activity.log');
    }
}
