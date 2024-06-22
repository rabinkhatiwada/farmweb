@extends('user.components.app')
@section('title', 'Blogs')
@section('content')

    <main>
        @php
        $data=App\Helper::getBlogPageSetting();
        $socialmediadata = App\Helper::getFooterSetting();


        @endphp

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center"
            style="background-image:url({{ Storage::url($data->bgimage) }})">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Blog</h2>
                                <div class="breadcrumb-wrap">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
        <!-- inner-blog -->
        <section class="inner-blog pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($blogs->reverse() as $blog)
                            @if ($counter < 5)
                                <div class="bsingle__post mb-50">
                                    <div style="height: 600px; overflow:hidden;" class="bsingle__post-thumb">
                                        <img style="width: 100%; object-fit: cover;"
                                            src="{{ asset('blog_images/' . $blog->image1) }}" alt="">
                                    </div>
                                    <div class="bsingle__content">
                                        <div class="meta-info">
                                            <ul>
                                                <li><i class="fal fa-eye"></i> 100 Views </li>
                                                <li><i class="fal fa-comments"></i> 35 Comments</li>
                                                <li><i class="fal fa-calendar-alt"></i> {{ $blog->created_at->format('d F, Y') }}</li>
                                            </ul>
                                        </div>
                                        <h2><a href="{{ route('blog.show', ['type' => $blog->type, 'blog' => $blog->id]) }}">{{ $blog->title }}</a></h2>
                                        <p>{!! substr(strip_tags($blog->content), 0, 350) !!}</p>
                                        <div class="blog__btn">
                                            <a href="{{ route('blog.show', ['type' => $blog->type, 'blog' => $blog->id]) }}" class="btn">Read More <i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $counter++;
                                @endphp
                            @else
                            @break
                        @endif
                    @endforeach


                    <div class="pagination-wrap">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a href="#"><i class="fas fa-angle-double-left"></i></a>
                                </li>
                                <li class="page-item active"><a href="#">1</a></li>
                                <li class="page-item"><a href="#">2</a></li>
                                <li class="page-item"><a href="#">3</a></li>
                                <li class="page-item"><a href="#">...</a></li>
                                <li class="page-item"><a href="#">10</a></li>
                                <li class="page-item"><a href="#"><i class="fas fa-angle-double-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar-widget">
                        <section id="search-3" class="widget widget_search">
                            <h2 class="widget-title">Search</h2>
                            <form role="search" method="get" class="search-form"
                                action="http://wordpress.zcube.in/finco/">
                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search &hellip;"
                                        value="" name="s" />
                                </label>
                                <input type="submit" class="search-submit" value="Search" />
                            </form>
                        </section>
                        <section id="custom_html-5" class="widget_text widget widget_custom_html">
                            <h2 class="widget-title">Follow Us</h2>
                            <div class="textwidget custom-html-widget">
                                <div class="widget-social">
                                    @foreach ($socialmediadata->social_links as $link)
                                    <a href="{{ $link['link'] }}"><i class="fab fa-{{ $link['name'] }}"
                                            style="font-size: 20px; padding:10px;"></i></a>
                                @endforeach

                                </div>
                            </div>
                        </section>

                        <section id="recent-posts-4" class="widget widget_recent_entries">
                            <h2 class="widget-title">Recent Posts</h2>
                            <ul>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($blogs->reverse() as $blog)
                                    @if ($blogType[0])
                                        @php $count++; @endphp
                                        @if ($count <= 5)

                                            <li>
                                                <a href="{{ route('blog.show', ['type' => $blog->type, 'blog' => $blog->id]) }}">{{ $blog->title }}</a>
                                                <span class="post-date">{{ $blog->created_at->format('d F, Y') }}</span>

                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>

                        </section>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-blog-end -->


</main>

@endsection
