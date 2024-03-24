<?php

namespace App\Livewire\Document;

use App\Models\Company;
use Livewire\Component;
use App\Models\Category;
use App\Models\Document;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Create extends Component
{
    use WithFileUploads;

    protected $listeners = ['refresh' => '$refresh'];

    public $title, $expiry_date, $status,
        $document_filepath, $company_id, $code;

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string', Rule::unique(Document::class)],
            'company_id' => ['required', 'exists:companies,id'],
            'code' => ['string', Rule::unique(Document::class), 'nullable'],
            'expiry_date' => ['required', 'date'],
            'status' => ['required', 'string', Rule::in([
                'Draft', 'Active', 'Pending', 'Terminated', 'Archived',
            ])],
            'document_filepath' => ['file', 'mimes:pdf,doc,docx', 'nullable'],
        ]);

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

        Document::create($validatedData);

        session()->flash('success', 'Document added successfully.');
        return redirect()->route('document.index');
    }

    public function getCompanyProperty()
    {
        return Company::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.document.create');
    }
}
