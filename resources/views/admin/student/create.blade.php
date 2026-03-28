<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.student.index') }}" class="breadcrumbs-inactive">Student</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
    </div>

    <div class="box-dashboard">
        <form action="#" method="POST">
            @csrf

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
                <div class="input-group lg:col-span-2">
                    <x-label for="full_name">Full Name</x-label>
                    <x-input id="full_name" type="text" :disabled="false" name="full_name" value=""
                        placeholder="Enter student full name..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="nis">NIS</x-label>
                    <x-input id="nis" type="text" :disabled="false" name="nis" value=""
                        placeholder="Enter student NIS..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input id="email" type="email" :disabled="false" name="email" value=""
                        placeholder="Enter student email..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="phone_number">Phone Number</x-label>
                    <x-input id="phone_number" type="text" :disabled="false" name="phone_number" value=""
                        placeholder="Enter phone number..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="class">Class</x-label>
                    <x-input id="class" type="text" :disabled="false" name="class" value=""
                        placeholder="Enter class..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="major">Major</x-label>
                    <x-input id="major" type="text" :disabled="false" name="major" value=""
                        placeholder="Enter major..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="teacher_id">Teacher (Optional)</x-label>
                    <x-select-option name="teacher_id" id="teacher_id">
                        <option value="">Select teacher...</option>
                        <option value="">Teacher A - 198501012010011001</option>
                        <option value="">Teacher B - 199002152015012001</option>
                    </x-select-option>
                </div>

                <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input id="password" type="password" :disabled="false" name="password" value=""
                        placeholder="Enter password..."></x-input>
                </div>
            </div>

            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.student.index') }}" class="button-secondary" type="button">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
