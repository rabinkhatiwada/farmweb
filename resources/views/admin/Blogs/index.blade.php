@extends('admin.index')
@section('title', 'Add Blog')
@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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

            <h5>Create New Blog</h5>
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4 mt-1">

                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="file" class="image-upload dropify" id="image" name="image1"
                            accept="image/*">
                            </div>
                            <!--<div class="col-6">
                                <input type="file" class="image-upload dropify" id="image" name="image2"
                            accept="image/*">
                            </div>-->

                         </div>
                         <!-- Social Media Links -->
                        <div class="row mb-3">
                            <label class="form-label">Social Media Links</label>
                                <div class="input-group mt-1">
                                    <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook_url" placeholder="Facebook URL">
                                </div>
                                <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram_url" placeholder="Instagram URL">
                                </div>
                                <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                    <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn URL">
                                </div>
                                <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL">
                                </div>

                        </div>
                    </div>


                    <div class="col-md-8">
                        <div>
                            <label for="title" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                        </div>
                        <div>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="summernote" name="content" rows="">{{ old('content') }}</textarea>
                        </div>
                    </div>


                </div>


                <button type="submit" class="btn btn-success float-end">Submit</button>
            </form>
        </div>
    </div>


    <!-- List of Posts -->
    <hr>
    <div class="row mb-3">
        <div class="col-md-12">
            <h3>Blog Lists</h3>
            <ul class="list-group">
                @foreach ($blogs as $blog)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Column for the image -->
                            <div style="width: 250px; height: 120px; overflow: hidden;">
                                @if ($blog->image1)
                                <img src="{{ asset('blog_images/' . $blog->image1) }}" alt="{{ $blog->title }}" style="width: 100%; object-fit: cover;">
                                @else
                                No Image
                                @endif
                            </div>

                        </div>
                        <div class="col-md-7">
                            <h4 style="color: white;"><strong>{{ $blog->title }}</strong></h4>
                            <p>{!! implode(' ', array_slice(str_word_count($blog->content, 1), 0, 40)) !!}...</p>
                        </div>
                        <div class="col-md-2">
                            <!-- Column for the action buttons -->
                            <div class="float-right">
                                <a href="{{ route('admin.blogs.edit', ['blog' => $blog->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.blogs.delete', ['blog' => $blog->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete();">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>


                </li>
                @endforeach
            </ul>
        </div>
    </div>




</div>
@endsection
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write here...',
            tabsize: 2,
            height: 300 // Adjust the height as needed (in pixels)
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.dropify').dropify({
    messages: {
        'default': 'Upload Image',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
    });
    });
</script>
