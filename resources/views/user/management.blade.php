@extends('user.components.app')
@section('title', 'Breeding')
@section('content')

    @php
        $linksdata = App\Helper::getHomePageSetting();

        $data = App\Helper::getOtherPageSetting();
        $phone = App\Helper::getContactPageSetting();
    @endphp


    <main>
        @foreach ($management as $b)

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ asset($data->mgmt_image) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">

                        <div class="breadcrumb-wrap text-left">
                                <div class="breadcrumb-title">
                                    <h2>{{$b->title}}</h2>
                                    <div class="breadcrumb-wrap">

                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{$b->title}}</li>
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

        <!-- service-details-area -->
        <div class="about-area5 about-p p-relative">
            <div class="container pt-120 pb-90">
                <div class="row">
                    <!-- #right side -->
                    <div class="col-sm-12 col-md-12 col-lg-4 order-2">
                        <aside class="sidebar services-sidebar">

                            <!-- Category Widget -->
                            <div class="sidebar-widget categories">
                                <div class="widget-content">
                                    <h2 class="widget-title"> Our Pages List </h2>
                                    <!-- Services Category -->
                                    <ul class="services-categories">

                                       @foreach ($linksdata->quick_links as $link)
                                    <li><a href="{{ $link['url'] }}">{{ $link['title'] }}</a></li>
                                    @endforeach

                                    </ul>
                                </div>
                            </div>
                            <!--Service Contact-->
                            <div class="service-detail-contact wow fadeup-animation" data-wow-delay="1.1s">
                                <h3 class="h3-title">If You Need Any Help Contact With Us</h3>
                                <a href="javascript:void(0);" title="Call now">{{$phone->phone}}</a>
                            </div>

                        </aside>
                    </div>
                    <!-- #right side end -->


                    <div class="col-lg-8 col-md-12 col-sm-12 order-1">
                        <div class="service-detail">


                            <div class="content-box">

                                <!-- Two Column -->
                                <div class="two-column">
                                    <div class="row">
                                        <div class="image-column col-xl-12 col-lg-12 col-md-12">
                                            @if ($b->y_url)
                                                @php
                                                    $videoId = '';
                                                    parse_str(parse_url($b->y_url, PHP_URL_QUERY), $params);
                                                    if (isset($params['v'])) {
                                                        $videoId = $params['v'];
                                                    }
                                                @endphp
                                                @if ($videoId)
                                                    <iframe
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
                                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                                        allowfullscreen></iframe>

                                                @endif
                                            @elseif ($b->image1)
                                                <figure class="image">
                                                    <img src="{{ asset('blog_images/' . $b->image1) }}" alt="{{ $b->title }}">
                                                </figure>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <h2> {{$b->title}} </h2>
                                <p>{!!$b->content!!}</p>








                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- service-details-area-end -->
        @endforeach

    </main>
@endsection
