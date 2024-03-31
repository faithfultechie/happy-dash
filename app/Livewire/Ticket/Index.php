<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public $tickets;
    public function mount()
    {
        $this->tickets = Ticket::get();
    }
    public function render()
    {
        return view('livewire.ticket.index');
    }
}
