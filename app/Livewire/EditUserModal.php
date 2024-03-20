<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class EditUserModal extends ModalComponent
{
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public $user, $name, $email, $password, $password_confirmation;
    public $role = "";
    public $selectedPermissions = [];
    public $disable_login = 0;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount(User $user)
    {
        $this->role =  $user->roles->pluck('name')->first();
        $this->selectedPermissions = $user->permissions->pluck('name')->toArray();
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        if (!empty($this->password)) {
            $this->user->force_password_change = 1;
        }

        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', Rule::unique(User::class)->ignore($this->user)],
            'disable_login' => ['boolean', 'nullable'],
        ];

        if ($this->password) {
            $rules['password'] = ['confirmed', Password::min(8)->letters()->mixedCase()->uncompromised(), 'nullable'];
        }

        $validatedData = $this->validate($rules);

        $this->user->update($validatedData);

        $this->user->syncRoles($this->role);
        $this->user->syncPermissions($this->selectedPermissions);

        $this->dispatch('pg:eventRefresh-default');
        $this->closeModal();
    }


    // public function generatePassword($length = 8)
    // {
    //     $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*";
    //     $randomString = substr(str_shuffle(str_repeat($characters, $length)), 0, $length);

    //     $this->password = $this->password_confirmation = $randomString;
    // }

    public function render()
    {
        $roles = Role::get(['id', 'name']);
        $permissions = Permission::get(['id', 'name', 'description']);
        return view('livewire.edit-user-modal', compact('permissions', 'roles'));
    }
}
