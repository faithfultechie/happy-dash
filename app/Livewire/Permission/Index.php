<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    public function render()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return view('livewire.permission.index', compact('permissions','roles'));
    }
}
