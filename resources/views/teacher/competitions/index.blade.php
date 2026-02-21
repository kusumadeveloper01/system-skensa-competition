<x-teacher-dashboard-layout>
    <div class="mb-6">
        <h1 class="page-title">Daftar Kompetisi</h1>
        <p class="text-gray-600 mt-2">Kompetisi yang tersedia untuk siswa</p>
    </div>

    @if($competitions->count() > 0)
    <div class="grid grid-cols-1 gap-5 mb-6">
        <div class="card-dashboard">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Total: {{ $competitions->count() }} Kompetisi</h2>
                <input type="text" id="searchInput" placeholder="Cari kompetisi..." 
                       class="px-4 py-2 border border-border-color rounded-lg">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="competitionsGrid">
        @foreach($competitions as $competition)
        <div class="card-dashboard competition-card hover:shadow-xl transition-shadow">
            @if($competition->poster)
            <img src="{{ asset($competition->poster) }}" alt="{{ $competition->name }}" 
                 class="w-full h-48 object-cover rounded-lg mb-4">
            @else
            <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20.87 17.25l-2.71-4.68A6.9 6.9 0 0 0 19 9.25a7 7 0 0 0-14 0a6.9 6.9 0 0 0 .84 3.32l-2.71 4.68A1 1 0 0 0 4 18.75h7v1a1 1 0 0 0 2 0v-1h7a1 1 0 0 0 .87-1.5M9.5 10.25a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0" />
                </svg>
            </div>
            @endif

            <div class="mb-2">
                <span class="bg-accent-color text-white px-3 py-1 rounded-full text-xs">
                    {{ $competition->competition_type->name ?? 'Umum' }}
                </span>
                <span class="ml-2 text-xs {{ 
                    \Carbon\Carbon::parse($competition->start_date)->isFuture() ? 'text-blue-600' : 
                    (\Carbon\Carbon::parse($competition->end_date)->isPast() ? 'text-gray-600' : 'text-green-600') 
                }}">
                    @if(\Carbon\Carbon::parse($competition->start_date)->isFuture())
                        Akan Datang
                    @elseif(\Carbon\Carbon::parse($competition->end_date)->isPast())
                        Selesai
                    @else
                        Sedang Berlangsung
                    @endif
                </span>
            </div>

            <h3 class="font-bold text-lg mb-2 competition-name">{{ $competition->name }}</h3>
            
            <div class="space-y-2 text-sm mb-4">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 16H5V10h14z"/>
                    </svg>
                    <div>
                        <p class="text-gray-600">Pendaftaran</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($competition->registration_start_date)->format('d M Y') }} - 
                            {{ \Carbon\Carbon::parse($competition->registration_end_date)->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7m0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5"/>
                    </svg>
                    <div>
                        <p class="text-gray-600">Lokasi</p>
                        <p class="font-semibold">{{ $competition->location }}</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4m0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4"/>
                    </svg>
                    <div>
                        <p class="text-gray-600">Kuota</p>
                        <p class="font-semibold">{{ $competition->quota }} peserta</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 mt-0.5 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m0 18a8 8 0 0 1-8-8a8 8 0 0 1 8-8a8 8 0 0 1 8 8a8 8 0 0 1-8 8m.5-13H11v6l5.2 3.2l.8-1.3l-4.5-2.7z"/>
                    </svg>
                    <div>
                        <p class="text-gray-600">Biaya</p>
                        <p class="font-semibold">Rp {{ number_format($competition->fee, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('teacher.competitions.detail', $competition->id) }}" 
               class="block w-full text-center bg-accent-color text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">
                Lihat Detail
            </a>
        </div>
        @endforeach
    </div>
    @else
    <div class="card-dashboard text-center py-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 opacity-50" width="64" height="64" viewBox="0 0 24 24">
            <path fill="currentColor" d="M20.87 17.25l-2.71-4.68A6.9 6.9 0 0 0 19 9.25a7 7 0 0 0-14 0a6.9 6.9 0 0 0 .84 3.32l-2.71 4.68A1 1 0 0 0 4 18.75h7v1a1 1 0 0 0 2 0v-1h7a1 1 0 0 0 .87-1.5M9.5 10.25a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0" />
        </svg>
        <h3 class="text-xl font-bold mb-2">Belum Ada Kompetisi</h3>
        <p class="text-gray-600">Tidak ada kompetisi yang tersedia saat ini.</p>
    </div>
    @endif

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let cards = document.querySelectorAll('.competition-card');
            
            cards.forEach(card => {
                let text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });
    </script>
</x-teacher-dashboard-layout>
