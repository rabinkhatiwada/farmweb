@extends('user.components.app')
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
                                            <li class="breadcrumb-item active" aria-current="page">Our Gallery</li>
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
                <div class="portfolio ">
                    <div class="row align-items-end mb-50">
                        <div class="col-lg-12">
                            <div class="section-title text-center wow fadeInLeft  animated" data-animation="fadeInLeft"
                                data-delay=".4s">
                                

                            </div>

                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="row">
                            @foreach ($galleryTypes as $galleryType)
                                @if ($galleryType->slug)
                                    <div class="col-md-3 mb-4">
                                        <a href="{{ route('gallerybyslug', ['slug' => $galleryType->slug]) }}">
                                            <div class="gallery-type-card">
                                                <div class="gtypeimage">
                                                    <img src="{{ asset('gallery_types/' . $galleryType->image) }}"
                                                        alt="{{ $galleryType->title }}">
                                                    <div class="overlay">
                                                        <h3>{{ $galleryType->title }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <style>
                        .gallery-type-card {
                            position: relative;
                            overflow: hidden;
                        }

                        .gtypeimage {
                            position: relative;
                        }

                        .overlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            color: white;
                            background-color: rgba(0, 0, 0, 0.5);
                            opacity: 0;
                            transition: opacity 0.3s ease;
                        }

                        .gallery-type-card:hover .overlay {
                            opacity: 1;
                            color: white;

                        }

                        .gallery-type-card a {
                            color: #fff;

                            text-decoration: none;
                        }

                        .overlay h3 {
                            position: absolute;
                            bottom: 10px;
                            left: 10px;
                            margin: 0;
                            align-content: center;
                            text-align: center;
                            padding: 0;
                            color: #fff;
                        }
                    </style>





                </div>
            </div>
        </section>
        <!-- gallery-area-end -->


    </main>
@endsection
@section('css')
    <style>
        .services-box-05 {
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);


        }

        .quick-link-item {
            display: block;
            text-decoration: none;
            position: relative;
            color: #fff;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100px;
            background-size: cover;
            transition: transform 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #FDCC0D;
            transition: background-color 0.3s ease;
        }

        .image-container:hover .overlay {
            background-color: #006E2F;
        }

        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            transition: color 0.3s ease;
        }

        .image-container:hover .text-overlay h4 {
            color: #fff;
            /* Change this to the desired color when hovered */
        }

        .text-overlay h4 {
            margin: 0;
            font-size: 1.5em;
            color: #000000;
            /* Original text color */
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            /* height: 100%; */
            overflow: hidden;

        }

        .video-background {
            width: 100%;
            height: 100%;

        }

        .video-foreground {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;


        }

        .video-foreground iframe {
            width: 100%;
            height: 100%;
            pointer-events: none;
            /* Ensures the video fills the iframe container */
        }

        .gallery-type-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            min-height: 300px;
        }

        .gallery-type-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
        }

        .gallery-type-card h3 {
            position: relative;
            z-index: 2;
            font-size: 2em;
            margin: 20px 0;
            color: #f0f0f0;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
        }

        .gtypeimage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.5;
            /* Set the opacity of the background image */
        }

        .gtypeimage img {
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
        }

        @media (max-width: 768px) {
            .gallery-type-card {
                margin-bottom: 20px;
            }

            .gallery-type-card h3 {
                font-size: 1.5em;
            }
        }




        @media (max-width:768px) {
            .slider-bg-youtube {
                min-height: 600px;
                aspect-ratio: unset !important;
            }

            .video-foreground iframe {
                height: 600px;
            }

            .video-container {
                height: 100vh;
                max-height: 600px;
                overflow: visible;

                .video-background {
                    aspect-ratio: unset !important;
                }
            }
        }
    </style>
@endsection

