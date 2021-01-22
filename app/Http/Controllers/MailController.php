<?php

namespace App\Http\Controllers;

use App\User;
use App\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $password = Str::random(8);
        if (User::where('email', $request->email)->update(['password' => Hash::make($password)]) && PasswordReset::where('email', $request->email)->update(['token' => 0, 'created_at' => now()])) {
            $data['body'] = "Youre temporary password is: " . $password;
            $data['subject'] = "Reset Password Notification";
            return $data;
        } else {
            return back()->with(notification('error', 'Something went wrong!'));
        }
    }
}
