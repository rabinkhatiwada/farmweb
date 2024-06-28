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
            <form action="{{ route('admin.gallerytype.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Gallery Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mt-1">
                        <button type="submit" class="btn btn-success mt-4">Add</button>
                    </div>
                </div>
            </form>

            <h5>Gallery Types</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleryTypes as $galleryType)
                        <tr>
                            <td>{{ $galleryType->title }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="openEditModal('{{ $galleryType->id }}', '{{ $galleryType->title }}')">Edit</button>
                                <form action="{{ route('admin.gallerytype.destroy', $galleryType->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery type?');">Delete</button>
                                </form>
                                <a href="{{ route('admin.gallery.index', ['gallery_type_id' => $galleryType->id]) }}" class="btn btn-info btn-sm">Manage</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background-color: #00715D; color: white;">
                                    <div class="modal-header" >
                                        <h5 class="modal-title" id="editModalLabel">Edit Gallery Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="editForm" action="{{ route('admin.gallerytype.update', $galleryType->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="editTitle" class="form-label">Gallery Title:</label>
                                                <input type="text" class="form-control" id="editTitle" name="title" value="{{ $galleryType->title }}">
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
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
@endsection

@section('js')
<script>
    function openEditModal(id, title) {
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        document.getElementById('editTitle').value = title;
        document.getElementById('editForm').action = "{{ route('admin.gallerytype.update', '') }}/" + id;
        modal.show();
    }
</script>
@endsection
