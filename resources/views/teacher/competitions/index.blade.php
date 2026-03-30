<x-teacher-dashboard-layout>
    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">competition</h1>
    </div>

    <div class="box-dashboard">
        <div class="flex flex-col lg:flex-row gap-2 items-start lg:items-center lg:w-2/6">
            <input id="searchInput" type="text" class="input-box" placeholder="Cari kompetisi...">
        </div>

        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <tr>
                        <th class="thead-cell rounded-tl-xl">#</th>
                        <th class="thead-cell">Name</th>
                        <th class="thead-cell">Type</th>
                        <th class="thead-cell">Registration</th>
                        <th class="thead-cell">Event Date</th>
                        <th class="thead-cell">Location</th>
                        <th class="thead-cell">Quota</th>
                        <th class="thead-cell">Fee</th>
                        <th class="thead-cell">Status</th>
                        <th class="thead-cell rounded-tr-xl">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($competitions as $competition)
                        <tr class="competition-row">
                            <td class="table-cell">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $competition->name }}</td>
                            <td class="table-cell">{{ $competition->competition_type->name ?? '-' }}</td>
                            <td class="table-cell">
                                {{ \Carbon\Carbon::parse($competition->registration_start_date)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($competition->registration_end_date)->format('d M Y') }}
                            </td>
                            <td class="table-cell">
                                {{ \Carbon\Carbon::parse($competition->start_date)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($competition->end_date)->format('d M Y') }}
                            </td>
                            <td class="table-cell">{{ $competition->location }}</td>
                            <td class="table-cell">{{ $competition->quota }}</td>
                            <td class="table-cell">Rp {{ number_format($competition->fee, 0, ',', '.') }}</td>
                            <td class="table-cell">
                                @if(\Carbon\Carbon::parse($competition->start_date)->isFuture())
                                    <span class="text-blue-500">Upcoming</span>
                                @elseif(\Carbon\Carbon::parse($competition->end_date)->isPast())
                                    <span class="text-inactive-color">Finished</span>
                                @else
                                    <span class="text-green-500">Ongoing</span>
                                @endif
                            </td>
                            <td class="table-cell">
                                <a href="{{ route('teacher.competitions.detail', $competition->id) }}" class="text-accent-color">
                                    <i class="text-base ri-eye-line"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="table-cell text-center" colspan="10">Looks like there's nothing here yet.</td>
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
                const rows = document.querySelectorAll('.competition-row');

                rows.forEach((row) => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchValue) ? '' : 'none';
                });
            });
        }
    </script>
</x-teacher-dashboard-layout>
