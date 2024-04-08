<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $tickets = Ticket::all();
        return view('livewire.ticket.index', compact('tickets'));
    }
}
