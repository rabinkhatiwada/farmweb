@extends('admin.index')
@section('title', 'About Page Settings')



@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">About Page Settings</li>
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

                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="col-md-12">

                            <label for="title">About Heading:</label>
                            <input class="form-control" type="text" name="heading1" id="title"
                                value="{!! $data->heading1 !!}">
                        </div>
                        <div class="col-md-12">

                            <label for="title">About Description:</label>
                            <textarea class="form-control" type="text" name="desc1" id="title" rows="5" value="">{!! $data->desc1 !!}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">

                            <label for="bgimage">Side Image(Right):</label>

                            <input type="file" class="form-control image-upload dropify" id="image" name="aboutimage1"
                                data-default-file="{{ asset($data->aboutimage1) }}" accept="image/*">
                        </div>
                    </div>

                </div>




            </div>

        </div>

        <div class="our-steps-section">
            <div class="row mt-3">
                <div class="col-md-4">

                    <label for="aboutimage">Section 2 Image(Left):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="aboutimage2"
                        data-default-file="{{ asset($data->aboutimage2) }}" accept="image/*">
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Section-2 First Heading:</label>
                            <input class="form-control" type="text" name="heading2" id="heading2"
                                value="{!! $data->heading2 !!}">
                        </div>
                        <div class="col-md-12">

                            <label for="title">Section-2 Second Heading:</label>
                            <input class="form-control" type="text" name="desc2" id="title" value="{!! $data->desc2 !!}">
                        </div>
                    </div>

                </div>







            </div>

        </div>

        </div>




        <button type="submit" class="btn btn-success float-end mt-2">Save</button>


    </form>
@endsection
