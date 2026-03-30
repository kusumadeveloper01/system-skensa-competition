<x-teacher-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('teacher.students') }}" class="breadcrumbs-inactive">student</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">detail</h1>
    </div>

    <div class="box-dashboard">
        <div class="input-container">
            <div class="input-group lg:col-span-2">
                <x-label for="full_name">Full Name</x-label>
                <x-input id="full_name" type="text" :disabled="true" name="full_name" value="{{ $student->full_name }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="nis">NIS</x-label>
                <x-input id="nis" type="text" :disabled="true" name="nis" value="{{ $student->nis }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" :disabled="true" name="email" value="{{ $student->email }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="phone_number">Phone Number</x-label>
                <x-input id="phone_number" type="text" :disabled="true" name="phone_number" value="{{ $student->phone_number }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="class">Class</x-label>
                <x-input id="class" type="text" :disabled="true" name="class" value="{{ $student->class }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="major">Major</x-label>
                <x-input id="major" type="text" :disabled="true" name="major" value="{{ $student->major }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="total_competitions">Total Competition</x-label>
                <x-input id="total_competitions" type="text" :disabled="true" name="total_competitions" value="{{ $student->competition_registration->count() }}"></x-input>
            </div>
        </div>

        <div>
            <a href="{{ route('teacher.students') }}" class="button-secondary" type="button">Back</a>
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">competition history</h1>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th class="thead-cell rounded-tl-xl">#</th>
                        <th class="thead-cell">Code</th>
                        <th class="thead-cell">Competition</th>
                        <th class="thead-cell">Date</th>
                        <th class="thead-cell">Status</th>
                        <th class="thead-cell">Payment</th>
                        <th class="thead-cell">Proof</th>
                        <th class="thead-cell rounded-tr-xl">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($student->competition_registration as $registration)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $registration->code }}</td>
                            <td class="table-cell">{{ $registration->competition->name }}</td>
                            <td class="table-cell">{{ \Carbon\Carbon::parse($registration->date)->format('d M Y') }}</td>
                            <td class="table-cell">
                                @if($registration->status === 'approved')
                                    <span class="text-green-500">Approved</span>
                                @elseif($registration->status === 'pending')
                                    <span class="text-yellow-500">Pending</span>
                                @else
                                    <span class="text-red-500">Rejected</span>
                                @endif
                            </td>
                            <td class="table-cell">
                                @if($registration->payment_status === 'paid')
                                    <span class="text-green-500">Paid</span>
                                @else
                                    <span class="text-red-500">Unpaid</span>
                                @endif
                            </td>
                            <td class="table-cell">
                                @if($registration->payment_proof)
                                    <a href="{{ asset($registration->payment_proof) }}" target="_blank" class="text-accent-color">View</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="table-cell">
                                <a href="{{ route('teacher.competitions.detail', $registration->competition->id) }}" class="text-accent-color">
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
</x-teacher-dashboard-layout>
