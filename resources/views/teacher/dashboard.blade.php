<x-teacher-dashboard-layout>
    <div class="grid grid-cols-1 gap-5">
        <div>
            <div class="flex flex-col gap-2">
                <h2 class="page-title">Statistik Siswa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
                    <div class="card-dashboard">
                        <p class="label-text">Total Siswa</p>
                        <h1 class="page-title">{{ $totalStudents }}</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Siswa Terdaftar Kompetisi (Bulan Ini)</p>
                        <h1 class="page-title">{{ $studentsRegisteredThisMonth }}</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Total Pendaftaran Kompetisi</p>
                        <h1 class="page-title">{{ $totalRegistrations }}</h1>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2 mt-5">
                <h2 class="page-title">Kompetisi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
                    <div class="card-dashboard">
                        <p class="label-text">Kompetisi Aktif</p>
                        <h1 class="page-title">{{ $activeCompetitions }}</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Kompetisi Akan Datang</p>
                        <h1 class="page-title">{{ $upcomingCompetitions }}</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Kompetisi Berlangsung</p>
                        <h1 class="page-title">{{ $ongoingCompetitions->count() }}</h1>
                    </div>
                </div>
            </div>
        </div>

        @if($ongoingCompetitions->count() > 0)
        <div class="card-dashboard">
            <h2 class="page-title mb-4">Kompetisi Sedang Berlangsung</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($ongoingCompetitions as $competition)
                <div class="border border-border-color rounded-lg p-4 hover:shadow-lg transition-shadow">
                    @if($competition->poster)
                    <img src="{{ asset($competition->poster) }}" alt="{{ $competition->name }}" 
                         class="w-full h-40 object-cover rounded-lg mb-3">
                    @endif
                    <h3 class="font-bold text-lg mb-2">{{ $competition->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">
                        {{ \Carbon\Carbon::parse($competition->start_date)->format('d M Y') }} - 
                        {{ \Carbon\Carbon::parse($competition->end_date)->format('d M Y') }}
                    </p>
                    <a href="{{ route('teacher.competitions.detail', $competition->id) }}" 
                       class="text-accent-color hover:underline text-sm">
                        Lihat Detail →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($popularCompetitions->count() > 0)
        <div class="card-dashboard">
            <h2 class="page-title mb-4">Kompetisi Paling Banyak Diikuti Siswa</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-border-color">
                            <th class="text-left py-3 px-4">Nama Kompetisi</th>
                            <th class="text-left py-3 px-4">Tanggal</th>
                            <th class="text-center py-3 px-4">Jumlah Siswa</th>
                            <th class="text-center py-3 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($popularCompetitions as $competition)
                        <tr class="border-b border-border-color hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $competition->name }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($competition->start_date)->format('d M Y') }}</td>
                            <td class="text-center py-3 px-4">
                                <span class="bg-accent-color text-white px-3 py-1 rounded-full text-sm">
                                    {{ $competition->registrations_count }} siswa
                                </span>
                            </td>
                            <td class="text-center py-3 px-4">
                                <a href="{{ route('teacher.competitions.detail', $competition->id) }}" 
                                   class="text-accent-color hover:underline">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if($recentRegistrations->count() > 0)
        <div class="card-dashboard">
            <h2 class="page-title mb-4">Pendaftaran Kompetisi Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-border-color">
                            <th class="text-left py-3 px-4">Kode</th>
                            <th class="text-left py-3 px-4">Siswa</th>
                            <th class="text-left py-3 px-4">Kompetisi</th>
                            <th class="text-left py-3 px-4">Tanggal Daftar</th>
                            <th class="text-center py-3 px-4">Status</th>
                            <th class="text-center py-3 px-4">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentRegistrations as $registration)
                        <tr class="border-b border-border-color hover:bg-gray-50">
                            <td class="py-3 px-4 font-mono text-sm">{{ $registration->code }}</td>
                            <td class="py-3 px-4">{{ $registration->student->full_name }}</td>
                            <td class="py-3 px-4">{{ $registration->competition->name }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($registration->date)->format('d M Y') }}</td>
                            <td class="text-center py-3 px-4">
                                @if($registration->status == 'approved')
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Disetujui</span>
                                @elseif($registration->status == 'pending')
                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Menunggu</span>
                                @else
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Ditolak</span>
                                @endif
                            </td>
                            <td class="text-center py-3 px-4">
                                @if($registration->payment_status == 'paid')
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Lunas</span>
                                @else
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Belum</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('teacher.students') }}" class="text-accent-color hover:underline">
                    Lihat Semua Siswa →
                </a>
            </div>
        </div>
        @endif

        @if($totalStudents == 0)
        <div class="card-dashboard text-center py-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4" width="64" height="64" viewBox="0 0 24 24">
                <path fill="currentColor" opacity="0.5" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5" />
            </svg>
            <h3 class="text-xl font-bold mb-2">Belum Ada Data Siswa</h3>
            <p class="text-gray-600 mb-4">Anda belum memiliki siswa yang terdaftar dalam sistem.</p>
            <a href="{{ route('teacher.students') }}" class="bg-accent-color text-white px-6 py-2 rounded-lg hover:bg-opacity-90 inline-block">
                Kelola Siswa
            </a>
        </div>
        @endif
    </div>
</x-teacher-dashboard-layout>
