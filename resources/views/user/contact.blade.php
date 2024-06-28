@extends('user.components.app')
@section('title', 'Blogs')
@section('content')
    <main>
        @php
        $data=App\Helper::getContactPageSetting();

        @endphp

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ asset($data->bgimage) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Contact Us</h2>
                                <div class="breadcrumb-wrap">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">

            <div class="container">

                <div class="row">


                    <div class="col-lg-12 order-2">
                        <div class="contact-bg">
                            <div class="section-title center-align text-center mb-50">
                                <h2>
                                    Drop a Message!!
                                </h2>

                            </div>

                            <form action="{{ route('msg.send') }}" method="post" class="contact-form mt-30 text-center">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="contact-field p-relative c-name mb-30">
                                            <input type="text" id="firstn" name="name" placeholder="Full Name" required>
                                            <i class="icon fal fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="contact-field p-relative c-subject mb-30">
                                            <input type="email" id="email" name="email" placeholder="Email" required>
                                            <i class="icon fal fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="contact-field p-relative c-subject mb-30">
                                            <input type="text" id="phone" name="phone" placeholder="Phone No." required>
                                            <i class="icon fal fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-field p-relative c-message mb-30">
                                            <textarea name="msg" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                            <i class="icon fal fa-edit"></i>
                                        </div>
                                        <div class="slider-btn text-center">
                                            <button type="submit" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Send<i class="fal fa-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>



                        </div>

                    </div>
                </div>

            </div>

        </section>
        <!-- contact-area-end -->
        <!-- map-area-end -->
        <div class="map fix" style="background: #f5f5f5;">
            <div class="container-flud">

                <div class="row">
                    <div class="col-lg-12">
                        <iframe id="gmap_canvas"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- map-area-end -->
        <!-- services-area -->
        <section id="services" class="services-area contact-info pt-120 pb-120 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">
                            <h5>Contact Info</h5>
                            <h2>
                                {!!$data->heading!!}
                            </h2>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center">
                            <div class="services-icon">
                                <img src="img/bg/contact-icon01.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5><a href="tel:{!!$data->phone!!}+14440008888">{!!$data->phone!!}</a></h5>
                                <p>Phone Support</p>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center active">
                            <div class="services-icon">
                                <img src="img/bg/contact-icon02.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5><a href="mailto:{!!$data->email!!}">{!!$data->email!!}</a></h5>
                                <p>Email Address</p>

                            </div>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div class="services-box text-center">
                            <div class="services-icon">
                                <img src="img/bg/contact-icon03.png" alt="image">
                            </div>
                            <div class="services-content2">
                                <h5>{!!$data->address!!}</h5>
                                <p>Office Address</p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </section>
        <!-- services-area-end -->
    </main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const mapurl = "https://maps.google.com/maps?q=xxx_map&t=&z=13&ie=UTF8&iwloc=&output=embed";

        function setMap(location) {
            const mapUrlWithLocation = mapurl.replace('xxx_map', encodeURIComponent(location));
            $('#gmap_canvas').attr('src', mapUrlWithLocation);
        }

        // Initialize map with default location
        setMap("{!! $data->location !!}");

        // Update map when location input changes
        $('#location').on('input', function() {
            const newLocation = $(this).val();
            setMap(newLocation);
        });

        // Form submission
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            // Here, you can add code to handle form submission via AJAX or regular form submission
            // For example:
            // $('form').submit();
        });
    });
</script>
