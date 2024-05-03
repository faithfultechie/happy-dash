<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class Account extends Component
{
    use WithFileUploads;

    public $user, $name, $username, $email, $profile_photo, $password;

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
        $validatedData = $this->validate([
            'name' => ['required', 'string'],
            'username' => ['sometimes', 'nullable', 'string', 'regex:/^[a-zA-Z0-9_]+$/'],
            'email' => [
                'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id),
            ],
            'profile_photo' => ['file', 'mimes:jpg,png,jpeg', 'nullable'],
        ]);

        if ($this->profile_photo) {
            $validatedData['profile_photo'] = $this->profile_photo->store('photos', 'public');
            if ($this->user->profile_photo) {
                Storage::disk('public')->delete($this->user->profile_photo);
            }
        }

        $this->user->update($validatedData);

        session()->flash('success', 'Profile updated successfully.');
        return redirect()->route('user.account');
    }
    public function deactivateAccount()
    {
        if (!$this->user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $this->user->update(['disable_login' => true]);
    }

    protected $rules = [
        'password' => ['required', 'string',]
    ];

    public function deleteAccount()
    {
        $this->validate();
        $user = Auth::user();

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'The password entered did not match your current one.');
            return;
        }

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();
        Auth::logout();
        session()->flash('success', 'Your account has been deleted successfully.');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.profile.account');
    }
}
