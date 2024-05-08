<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForcePasswordChangeController extends Controller
{
    public function edit($id)
    {
        $user = Auth::user();
        if ($user && $user->force_password_change == 1) {
            return view('profile.password-change', compact('user'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->uncompromised()],
        ]);

        $user = User::findOrFail($id);

        if (isset($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
            $user->force_password_change = false;
        }

        $user->save();
        session()->flash('success', 'Password changed successfully.');

        return redirect()->route('dashboard');
    }
}
