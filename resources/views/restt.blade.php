<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <h3>This mail from Janatics</h3>
    <p>You can reset your password by clicking on the following link:</p>
    <a href="{{ route('resetPassForm', ['token' => $token]) }}">Reset Password</a>
</body>
</html>
