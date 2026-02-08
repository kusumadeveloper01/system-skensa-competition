<x-landing-page-layout>
    <div class="relative w-full h-dvh">
        <div id="hero" class="section-container">
            <div class="flex flex-col justify-center items-center">
                <div
                    class="w-full md:max-w-[90%] lg:max-w-[60%] text-left lg:text-center flex flex-col justify-center items-start lg:items-center">
                    <h1 class="big-title">Selamat Datang Di <span class="text-accent-color">SkensaLomba</span></h1>
                    <h4 class="small-title mt-8">Temukan berbagai informasi lomba yang dapat kamu ikuti</h4>
                    <p class="text opacity-50 mt-3">Semua info lomba yang kamu cari, lengkap di satu platform.</p>
                    <button class="button-primary mt-5   lg:mt-10">Selengkapnya</button>
                </div>
            </div>
        </div>

        <img src="{{ asset('assets/images/hero/hero.svg') }}" class="absolute bottom-10 lg:bottom-0 left-0 right-0"
            alt="">
    </div>

    <div id="lomba" class="section-container">
        <div class="section-header">
            <h2 class="section-title">Jelajahi Berbagai Lomba</h2>
            <p class="small-text">Lihat daftar perlombaan yang tersedia sesuai dengan minat dan kategori pilihanmu</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="lomba-card">
                <img src="{{ asset('assets/images/lomba/sample-lomba.png') }}" alt="">
                <button class="button-primary">Detail Lomba</button>
                <h4 class="text !font-medium">Wonderkid Festifal</h4>
                <div class="flex flex-col gap-3">
                    <div class="flex flex-row items-center gap-1">
                        <div class="w-6 h-6 object-contain bg-location"></div>
                        <p class="text">RP. 100.000</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <div class="w-6 h-6 object-contain bg-location"></div>
                        <p class="text">Online / Offline</p>
                    </div>
                    <div class="flex flex-row items-center gap-1">
                        <div class="w-6 h-6 object-contain bg-location"></div>
                        <p class="text">15 Des 2025 - 30 Jan 2026</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing-page-layout>
