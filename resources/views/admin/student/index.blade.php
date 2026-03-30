<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">Student</h1>
        <a href="{{ route('admin.student.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
    </div>

    @if (session('success'))
        <div class="bg-green-400 bg-opacity-15 border border-green-400 text-green-500 px-4 py-3 rounded mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="box-dashboard">
        <form class="flex flex-row gap-2 items-center w-2/6" action="{{ route('admin.student.index') }}" method="get">
            @csrf
            <select class="input-box" name="filter" id="">
                <option value="earliest">Earliest</option>
                <option value="latest">Latest</option>
            </select>
            <button class="button-primary" type="submit">Filter</button>
        </form>

        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Full Name</th>
                    <th class="thead-cell">NIS</th>
                    <th class="thead-cell">Email</th>
                    <th class="thead-cell">Phone Number</th>
                    <th class="thead-cell">Class</th>
                    <th class="thead-cell">Major</th>
                    <th class="thead-cell">Teacher</th>
                    <th class="thead-cell">Registrations</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @forelse ($data as $item)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $item->full_name }}</td>
                            <td class="table-cell">{{ $item->nis }}</td>
                            <td class="table-cell">{{ $item->email }}</td>
                            <td class="table-cell">{{ $item->phone_number }}</td>
                            <td class="table-cell">{{ $item->class }}</td>
                            <td class="table-cell">{{ $item->major }}</td>
                            <td class="table-cell">{{ $item->teacher?->full_name ?? '-' }}</td>
                            <td class="table-cell">{{ $item->competition_registration_count ?? 0 }}</td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500" href="{{ route('admin.student.show', $item->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500" href="{{ route('admin.student.edit', $item->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form action="{{ route('admin.student.destroy', $item->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="text-base ri-delete-bin-line text-red-500"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="table-cell text-center" colspan="10">Looks like there's nothing here yet.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>

            {{-- @if ($data->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif --}}

            {{-- <div class="mt-4">
                {{ $data->links() }}
            </div> --}}

        </div>
    </div>
</x-dashboard-layout>
