@extends('user.components.app')
@section('title', 'About Us')
@section('content')

    <main>
        @php
         $hdata = App\Helper::getHomePageSetting();

        $data=App\Helper::getAboutPageSettings();
        $sdata = App\Helper::getServicePageSetting();


    @endphp

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ asset($data->bgimage) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>About Us</h2>
                                <div class="breadcrumb-wrap">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
        <!-- about-area -->
        <section class="about-area about-p pt-120 pb-120 p-relative fix">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight"
                            data-delay=".4s">
                            <div class="about-title second-title pb-25">
                                <h5>About Us</h5>
                                <h2>{{$data->heading1}}</h2>
                            </div>
                            <p>{{$data->desc1}}</p>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay=".4s">
                            <img src="{{ asset($data->aboutimage1) }}" alt="img">

                            <div class="about-text second-about">
                                <img src="img/features/about-play.png" alt="img">
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </section>
        <!-- about-area-end -->



        <section class="team-area2 fix p-relative pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-relative">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated"
                            data-animation="fadeInDown" data-delay=".4s">
                            <h5>Our Team</h5>
                            <h2>
                                Our Expert Team
                            </h2>

                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-xl-3 col-md-6">
                            <div class="single-team mb-40">
                                <div class="team-thumb">
                                    <div class="brd" style="width: 100%; height: 300px; overflow: hidden;">
                                        <a href="#">
                                            <img src="{{ asset('blog_images/' . $team->image1) }}" alt="{{ $team->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                    </div>

                                </div>
                                <div class="team-info">
                                    <h4><a href="#">{{ $team->title }}</a></h4>
                                    <p>{{ $team->sdesc }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- team-area-end -->
        <!-- steps-area -->
        <section class="steps-area p-relative pb-120">
            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-12">
                        <div class="wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                            <img src="{{ asset($data->aboutimage2) }}" alt="class image">
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="pl-60">
                            <div class="section-title mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                                data-delay=".4s">
                                <h5>{{$data->heading2}}</h5>
                                <h2>{{$data->desc2}}</h2>
                            </div>

                            <ul>
                                @foreach ($objectives as $objective)
                                    <li>
                                        <div class="step-box wow fadeInUp animated" data-animation="fadeInUp"
                                            data-delay=".4s">
                                            <div class="dnumber">
                                                <div class="date-box"><img
                                                        src="{{ asset('blog_images/' . $objective->image1) }}"
                                                        alt="icon">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h3>{{ $objective->title }}</h3>
                                                <p>{!! $objective->sdesc !!}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- steps-area-end -->
        <section id="services-05" class="services-05 pt-120 pb-100 p-relative fix">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="section-title center-align mb-20">
                        <h5>{{ $sdata->heading1 }}</h5>
                        <h2>
                            {{ $sdata->heading2 }}
                        </h2>
                    </div>
                    @foreach ($services as $service)

                    <div class="col-lg-4">

                        <div class="services-box-05 mb-30 hover-zoomin">
                            <div class="services-icon-05">
                                <a href="#"><img src="{{ asset('blog_images/' . $service->image1) }}" alt="icon01"></a>
                            </div>
                            <div class="services-content-05">
                                <div class="icon">
                                    <h4>{{ $service->title }}</h4>
                                </div>
                                <p style="text-align: justify;">{{ substr($service->sdesc, 0, 120) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </section>

        <!-- services-three-area -->
        <!-- services-five-area -->

        <!-- services-three-area -->
        <!-- frequently-area -->
        <section class="faq-area pb-120 p-relative fix">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-6">
                        <div class="faq-wrap pr-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $key=>$faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $faq->id }}">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{$key==0?'true':'false'}}">
                                                    {{ $faq->title }}
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapse{{ $faq->id }}" class="collapse"
                                            aria-labelledby="heading{{ $faq->id }}" data-parent="#accordionExample">
                                            <div class="card-body" style="background-color:#f9f9f9; color:#000000;">
                                                {!! $faq->sdesc !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title wow fadeInLeft animated mb-20" data-animation="fadeInDown animated"
                            data-delay=".2s">
                            <h5>Our FAQ</h5>
                            <h2>{!! $hdata->faqheading !!}</h2>
                        </div>
                        <p>{!! $hdata->faqdesc !!}</p>

                    </div>
                </div>
            </div>
        </section>

        <!-- brand-area -->
        <div class="brand-area pb-120">
            <div class="container">
                <div class="row brand-active">
                    @foreach ($brands as $brand)
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('blog_images/' . $brand->image1) }}" alt="{{ $brand->title }}"
                                    style="width: 100%; max-width: 100%; max-height: 100px; object-fit: contain;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </main>

@endsection
