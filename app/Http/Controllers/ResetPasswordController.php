<?php
// app/Http/Controllers/Auth/ResetPasswordController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\PasswordReset;



class ResetPasswordController extends Controller
 {
    // public function showResetForm($token)
    // {
    //     return view('users.page.reset')->with(['token' => $token, 'email' => request()->email]);
    // }
public function showResetForm(Request $request)
{
    //$token = $request->query('token');
    $email = $request->query('email');
    
    return view('users.page.reset', [ 'email' => $email]);

    //return view('users.page.reset', compact('email', 'token'));
}


public function reset(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'verification_code' => 'required',
    ]);

    $passwordReset = PasswordReset::where('email', $request->email)
                                  ->where('verification_code', $request->verification_code)
                                  ->first();

    if (!$passwordReset) {
        return redirect()->back()->withErrors(['verification_code' => 'Mã xác thực không hợp lệ hoặc đã hết hạn.']);
    }

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return redirect()->back()->withErrors(['email' => 'Email không tồn tại trong hệ thống']);
    }

    $user->forceFill([
        'password' => Hash::make($request->password)
    ])->save();

    PasswordReset::where('email', $request->email)->delete();

    return redirect()->route('login')->with('status', 'Mật khẩu đã được đặt lại thành công!');
}

}
