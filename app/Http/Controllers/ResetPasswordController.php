<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function showResetForm()
    {
        return view('users.partials.auth.reset', ['user' => Auth::user()]);
    }

    public function reset(Request $request)
    {
        $old_password = $this->validate($request, [
            'old_password' => ['required'],
        ]);
        if (!Hash::check($old_password['old_password'], Auth::user()->password)) {
            throw ValidationException::withMessages(['old_password' => 'Old Password is incorrect']);
        }
        $new_password = $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (User::where('id', Auth::id())->update(['password' => $new_password['password']])) {
            return back()->with(notification('success', 'Password Successfully Updated'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
        }
    }
}
