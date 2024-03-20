<?php

namespace App\Livewire\Contract;

use Livewire\Component;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Department;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class Create extends Component
{
    use WithFileUploads;

    protected $listeners = ['refresh' => '$refresh'];

    public $title, $comment, $category_id, $expiry_date, $start_date, $status,
        $department_id, $contract_filepath, $contact_person, $company_id,
        $name, $email, $contact, $country, $code, $scope, $address;

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string', Rule::unique(Contract::class)],
            'category_id' => ['required', 'exists:categories,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'company_id' => ['required', 'exists:companies,id'],
            'contact_person' => ['required'],
            'code' => ['string', Rule::unique(Contract::class), 'nullable'],
            'scope' => ['string', 'nullable'],
            'comment' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'string', Rule::in([
                'Draft', 'Active', 'Pending', 'Terminated', 'Archived',
                'In-negotiating', 'Expired', 'Superseeded'
            ])],
            'contract_filepath' => ['file', 'mimes:pdf,doc,docx', 'nullable'],
        ]);

        if ($this->contract_filepath) {
            $uniqueId = substr(uniqid(), 0, 7);
            $randomCode = 'contract-' . $uniqueId;
            $uploadedFile = $this->contract_filepath;

            $fileName = $randomCode;
            $filePath = $uploadedFile->store('documents', 'public');
            $fileSize = $uploadedFile->getSize();

            $validatedData['contract_filepath'] = $filePath;
            $validatedData['contract_filename'] = $fileName;
            $validatedData['contract_filesize'] = $fileSize;
        }

        Contract::create($validatedData);

        session()->flash('success', 'Contract added successfully.');
        return redirect()->route('contract.index');
    }

    public function getCategoryProperty()
    {
        return Category::orderBy('name')->get();
    }

    public function getCompanyProperty()
    {
        return Company::orderBy('name')->get();
    }

    public function getDepartmentProperty()
    {
        return Department::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.contract.create');
    }
}
