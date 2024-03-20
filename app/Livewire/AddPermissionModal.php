<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class AddPermissionModal extends ModalComponent
{
    public $name, $guard_name, $description;

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }

    public function savePermission()
    {
        $validatedData = $this->validate([
            'name' => ['required', Rule::unique(Permission::class)],
            'guard_name' => ['nullable', 'string'],
            'description' => ['required', 'string'],
        ]);
        $permission = Permission::create([
            'name' => $this->name,
            'guard_name' => $validatedData['guard_name'],
            'description' => $this->description,
        ]);
        $this->resetInputFields();
        $this->dispatch('refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-permission-modal');
    }
}
