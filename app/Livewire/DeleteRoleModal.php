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
        return 'lg';
    }

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function delete()
    {
        try {
            $this->role->delete();
            $this->dispatch('refresh');
            $this->closeModal();

            Log::info('Role deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting role: ' . $e->getMessage());
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.delete-role-modal');
    }
}
