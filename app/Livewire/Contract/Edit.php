<?php

namespace App\Livewire\Contract;

use App\Models\Company;
use Livewire\Component;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Department;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use WithFileUploads;

    public $contract, $title, $comment, $category_id, $expiry_date, $start_date, $status,
        $department_id, $contract_filepath, $contact_person, $company_id,
        $name, $email, $contact, $country, $code, $scope, $address;

    public function mount(Contract $contract)
    {
        $this->title = $contract->title;
        $this->status = $contract->status;
        $this->category_id = $contract->category_id;
        $this->company_id = $contract->company_id;
        $this->code = $contract->code;
        $this->scope = $contract->scope;
        $this->department_id = $contract->department_id;
        $this->contact_person = $contract->contact_person;
        $this->expiry_date = $contract->expiry_date;
        $this->start_date = $contract->start_date;
        $this->comment = $contract->comment;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'title' => ['required', 'string', Rule::unique(Contract::class)->ignore($this->contract)],
            'category_id' => ['required', 'exists:categories,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'company_id' => ['required', 'exists:companies,id'],
            'contact_person' => ['required'],
            'code' => ['string', Rule::unique(Contract::class), 'nullable'],
            'scope' => ['string', 'nullable'],
            'comment' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date', 'after_or_equal:start_date'],
            'contract_filepath' => ['file', 'mimes:pdf,doc,docx', 'nullable'],
            'status' => ['required', 'string', Rule::in([
                'Draft', 'Active', 'Pending', 'Terminated', 'Archived',
                'In-negotiating', 'Expired', 'Superseeded'
            ])],
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

        $this->contract->update($validatedData);

        session()->flash('success', 'Contract updated successfully.');
        return redirect()->route('dashboard');
    }

    protected $listeners = ['refresh' => '$refresh'];

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
        return view('livewire.contract.edit');
    }
}
