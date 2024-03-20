<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public bool $cardModal = false;

    public function account()
    {
        return view('profile.account');
    }

    public function security()
    {
        return view('profile.security');
    }
}
