<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Register</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <h1 class="auth-title">SkensaLomba</h1>

        <div class="auth-card">
            <div class="auth-header">
                <h2>Welcome Back !</h2>
                <p>Log in sebagai murid di SkensaLomba.</p>
            </div>

            <div class="auth-input-group">
                <label for="email">NIS/Email</label>
                <input id="email" type="email" placeholder="Enter NIS/Email">
            </div>

            <div class="auth-input-group">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Enter Password">
            </div>

            <button class="auth-button">Log In</button>
        </div>

        <div class="auth-footer flex flex-col items-center justify-center gap-4">
            <a href="">Log In Sebagai Guru</a>
            <img src="{{ asset('assets/icons/auth/line.svg') }}" alt="">
            <a href="">Belum Punya Akun?</a>
        </div>
    </div>
</body>

</html>
