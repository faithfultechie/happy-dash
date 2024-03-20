<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddCompanyModal extends ModalComponent
{
    public $name, $contact, $email, $address;

    private function resetInputFields()
    {
        $this->name = '';
        $this->contact = '';
        $this->email = '';
        $this->address = '';
    }

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', Rule::unique(Company::class)],
            'contact' => ['string', 'nullable'],
            'email' => ['string', 'email', Rule::unique(Company::class), 'nullable'],
            'address' => ['string', 'nullable'],
        ]);
        $category = Company::create([
            'name' => $this->name,
            'contact' => $this->contact,
            'email' => $this->email,
            'address' => $this->address,
        ]);
        $this->resetInputFields();
        $this->dispatch('refresh');
        $this->dispatch('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-company-modal');
    }
}
