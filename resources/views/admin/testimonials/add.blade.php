@extends('admin.index')
@section('title', 'Add Testimonial')
@section('jumbo')
<li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>

    / <li class="breadcrumb-item active" aria-current="page">Add</li>
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


        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control-file dropify"
                            accept="image/*">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea name="content" id="summernote" class="form-control"></textarea>
                        <div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success float-end mt-2">Submit</button>
        </form>
    </div>




@endsection
