@extends('admin.index')
@section('title', 'Footer Setting')

<style>
    .shadow-box {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        background-color: #fff;
    }
</style>

@section('jumbo')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Front Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Footer</li>
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

    <!-- Alert placeholder for dynamic alerts -->
    <div id="alertPlaceholder"></div>

    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="Logo" class="form-label">Footer Logo</label>
                    <input type="file" class="image-upload dropify" id="image" name="logo" accept="image/*" data-default-file="{{ Storage::url($data->logo) }}">
                </div>
                <div class="col-md-8">
                    <label for="content" class="form-label">Footer Description</label>
                    <textarea class="form-control" rows="3" name="description">{!! $data->description !!}</textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="shadow-box p-3 mt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mt-1" style="font-weight: 900">Social Links</h6>
                        <button type="button" class="btn btn-sm btn-primary" id="addLinkBtn">Add Social Link</button>
                    </div>

                    <table class="table mt-3" id="socialLinksTable">
                        <thead>
                            <tr>
                                <th>Social Media</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->social_links as $link)
                            <tr>
                                <td><input type="text" name="social_media[]" class="form-control" placeholder="Enter Social Media" value="{{ $link['name'] }}"></td>
                                <td><input type="text" name="social_link[]" class="form-control" placeholder="Enter Link" value="{{ $link['link'] }}"></td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-row">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

            <div class="col-md-12">
                <div class="shadow-box p-3 mt-3">
                    <h6 style="font-weight: 900">Contact Information</h6>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h6 class="mt-1 mb-0" style="font-weight: 900; min-width: 80px;">Phone:</h6>
                        <input type="text" class="form-control mx-2" placeholder="Enter Phone Numbers" name="phone" value="{{ implode(', ', $data->phones) }}">
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h6 class="mt-1 mb-0" style="font-weight: 900; min-width: 80px;">Email:</h6>
                        <input type="text" class="form-control mx-2" placeholder="Enter Email" name="email" value="{{ implode(', ', $data->email) }}">
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <h6 class="mt-1 mb-0" style="font-weight: 900; min-width: 80px;">Address:</h6>
                        <input type="text" class="form-control mx-2" placeholder="Enter Address" name="address" value="{{ $data->address }}">
                    </div>
                </div>
            </div>

            <button class="btn btn-success mt-3 float-end">Save</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function showAlert(message) {
            let alertHtml = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            $('#alertPlaceholder').html(alertHtml);

            // Auto-dismiss alert after 3 seconds
            setTimeout(() => {
                $('.alert').alert('close');
            }, 3000);
        }

        $('#addLinkBtn').click(function() {
            let newRow = `
                <tr>
                    <td><input type="text" name="social_media[]" class="form-control" placeholder="Enter Social Media"></td>
                    <td><input type="text" name="social_link[]" class="form-control" placeholder="Enter Link"></td>
                    <td>
                        <button class="btn btn-sm btn-danger delete-row">Remove</button>
                    </td>
                </tr>
            `;
            $('#socialLinksTable tbody').append(newRow);
        });

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
    });
</script>
