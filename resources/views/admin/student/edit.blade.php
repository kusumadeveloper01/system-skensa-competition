<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.student.index') }}" class="breadcrumbs-inactive">Student</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Edit</h1>
    </div>

    <div class="box-dashboard">
        <form action="#" method="POST">
            @csrf
            @method('PUT')

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
                    <x-input id="full_name" type="text" :disabled="false" name="full_name" value="Student Name"
                        placeholder="Enter student full name..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="nis">NIS</x-label>
                    <x-input id="nis" type="text" :disabled="false" name="nis" value="123456789"
                        placeholder="Enter student NIS..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input id="email" type="email" :disabled="false" name="email" value="student@example.com"
                        placeholder="Enter student email..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="phone_number">Phone Number</x-label>
                    <x-input id="phone_number" type="text" :disabled="false" name="phone_number" value="081234567890"
                        placeholder="Enter phone number..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="class">Class</x-label>
                    <x-input id="class" type="text" :disabled="false" name="class" value="XII"
                        placeholder="Enter class..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="major">Major</x-label>
                    <x-input id="major" type="text" :disabled="false" name="major" value="RPL"
                        placeholder="Enter major..."></x-input>
                </div>

                <div class="input-group">
                    <x-label for="teacher_id">Teacher (Optional)</x-label>
                    <x-select-option name="teacher_id" id="teacher_id">
                        <option value="">No teacher (null)</option>
                        <option value="1" selected>Teacher A - 198501012010011001</option>
                        <option value="2">Teacher B - 199002152015012001</option>
                    </x-select-option>
                    <p class="text-xs text-inactive-color mt-2">Student bisa dipindahkan guru atau dikosongkan.</p>
                </div>

                <div class="input-group">
                    <x-label for="password">Password (optional)</x-label>
                    <x-input id="password" type="password" :disabled="false" name="password" value=""
                        placeholder="Leave empty if unchanged..."></x-input>
                </div>
            </div>

            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.student.index') }}" class="button-secondary" type="button">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
