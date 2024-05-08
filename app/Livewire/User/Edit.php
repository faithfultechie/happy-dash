<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $user, $name, $email, $password, $password_confirmation;
    public $role = "";
    public $selectedPermissions = [];
    public $disable_login = false;
    public $force_password_change;
    public function mount(User $user)
    {
        $this->user = $user;
        $this->role =  $user->roles->pluck('name')->first();
        $this->selectedPermissions = $user->permissions->pluck('name')->toArray();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->disable_login = $user->disable_login;
        $this->force_password_change = $user->force_password_change;
    }

    public function save()
    {
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', Rule::unique(User::class)->ignore($this->user)],
            'disable_login' => ['boolean', 'nullable'],
            'force_password_change' => ['boolean', 'nullable'],
        ];

        if ($this->password) {
            $rules['password'] = ['confirmed', Password::min(8)->letters()->mixedCase()->uncompromised(), 'nullable'];
        }

        $validatedData = $this->validate($rules);

        $this->user->update($validatedData);
        $this->user->syncRoles($this->role);
        $this->user->syncPermissions($this->selectedPermissions);

        session()->flash('success', 'Profile updated successfully.');
        return redirect()->route('user.edit', $this->user->id);
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
        return view('livewire.user.edit', compact('permissions', 'roles'));
    }
}
