<x-teacher-dashboard-layout>
    <div class="mb-6">
        <h1 class="page-title">Data Siswa</h1>
        <p class="text-gray-600 mt-2">Daftar siswa yang Anda bimbing</p>
    </div>

    @if($students->count() > 0)
    <div class="card-dashboard">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">Total: {{ $students->count() }} Siswa</h2>
            <div class="flex gap-2">
                <input type="text" id="searchInput" placeholder="Cari siswa..." 
                       class="px-4 py-2 border border-border-color rounded-lg">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full" id="studentsTable">
                <thead>
                    <tr class="border-b border-border-color">
                        <th class="text-left py-3 px-4">No</th>
                        <th class="text-left py-3 px-4">NIS</th>
                        <th class="text-left py-3 px-4">Nama Lengkap</th>
                        <th class="text-left py-3 px-4">Email</th>
                        <th class="text-left py-3 px-4">Kelas</th>
                        <th class="text-left py-3 px-4">Jurusan</th>
                        <th class="text-center py-3 px-4">Kompetisi Diikuti</th>
                        <th class="text-center py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $student)
                    <tr class="border-b border-border-color hover:bg-gray-50 student-row">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 font-mono">{{ $student->nis }}</td>
                        <td class="py-3 px-4">{{ $student->full_name }}</td>
                        <td class="py-3 px-4">{{ $student->email }}</td>
                        <td class="py-3 px-4">{{ $student->class }}</td>
                        <td class="py-3 px-4">{{ $student->major }}</td>
                        <td class="text-center py-3 px-4">
                            <span class="bg-accent-color text-white px-3 py-1 rounded-full text-sm">
                                {{ $student->competition_registration_count }} kompetisi
                            </span>
                        </td>
                        <td class="text-center py-3 px-4">
                            <a href="{{ route('teacher.students.detail', $student->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 inline-block text-sm">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="card-dashboard text-center py-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4" width="64" height="64" viewBox="0 0 24 24">
            <path fill="currentColor" opacity="0.5" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5" />
        </svg>
        <h3 class="text-xl font-bold mb-2">Belum Ada Data Siswa</h3>
        <p class="text-gray-600">Anda belum memiliki siswa yang terdaftar dalam sistem.</p>
    </div>
    @endif

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('.student-row');
            
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });
    </script>
</x-teacher-dashboard-layout>
