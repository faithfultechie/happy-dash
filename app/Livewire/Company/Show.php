<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Models\Contract;
use Livewire\Component;

class Show extends Component
{
    public $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        $contracts = Contract::where('company_id', $this->company->id)->get();
        return view('livewire.company.show', compact('contracts'));
    }
}
