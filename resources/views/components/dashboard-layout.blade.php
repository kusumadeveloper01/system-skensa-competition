<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameConsole - Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



    <!-- Include CKEditor 5 from CDN -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        function toast(pesan) {
            Toastify({
                text: pesan,
                duration: 4000,
                close: true, // ada tombol X
                gravity: "top", // "top" atau "bottom"
                position: "right", // "left", "center", "right"
                backgroundColor: "#16a34a",
                stopOnFocus: true, // biar nggak hilang kalau di-hover
            }).showToast()
        }
    </script>

    <style>
        * {
            transition: none !important;
        }

        #teacher-sidebar .bg-secondary-color {
            background: transparent !important;
        }

        #teacher-sidebar .text-text-primary-color {
            color: #ffffff !important;
        }

        #teacher-sidebar .border-l-accent-color {
            border-left-color: #2764FF !important;
        }

        #teacher-sidebar a:hover,
        #teacher-sidebar button:hover {
            background: rgba(39, 100, 255, 0.1) !important;
        }

        #teacher-sidebar .bg-accent-secondary-color {
            background: rgba(39, 100, 255, 0.1) !important;
            border-left-color: #2764FF !important;
        }

        #teacher-sidebar li a,
        #teacher-sidebar li button {
            border-radius: 8px;
            padding: 12px 16px !important;
        }

        #teacher-sidebar .text-accent-color {
            color: #2764FF !important;
        }

        #teacher-sidebar .text-inactive-color {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        #teacher-sidebar.hidden-sidebar {
            display: none;
        }

        body.sidebar-hidden nav {
            margin-left: 0 !important;
            width: 100% !important;
        }

        body.sidebar-hidden main,
        body.sidebar-hidden footer {
            margin-left: 0 !important;
        }

        #profileDropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            min-width: 200px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 8px 0;
        }

        #profileDropdown a {
            display: block;
            padding: 10px 16px;
            color: #374151;
            text-decoration: none;
        }

        #profileDropdown a:hover {
            background: #f3f4f6;
            color: #2764FF;
        }
    </style>

    @vite('resources/css/dashboard.css')
</head>

