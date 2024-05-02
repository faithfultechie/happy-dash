<?php

namespace App\Livewire;

use Log;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class DeletePermissionModal extends ModalComponent
{
    public $permission, $name;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function delete()
    {
        $this->permission->delete();
        $this->dispatch('refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-permission-modal');
    }
}
