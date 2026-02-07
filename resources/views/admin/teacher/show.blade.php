<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.competition-type.index') }} " class="breadcrumbs-inactive">Competition Type</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Show</h1>
    </div>

    <div class="box-dashboard">
        <form action="{{ route('admin.competition-type.update', $competitionType->id) }}" method="POST"
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
                <div class="input-group lg:col-span-2">
                    <x-label for="name">Name</x-label>
                    <x-input id="name" type="text" :disabled="true" name="name"
                        value="{{ $competitionType->name }}" placeholder="Enter competition name..."></x-input>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.competition-type.index') }}" class="button-secondary" type="submit">Cancel</a>
            </div>
        </form>
    </div>

</x-dashboard-layout>
