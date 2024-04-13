<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $tickets = Ticket::paginate(10);
        return view('livewire.ticket.index', compact('tickets'));
    }
}
