<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.teacher.index') }} " class="breadcrumbs-inactive">Teacher</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Show</h1>
    </div>

    <div class="box-dashboard">
        <form action="#" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

            @if ($errors->any())
                <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a] mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>Error: {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-container">
                <div class="input-group">
                    <x-label for="full_name">Full Name</x-label>
                    <x-input id="full_name" type="text" :disabled="true" name="full_name" value="Teacher Name"
                        placeholder="Enter full name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="nip">NIP</x-label>
                    <x-input id="nip" type="text" :disabled="true" name="nip" value="198501012010011001"
                        placeholder="Enter NIP..."></x-input>
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="email">Email</x-label>
                    <x-input id="email" type="email" :disabled="true" name="email" value="teacher@example.com"
                        placeholder="Enter email..."></x-input>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.teacher.index') }}" class="button-secondary" type="submit">Cancel</a>
            </div>
        </form>
    </div>

</x-dashboard-layout>
