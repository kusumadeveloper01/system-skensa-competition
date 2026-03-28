<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.teacher.index') }} " class="breadcrumbs-inactive">Teacher</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
    </div>



    <div class="box-dashboard">
        <form action="#" method="POST" enctype="multipart/form-data">
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
                <div class="input-group">
                    <x-label for="full_name">Full Name</x-label>
                    <x-input id="full_name" type="text" :disabled="false" name="full_name" value=""
                        placeholder="Enter full name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="nip">NIP</x-label>
                    <x-input id="nip" type="text" :disabled="false" name="nip" value=""
                        placeholder="Enter NIP..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input id="email" type="email" :disabled="false" name="email" value=""
                        placeholder="Enter email..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input id="password" type="password" :disabled="false" name="password" value=""
                        placeholder="Enter password..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.teacher.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>

</x-dashboard-layout>
