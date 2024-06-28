@extends('admin.index')
@section('title', 'About Page Settings')



@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Other Page Settings</li>
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

                    <label for="bgimage">Gallery Page Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="g_image"
                        data-default-file="{{ asset($data->g_image) }}" accept="image/*">
                </div>
                <div class="col-md-12">

                    <label for="bgimage">Breeding Page Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="b_image"
                        data-default-file="{{ asset($data->b_image) }}" accept="image/*">
                </div>
                <div class="col-md-12">

                    <label for="bgimage">Feeding Page Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="f_image"
                        data-default-file="{{ asset($data->f_image) }}" accept="image/*">
                </div>
                <div class="col-md-12">

                    <label for="bgimage">Mangement Page Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="mgmt_image"
                        data-default-file="{{ asset($data->mgmt_image) }}" accept="image/*">
                </div>
                <div class="col-md-12">

                    <label for="bgimage">Market Page Background Image(Top):</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="m_image"
                        data-default-file="{{ asset($data->m_image) }}" accept="image/*">
                </div>







            </div>

        </div>



        </div>




        <button type="submit" class="btn btn-success float-end mt-2">Save</button>


    </form>
@endsection
