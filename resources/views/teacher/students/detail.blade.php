<x-teacher-dashboard-layout>
    <div class="mb-6">
        <a href="{{ route('teacher.students') }}" class="text-accent-color hover:underline mb-4 inline-block">
            ← Kembali ke Daftar Siswa
        </a>
        <h1 class="page-title">Detail Siswa</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="card-dashboard lg:col-span-1">
            <h2 class="text-xl font-bold mb-4">Informasi Siswa</h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-600">NIS</p>
                    <p class="font-semibold font-mono">{{ $student->nis }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                    <p class="font-semibold">{{ $student->full_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-semibold">{{ $student->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">No. Telepon</p>
                    <p class="font-semibold">{{ $student->phone_number }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Kelas</p>
                    <p class="font-semibold">{{ $student->class }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Jurusan</p>
                    <p class="font-semibold">{{ $student->major }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Kompetisi Diikuti</p>
                    <p class="font-semibold text-accent-color">{{ $student->competition_registration->count() }} kompetisi</p>
                </div>
            </div>
        </div>

        <div class="card-dashboard lg:col-span-2">
            <h2 class="text-xl font-bold mb-4">Riwayat Kompetisi</h2>
            
            @if($student->competition_registration->count() > 0)
            <div class="space-y-4">
                @foreach($student->competition_registration as $registration)
                <div class="border border-border-color rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-bold text-lg">{{ $registration->competition->name }}</h3>
                            <p class="text-sm text-gray-600">Kode: {{ $registration->code }}</p>
                        </div>
                        <div class="text-right">
                            @if($registration->status == 'approved')
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Disetujui</span>
                            @elseif($registration->status == 'pending')
                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">Menunggu</span>
                            @else
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Ditolak</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-3 text-sm">
                        <div>
                            <p class="text-gray-600">Tanggal Pendaftaran</p>
                            <p class="font-semibold">{{ \Carbon\Carbon::parse($registration->date)->format('d M Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Tanggal Kompetisi</p>
                            <p class="font-semibold">
                                {{ \Carbon\Carbon::parse($registration->competition->start_date)->format('d M Y') }} - 
                                {{ \Carbon\Carbon::parse($registration->competition->end_date)->format('d M Y') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Lokasi</p>
                            <p class="font-semibold">{{ $registration->competition->location }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Status Pembayaran</p>
                            @if($registration->payment_status == 'paid')
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Lunas</span>
                            @else
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Belum Lunas</span>
                            @endif
                        </div>
                    </div>

                    @if($registration->competition->description)
                    <div class="mt-3">
                        <p class="text-gray-600 text-sm">Deskripsi</p>
                        <p class="text-sm">{{ Str::limit($registration->competition->description, 200) }}</p>
                    </div>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('teacher.competitions.detail', $registration->competition->id) }}" 
                           class="text-accent-color hover:underline text-sm">
                            Lihat Detail Kompetisi →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 opacity-50" width="64" height="64" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20.87 17.25l-2.71-4.68A6.9 6.9 0 0 0 19 9.25a7 7 0 0 0-14 0a6.9 6.9 0 0 0 .84 3.32l-2.71 4.68A1 1 0 0 0 4 18.75h7v1a1 1 0 0 0 2 0v-1h7a1 1 0 0 0 .87-1.5M9.5 10.25a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0" />
                </svg>
                <h3 class="text-lg font-bold mb-2">Belum Ada Riwayat Kompetisi</h3>
                <p class="text-gray-600">Siswa ini belum mendaftar kompetisi apapun.</p>
            </div>
            @endif
        </div>
    </div>
</x-teacher-dashboard-layout>
