<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddDepartmentModal extends ModalComponent
{
    public $name;

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function saveDepartment()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Department::class)],
        ]);
        $category = Department::create([
            'name' => $this->name,
        ]);
        $this->resetInputFields();
        $this->dispatch('refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-department-modal');
    }
}
