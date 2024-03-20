<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Contract;

class Dashboard extends Component
{
    public $contracts;

    public $greetingMessage;

    public function mount()
    {
        $currentTime = now();
        $hour = $currentTime->hour;
        $this->contracts = Contract::with('category', 'department', 'company')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($hour >= 6 && $hour < 12) {
            $this->greetingMessage = 'Good Morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $this->greetingMessage = 'Good Afternoon';
        } else {
            $this->greetingMessage = 'Good Evening';
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
