@extends('admin.index')
@section('title', 'Edit ' . $blogType[1])

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
                @if ($type == 'blog')
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="inputTypeSwitch" class="form-label">Choose Feature Image Type:</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="inputTypeSwitch" name="fimg_type" {{ $blog->fimg_type ? 'checked' : '' }}>
                                <label class="form-check-label" for="inputTypeSwitch" id="switchText">{{ $blog->fimg_type ? ' YouTube Link' : ' Image' }}</label>
                            </div>
                        </div>
                        <div class="mb-3" id="imageInput" style="{{ $blog->fimg_type ? 'display:none;' : '' }}">
                            <label for="image" class="form-label">{{ $blogType[1] }} Image</label>
                            <input type="file" class="form-control image-upload dropify" id="image" name="image1" accept="image/*" data-default-file="{{ asset('blog_images/' . $blog->image1) }}">
                        </div>
                        <div class="mb-3" id="urlInput" style="{{ $blog->fimg_type ? '' : 'display:none;' }}">
                            <label for="y_url" class="form-label">YouTube URL</label>
                            <input type="text" class="form-control" id="y_url" name="y_url" value="{{ $blog->y_url }}">
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">{{ $blogType[1] }} Image</label>
                            <input type="file" class="form-control image-upload dropify" id="image" name="image1" accept="image/*" data-default-file="{{ asset('blog_images/' . $blog->image1) }}">
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div>
                        <label for="title" class="form-label">{{ $blogType[1] }} Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                    </div>
                </div>
            </div>
            @if ($blogType[2])
                <div class="mb-3">
                    <label for="sdesc" class="form-label">{{ $blogType[1] }} Short Description</label>
                    <textarea class="form-control" id="sdesc" name="sdesc" rows="">{{ $blog->sdesc }}</textarea>
                </div>
            @endif
            @if ($blogType[3])
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="summernote" name="content" rows="">{{ $blog->content }}</textarea>
                </div>
            @endif
            @if (in_array($type, ['blog', 'team']))
                <!-- Social Media Links -->
                <div class="row mb-3">
                    <label class="form-label">Social Media Links</label>
                    <div class="input-group mt-1">
                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                        <input type="text" class="form-control" name="facebook_url" placeholder="Facebook URL" value="{{ $blog->facebook_url }}">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram_url" placeholder="Instagram URL" value="{{ $blog->instagram_url }}">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn URL" value="{{ $blog->linkedin_url }}">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL" value="{{ $blog->twitter_url }}">
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn-success float-end">Update</button>
        </form>
    </div>
</div>
@endsection

@section('js')
@if ($type == 'blog')
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
        });
    </script>
@endif
@endsection
