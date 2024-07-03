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
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image" class="form-label">Gallery Type Image</label>
                            <input type="file" class="form-control image-upload dropify" id="image" name="image" accept="image/*">
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
                                    <img src="{{ asset('gallery_types/' . $galleryType->image) }}" alt="{{ $galleryType->title }}" width="100">
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="openEditModal('{{ $galleryType->id }}', '{{ $galleryType->title }}', '{{ $galleryType->image }}')">Edit</button>
                                <form action="{{ route('admin.gallerytype.destroy', $galleryType->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery type?');">Delete</button>
                                </form>
                                <a href="{{ route('admin.gallery.index', ['gallery_type_id' => $galleryType->id]) }}" class="btn btn-info btn-sm">Manage</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #00715D; color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Gallery Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" action="{{ route('admin.gallerytype.update', 0) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editTitle" class="form-label">Gallery Title:</label>
                            <input type="text" class="form-control" id="editTitle" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="editImage" class="form-label">Gallery Type Image</label>
                            <input type="file" class="form-control image-upload dropify" id="editImage" name="image" accept="image/*" data-default-file="{{ asset('gallery_types/' . $galleryType->image) }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function openEditModal(id, title, image) {
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        document.getElementById('editTitle').value = title;
        document.getElementById('editForm').action = "{{ route('admin.gallerytype.update', '') }}/" + id;
        var imageInput = document.getElementById('editImage');
        if (image) {
            imageInput.setAttribute('data-default-file', "{{ asset('') }}" + image);
        } else {
            imageInput.removeAttribute('data-default-file');
        }
        modal.show();
    }
</script>
@endsection
