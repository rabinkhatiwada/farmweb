@extends('admin.index')
@section('title', 'Add Slider')
@section('jumbo')
<li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
    <div class="row mb-3">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display success message if any -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subtitle">Subtitle:</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="inputTypeSwitch" name="fimg_type">
                        <label class="form-check-label" for="inputTypeSwitch" id="switchText"> Image</label>
                    </div>
                    <div class="mb-3" id="imageInput">
                        <label for="image" class="form-label">Slider Image</label>
                        <input type="file" class="form-control image-upload dropify" id="image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 hidden" id="urlInput">
                        <label for="youtube_url" class="form-label">YouTube URL</label>
                        <input type="text" class="form-control" id="youtubeurl" name="youtubeurl" placeholder="Enter YouTube URL">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="button_text">Button Text:</label>
                        <input type="text" name="button_text" id="button_text" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="button_link">Button Link:</label>
                        <input type="text" name="button_link" id="button_link" class="form-control">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
        </form>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Initialize Dropify
        $('.dropify').dropify();

        // Handle the switch change event
        $('#inputTypeSwitch').change(function() {
            if ($(this).is(':checked')) {
                $('#imageInput').addClass('hidden');
                $('#urlInput').removeClass('hidden');
                $('#switchText').text(' YouTube Link');
            } else {
                $('#imageInput').removeClass('hidden');
                $('#urlInput').addClass('hidden');
                $('#switchText').text(' Image');
            }
        });

        // Trigger change event on page load to set the initial state
        $('#inputTypeSwitch').trigger('change');
    });
</script>
@endsection
