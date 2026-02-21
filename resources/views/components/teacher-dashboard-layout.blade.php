<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkensaLomba - Dashboard Guru</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        function toast(pesan) {
            Toastify({
                text: pesan,
                duration: 4000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#16a34a",
                stopOnFocus: true,
            }).showToast()
        }
    </script>

    @vite('resources/css/dashboard.css')
</head>

<body class="font-satoshi bg-primary-color">
    <aside
        class="w-72 h-screen border-r border-r-border-color overflow-y-auto fixed left-0 top-0 px-8 py-10 bg-secondary-color z-50">
        <div>
            <div>
                <div class="flex justify-center items-center p-5 rounded-lg ">
                    <h1 class="text-2xl font-bold text-white">SkensaLomba</h1>
                </div>
            </div>

            <div class="pt-10">
                <ul class="flex flex-col gap-3">
                    <x-nav-link href="{{ route('teacher.dashboard') }}" :active="request()->is('teacher/dashboard')">
                        <x-slot:svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1"
                                    d="M8.557 2.75H4.682A1.93 1.93 0 0 0 2.75 4.682v3.875a1.94 1.94 0 0 0 1.932 1.942h3.875a1.94 1.94 0 0 0 1.942-1.942V4.682A1.94 1.94 0 0 0 8.557 2.75m10.761 0h-3.875a1.94 1.94 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942V4.682a1.93 1.93 0 0 0-1.932-1.932m0 10.75h-3.875a1.94 1.94 0 0 0-1.942 1.933v3.875a1.94 1.94 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942v-3.875a1.93 1.93 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.93 1.93 0 0 0 1.932 1.932h3.875a1.94 1.94 0 0 0 1.942-1.932v-3.875a1.94 1.94 0 0 0-1.942-1.942" />
                            </svg>
                        </x-slot:svg>
                        Dashboard
                    </x-nav-link>

                    <x-nav-link href="{{ route('teacher.students') }}" :active="request()->is('teacher/students*')">
                        <x-slot:svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7" />
                            </svg>
                        </x-slot:svg>
                        Siswa
                    </x-nav-link>

                    <x-nav-link href="{{ route('teacher.competitions') }}" :active="request()->is('teacher/competitions*')">
                        <x-slot:svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20.87 17.25l-2.71-4.68A6.9 6.9 0 0 0 19 9.25a7 7 0 0 0-14 0a6.9 6.9 0 0 0 .84 3.32l-2.71 4.68A1 1 0 0 0 4 18.75h7v1a1 1 0 0 0 2 0v-1h7a1 1 0 0 0 .87-1.5M9.5 10.25a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0" />
                            </svg>
                        </x-slot:svg>
                        Kompetisi
                    </x-nav-link>
                </ul>

                <ul class="mt-28">
                    <form id="logoutForm" action="{{ route('teacher.logout') }}" method="POST">
                        @csrf
                        <x-nav-link href="javascript:void(0);" :active="request()->is('/logout')"
                            onclick="document.getElementById('logoutForm').submit();">
                            <x-slot:svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h5.903q.214 0 .357.143t.143.357t-.143.357t-.357.143H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h5.904q.214 0 .357.143t.143.357t-.143.357t-.357.143zm12.444-7.5H9.692q-.213 0-.356-.143T9.192 12t.143-.357t.357-.143h8.368l-1.971-1.971q-.141-.14-.15-.338q-.01-.199.15-.364q.159-.165.353-.168q.195-.003.36.162l2.614 2.613q.242.243.242.566t-.243.566l-2.613 2.613q-.146.146-.347.153t-.366-.159q-.16-.165-.157-.357t.162-.35z" />
                                </svg>
                            </x-slot:svg>
                            Keluar
                        </x-nav-link>
                    </form>
                </ul>
            </div>
        </div>
    </aside>

    <x-nav>Halo! Selamat Datang
        <span class="text-accent-color">{{ Auth::guard('teacher')->user()->full_name }}</span>
    </x-nav>


    <main class="xl:w-[calc(100vw - 288px)] xl:ml-[288px] h-screen bg-primary-color">
        <div class="px-14 py-24">
            {{ $slot }}
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/tab.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>

</html>
