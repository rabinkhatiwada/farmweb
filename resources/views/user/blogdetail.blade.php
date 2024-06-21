@extends('user.components.app')
@section('title', 'Blog Details')
@section('content')

    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="breadcrumb-wrap text-left">
                            <div class="breadcrumb-title">
                                <h2>Blog Details</h2>
                                <div class="breadcrumb-wrap">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
        <section class="inner-blog b-details-p pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-wrap">
                            <div class="details__content pb-30">
                                <h2>{{ $blog->title }}</h2>
                                <div class="details__content-img">
                                    <img src="{{ asset('blog_images/' . $blog->image1) }}" alt="{{ $blog->title }}" alt="{{$blog->title}}">
                                </div>
                                <div class="meta-info">
                                    <ul>
                                        <li><i class="fal fa-eye"></i> 100 Views  </li>
                                        <li><i class="fal fa-comments"></i> 35 Comments</li>
                                        <li><i class="fal fa-calendar-alt"></i> {{ $blog->updated_at->format('Y-m-d') }}</li>
                                    </ul>
                                </div>

                                <p>{!! $blog->content !!}</p>



                                <div class="row">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="post__tag">
                                            <h5>Related Tags</h5>
                                            <ul>
                                                <li><a href="#">organic</a></li>
                                                <li><a href="#">Foods</a></li>
                                                <li><a href="#">tasty</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="posts_navigation pt-35 pb-35">
                                <div class="row align-items-center">
                                    <div class="col-xl-4 col-md-5">
                                        <div class="prev-link">
                                            <span>Prev Post</span>
                                            @if ($previousBlog)
                                                <h4><a href="{{ route('blog.show', $previousBlog->id) }}">{{ $previousBlog->title }}</a></h4>
                                            @else
                                                <h4><span>No Previous Post</span></h4>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-2 text-left text-md-center">
                                        <a href="blog.html" class="blog-filter"><img src="img/icon/c_d01.png" alt=""></a>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="next-link text-left text-md-right">
                                            <span>Next Post</span>
                                            @if ($nextBlog)
                                                <h4><a href="{{ route('blog.show', $nextBlog->id) }}">{{ $nextBlog->title }}</a></h4>
                                            @else
                                                <h4><span>No Next Post</span></h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="related__post mt-45 mb-85">
                                <div class="post-title">
                                    <h4>Related Post</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="related-post-wrap mb-30">
                                            <div class="post-thumb">
                                                <img src="img/blog/b_details03.jpg" alt="">
                                            </div>
                                            <div class="rp__content">
                                                <h3><a href="#">Auis nostrud exercita ullamco laboris nisi ut</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or
                                                    incididunt ut labore et dolore.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="related-post-wrap mb-30">
                                            <div class="post-thumb">
                                                <img src="img/blog/b_details04.jpg" alt="">
                                            </div>
                                            <div class="rp__content">
                                                <h3><a href="#">Excepteur sint occaecat cupida tat non proident</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or
                                                    incididunt ut labore et dolore.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="avatar__wrap text-center mb-45">
                                <div class="avatar-img">
                                    <img src="img/blog/comment/avatar.png" alt="">
                                </div>
                                <div class="avatar__info">
                                    <h5>Rosalina William</h5>
                                    <div class="avatar__info-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-behance"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="avatar__wrap-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequa aute irure dolor.</p>
                                </div>
                            </div>
                            <div class="comment__wrap pb-45">
                                <div class="comment__wrap-title">
                                    <h5>Comments</h5>
                                </div>
                                <div class="single__comment mb-35">
                                    <div class="comments-avatar">
                                        <img src="img/blog/comment/c_01.png" alt="">
                                    </div>
                                    <div class="comment-text">
                                        <div class="avatar-name mb-15">
                                            <h6>ALina Kelian</h6>
                                            <span>19th May 2021</span>
                                        </div>
                                        <p>The bee's knees bite your arm off bits and bobs he nicked it gosh gutted mate blimey, old off his nut argy bargy vagabond buggered dropped.</p>
                                        <a href="#" class="comment-reply mt-15"><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                                <div class="single__comment children mb-35">
                                    <div class="comments-avatar">
                                        <img src="img/blog/comment/c_02.png" alt="">
                                    </div>
                                    <div class="comment-text">
                                        <div class="avatar-name mb-15">
                                            <h6>Rlex Kelian <i class="fas fa-bookmark"></i></h6>
                                            <span>19th May 2021</span>
                                        </div>
                                        <p>Do one say wind up buggered bobby bite your arm off gutted mate, David victoria sponge cup of char chap fanny around.</p>
                                        <a href="#" class="comment-reply mt-15"><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                                <div class="single__comment">
                                    <div class="comments-avatar">
                                        <img src="img/blog/comment/c_03.png" alt="">
                                    </div>
                                    <div class="comment-text">
                                        <div class="avatar-name mb-15">
                                            <h6>Roboto Alex</h6>
                                            <span>21th May 2021</span>
                                        </div>
                                        <p>Baking cakes is cobblers wellies William geeza bits and bobs what a plonker it's your round,</p>
                                        <a href="#" class="comment-reply mt-15"><i class="fas fa-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div id="comments" class="comments-area  mt-45">
                                <div id="respond" class="comment-respond">
                                <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/finco/?p=2112#respond" style="display:none;">Cancel reply</a></small></h3>
                                <form action="http://wordpress.zcube.in/finco/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
                                    <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                    <p class="comment-field"><i class="fas fa-user"></i><input id="author" placeholder="Your Name" name="author" type="text"></p>
                                    <p class="comment-field"><i class="fas fa-envelope"></i><input id="email" placeholder="your-real-email@example.com" name="email" type="text"></p>
                                    <p class="comment-field"><i class="fas fa-globe"></i><input id="url" name="url" placeholder="http://your-site-name.com" type="text"> </p>
                                    <p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="2112" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </p>
                                </form>
                                </div>
                                <!-- #respond -->
                            </div>

                        </div>
                    </div>
                    <!-- #right side -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <aside class="sidebar-widget">
                        <section id="search-3" class="widget widget_search">
                            <h2 class="widget-title">Search</h2>
                            <form role="search" method="get" class="search-form" action="http://wordpress.zcube.in/finco/">
                                <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                                </label>
                                <input type="submit" class="search-submit" value="Search" />
                            </form>
                        </section>
                        <section id="custom_html-5" class="widget_text widget widget_custom_html">
                            <h2 class="widget-title">Follow Us</h2>
                            <div class="textwidget custom-html-widget">
                                <div class="widget-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-wordpress"></i></a>
                                </div>
                            </div>
                        </section>
                        <section id="categories-1" class="widget widget_categories">
                            <h2 class="widget-title">Categories</h2>
                            <ul>
                                <li class="cat-item cat-item-16"><a href="#">Branding</a> (4)</li>
                                <li class="cat-item cat-item-23"><a href="#">Corporat</a> (3)</li>
                                <li class="cat-item cat-item-18"><a href="#">Design</a> (3)</li>
                                <li class="cat-item cat-item-22"><a href="#">Gallery</a> (3)</li>
                            </ul>
                        </section>
                        <section id="recent-posts-4" class="widget widget_recent_entries">
                            <h2 class="widget-title">Recent Posts</h2>
                            <ul>
                                @foreach ($recentBlogs as $recentBlog)
                                    <li>
                                        <a href="{{ route('blog.show', $recentBlog->id) }}">{{ $recentBlog->title }}</a>
                                        <span class="post-date">{{ $recentBlog->created_at->format('F j, Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                        <section id="tag_cloud-1" class="widget widget_tag_cloud">
                            <h2 class="widget-title">Tag</h2>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link tag-link-28 tag-link-position-1" style="font-size: 8pt;" aria-label="app (1 item)">app</a>
                                <a href="#" class="tag-cloud-link tag-link-17 tag-link-position-2" style="font-size: 8pt;" aria-label="Branding (1 item)">Branding</a>
                                <a href="#" class="tag-cloud-link tag-link-20 tag-link-position-3" style="font-size: 8pt;" aria-label="corporat (1 item)">corporat</a>
                                <a href="#" class="tag-cloud-link tag-link-24 tag-link-position-4" style="font-size: 16.4pt;" aria-label="Design (2 items)">Design</a>
                                <a href="#" class="tag-cloud-link tag-link-25 tag-link-position-5" style="font-size: 22pt;" aria-label="gallery (3 items)">gallery</a>
                                <a href="#" class="tag-cloud-link tag-link-26 tag-link-position-6" style="font-size: 8pt;" aria-label="video (1 item)">video</a>
                                <a href="#" class="tag-cloud-link tag-link-29 tag-link-position-7" style="font-size: 16.4pt;" aria-label="web design (2 items)">web design</a>
                            </div>
                        </section>
                        </aside>
                    </div>
                    <!-- #right side end -->
                </div>
            </div>
        </section>
        <!-- inner-blog-end -->

    </main> 

@endsection
