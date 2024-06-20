@php
    $recentBlogs = App\Models\Blog::latest()->take(2)->get();
    $data = App\Helper::getFooterSetting();

@endphp


<footer class="footer-bg footer-p pt-150"
    style="background-color: #fff; background-image: url(img/bg/footer-bg.png); background-position: 0 0;">
    <div class="footer-top pb-70">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title mb-30">
                            <a href="index.html"><img src="img/logo/f_logo.png" alt="img"></a>
                        </div>
                        <div class="f-contact">
                            <p>{!! $data->description !!}</p>

                        </div>
                        <div class="footer-social mt-10">
                            <div class="footer-social mt-10">
                                @foreach ($data->social_links as $link)
                                    <a href="{{ $link['link'] }}"><i class="fab fa-{{ $link['name'] }}" style="font-size: 20px; padding:10px;"></i></a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Our Links</h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                @foreach ($data->quick_links as $link)
                                    <li><a href="{{ $link['url'] }}">{{ $link['title'] }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="f-contact">
                            <ul>
                                <li>
                                    <i class="icon fal fa-phone"></i>
                                    <span>
                                        @foreach ($data->phones as $phonesString)
                                            @php
                                                $phonesString = trim($phonesString, '[]"');
                                            @endphp
                                            @foreach (explode(',', $phonesString) as $phone)
                                                <a href="tel:{{ trim($phone) }}">{{ trim($phone) }}</a><br>
                                            @endforeach
                                        @endforeach


                                    </span>
                                </li>


                                <li><i class="icon fal fa-envelope"></i>
                                    @foreach ($data->email as $emailsString)
                                    @php
                                        $emailsString = trim($emailsString, '[]"');
                                    @endphp
                                    @foreach (explode(',', $emailsString) as $email)
                                        <a href="mailto:{{ trim($email) }}">{{ trim($email) }}</a><br>
                                    @endforeach
                                @endforeach
                                </li>
                                <li>
                                    <i class="icon fal fa-map-marker-check"></i>
                                    <span>{{$data->address}}</span>
                                </li>

                            </ul>

                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Latest Post</h2>
                        </div>
                        <div class="recent-blog-footer">
                            <ul>
                                @foreach ($recentBlogs as $recentBlog)
                                    <li>
                                        <div class="thum" style="width: 300px; height: 80px; overflow: hidden;">
                                            <img src="{{ asset('blog_images/' . $recentBlog->image1) }}"
                                                alt="{{ $recentBlog->title }}" style="height: 100%; object-fit: cover;">
                                        </div>
                                        <div class="text">
                                            <a
                                                href="{{ route('blog.show', ['blog' => $recentBlog->id]) }}">{{ $recentBlog->title }}</a>
                                            <span>{{ $recentBlog->created_at->format('d F, Y') }}</span>
                                        </div>
                                    </li>
                                @endforeach




                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    Copyright &copy; Dcfarm 2023 . All rights reserved.
                </div>
                <div class="col-lg-6 text-right text-xl-right">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms Of Service</a></li>
                        <li><a href="#">Legal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
