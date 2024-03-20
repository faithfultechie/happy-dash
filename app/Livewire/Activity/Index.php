<?php

namespace App\Livewire\Activity;

use Livewire\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $agent = new Agent();
        $authentication_logs = DB::table('authentication_log')
            ->join('users', 'authentication_log.authenticatable_id', '=', 'users.id')
            ->select('authentication_log.*', 'users.name', 'users.email')
            ->paginate(10);
        return view('livewire.activity.index', compact('authentication_logs', 'agent'));
    }
}
