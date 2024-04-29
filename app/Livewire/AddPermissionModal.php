<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class AddPermissionModal extends ModalComponent
{
    public $name, $guard_name = 'web', $description;
    public function savePermission()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'regex:/^[a-z-]+$/', Rule::unique(Permission::class)],
            'guard_name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'guard_name', 'description']);
        $this->dispatch('refresh');
        $this->closeModal();
    }

    protected function messages()
    {
        return [
            'name.regex' => 'Permission name must contain only lowercase letters and hyphens.',
        ];
    }
    public function render()
    {
        return view('livewire.add-permission-modal');
    }
}
