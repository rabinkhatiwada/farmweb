@extends('admin.index')
@section('title', 'Add Gallery Item')

@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{ route('admin.gallerytype.index') }}">Gallery</a>
    </li>
    / <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
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

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h5>Add New Image/Video for {{ $galleryType->title }}</h5>
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="gallery_type_id" value="{{ $galleryType->id }}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="inputTypeSwitch" name="fimg_type">
                            <label class="form-check-label" for="inputTypeSwitch" id="switchText"> Image</label>
                        </div>
                    </div>
                    <div class="mb-3" id="imageInput">
                        <label for="image" class="form-label">Gallery Image</label>
                        <input type="file" class="form-control image-upload dropify" id="image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 hidden" id="urlInput">
                        <label for="youtube_url" class="form-label">YouTube URL</label>
                        <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="Enter YouTube URL">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Submit</button>
        </form>
    </div>
</div>
<div class="row mb-3">
    @foreach ($galleryItems as $item)
        <div class="col-md-3">
            <div style="position: relative; height: 0; padding-bottom: 56.25%; overflow: hidden;" class="embed-responsive embed-responsive-16by9">
                @if ($item->youtube_url)
                    @php
                        // Extract video ID from YouTube watch URL
                        $videoId = '';
                        parse_str(parse_url($item->youtube_url, PHP_URL_QUERY), $params);
                        if (isset($params['v'])) {
                            $videoId = $params['v'];
                        }
                    @endphp
                    <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;" src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                @elseif ($item->image)
                    <img style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="card-img-top">
                @endif
                <form action="{{ route('admin.gallery.destroy', ['id' => $item->id]) }}" method="POST" style="position: absolute; top: 5px; right: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
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
