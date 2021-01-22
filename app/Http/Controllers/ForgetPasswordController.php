<?php

namespace App\Http\Controllers;

use App\PasswordReset;
use App\User;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('users.partials.auth.email');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
        ]);
        if (User::where($data)->exists()) {
            if (PasswordReset::updateOrCreate($data, ['token' => 1, 'created_at' => now()])->exists()) {
                return back()->with(notification('success', 'Successfully submitted for review. After some periods check your email'));
            } else {
                return back()->with(notification('error', 'Something went wrong!'));
            }
        } else {
            return back()->with(notification('error', 'Sorry this is wrong email.'));
        }
    }
}
