<?php

namespace App\Livewire;

use Log;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class DeleteRoleModal extends ModalComponent
{
    public $role;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function delete()
    {
        $this->role->delete();
        $this->dispatch('refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-role-modal');
    }
}
