@extends('admin.index')
@section('title', 'About Page Settings')



@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Service Page Settings</li>
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
    <form action="" method="POST" enctype="multipart/form-data">


        @csrf
        <div class="first-section">
            <div class="row mt-3">
                <div class="col-md-12">

                    <label for="bgimage">Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="bgimage"
                        data-default-file="{{ asset($data->bgimage) }}" accept="image/*">
                </div>


                <div class="col-md-12">
                    <div class="row mt-2">
                        <div class="col-md-4">

                            <label for="title">Sub-Heading:</label>
                            <input class="form-control" type="text" name="heading1" id="title"
                                value="{!! $data->heading1 !!}">
                        </div>
                        <div class="col-md-6">

                            <label for="title">Heading:</label>
                            <input class="form-control" type="text" name="heading2" id="title"
                                value="{!! $data->heading2 !!}">
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.blogs.index',['type'=>'service']) }}" class="btn btn-primary mt-4 btn-sm float-end">Manage Services</a>
                        </div>
                    </div>


                </div>




            </div>

        </div>



        </div>




        <button type="submit" class="btn btn-success float-end mt-2">Save</button>


    </form>
@endsection
