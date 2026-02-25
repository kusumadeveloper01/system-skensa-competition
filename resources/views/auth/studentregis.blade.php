{{-- <!DOCTYPE html>
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

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkensaComp - Register</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-primary-color w-full h-screen font-satoshi relative flex justify-center items-center">

    <div class="box-dashboard flex flex-col gap-7 items-center mx-auto w-[90%] md:w-[50%] lg:w-[30%]">
        <a href="{{ route('landing-page') }}" class="text-accent-color hover:underline flex items-center gap-2 self-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="page-title">Register</h1>

        @if ($errors->any())
            <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a]">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-1 w-full">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">Personal Information</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive">
                        Account</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>

        <form action="{{ route('store-register-student') }}" method="POST"
            class="w-full flex flex-col gap-7 items-center">
            @csrf
            <div id="tab-content-1" class="flex flex-col gap-5 w-full">
                <div class="input-group">
                    <x-label for="full_name">full name</x-label>
                    <x-input type="text" id="full_name" :disabled="false" name="full_name" :value="old('full_name')"
                        placeholder="Enter your full name"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="nis">NIS</x-label>
                    <x-input type="text" id="nis" :disabled="false" name="nis" :value="old('nis')"
                        placeholder="Enter your NIS"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="class">Class</x-label>
                    <x-input type="text" id="class" :disabled="false" name="class" :value="old('class')"
                        placeholder="Enter your class"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="major">Major</x-label>
                    <x-input type="text" id="major" :disabled="false" name="major" :value="old('major')"
                        placeholder="Enter your major"></x-input>
                </div>
            </div>
            <div id="tab-content-2" class="flex-col gap-5 w-full hidden">
                <div class="input-group">
                    <x-label for="phone_number">Phone Number</x-label>
                    <x-input type="tel" id="phone_number" :disabled="false" name="phone_number" :value="old('phone_number')"
                        placeholder="Enter your phone number"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input type="email" id="email" :disabled="false" name="email" :value="old('email')"
                        placeholder="Enter your email"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input type="password" id="password" :disabled="false" name="password" value=""
                        placeholder="Enter your password"></x-input>
                </div>

            </div>
            <button type="submit" class="button-primary !w-full">Register</button>
            <p class="text-small opacity-50">Already have an account? <a href="{{ route('login-page') }}"
                    class="text-blue-500 hover:underline">Login</a></p>
        </form>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>
    <script src="{{ asset('scripts/tab.js') }}"></script>

</body>

</html>
