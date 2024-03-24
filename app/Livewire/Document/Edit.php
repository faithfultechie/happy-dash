<?php

namespace App\Livewire\Document;

use App\Models\Company;
use Livewire\Component;
use App\Models\Category;
use App\Models\Document;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    protected $listeners = ['refresh' => '$refresh'];

    public $document, $title, $expiry_date, $status,
        $document_filepath, $company_id, $code;

    public function mount(Document $document)
    {
        $this->title = $document->title;
        $this->status = $document->status;
        $this->company_id = $document->company_id;
        $this->code = $document->code;
        $this->expiry_date = $document->expiry_date;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string', Rule::unique(Document::class)->ignore($this->document)],
            'company_id' => ['required', 'exists:companies,id'],
            'code' => ['string', Rule::unique(Document::class), 'nullable'],
            'expiry_date' => ['required', 'date'],
            'status' => ['required', 'string', Rule::in([
                'Draft', 'Active', 'Pending', 'Terminated', 'Archived',
            ])],
            'document_filepath' => ['file', 'mimes:pdf,doc,docx', 'nullable'],
        ]);

        $currentFilePath = $this->document->document_filepath;

        if ($this->document_filepath) {
            $uniqueId = substr(uniqid(), 0, 7);
            $randomCode = 'document-' . $uniqueId;
            $uploadedFile = $this->document_filepath;

            $fileName = $randomCode;
            $filePath = $uploadedFile->store('documents', 'public');
            $fileSize = $uploadedFile->getSize();

            $validatedData['document_filepath'] = $filePath;
            $validatedData['document_filename'] = $fileName;
            $validatedData['document_filesize'] = $fileSize;
        }
            // If there's a current file, delete it
            if ($currentFilePath) {
                Storage::disk('public')->delete($currentFilePath);
            }

        $this->document->update($validatedData);

        session()->flash('success', 'Document updated successfully.');
        return redirect()->route('document.index');
    }

    public function getCompanyProperty()
    {
        return Company::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.document.edit');
    }
}
