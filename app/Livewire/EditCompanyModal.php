<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditCompanyModal extends ModalComponent
{
    public $company, $name, $contact, $email, $address;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->name = $company->name;
        $this->contact = $company->contact;
        $this->email = $company->email;
        $this->address = $company->address;
    }

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', Rule::unique(Company::class)->ignore($this->company)],
            'contact' => ['string', 'nullable'],
            'email' => ['string', 'email', Rule::unique(Company::class)->ignore($this->company), 'nullable'],
            'address' => ['string', 'nullable'],
        ]);

        $this->company->update($validatedData);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-default');
    }

    public function render()
    {
        return view('livewire.edit-company-modal');
    }
}
