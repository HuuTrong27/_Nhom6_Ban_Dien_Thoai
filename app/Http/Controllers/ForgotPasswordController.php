<?php

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Helpers\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset; 
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm(Request $request)
    {
        //return view('users.page.email');
        $email = $request->old('email', ''); // Fetch old email if exists or default to empty
        return view('users.page.email', compact('email'));
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email không tồn tại trong hệ thống']);
        }
    
        $verificationCode = mt_rand(100000, 999999); // Tạo mã xác thực ngẫu nhiên 6 chữ số
    
        PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'token' => Str::random(60),
                'user_id' => $user->id,
                'verification_code' => $verificationCode,
                'created_at' => Carbon::now()
            ]
        );
    
        Mail::send('users.page.reset_password', ['verificationCode' => $verificationCode, 'user'  => $user], function ($message) use ($user) {
            $message->from('nguyenhuutrongvtabs@gmail.com', '_Nhom_6_Ban_ĐT')->to($user->email)->subject('Đặt lại mật khẩu');
        });
    
        Log::info('Password reset verification code: ' . $verificationCode);
        Log::info('User ID: ' . $user->id);
    
        return redirect()->back()->with('status', 'Đã gửi mã xác thực đặt lại mật khẩu đến email của bạn');
    }
    // public function sendResetLinkEmail(Request $request)
    // {
    //      $this->validateEmail($request);
    
    //     // Kiểm tra xem email có tồn tại trong bảng users hay không
    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         // Nếu không tìm thấy user với email được cung cấp, trả về thông báo lỗi
    //         return redirect()->back()->withErrors(['email' => 'Email không tồn tại trong hệ thống']);
    //     }
        
    //     // Tạo mã xác minh ngẫu nhiên
    //     $verificationCode = Str::random(60);
        
    //     // Lưu token vào bảng password_resets
    //     PasswordReset::updateOrCreate(
    //         ['email' => $request->email],
    //         ['token' => $verificationCode, 'user_id' => $user->id, 'created_at' => Carbon::now()]
    //     );
        
    //     // Tạo URL chứa mã xác minh và email của người dùng
    //     $resetLink = url('/password/reset/'.$verificationCode.'?email='.$request->email);
        
    //     // Gửi email chứa liên kết đặt lại mật khẩu đến người dùng
    //     Mail::send('users.page.reset_password', ['resetLink' => $resetLink,'user' => $user], function ($message) use ($user) {
    //         $message->to($user->email)->subject('Đặt lại mật khẩu');
    //     });
        
    //     Log::info('Password reset token: ' . $verificationCode);
    //     Log::info('User ID: ' . $user->id);

        
    //     // Trả về kết quả thành công
    //     return redirect()->back()->with('status', 'Đã gửi liên kết đặt lại mật khẩu đến email của bạn');
    // }
    

    protected function sendResetLinkResponse($response)
    {
        return redirect()->back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return redirect()->back()->withErrors(['email' => trans($response)]);
    }

    protected function broker()
    {
        return Password::broker();
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
}
