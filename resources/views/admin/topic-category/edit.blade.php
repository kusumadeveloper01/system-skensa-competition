<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.topic-category.index') }} " class="breadcrumbs-inactive">Topic Category</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Edit</h1>
    </div>

    <div class="box-dashboard">
        <form action="{{ route('admin.topic-category.update', $competitionType->id) }}" method="POST"
            enctype="multipart/form-data">
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
                    <x-label for="name">Name</x-label>
                    <x-input id="name" type="text" :disabled="false" name="name"
                        value="{{ $competitionType->name }}" placeholder="Enter competition name..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.topic-category.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>

</x-dashboard-layout>
