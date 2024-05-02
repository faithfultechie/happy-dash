<?php

namespace App\Livewire\Profile;

use Hash;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class Account extends Component
{
    use WithFileUploads;

    public $user, $name, $username, $email, $profile_photo, $password_confirmation, $password, $current_password;
    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user) {
            $this->name = $this->user->name;
            $this->username = $this->user->username;
            $this->email = $this->user->email;
            $this->profile_photo = $this->user->profile_photo;
        }
    }

    public function updateProfile()
    {
        if (!$this->user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $validatedData = $this->validate([
            'name' => ['required', 'string'],
            'username' => ['sometimes', 'nullable', 'string', 'regex:/^[a-zA-Z0-9_]+$/'], // Only accept letters, numbers, and underscores
            'email' => [
                'required',  'string', 'email', 'max:255',  Rule::unique('users')->ignore($this->user->id),
            ],
            'profile_photo' => ['file', 'mimes:jpg,png,jpeg', 'nullable'],
        ]);

        $currentProfilePhoto = $this->user->profile_photo;

        if ($this->profile_photo) {
            $validatedData['profile_photo'] = $this->profile_photo->store('photos', 'public');
            if ($currentProfilePhoto) {
                Storage::disk('public')->delete($currentProfilePhoto);
            }
        }

        $this->user->update($validatedData);

        session()->flash('success', 'Profile updated successfully.');
        return redirect()->route('user.account');
    }

    public function updatePassword()
    {
        $this->validatePassword();

        $user = Auth::user();

        if (!$this->isCurrentPasswordValid($user)) {
            $this->addError('current_password', 'Sorry, provided password does not match your current password.');
            return;
        }

        $this->updateUserPassword($user);

        session()->flash('message', 'Password updated successfully.');
        return redirect()->route('user.account');
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

    protected function isCurrentPasswordValid($user)
    {
        return Hash::check($this->current_password, $user->password);
    }

    protected function updateUserPassword($user)
    {
        $user->password = Hash::make($this->password);
        $user->save();
    }

    public function render()
    {
        return view('livewire.profile.account');
    }
}
