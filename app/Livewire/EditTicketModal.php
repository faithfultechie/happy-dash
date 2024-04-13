<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use LivewireUI\Modal\Modal;
use LivewireUI\Modal\ModalComponent;

class EditTicketModal extends ModalComponent
{
    public $ticket, $status;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->status = $ticket->status;
    }
    public function closeTicket()
    {
        $this->ticket->status = 'closed';
        $this->dispatch('pg:eventRefresh-default');
        $this->ticket->update();
        $this->closeModal();
    }

    public function openTicket()
    {
        $this->ticket->status = 'open';
        $this->dispatch('pg:eventRefresh-default');
        $this->ticket->update();
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.edit-ticket-modal');
    }
}
