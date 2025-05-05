<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your OTP Verification Code</title>
</head>
<body>
<h1>Welcome! Please verify your email</h1>
<p>Your OTP code is: <strong>{{ $otp }}</strong></p>
<p>To complete the verification, please click the following link:</p>
<a href="{{ $verificationUrl }}">Verify Email</a>
<p>If you didn't request this, please ignore this email.</p>
</body>
</html>
