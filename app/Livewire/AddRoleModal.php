<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;

class AddRoleModal extends ModalComponent
{
    public $name, $guard_name;

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function saveRole()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Role::class)],
            'guard_name' => ['nullable', 'string'],
        ]);
        $role = Role::create([
            'name' => $this->name,
            'guard_name' => $validatedData['guard_name'],
        ]);
        $this->resetInputFields();
        $this->dispatch('refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-role-modal');
    }
}