<body class="font-satoshi bg-primary-color">
    {{-- Sidebar --}}
    <aside id="teacher-sidebar"
        class="w-72 h-screen border-r border-r-border-color overflow-y-auto fixed left-0 top-0 px-8 py-10 z-50 bg-sidebar-color">
        <div>
            <div>
                <div class="flex justify-center items-center p-5 rounded-lg ">
                    <h1 class="text-4xl font-bold text-white">SkensaLomba</h1>
                </div>
            </div>

            <div class="pt-10">
                <ul class="flex flex-col gap-3">
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('admin/dashboard')">
                        <x-slot:svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
                            </svg>
                        </x-slot:svg>
                        Dashboard
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.competition.index') }}" :active="request()->is('admin/competition*')">
                        <x-slot:svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 15.5A3.5 3.5 0 0 1 8.5 12A3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5a3.5 3.5 0 0 1-3.5 3.5m7.43 2.53c.04-.32.07-.64.07-.97c0-.33-.03-.66-.07-1l2.11-1.63c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.31-.61-.22l-2.49 1c-.52-.39-1.06-.73-1.69-.98l-.37-2.65A.506.506 0 0 0 14 7h-4c-.25 0-.46.18-.5.42l-.37 2.65c-.63.25-1.17.59-1.69.98l-2.49-1c-.22-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64L4.57 15c-.04.34-.07.67-.07 1c0 .33.03.65.07.97l-2.11 1.66c-.19.15-.25.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1.01c.52.4 1.06.74 1.69.99l.37 2.65c.04.24.25.42.5.42h4c.25 0 .46-.18.5-.42l.37-2.65c.63-.26 1.17-.59 1.69-.99l2.49 1.01c.22.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64z" />
                            </svg>
                        </x-slot:svg>
                        Competitions
                    </x-nav-link>

                    <div>
                        <x-multi-nav-link id="dropdown-parent-1" onclick="openDropdown1()" type="button"
                            :active="request()->is('admin/student*')">
                            <x-slot:svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8z" />
                                </svg>
                            </x-slot:svg>
                            Master Data
                        </x-multi-nav-link>
                        <ul id="dropdown-child-1" class="hidden">
                            <x-inside-multi-nav-link href="{{ route('admin.student.index') }}" :active="request()->is('admin/student*')">
                                Siswa
                            </x-inside-multi-nav-link>
                        </ul>
                    </div>
                </ul>

                <ul>
                    <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <x-nav-link href="javascript:void(0);" :active="request()->is('/logout')"
                            onclick="document.getElementById('logoutForm').submit();">
                            <x-slot:svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M17 8l-1.41 1.41L17.17 11H9v2h8.17l-1.58 1.58L17 16l4-4l-4-4M5 5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h7v-2H5V5z" />
                                </svg>
                            </x-slot:svg>
                            Logout
                        </x-nav-link>
                    </form>
                </ul>
            </div>
        </div>
    </aside>

    {{-- Navbar --}}
    <nav class="w-full xl:w-[calc(100%-288px)] xl:ml-72 fixed top-0 right-0 z-[60] px-8 py-4 flex items-center justify-between bg-primary-color"
        style="box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div class="flex items-center gap-4">
            <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
            <div class="text-lg font-medium">
                Halo! Selamat Datang <span class="text-accent-color"></span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button onclick="toggleDarkMode()" class="p-2 rounded-lg hover:bg-gray-100">
                <div class="w-6 h-6 flex items-center justify-center" id="themeIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="5" />
                        <line x1="12" y1="1" x2="12" y2="3" />
                        <line x1="12" y1="21" x2="12" y2="23" />
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                        <line x1="1" y1="12" x2="3" y2="12" />
                        <line x1="21" y1="12" x2="23" y2="12" />
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                    </svg>
                </div>
            </button>
            <div class="relative">
                <button onclick="toggleProfileDropdown()"
                    class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100">
                    <img src="https://ui-avatars.com/api/?name=&background=2764FF&color=fff" alt="Avatar"
                        class="w-10 h-10 rounded-full">
                    <div class="text-left">
                        <div class="font-medium text-sm"></div>
                        <div class="text-xs text-gray-500">Guru</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div id="profileDropdown" class="hidden">
                    <a href="#">Profile Saya</a>
                    <a href="#">Pengaturan</a>
                    <hr class="my-2">
                    <a href="javascript:void(0);" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <main class="xl:ml-72 min-h-screen bg-primary-color" style="padding-top: 80px;">
        <div class="px-14 py-8">
            {{ $slot }}
        </div>
    </main>

    <footer class="xl:ml-72 px-8 py-4 flex items-center justify-between bg-primary-color">
        <div class="text-sm text-gray-600">
            © 2026 SkensaLomba. All rights reserved.
        </div>
        <div class="text-sm text-gray-600">
            Develop By Kelompok Hitam
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/tab.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>
    {{-- <script src="{{ asset('scripts/html5-qrcode.min.js') }}"></script> --}}

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

    <script>
        function confirmDelete(routeUrl) {
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: 'Data yang sudah dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,

                background: '#1a1a1a', // abu gelap (dark mode vibes)
                color: '#fefefe', // warna teksnya
                iconColor: '#f87171', // warna ikon (optional)

                // 🎨 Custom warna tombol pakai Tailwind
                customClass: {
                    confirmButton: 'button-primary ml-2',
                    cancelButton: 'button-secondary'
                },
                buttonsStyling: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set action form ke route yang dikirim dari tombol
                    const form = document.getElementById('deleteForm');
                    form.action = routeUrl;
                    form.submit();
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            function calculateFinalFee() {
                let fee = parseFloat($('input[data-fee]').val()) || 0;
                let discount = parseFloat($('input[data-discount]').val()) || 0;
                let finalFee = fee - discount;
                if (finalFee < 0) finalFee = 0;
                $('input[data-final_fee]').val(finalFee.toFixed(2));
            }

            $('input[data-fee], input[data-discount]').on('input', function() {
                calculateFinalFee();
            });
        })
    </script>


</body>

</html>
