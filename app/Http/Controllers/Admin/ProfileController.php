<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\IsValidPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    use PasswordValidationRules;

    public function index()
    {
        return view('back.dashboard');
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

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'img' => ['image', 'mimes:png,jpg,jpeg']
        ]);


        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->file('img')) {
            if ($user->img) {
                // delete image if existe
                File::delete($user->img);
            }

            //store new image
            $file = $request->file('img');
            $filename = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('upload/profile'), $filename);

            $user->img = 'upload/profile/' . $filename;
        }

        $user->save();

        $notification = array(
            'message' => __('Account updated successfully'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('profile')->with($notification);
    }

    public function updatePassword(Request $request)
    {

        $user = User::find(auth()->user()->id);

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', new IsValidPassword,'confirmed'],
            'password_confirmation' => 'required',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            $notification = array(
                'message' => __('Current password does not match!'),
                'alert-type' => 'error',
                'type' => 'toast',
            );
            return redirect()->route('profile.password')->with($notification);
        }

        $user->password = Hash::make($request->password);
        $user->save();


        $notification = array(
            'message' => __('Password updated successfully.'),
            'alert-type' => 'success',
            'type' => 'toast',
        );
        return redirect()->route('dashboard')->with($notification);
    }
}
