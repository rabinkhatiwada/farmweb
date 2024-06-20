@extends('admin.index')
@section('title', 'Edit Blog')

@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index', ['type' => $type]) }}">{{ $blogType[0] }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

        <h5>Edit {{ $blogType[1] }}</h5>
        <form action="{{ route('admin.blogs.update', ['blog' => $blog->id, 'type' => $type]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                @if ($blogType[5]) <!-- Check if blogType has feature image -->
                    <div class="col-md-3 mt-1">
                        <div class="row mb-3 align-items-center">
                            <div class="col-9">
                                <h6>Choose Feature Image Type:</h6>
                            </div>
                            <div class="col-3 text-right">
                                <input type="checkbox" id="inputTypeSwitch">
                                <label for="inputTypeSwitch" id="switchText"> Image</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12" id="imageInput">
                                <input type="file" class="image-upload dropify" id="image" name="image" accept="image/*" data-default-file="{{ asset('blog_images/' . $blog->image1) }}">
                            </div>
                            <div class="col-12 hidden" id="urlInput">
                                <input type="text" class="form-control" id="imageUrl" name="y_url" placeholder="Enter YouTube URL">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-9">
                    <div>
                        <label for="title" class="form-label">{{ $blogType[1] }} Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                    </div>
                    @if ($blogType[2]) <!-- Check if blogType has short description -->
                        <div>
                            <label for="sdesc" class="form-label">{{ $blogType[1] }} Short Description</label>
                            <textarea class="form-control" id="sdesc" name="sdesc" rows="">{{ $blog->sdesc }}</textarea>
                        </div>
                    @endif
                    @if ($blogType[3]) <!-- Check if blogType has content -->
                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="summernote" name="content" rows="">{{ $blog->content }}</textarea>
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($blogType[4] as $input)
                            @if ($input[0] == 'file')
                                <div class="col-md-{{ $input[2] }}">
                                    <label for="{{ $input[1] }}">{{ $input[3] }}</label>
                                    <input type="{{ $input[0] }}" name="{{ $input[1] }}" id="{{ $input[1] }}" class="form-control dropify">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Update</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
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

        // Initialize Dropify for image upload
        $('.dropify').dropify();
    });
</script>
@endsection
