<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class AddUserModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public $name, $email, $password, $password_confirmation;
    protected $listeners = ['refresh' => '$refresh'];

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'string', Rule::unique(User::class)],
                'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->uncompromised()],
            ],
        );
        $user = User::create($validatedData);
        $user->save();
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
        return view('livewire.add-user-modal', compact('permissions', 'roles'));
    }
}
