<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ForcePasswordChangeController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('profile.password-change', compact('user'));
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
            $user->force_password_change = 0;
        }

        $user->save();
        session()->flash('success', 'Password changed successfully.');

        return redirect()->route('dashboard');
    }
}
