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
                <div class="col-md-4">

                    <label for="Welcome Image">LOGO:</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="logo"
                        data-default-file="{{ Storage::url($data->logo) }}" accept="image/*">
                </div>
            </div>

        </div>
        <div class="first-section">
            <div class="row">
                <h4 style="text-decoration:underline;">First Section:</h4>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Heading:</label>
                            <input class="form-control" type="text" name="heading1" id="title"
                                value="{!! $data->heading1 !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="paragraph1">Description:</label>
                            <textarea class="form-control" id="" name="paragraph1" rows="3">{!! $data->paragraph1 !!}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="buttontext1">Button Text:</label>
                            <input class="form-control" type="text" name="buttontext1" id="buttontext1"
                                value="{!! $data->buttontext1 !!}">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="paragraph1">Background:</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="image1"
                        data-default-file="{{ Storage::url($data->image1) }}" accept="image/*">
                </div>

            </div>
        </div>

        <div class="second-section">

            <div class="row mb-3">
                <hr class="mt-3">
                <h4 style="text-decoration:underline;">Welcome Section:</h4>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Welcome Heading:</label>
                            <input class="form-control" type="text" name="heading2" id="title"
                                value="{!! $data->heading2 !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="paragraph2">Welcome Text:</label>
                            <textarea class="form-control" id="" name="paragraph2" rows="3">{!! $data->paragraph2 !!}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="linktext1">Link Text:</label>
                            <input class="form-control" type="text" name="linktext1" id="linktext1"
                                value="{!! $data->linktext1 !!}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Welcome Image">Welcome Image:</label>

                    <input type="file" class="form-control image-upload dropify" id="image" name="welcomeimage"
                        data-default-file="{{ Storage::url($data->welcomeimage) }}" accept="image/*">
                </div>


            </div>
        </div>


        <div class="third-section">
            <div class="row mb-3">
                <hr class="mt-3">

                <h4 style="text-decoration:underline;">About Section:</h4>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Welcome Image">About Image First:</label>

                            <input type="file" class="form-control image-upload dropify" id="image"
                                name="aboutimage1" data-default-file="{{ Storage::url($data->aboutimage1) }}"
                                accept="image/*">
                        </div>
                        <div class="col-md-12">
                            <label for="Welcome Image">About Image Second:</label>

                            <input type="file" class="form-control image-upload dropify" id="aboutimage2"
                                name="aboutimage2" data-default-file="{{ Storage::url($data->aboutimage2) }}"
                                accept="image/*">
                        </div>
                        <div class="col-md-12 mt-1">
                            <label for="trustednos">Trusted Customers Nos:</label>
                            <input class="form-control" type="text" name="trustednos"
                                id="trustednos"value="{!! $data->trustednos !!}">
                        </div>
                        <div class="col-md-12 mt-1">
                            <label for="aboutheading">About Heading:</label>
                            <input class="form-control" type="text" name="heading3"
                                id="heading3"value="{!! $data->heading3 !!}">
                        </div>

                    </div>

                </div>
                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-12 mt-1">
                            <label for="aboutheading">About Paragraph:</label>
                            <textarea class="form-control" rows="3" name="paragraph3" id="paragraph3"value="">{!! $data->paragraph3 !!}</textarea>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="vision row">
                            <label for="Vision">Our Vision:</label>
                            <div class="form-group">
                                @foreach ($visions as $vision)
                                    <div class="input-group vision-input mt-1">
                                        <input type="text" class="form-control" placeholder="Vision" name="visions[]"
                                            value="{{ $vision }}">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger removeVision btn-sm m-1"><i
                                                    class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="button" class="btn btn-success addVision btn-sm mt-1">Add New <i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="mission row">
                            <label for="Mission">Our Mission:</label>
                            <div class="form-group">
                                @foreach ($missions as $mission)
                                    <div class="input-group mission-input mt-1">
                                        <input type="text" class="form-control" placeholder="Mission"
                                            name="missions[]" value="{{ $mission }}">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger removeMission btn-sm m-1"><i
                                                    class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="button" class="btn btn-success addMission btn-sm mt-1">Add New <i
                                        class="fa fa-plus-circle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
            <div class="features-section">
                <div id="features">
                    @if (empty($features))
                        <!-- Display a single input field for adding a feature -->
                        <div class="feature row mt-1">
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Feature"
                                        name="featureheadings[]">
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Feature Description"
                                        name="featuredescriptions[]">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger removeFeature btn-sm m-1"><i
                                                class="fa fa-times" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Display input fields for each feature in the $features array -->

                        <div class="feature row mt-1">
                            <label for="features">Experience/Features:</label>
                            @foreach ($features as $index => $feature)
                                <div class="form-group col-md-4 mt-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Feature"
                                            name="featureheadings[]" value="{{ $index }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Feature Description"
                                            name="featuredescriptions[]" value="{{ $feature }}">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger removeFeature btn-sm m-1"><i
                                                    class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-success addFeature btn-sm mt-1">Add New<i class="fa fa-plus-circle"
                        aria-hidden="true"></i></button>



            </div>
        </div>


        <div class="fourth-section">
            <hr>
            <h4 style="text-decoration:underline;">Dairy Services Section:</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Welcome Image">Left Image:</label>

                            <input type="file" class="form-control image-upload dropify" id="serviceimage1"
                                name="serviceimage1" data-default-file="{{ Storage::url($data->serviceimage1) }}"
                                accept="image/*">

                        </div>

                        <div class="col-md-12">
                            <label for="Welcome Image">Right Image:</label>

                            <input type="file" class="form-control image-upload dropify" id="serviceimage2"
                                name="serviceimage2" data-default-file="{{ Storage::url($data->serviceimage2) }}"
                                accept="image/*">
                        </div>

                    </div>


                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <label for="serviceheading">Service Main Heading:</label>
                            <input class="form-control" type="text" name="serviceheading1" id="serviceheading1"
                                value="{!! $data->serviceheading1 !!}">
                        </div>
                        <div class="col-12 mt-1">
                            <div class="services row">
                                <label for="Services">Our Services:</label>
                                <div class="form-group">
                                    @foreach ($services as $service)
                                        <div class="input-group service-input mt-1">
                                            <input type="text" class="form-control" placeholder="Service"
                                                name="services[]" value="{{ $service }}">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger removeService btn-sm m-1"><i
                                                        class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-success addService btn-sm mt-1">Add New <i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <label for="serviceheading">Button Link URL:</label>
                            <input class="form-control" type="text" name="servicelink" id="servicelink"
                                value="{!! $data->servicelink !!}">
                        </div>
                        <div class="col-12 mt-1">

                            <div class="col-md-12">
                                <label for="serviceheading">Service Left Heading:</label>
                                <input class="form-control" type="text" name="serviceheading2" id="serviceheading2"
                                    value="{!! $data->serviceheading2 !!}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="productnos">No of Products:</label>
                                    <input class="form-control" type="text" name="productnos" id="productnos"
                                        value="{!! $data->productnos !!}">
                                </div>
                                <div class="col-6">
                                    <label for="satisfaction">Satisfaction %:</label>
                                    <input class="form-control" type="text" name="satisfaction" id="satisfaction"
                                        value="{!! $data->satisfaction !!}">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="fifth-section">
            <hr>
            <h4 style="text-decoration:underline;">Advantages Section:</h4>
            <div class="row">
                <div class="col-md-5">
                    <label for="Advantage Image">Advantage Image:</label>

                    <input type="file" class="form-control image-upload dropify" id="advimage" name="advimage"
                        data-default-file="{{ Storage::url($data->adv_image) }}" accept="image/*">
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="advantageheading">Advantage Heading:</label>
                        <input class="form-control" type="text" name="advheading" id="advheading"
                            value="{!! $data->advheading !!}">
                    </div>
                    <div class="form-group">
                        <label for="advantageparagraph">Advantage Paragraph:</label>
                        <textarea class="form-control" rows="5" name="advparagraph" id="advparagraph"value="">{!! $data->advparagraph !!}</textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="sixth-section">
            <hr>
            <h4 style="text-decoration:underline;">Testimonials Section:</h4>
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-9">
                            <label for="testimonialheading">Testimonials Heading:</label>
                            <input class="form-control" type="text" name="testheading" id="testheading"
                                value="{!! $data->testheading !!}">
                        </div>
                        <div class="form-group col-3 mt-1">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary mt-3">Manage
                                Testimonials</a>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="testimonialpara">Testimonials Paragraph:</label>
                        <textarea class="form-control" rows="2" name="testdescription" id="testdescription"value="">{!! $data->testdescription !!}</textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="seventh-section">
            <hr>
            <h4 style="text-decoration:underline;">Programs Section:</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="programheading">Programs Heading:</label>
                        <input class="form-control" type="text" name="programheading" id="programheading"
                            value="{!! $data->programheading !!}">
                    </div>
                    <div class="form-group">
                        <label for="programpara">Programs Paragraph:</label>
                        <textarea class="form-control" rows="3" name="programpara" id="programpara"value="">{!! $data->programpara !!}</textarea>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="programbtext">Button Text</label>
                        <input class="form-control" type="text" name="programbtntext" id="programbtntext"
                            value="{!! $data->programbtntext !!}">
                    </div>
                    <div class="form-group">
                        <label for="programbtext">Button URL</label>
                        <input class="form-control" type="text" name="programbtnlink" id="programbtnlink"
                            value="{!! $data->programbtnlink !!}">
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="program-cards mt-2">
                        <h6 style="text-decoration: underline">Dairy Programs</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="programtitle">Program 1:</label>

                                <input type="file" class="form-control image-upload dropify" id="programimage1"
                                    name="programimage1" data-default-file="{{ Storage::url($data->programimage1) }}"
                                    accept="image/*">

                                <div class="form-group">
                                    <label for="programtitle">Program Title:</label>
                                    <input class="form-control" type="text" name="programtitle1" id="programtitle1"
                                        value="{!! $data->programtitle1 !!}">
                                </div>
                                <div class="form-group">
                                    <label for="programheading">Program Description:</label>
                                    <textarea class="form-control" rows="2" name="programdescription1" id="programdescription1"value="">{!! $data->programdescription1 !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="programtitle">Program 2:</label>

                                <input type="file" class="form-control image-upload dropify" id="programimage2"
                                    name="programimage2" data-default-file="{{ Storage::url($data->programimage2) }}"
                                    accept="image/*">
                                <div class="form-group">
                                    <label for="programtitle">Program Title:</label>
                                    <input class="form-control" type="text" name="programtitle2" id="programtitle1"
                                        value="{!! $data->programtitle2 !!}">
                                </div>
                                <div class="form-group">
                                    <label for="programheading">Program Description:</label>
                                    <textarea class="form-control" rows="2" name="programdescription2" id="programdescription2"value="">{!! $data->programdescription2 !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="programtitle">Program 3:</label>

                                <input type="file" class="form-control image-upload dropify" id="programimage3"
                                    name="programimage3" data-default-file="{{ Storage::url($data->programimage3) }}"
                                    accept="image/*">
                                <div class="form-group">
                                    <label for="programtitle">Program Title:</label>
                                    <input class="form-control" type="text" name="programtitle3" id="programtitle1"
                                        value="{!! $data->programtitle3 !!}">
                                </div>
                                <div class="form-group">
                                    <label for="programheading">Program Description:</label>
                                    <textarea class="form-control" rows="2" name="programdescription3" id="programdescription3"value="">{!! $data->programdescription3 !!}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>

            <div class="newsletter">
                <hr>
                <h4 style="text-decoration:underline;">Newsletter Section:</h4>
                <input type="file" class="form-control image-upload dropify" id="newsletterimage"
                    data-placeholder="Drag and drop a file here or click" name="newsletterimage" data-default-file="{{ Storage::url($data->newsletterimage) }}"
                    accept="image/*">
            </div>
        </div>


        <button type="submit" class="btn btn-success float-end mt-2">Save</button>


    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Remove feature
        $(document).on("click", ".removeFeature", function() {
            $(this).closest('.feature').remove();
        });

        // Add feature
        $(".addFeature").click(function() {
            var featureHtml = '<div class="feature row mt-1">' +
                '<div class="form-group col-md-4">' +
                '<div class="input-group">' +
                '<input type="text" class="form-control" placeholder="Feature" name="featureheadings[]">' +
                '</div>' +
                '</div>' +
                '<div class="form-group col-md-8">' +
                '<div class="input-group">' +
                '<input type="text" class="form-control" placeholder="Feature Description" name="featuredescriptions[]">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger removeFeature btn-sm m-1"><i class="fa fa-times" aria-hidden="true"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $("#features").append(featureHtml);
            $(".addFeature").appendTo("#features");
        });

        // Remove vision
        $(document).on("click", ".removeVision", function() {
            $(this).closest('.vision-input').remove();
        });

        // Add vision
        $(".addVision").click(function() {
            var visionHtml = '<div class="input-group vision-input mt-1">' +
                '<input type="text" class="form-control" placeholder="Vision" name="visions[]">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger removeVision btn-sm m-1"><i class="fa fa-times" aria-hidden="true"></i></button>' +
                '</div>' +
                '</div>';
            $(".vision .form-group").append(visionHtml);
            $(".addVision").appendTo(".vision .form-group");
        });

        // Remove mission
        $(document).on("click", ".removeMission", function() {
            $(this).closest('.mission-input').remove();
        });

        // Add mission
        $(".addMission").click(function() {
            var missionHtml = '<div class="input-group mission-input mt-1">' +
                '<input type="text" class="form-control" placeholder="Mission" name="missions[]">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger removeMission btn-sm m-1"><i class="fa fa-times" aria-hidden="true"></i></button>' +
                '</div>' +
                '</div>';
            $(".mission .form-group").append(missionHtml);
            $(".addMission").appendTo(".mission .form-group");
        });
    });
    $(document).ready(function() {
        // Remove service
        $(document).on("click", ".removeService", function() {
            $(this).closest('.service-input').remove();
        });

        // Add service
        $(".addService").click(function() {
            var serviceHtml = '<div class="input-group service-input mt-1">' +
                '<input type="text" class="form-control" placeholder="Service" name="services[]">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger removeService btn-sm m-1"><i class="fa fa-times" aria-hidden="true"></i></button>' +
                '</div>' +
                '</div>';
            $(".services .form-group").append(serviceHtml);
            $(".addService").appendTo(".services .form-group");
        });
    });
</script>
