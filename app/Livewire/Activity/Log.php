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
        $agent = new Agent();
        $audits = DB::table('audits')
            ->join('users', 'audits.auditable_id', '=', 'users.id')
            ->select('audits.*', 'users.name', 'users.email')
            ->paginate(10);
        return view('livewire.activity.log', compact('audits', 'agent'));
    }
}
