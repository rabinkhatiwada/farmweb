@extends('user.components.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
@endsection
@section('title', 'Gallery')
@section('content')
    <main>
        @php

            $data = App\Helper::getOtherPageSetting();
        @endphp

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ Storage::url($data->g_image) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Our Gallery</h2>
                                <div class="breadcrumb-wrap">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><a
                                                    href="{{ route('gallery') }}">Our Gallery</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $galleryType->title }}
                                            </li>
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
        <!-- gallery-area -->
        <section id="portfolio" class="pt-120 pb-90">
            <div class="container">
                <div class="portfolio">
                    <div class="row align-items-end mb-50">
                        <div class="col-lg-12">
                            <div class="my-masonry text-center wow fadeInRight animated" data-animation="fadeInRight"
                                data-delay=".4s">

                            </div>
                        </div>
                    </div>
                    <div class="grid col3 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s"
                        id="gallery-single-page">

                        @foreach ($galleryItems as $galleryType)
                            <div class="grid-item {{ Str::slug($galleryType->title ?: '') }}">
                                <figure class="gallery-image">
                                    @if ($galleryType->youtube_url)
                                        @php
                                            $videoId = '';
                                            parse_str(parse_url($galleryType->youtube_url, PHP_URL_QUERY), $params);
                                            if (isset($params['v'])) {
                                                $videoId = $params['v'];
                                            }
                                        @endphp
                                        <div class="video-wrapper">
                                            <iframe class="iframe-video" height="280px;" style="padding: 0;"
                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                allowfullscreen></iframe>
                                        </div>
                                    @elseif ($galleryType->image)
                                        <a class="lightbox" data-fancybox="gallery" href="{{ asset($galleryType->image) }}">

                                            <img src="{{ asset($galleryType->image) }}" alt="{{ $galleryType->title }}"
                                                class="img">
                                        </a>
                                    @endif
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // Initialize FancyBox
            $('[data-fancybox="gallery"]').fancybox({
                // Options
                // loop: true, // Enable looping through images
                // buttons: [
                //     'slideShow',
                //     'fullScreen',
                //     'thumbs',
                //     'close'
                // ],
                // animationEffect: "fade", // Animation effect when opening/closing the lightbox
                // transitionEffect: "slide", // Transition effect between slides
                // idleTime: 3000, // Time after which the buttons and captions will be hidden
                // infobar: true, // Display infobar (counter and arrows)
                // caption: function(instance, item) {
                //     return $(this).data('caption') || $(this).attr('title');
                // }, // Custom function to display captions
                // protect: true, // Prevent dragging images outside the viewport
                // autoFocus: false, // Disable focusing on the first element
                // toolbar: true, // Display toolbar
                // clickOutside: 'close', // Close FancyBox when clicking outside the content
                // touch: {
                //     vertical: false // Allow vertical scrolling on touch devices
                // },
                // image: {
                //     preload: true // Preload images for better performance
                // }
            });
        });
    </script>


@endsection
