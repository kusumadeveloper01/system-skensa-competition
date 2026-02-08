<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('admin.competition.index') }} " class="breadcrumbs-inactive">competition</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">View</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive">
                        Time</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(3)" id="tab-button-3" class="tab tab-inactive">
                        Link</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>
        @if ($errors->any())
            <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a] mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="tab-content-1" class="input-container">
            <div class="input-group lg:col-span-2">
                <x-label for="name">Event Name</x-label>
                <x-input id="name" type="text" readonly :disabled="false" name="name"
                    value="{{ old('name', $competition->name) }}" placeholder="Enter competition name..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="quota">quota</x-label>
                <x-input id="quota" type="number" readonly :disabled="false" name="quota"
                    value="{{ old('quota', $competition->quota) }}" placeholder="Enter competition quota..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="price">price</x-label>
                <x-input id="price" type="number" readonly :disabled="false" name="price"
                    value="{{ old('price', $competition->price) }}" placeholder="Enter competition price..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="type">Event Type</x-label>
                <x-select-option :disabled="true" id="type" name="competition_type_id">
                    @foreach ($competition_types as $competition_type)
                        <option @if ($competition_type->id === $competition->competition_type->id) selected @endif value="{{ $competition_type->id }}">
                            {{ $competition_type->name }}</option>
                    @endforeach
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="status">Status</x-label>
                <x-select-option :disabled="true" id="status" name="status">
                    <option @if ($competition->status === 'not started') selected @endif value="not started">Not Started
                    </option>
                    <option @if ($competition->status === 'in progress') selected @endif value="in progress">In Progress
                    </option>
                    <option @if ($competition->status === 'finished') selected @endif value="finished">Finished</option>

                </x-select-option>
            </div>
            <div class="input-group lg:col-span-2">
                <x-label for="description">Description</x-label>
                <textarea readonly class="ckeditor" name="description" id="description" placeholder="Enter competition description"
                    cols="30" rows="10">{{ old('description', $competition->description) }}</textarea>
                {{-- <textarea name="editor"></textarea> --}}

                {{-- <textarea class="ckeditor form-control" name="description"></textarea> --}}
            </div>
            <div class="input-group lg:col-span-2">
                <x-label for="agenda">Agenda</x-label>
                <textarea readonly class="ckeditor form-control" name="agenda" id="agenda" placeholder="Enter competition agenda"
                    cols="30" rows="10">{{ old('agenda', $competition->agenda) }}</textarea>
            </div>
            <div class="input-group lg:col-span-2">
                <x-label for="poster">Event poster</x-label>
                <x-input id="poster" type="file" :disabled="true" :required="false" name="poster"
                    onchange="previewImage(competition)" value=""
                    placeholder="Enter competition poster..."></x-input>
                @if ($competition->poster !== '-')
                    <a target="_blank" href="{{ asset($competition->poster) }}" class="w-full">
                        <img id="imagePreview" src="{{ asset($competition->poster) }}"
                            class="w-full h-64 object-cover rounded-sm p-1" alt="">
                    </a>
                @endif
                {{-- <img src="" alt="" id="imagePreview"
                        class="w-full h-64 object-cover rounded-sm p-1 hidden"> --}}
            </div>

        </div>
        <div id="tab-content-2" class="input-container !hidden">
            <div class="input-group">
                <x-label for="start_date">start date</x-label>
                <x-input id="start_date" type="date" readonly :disabled="false" name="start_date"
                    value="{{ old('start_date', $competition->start_date) }}"
                    placeholder="Enter competition start date..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="end_date">end date</x-label>
                <x-input id="end_date" type="date" readonly :disabled="false" name="end_date"
                    value="{{ old('end_date', $competition->end_date) }}"
                    placeholder="Enter competition end date..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="start_time">start time</x-label>
                <x-input id="start_time" type="time" readonly :disabled="false" name="start_time"
                    value="{{ old('start_time', $competition->start_time) }}"
                    placeholder="Enter competition start time..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="end_time">end time</x-label>
                <x-input id="end_time" type="time" readonly :disabled="false" name="end_time"
                    value="{{ old('end_time', $competition->end_time) }}"
                    placeholder="Enter competition end time..."></x-input>
            </div>
        </div>
        <div id="tab-content-3" class="input-container !hidden">
            <div class="input-group">
                <x-label for="link">link</x-label>
                <x-input id="link" type="text" readonly :disabled="false" name="link"
                    value="{{ old('link', $competition->link) }}" placeholder="Enter competition link..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="location">location</x-label>
                <x-input id="location" type="text" readonly :disabled="false" name="location"
                    value="{{ old('location', $competition->name) }}"
                    placeholder="Enter competition location..."></x-input>
            </div>
        </div>
        <div class="flex flex-row gap-3">
            <a href="{{ route('admin.competition.index') }}" class="button-secondary" type="submit">Back</a>
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Event Category</h1>

    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto ">
            <table>
                <thead>
                    {{-- <th class="thead-cell rounded-tl-xl w-10">#</th> --}}
                    <th class="thead-cell rounded-t-xl">Category</th>
                    {{-- <th class="thead-cell rounded-tr-xl">Action</th> --}}
                </thead>
                <tbody>
                    {{-- @dd($competition_competition_categories) --}}
                    <tr>
                        {{-- <td class="table-cell w-10">{{ $loop->iteration }} </td> --}}
                        <td class="table-cell">
                            @foreach ($competition_competition_categories as $competition_competition_category)
                                <span
                                    class="badge">{{ $competition_competition_category->competition_category->name }}</span>
                            @endforeach
                        </td>

                    </tr>
                </tbody>
            </table>

            @if ($competition_competition_categories->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Topic Category</h1>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto ">
            <table>
                <thead>
                    {{-- <th class="thead-cell rounded-tl-xl w-10">#</th> --}}
                    <th class="thead-cell rounded-t-xl">Topic</th>
                </thead>
                <tbody>
                    {{-- @dd($competition_competition_categories) --}}
                    <tr>
                        <td class="table-cell">
                            @foreach ($competition_topic_categories as $competition_topic_category)
                                <span class="badge">{{ $competition_topic_category->topic_category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>

            @if ($competition_topic_categories->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
