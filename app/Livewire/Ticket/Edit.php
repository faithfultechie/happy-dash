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
        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $attachments[] = $attachment->store('documents', 'public');
            }
        }

        $oldFiles = array_diff(
            $this->ticket->attachmentList,
            explode('|', $this->removed_files ?: '')
        );

        if (!empty($this->removed_files)) {
            $removedFiles = explode('|', $this->removed_files);
            foreach ($removedFiles as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        $validatedData['attachments'] = implode(',', array_merge($attachments, $oldFiles));

        $validatedData['user_id'] = Auth::user()->id;
        $this->ticket->update($validatedData);

        session()->flash('success', 'Ticket updated successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $documentsPath = 'documents';
        return view('livewire.ticket.edit', compact('documentsPath'));
    }
}
