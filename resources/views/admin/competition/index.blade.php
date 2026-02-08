<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">competition</h1>
        <a href="{{ route('admin.competition.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
        {{-- <a href="{{ route('competition.archive') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Archive</a> --}}
    </div>

    @if (session('success'))
        <div class="bg-green-400 bg-opacity-15 border border-green-400 text-green-500 px-4 py-3 rounded mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="box-dashboard">

        <form class="flex flex-row  gap-2 items-center w-2/6" action="{{ route('admin.competition.index') }}"
            method="get">
            @csrf
            <select class="input-box" name="filter" id="">
                <option value="all">Tampilkan semua data</option>
                <option value="deleted">Terlama ke Terbaru</option>
                <option value="not-deleted">Terbaru ke Terlama</option>
            </select>
            <button class="button-primary" type="submit">Filter</button>
        </form>
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Name</th>
                    <th class="thead-cell">Event Type</th>
                    <th class="thead-cell">Date</th>
                    <th class="thead-cell">Time</th>
                    <th class="thead-cell">Link</th>
                    <th class="thead-cell">Location</th>
                    <th class="thead-cell">Quota</th>
                    <th class="thead-cell">Price</th>
                    <th class="thead-cell">Status</th>
                    <th class="thead-cell">Attendance</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($competitions) --}}
                    @foreach ($competitions as $competition)
                        <tr>
                            <td class="tbody-cell rounded-tl-xl">{{ $loop->iteration }}</td>
                            <td class="tbody-cell">{{ $competition->name }}</td>
                            <td class="tbody-cell">{{ $competition->event_type->name }}</td>
                            <td class="tbody-cell">{{ $competition->start_date }} - {{ $competition->end_date }}</td>
                            <td class="tbody-cell">{{ $competition->start_time }} - {{ $competition->end_time }}</td>
                            <td class="tbody-cell">{{ $competition->link }}</td>
                            <td class="tbody-cell">{{ $competition->location }}</td>
                            <td class="tbody-cell">{{ $competition->quota }}</td>
                            <td class="tbody-cell">{{ $competition->fee }}</td>
                            <td class="tbody-cell">{{ $competition->status }}</td>
                    @endforeach
                </tbody>

            </table>

            {{-- @if ($competitions->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif --}}

            {{-- <div class="mt-4">
                {{ $competitions->links() }}
            </div> --}}
        </div>
    </div>
</x-dashboard-layout>
