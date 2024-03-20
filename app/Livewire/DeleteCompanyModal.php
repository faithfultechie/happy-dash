<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteCompanyModal extends ModalComponent
{
    public $company;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function delete()
    {
        $this->company->delete();
        $this->dispatch('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-company-modal');
    }
}
