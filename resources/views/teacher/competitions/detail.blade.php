<x-teacher-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('teacher.competitions') }}" class="breadcrumbs-inactive">competition</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">detail</h1>
    </div>

    <div class="box-dashboard">
        @if($competition->poster)
            <a href="{{ asset($competition->poster) }}" target="_blank" class="block mb-6">
                <img src="{{ asset($competition->poster) }}" alt="{{ $competition->name }}" class="w-full h-72 object-cover rounded-lg">
            </a>
        @endif

        <div class="input-container">
            <div class="input-group lg:col-span-2">
                <x-label for="name">Name</x-label>
                <x-input id="name" type="text" :disabled="true" name="name" value="{{ $competition->name }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="type">Type</x-label>
                <x-input id="type" type="text" :disabled="true" name="type" value="{{ $competition->competition_type->name ?? '-' }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="status">Status</x-label>
                <x-input id="status" type="text" :disabled="true" name="status" value="{{ ucfirst($competition->status) }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="registration_period">Registration Period</x-label>
                <x-input id="registration_period" type="text" :disabled="true" name="registration_period" value="{{ \Carbon\Carbon::parse($competition->registration_start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($competition->registration_end_date)->format('d M Y') }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="event_date">Event Date</x-label>
                <x-input id="event_date" type="text" :disabled="true" name="event_date" value="{{ \Carbon\Carbon::parse($competition->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($competition->end_date)->format('d M Y') }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="location">Location</x-label>
                <x-input id="location" type="text" :disabled="true" name="location" value="{{ $competition->location }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="quota">Quota</x-label>
                <x-input id="quota" type="text" :disabled="true" name="quota" value="{{ $competition->quota }}"></x-input>
            </div>

            <div class="input-group">
                <x-label for="fee">Fee</x-label>
                <x-input id="fee" type="text" :disabled="true" name="fee" value="Rp {{ number_format($competition->fee, 0, ',', '.') }}"></x-input>
            </div>

            <div class="input-group lg:col-span-2">
                <x-label for="description">Description</x-label>
                <textarea id="description" name="description" rows="6" class="input-box" disabled>{{ $competition->description }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-2">
            <div>
                <h2 class="crud-subtitle">Topic Categories</h2>
                <div class="flex flex-wrap gap-2">
                    @forelse($competition->topic_categories as $topicCategory)
                        <span class="badge">{{ $topicCategory->topic_category?->name ?? '-' }}</span>
                    @empty
                        <span class="text-inactive-color">No topic categories.</span>
                    @endforelse
                </div>
            </div>

            <div>
                <h2 class="crud-subtitle">Collaborative Partners</h2>
                <div class="flex flex-col gap-2">
                    @forelse($competition->collaborative_partners as $partner)
                        <div class="p-3 rounded-lg border border-border-color">
                            <p class="small-title">{{ $partner->collaborative_partner?->name ?? '-' }}</p>
                            <p class="text-sm text-inactive-color">Role: {{ $partner->role ?? '-' }}</p>
                            <p class="text-sm text-inactive-color">Contact: {{ $partner->collaborative_partner?->contact_person ?? '-' }}</p>
                        </div>
                    @empty
                        <span class="text-inactive-color">No collaborative partners.</span>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="flex flex-row gap-3 flex-wrap">
            <a href="{{ route('teacher.competitions') }}" class="button-secondary" type="button">Back</a>
            @if($competition->registration_link)
                <a href="{{ $competition->registration_link }}" target="_blank" class="button-primary">Open Registration Link</a>
            @endif
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">registered students</h1>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th class="thead-cell rounded-tl-xl">#</th>
                        <th class="thead-cell">Code</th>
                        <th class="thead-cell">Full Name</th>
                        <th class="thead-cell">Class</th>
                        <th class="thead-cell">Date</th>
                        <th class="thead-cell">Status</th>
                        <th class="thead-cell">Payment</th>
                        <th class="thead-cell rounded-tr-xl">Proof</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registeredStudents as $registration)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }}</td>
                            <td class="table-cell">{{ $registration->code }}</td>
                            <td class="table-cell">{{ $registration->student->full_name }}</td>
                            <td class="table-cell">{{ $registration->student->class }}</td>
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
