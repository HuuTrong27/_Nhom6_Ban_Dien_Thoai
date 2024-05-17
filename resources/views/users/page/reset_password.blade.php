
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset</h1>
    <p>Your verification code to reset your password is: <strong>{{ $verificationCode }}</strong></p>
    <p>Vui lòng sử dụng mã này để đặt lại mật khẩu của bạn tại<a href="{{ route('password.reset', ['email' => $user->email, 'code' => $verificationCode]) }}">đây</a></p>
   
</body>
</html>
