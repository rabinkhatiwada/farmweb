@extends('admin.index')
@section('title', 'Contact Page Settings')
<style>
    iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: auto;
            overflow-x: hidden;
        }
</style>


@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Page Settings</li>
@endsection

@section('content')

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


<div class="row">

    <div class="col-md-7">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Heading:</label>
                    <input class="form-control" type="text" name="heading" id="title" value="{{ $data->heading }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="{{ $data->phone }}">
                </div>
                <div class="col-md-6">
                    <label for="phone">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $data->email }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="address">Address:</label>
                    <input class="form-control" type="text" name="address" id="address" value="{{ $data->address }}">
                </div>
                <div class="col-md-4">
                    <label for="location">Map Location:</label>
                    <input class="form-control" type="text" name="location" id="location" value="{{ $data->location }}">
                </div>

            </div>

            <button class="btn btn-success mt-3 float-end">Save</button>
        </form>
    </div>

    <div class="col-md-5">
        <div id="map-container">
            <iframe id="gmap_canvas" width="100%" height="230" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const mapurl = "https://maps.google.com/maps?q=xxx_map&t=&z=13&ie=UTF8&iwloc=&output=embed";

        function setMap(location) {
            const mapUrlWithLocation = mapurl.replace('xxx_map', encodeURIComponent(location));
            $('#gmap_canvas').attr('src', mapUrlWithLocation);
        }

        setMap("{!! $data->location !!}");

        $('#location').on('input', function() {
            const newLocation = $(this).val();
            setMap(newLocation);
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();

        });
    });
</script>

@endsection
