<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $attachments = [];
    public $ticket, $title, $category, $priority, $status, $message;

    public function mount(Ticket $ticket)
    {
        $this->title = $ticket->title;
        $this->priority = $ticket->priority;
        $this->status = $ticket->status;
        $this->message = $ticket->message;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string', Rule::unique(Ticket::class)],
            'priority' => ['required', 'string', Rule::in([
                'low', 'medium', 'high',
            ])],
            'status' => ['required', 'string', Rule::in([
                'open', 'closed', 'in_progress',
            ])],
            'attachments.*' => ['file', 'mimes:jpg,png,jpeg', 'nullable'],
            'message' => ['required', 'string'],
        ]);


        if ($this->attachments) {
            $attachments = [];
            foreach ($this->attachments as $attachment) {
                $attachments[] = $attachment->store('documents', 'public');
            }
            $validatedData['attachments'] = implode(',', $attachments);
        }

        $validatedData['user_id'] = Auth::user()->id;
        $this->ticket->update($validatedData);

        session()->flash('success', 'Ticket updated successfully.');
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.ticket.edit');
    }
}
