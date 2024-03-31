<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Contract;
use App\Models\Document;

class Dashboard extends Component
{
    public $documents;

    public function mount()
    {
        $this->documents = Document::with('company')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
