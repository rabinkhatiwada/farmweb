@extends('admin.index')
@section('title', 'Home Page Settings')



@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home Page Settings</li>
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

        <h3>Home Page Settings</h3>
        <hr>
        @csrf
        <div class="header-section">
            <h4 style="text-decoration:underline;">Header Section:</h4>
            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-8">

                            <label for="Welcome Image">LOGO:</label>

                            <input type="file" class="form-control image-upload dropify" id="image" name="logo"
                                data-default-file="{{ Storage::url($data->logo) }}" accept="image/*">
                        </div>
                        <div class="col-md-4">

                            <label for="Welcome Image">FAV Icon:</label>

                            <input type="file" class="form-control image-upload dropify" id="image" name="favicon"
                                data-default-file="{{ Storage::url($data->favicon) }}" accept="image/*">
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">

                            <label for="title">WebSite Title:</label>
                                    <input class="form-control" type="text" name="webtitle" id="title"
                                        value="{!! $data->webtitle !!}">
                        </div>
                        <div class="col-md-6">

                            <label for="title">Header Phone:</label>
                                    <input class="form-control" type="text" name="h_phone" id="title"
                                        value="{!! $data->h_phone !!}">
                        </div>
                        <div class="col-md-12">
                            <label for="title">Meta Description:</label>
                            <textarea class="form-control" type="text" name="metadesc" id="title" rows="5"
                                value="">{!! $data->metadesc !!}</textarea>
                        </div>
                    </div>

                </div>




            </div>

        </div>
        <div class="col-md-12">
            <div class="shadow-box p-3 mt-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mt-1" style="font-weight: 900">Quick Links</h6>
                    <button type="button" class="btn btn-sm btn-primary" id="addQLinkBtn">Add New Link</button>
                </div>

                <table class="table mt-3" id="quickLinksTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->quick_links as $qlink)
                        <tr>
                            <td><input type="text" class="form-control" placeholder="Title" name="quick_link_title[]" value="{{ $qlink['title'] }}"></td>
                            <td><input type="text" class="form-control" placeholder="Link" name="quick_link_url[]" value="{{ $qlink['url'] }}"></td>
                            <td>
                                <button class="btn btn-sm btn-danger delete-row">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="NewsLetter-section">
            <div class="row mt-2">
                <h4 style="text-decoration:underline;">Gallery/Projects Section:</h4>

            <div class="col-md-6">
                <label for="title">Gallery Heading:</label>
                <input class="form-control" type="text" name="galleryheading1" id="title"
                    value="{!! $data->galleryheading1 !!}">
            </div>
            <div class="col-md-6">
                <label for="title">Gallery Heading:</label>
                <input class="form-control" type="text" name="galleryheading2" id="title"
                    value="{!! $data->galleryheading2 !!}">
            </div>

        </div>

        <div class="NewsLetter-section">
            <div class="row mt-2">
                <h4 style="text-decoration:underline;">Newsletter Section:</h4>

            <div class="col-md-6">
                <label for="title">Newsletter Heading:</label>
                <input class="form-control" type="text" name="newsletterheading" id="title"
                    value="{!! $data->newsletterheading !!}">
            </div>
            <div class="col-md-6">
                <label for="title">Featured Video URL:</label>
                <input class="form-control" type="text" name="videourl" id="title"
                    value="{!! $data->videourl !!}">
            </div>

        </div>

        <div class="FAQ-section">
            <div class="row mt-2">
                <h4 style="text-decoration:underline;">FAQ Section:</h4>

            <div class="col-md-4">
                <label for="title">FAQ Heading:</label>
                <input class="form-control" type="text" name="faqheading" id="title"
                    value="{!! $data->faqheading !!}">
            </div>
            <div class="col-md-8">
                <label for="title">FAQ Description:</label>
                <textarea class="form-control" type="text" name="faqdesc" id="title" rows="4"
                    value="">{!! $data->faqdesc !!}</textarea>
            </div>

        </div>

        </div>




        <button type="submit" class="btn btn-success float-end mt-2">Save</button>


    </form>
@endsection

@section('js')
<script>
$('#addQLinkBtn').click(function() {
    let newRow = `
        <tr>
            <td><input type="text" name="quick_link_title[]" class="form-control" placeholder="Title"></td>
            <td><input type="text" name="quick_link_url[]" class="form-control" placeholder="Link"></td>
            <td>
                <button class="btn btn-sm btn-danger delete-row">Remove</button>
            </td>
        </tr>
    `;
    $('#quickLinksTable tbody').append(newRow);
});

$(document).on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
    showAlert('Link removed successfully!');
});
</script>

@endsection
