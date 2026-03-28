<x-landing-page-layout>
    <div class="relative w-full h-dvh">
        <div id="hero" class="section-container">
            <div class="flex flex-col justify-center items-center">
                <div
                    class="w-full md:max-w-[90%] lg:max-w-[50%] text-left lg:text-center flex flex-col justify-center items-start lg:items-center">
                    <h1 class="big-title">Selamat Datang Di <span class="text-accent-color">SkensaLomba</span></h1>
                    <h4 class="small-title mt-4">Temukan berbagai informasi lomba yang dapat kamu ikuti</h4>
                    <p class="text opacity-70 mt-3">Semua info lomba yang kamu cari, lengkap di satu platform.</p>
                    <a href="#lomba"><button
                            class="group button-primary-2 mt-5 lg:mt-10 flex items-center gap-2 px-6 py-3">
                            <span>Selengkapnya</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 transition-all duration-300 group-hover:translate-y-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 14l5 5 5-5" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <img src="{{ asset('assets/images/hero/hero.svg') }}" class="absolute bottom-10 lg:bottom-0 left-0 right-0"
            alt="">
    </div>

    <div id="lomba" class="section-container">
        <div class="section-header">
            <h2 class="section-title text-center">Jelajahi Berbagai Lomba</h2>
            <p class="text-small mt-2 max-w-xl mx-auto text-center">Lihat daftar perlombaan yang tersedia sesuai dengan minat
                dan kategori pilihanmu</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            {{-- edit ini --}}
            <div class="lomba-card">
                <img src="{{ asset('assets/images/lomba/sample-lomba.png') }}" alt="">
                <button class="button-primary my-2 w-full md:w-52 mx-auto block">Detail Lomba</button>
                <h4 class="text !font-semibold mt-3">Wonderkid Festifal</h4>
                <div class="flex flex-col gap-3 mt-1">
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <p class="text ms-2">RP. 100.000</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s-6-4.35-6-10a6 6 0 1112 0c0 5.65-6 10-6 10z" />
                        </svg>
                        <p class="text ms-2">Online / Offline</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text ms-2">15 Des 2025 - 30 Jan 2026</p>
                    </div>
                </div>
            </div>

            {{-- bisa dihapus --}}
            <div class="lomba-card">
                <img src="{{ asset('assets/images/lomba/sample-lomba.png') }}" alt="">
                <button class="button-primary my-2 w-full md:w-52 mx-auto block">Detail Lomba</button>
                <h4 class="text !font-semibold mt-3">Wonderkid Festifal</h4>
                <div class="flex flex-col gap-3 mt-1">
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <p class="text ms-2">RP. 100.000</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s-6-4.35-6-10a6 6 0 1112 0c0 5.65-6 10-6 10z" />
                        </svg>
                        <p class="text ms-2">Online / Offline</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text ms-2">15 Des 2025 - 30 Jan 2026</p>
                    </div>
                </div>
            </div>

            {{-- bisa dihapus --}}
            <div class="lomba-card">
                <img src="{{ asset('assets/images/lomba/sample-lomba.png') }}" alt="">
                <button class="button-primary my-2 w-full md:w-52 mx-auto block">Detail Lomba</button>
                <h4 class="text !font-semibold mt-3">Wonderkid Festifal</h4>
                <div class="flex flex-col gap-3 mt-1">
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <p class="text mx-2">RP. 100.000</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s-6-4.35-6-10a6 6 0 1112 0c0 5.65-6 10-6 10z" />
                        </svg>
                        <p class="text mx-2">Online / Offline</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text mx-2">15 Des 2025 - 30 Jan 2026</p>
                    </div>
                </div>
            </div>

            {{-- bisa dihapus --}}
            <div class="lomba-card">
                <img src="{{ asset('assets/images/lomba/sample-lomba.png') }}" alt="">
                <button class="button-primary my-2 w-full md:w-52 mx-auto block">Detail Lomba</button>
                <h4 class="text !font-semibold mt-3">Wonderkid Festifal</h4>
                <div class="flex flex-col gap-3 mt-1">
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <p class="text mx-2">RP. 100.000</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s-6-4.35-6-10a6 6 0 1112 0c0 5.65-6 10-6 10z" />
                        </svg>
                        <p class="text mx-2">Online / Offline</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text mx-2">15 Des 2025 - 30 Jan 2026</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-landing-page-layout>
