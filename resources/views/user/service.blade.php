@extends('user.components.app')
@section('title', 'Our Services')
@section('content')
    <main>
        @php
            $data = App\Helper::getHomePageSetting();
            $sdata = App\Helper::getServicePageSetting();

        @endphp

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ asset($sdata->bgimage) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Service</h2>
                                <div class="breadcrumb-wrap">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Service</li>
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
        <!-- services-five-area -->
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
                            <h2>{!! $data->faqheading !!}</h2>
                        </div>
                        <p>{!! $data->faqdesc !!}</p>

                    </div>
                </div>
            </div>
        </section>
        <!-- frequently-area-end -->


    </main>

@endsection
