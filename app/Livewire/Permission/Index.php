<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $permissions = Permission::get();
        return view('livewire.permission.index', compact('permissions'));
    }
}
