<x-teacher-dashboard-layout>
    <div class="mb-6">
        <a href="{{ route('teacher.competitions') }}" class="text-accent-color hover:underline mb-4 inline-block">
            ← Kembali ke Daftar Kompetisi
        </a>
        <h1 class="page-title">{{ $competition->name }}</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        <div class="lg:col-span-2 space-y-5">
            <div class="card-dashboard">
                @if($competition->poster)
                <img src="{{ asset($competition->poster) }}" alt="{{ $competition->name }}" 
                     class="w-full h-auto rounded-lg mb-4">
                @endif

                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="bg-accent-color text-white px-3 py-1 rounded-full text-sm">
                        {{ $competition->competition_type->name ?? 'Umum' }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-sm {{ 
                        $competition->status == 'active' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' 
                    }}">
                        {{ ucfirst($competition->status) }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-sm {{ 
                        \Carbon\Carbon::parse($competition->start_date)->isFuture() ? 'bg-blue-500 text-white' : 
                        (\Carbon\Carbon::parse($competition->end_date)->isPast() ? 'bg-gray-500 text-white' : 'bg-green-500 text-white') 
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

                <h2 class="text-2xl font-bold mb-4">Deskripsi</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($competition->description)) !!}
                </div>
            </div>

            <div class="card-dashboard">
                <h2 class="text-xl font-bold mb-4">
                    Siswa Anda yang Terdaftar ({{ $registeredStudents->count() }})
                </h2>

                @if($registeredStudents->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border-color">
                                <th class="text-left py-3 px-4">No</th>
                                <th class="text-left py-3 px-4">Kode</th>
                                <th class="text-left py-3 px-4">Nama Siswa</th>
                                <th class="text-left py-3 px-4">Kelas</th>
                                <th class="text-left py-3 px-4">Tanggal Daftar</th>
                                <th class="text-center py-3 px-4">Status</th>
                                <th class="text-center py-3 px-4">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registeredStudents as $index => $registration)
                            <tr class="border-b border-border-color hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 font-mono text-sm">{{ $registration->code }}</td>
                                <td class="py-3 px-4">{{ $registration->student->full_name }}</td>
                                <td class="py-3 px-4">{{ $registration->student->class }}</td>
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
                @else
                <div class="text-center py-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 opacity-50" width="48" height="48" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4" />
                    </svg>
                    <p class="text-gray-600">Belum ada siswa Anda yang terdaftar di kompetisi ini.</p>
                </div>
                @endif
            </div>
        </div>

        <div class="lg:col-span-1 space-y-5">
            <div class="card-dashboard sticky top-24">
                <h2 class="text-xl font-bold mb-4">Informasi Kompetisi</h2>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Periode Pendaftaran</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($competition->registration_start_date)->format('d M Y') }}
                        </p>
                        <p class="font-semibold">sampai</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($competition->registration_end_date)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-1">Tanggal Pelaksanaan</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($competition->start_date)->format('d M Y') }}
                        </p>
                        <p class="font-semibold">sampai</p>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($competition->end_date)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-1">Lokasi</p>
                        <p class="font-semibold">{{ $competition->location }}</p>
                    </div>

                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-1">Kuota Peserta</p>
                        <p class="font-semibold">{{ $competition->quota }} peserta</p>
                    </div>

                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-1">Biaya Pendaftaran</p>
                        <p class="font-semibold text-lg text-accent-color">
                            Rp {{ number_format($competition->fee, 0, ',', '.') }}
                        </p>
                    </div>

                    @if($competition->registration_link)
                    <div class="border-t pt-4">
                        <p class="text-sm text-gray-600 mb-2">Link Pendaftaran</p>
                        <a href="{{ $competition->registration_link }}" target="_blank"
                           class="block w-full text-center bg-accent-color text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">
                            Daftar Sekarang
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-teacher-dashboard-layout>
