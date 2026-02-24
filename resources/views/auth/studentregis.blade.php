<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('store-register-student') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <input type="text" name="full_name" id="full_name" placeholder="Full Name">

            <input type="text" name="nis" id="nis" placeholder="NIS">

            <input type="email" name="email" id="email" placeholder="Email">

            <input type="password" name="password" id="password" placeholder="Password">

            <input type="text" name="phone_number" id="phone_number" placeholder="Nomor Telepon">

            <input type="text" name="class" id="class" placeholder="Kelas">

            <input type="text" name="major" id="major" placeholder="Jurusan">

        </div>
        <button type="submit">Daftar</button>

        <a href="{{ route('login-page') }}">Klik disini jika sudah daftar</a>
    </form>
</body>

</html>
