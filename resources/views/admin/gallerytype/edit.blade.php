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
            <h5>Create Edit Gallery Type</h5>
            <form id="editForm" action="{{ route('admin.gallerytype.edit', ['galleryType' => $galleryType->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title" class="form-label">Gallery Title:</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{$galleryType->title}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image" class="form-label">Gallery Type Image</label>
                            {{-- <input type="file" class="form-control image-upload dropify" id="image" name="image"
                                accept="image/*" > --}}
                                <input type="file" class="form-control image-upload dropify"  name="image"
                                accept="image/*" data-default-file="{{ asset('gallery_types/' . $galleryType->image) }}">
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <button type="submit" class="btn btn-success mt-4">Edit</button>
                    </div>
                </div>
            </form>











            
            
        </div>
    </div>


   
@endsection
