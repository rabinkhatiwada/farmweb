@extends('admin.index')
@section('title', 'Gallery Types')

@section('jumbo')
    <li class="breadcrumb-item active" aria-current="page">Gallery Types</li>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h5>Create New Gallery Type</h5>
            <form action="{{ route('admin.gallerytype.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title" class="form-label">Gallery Title:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image" class="form-label">Gallery Type Image</label>
                            <input type="file" class="form-control image-upload dropify" id="image" name="image"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <button type="submit" class="btn btn-success mt-4">Add</button>
                    </div>
                </div>
            </form>

            <h5>Gallery Types</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleryTypes as $galleryType)
                        <tr>
                            <td>{{ $galleryType->title }}</td>
                            <td>
                                @if ($galleryType->image)
                                    <img src="{{ asset('gallery_types/' . $galleryType->image) }}"
                                        alt="{{ $galleryType->title }}" width="100">
                                @endif
                            </td>
                            <td>
                               
                               
                                <a href="{{ route('admin.gallerytype.edit', ['galleryType' => $galleryType->id]) }}"
                                    class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.gallerytype.destroy', $galleryType->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this gallery type?');">Delete</button>
                                </form>
                                <a href="{{ route('admin.gallery.index', ['gallery_type_id' => $galleryType->id]) }}"
                                    class="btn btn-info btn-sm">Manage</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
