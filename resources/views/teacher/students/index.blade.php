<x-teacher-dashboard-layout>
    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">student</h1>
    </div>

    <div class="box-dashboard">
        <div class="flex flex-col lg:flex-row gap-2 items-start lg:items-center lg:w-2/6">
            <input id="searchInput" type="text" class="input-box" placeholder="Cari siswa...">
        </div>

        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <tr>
                        <th class="thead-cell rounded-tl-xl">#</th>
                        <th class="thead-cell">NIS</th>
                        <th class="thead-cell">Full Name</th>
                        <th class="thead-cell">Email</th>
                        <th class="thead-cell">Class</th>
                        <th class="thead-cell">Major</th>
                        <th class="thead-cell">Competition</th>
                        <th class="thead-cell rounded-tr-xl">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr class="student-row">
                            <td class="table-cell">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $student->nis }}</td>
                            <td class="table-cell">{{ $student->full_name }}</td>
                            <td class="table-cell">{{ $student->email }}</td>
                            <td class="table-cell">{{ $student->class }}</td>
                            <td class="table-cell">{{ $student->major }}</td>
                            <td class="table-cell">{{ $student->competition_registration_count }} Kompetisi</td>
                            <td class="table-cell">
                                <a href="{{ route('teacher.students.detail', $student->id) }}" class="text-accent-color">
                                    <i class="text-base ri-eye-line"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="table-cell text-center" colspan="8">Looks like there's nothing here yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');

        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchValue = this.value.toLowerCase();
                const rows = document.querySelectorAll('.student-row');

                rows.forEach((row) => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchValue) ? '' : 'none';
                });
            });
        }
    </script>
</x-teacher-dashboard-layout>
