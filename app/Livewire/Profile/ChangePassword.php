<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $user, $password_confirmation, $password, $current_password;

    public function mount()
    {
        $this->user = Auth::user();
    }
    protected function validatePassword()
    {
        $this->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), 'different:current_password', 'confirmed'],
            'password_confirmation' => ['required'],
        ], [
            'password.different' => 'The new password must be different from the current password.',
        ]);
    }

    protected function isCurrentPasswordValid()
    {
        return Hash::check($this->current_password, $this->user->password);
    }

    protected function updateUserPassword()
    {
        $this->user->password = Hash::make($this->password);
        $this->user->save();
    }

    public function updatePassword()
    {
        $this->validatePassword();

        if (!$this->isCurrentPasswordValid()) {
            $this->addError('current_password', 'The password entered did not match your current one.');
            return;
        }

        $this->updateUserPassword();

        session()->flash('message', 'Password updated successfully.');
        return redirect()->route('user.change.password');
    }
    public function render()
    {
        return view('livewire.profile.change-password');
    }
}
