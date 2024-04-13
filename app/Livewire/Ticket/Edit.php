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
    public $ticket, $title, $category, $priority, $status, $message, $removed_files;

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
            'title' => ['required', 'string', Rule::unique(Ticket::class)->ignore($this->ticket)],
            'priority' => ['required', 'string', Rule::in([
                'low', 'medium', 'high',
            ])],
            'status' => ['required', 'string', Rule::in([
                'open', 'closed',
            ])],
            'attachments.*' => ['file', 'mimes:jpg,png,jpeg', 'nullable'],
            'message' => ['required', 'string'],
        ]);

        $attachments = [];
        if ($this->attachments) {

            foreach ($this->attachments as $attachment) {
                $attachments[] = $attachment->store('documents', 'public');
            }
        }

        $oldFIles = [];
        $removedFiles = explode('|', $this->removed_files);

        foreach ($removedFiles as $removedFile) {
            if ($removedFile) {
                Storage::disk('public')->delete($removedFile);
            }
        }

        foreach ($this->ticket->attachmentList as $image) {
            if (!in_array($image, $removedFiles)) {
                $oldFIles[] = $image;
            }
        }

        $validatedData['attachments'] = implode(',', [...$attachments, ...$oldFIles]);

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
