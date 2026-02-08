<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.competition.index') }} " class="breadcrumbs-inactive">competition</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
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

        <form action="{{ route('admin.competition.store') }}" method="POST" enctype="multipart/form-data">
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
            <div id="tab-content-1" class="input-container">
                <div class="input-group lg:col-span-2">
                    <x-label for="name">Competition Name</x-label>
                    <x-input id="name" type="text" :disabled="false" name="name" value=""
                        placeholder="Enter competition name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="quota">quota</x-label>
                    <x-input id="quota" type="number" :disabled="false" name="quota" value=""
                        placeholder="Enter competition quota..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="fee">fee</x-label>
                    <x-input id="fee" type="number" :disabled="false" name="fee" value=""
                        placeholder="Enter competition fee..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="type">Competition Type</x-label>
                    <x-select-option id="type" name="competition_type_id">
                        @foreach ($competition_types as $competition_type)
                            <option value="{{ $competition_type->id }}">{{ $competition_type->name }}</option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option value="not started">Not Started</option>
                        <option value="in progress">In Progress</option>
                        <option value="finished">Finished</option>

                    </x-select-option>
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="description">Description</x-label>
                    <textarea class="ckeditor input-box" name="description" id="description" placeholder="Enter competition description"
                        cols="30" rows="10"></textarea>
                    {{-- <textarea name="editor"></textarea> --}}

                    {{-- <textarea class="ckeditor form-control" name="description"></textarea> --}}
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="agenda">Agenda</x-label>
                    <textarea class="ckeditor form-control" name="agenda" id="agenda" placeholder="Enter competition agenda"
                        cols="30" rows="10"></textarea>
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="poster">Competition poster</x-label>
                    <x-input id="poster" type="file" :disabled="false" :required="false" name="poster"
                        onchange="previewImage(competition)" value=""
                        placeholder="Enter competition poster..."></x-input>
                    <img src="" alt="" id="imagePreview"
                        class="w-full h-64 object-cover rounded-sm p-1 hidden">
                </div>

            </div>
            <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="start_date">start date</x-label>
                    <x-input id="start_date" type="date" :disabled="false" name="start_date" value=""
                        placeholder="Enter competition start date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_date">end date</x-label>
                    <x-input id="end_date" type="date" :disabled="false" name="end_date" value=""
                        placeholder="Enter competition end date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="start_time">start time</x-label>
                    <x-input id="start_time" type="time" :disabled="false" name="start_time" value=""
                        placeholder="Enter competition start time..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_time">end time</x-label>
                    <x-input id="end_time" type="time" :disabled="false" name="end_time" value=""
                        placeholder="Enter competition end time..."></x-input>
                </div>
            </div>
            <div id="tab-content-3" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="link">link</x-label>
                    <x-input id="link" type="text" :disabled="false" name="link" value=""
                        placeholder="Enter competition link..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="location">location</x-label>
                    <x-input id="location" type="text" :disabled="false" name="location" value=""
                        placeholder="Enter competition location..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.competition.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>


    <script>
        // Initialize CKEditor
        // ClassicEditor
        //     .create(document.querySelector('textarea'))
        //     .then(editor => {
        //         console.log('Editor was initialized', editor);
        //     })
        //     .catch(error => {
        //         console.error('Error during initialization of the editor', error);
        //     });

        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>

    <script>
        function previewImage(competition) {
            var input = admin.competition.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

</x-dashboard-layout>
