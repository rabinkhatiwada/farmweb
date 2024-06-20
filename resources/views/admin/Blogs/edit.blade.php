@extends('admin.index')
@section('title', 'Edit Blog')

@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
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

        <!-- Display success message if any -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h3>Edit Blog</h3>
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $blog->title }}">
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="summernote" name="content" rows="5">{{ $blog->content }}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control image-upload dropify" id="image" name="image"
                        accept="image/*" data-default-file="{{ asset('blog_images/' . $blog->image1) }}">
                </div>
            </div>
            <!-- Social Media Links -->
            <div class="row mb-3">
                <label class="form-label">Social Media Links</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                        <input type="text" class="form-control" name="facebook_url" placeholder="Facebook URL"  value="{{ $blog->facebook_url }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram_url" placeholder="Instagram URL" value="{{ $blog->instagram_url }}">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn URL" value="{{ $blog->linkedin_url }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL" value="{{ $blog->twitter_url }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Update</button>
        </form>
    </div>
</div>


@endsection
