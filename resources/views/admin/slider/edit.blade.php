@extends('admin.index')
@section('title', 'Edit Slider')
@section('jumbo')
<li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
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

        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subtitle">Subtitle:</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $slider->subtitle }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control-file dropify" accept="image/*" data-default-file="{{ asset('slider_images/' . $slider->image) }}">
                        
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="button_text">Button Text:</label>
                        <input type="text" name="button_text" id="button_text" class="form-control" value="{{ $slider->button_text }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="button_link">Button Link:</label>
                        <input type="text" name="button_link" id="button_link" class="form-control" value="{{ $slider->button_link }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success float-end mt-2">Update</button>
        </form>
    </div>
@endsection
