  <!-- slider-area -->
  <section id="parallax" class="slider-area slider-two fix p-relative">
    <div class="slider-shape ss-four layer" data-depth="0.40">
        <img src="img/bg/slider_shape04.png" alt="shape">
    </div>
    <div class="slider-active">
        @foreach ($sliders as $slider)
            @php
                $backgroundStyle = '';
                $content = '';

                if ($slider->youtubeurl) {
                    // Extract video ID from YouTube watch URL
                    $videoId = '';
                    parse_str(parse_url($slider->youtubeurl, PHP_URL_QUERY), $params);
                    if (isset($params['v'])) {
                        $videoId = $params['v'];
                    }
                    $content =
                        '<div class="video-background" style="aspect-ratio:'.$slider->aspect_ratio.'">
                            <div class="video-foreground">
                                <iframe src="https://www.youtube.com/embed/' .
                        $videoId .
                        '?autoplay=1&mute=1&loop=1&playlist=' .
                        $videoId .
                        '" frameborder="5" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>';
                } elseif ($slider->image) {
                    $backgroundStyle =
                        "background: url('" .
                        asset('slider_images/' . $slider->image) .
                        "') no-repeat; background-size: cover; background-position: center;";
                }
            @endphp

            <div class="single-slider {{$slider->youtubeurl?"slider-bg-youtube":"slider-bg slider-bg2"}} d-flex align-items-center" style="{{ $backgroundStyle }}aspect-ratio:{{$slider->aspect_ratio}}">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-7 col-md-8">
                            <div class="slider-content s-slider-content pt-100">
                                <h5 data-animation="fadeInUp" data-delay=".4s">{{ $slider->subtitle }}</h5>
                                <h2 data-animation="fadeInUp" data-delay=".4s">{{ $slider->title }}</h2>

                                <div class="slider-btn mb-200">
                                    <a href="{{ $slider->button_link }}" class="btn mr-15" data-animation="fadeInUp"
                                        data-delay=".4s">
                                        {{ $slider->button_text }} <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-4">
                            @if ($slider->youtubeurl)
                                <div class="video-container">
                                    {!! $content !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


<!-- slider-area-end -->
