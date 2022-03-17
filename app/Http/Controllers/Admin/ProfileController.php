<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if (!$user->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return view('back.dashboard', compact('user'));
    }

    public function profile()
    {
        $user  = User::find(Auth::user()->id);
        return view('back.account.update-profile-information-form', compact('user'));
    }

    public function updatePasswordView()
    {
        return view('back.account.update-password-form');
    }

    public function twoFactorAuthentication()
    {
        return view('back.account.two-factor-authentication-form');
    }

    public function deleteAccountView()
    {
        return view('back.account.delete-user-form');
    }
}
