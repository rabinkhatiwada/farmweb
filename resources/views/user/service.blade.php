@extends('user.components.app')
@section('title','Our Services')
@section('content')
<main>
    @php
         $data = App\Helper::getHomePageSetting();
         $sdata = App\Helper::getServicePageSetting();

    @endphp

    <!-- breadcrumb-area -->
     <section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image:url({{ Storage::url($sdata->bgimage) }})">

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

  <!-- services-three-area -->
    <!-- services-five-area -->
    <section id="services-05" class="services-05 pt-120 pb-100 p-relative fix"
    style="background: url(img/bg/services-bg.png); background-repeat: no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="section-title center-align mb-20">
                    <h5>{{$sdata->heading1}}</h5>
                    <h2>
                        {{$sdata->heading2}}
                    </h2>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="services-active">
                    @foreach ($services as $service)
                        <div class="services-box-05 wow fadeInUp  animated" data-animation="fadeInUp"
                            data-delay=".4s">
                            <div class="services-icon-05">
                                <a href="#"><img src="{{ asset('blog_images/' . $service->image1) }}"
                                        alt="icon01"></a>
                            </div>
                            <div class="services-content-05">
                                <div class="icon">
                                    <h4> <a href="single-service.html">{{ $service->title }}</a></h4>
                                </div>
                                <p>{{ $service->sdesc }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
  <!-- services-three-area -->
      <!-- frequently-area -->
      <section class="faq-area pb-120 p-relative fix">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <div class="faq-wrap pr-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $faq)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $faq->id }}">
                                        <h2 class="mb-0">
                                            <button class="faq-btn" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="true">
                                                {{ $faq->title }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $faq->id }}" class="collapse"
                                        aria-labelledby="heading{{ $faq->id }}" data-parent="#accordionExample">
                                        <div class="card-body">
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
