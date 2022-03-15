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
        $user  = User::find(Auth::user()->id);
        return view('back.dashboard', compact('user'));
    }

    public function profile()
    {
        $user  = User::find(Auth::user()->id);
        return view('back.profile', compact('user'));
    }
}
