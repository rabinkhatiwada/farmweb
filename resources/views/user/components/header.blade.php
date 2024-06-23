<header class="header-area header">
    @php
        $data = App\Helper::getHomePageSetting();
        $mail=App\Helper::getContactPageSetting();


    @endphp
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="{{ route('home')}}"><img src="{{ Storage::url($data->logo) }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">

                        <div class="main-menu text-right text-xl-right">
                            <nav id="mobile-menu">
                                <ul>

                                    <li><a href="{{ route('home')}}">Home</a></li>

                                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                    <li><a href="{{ url('/services') }}">Services</a></li>
                                    <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>



                                    <li class="has-sub">
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="{{ url('/breeding') }}">Breeding</a></li>
                                            <li><a href="{{ url('/feeding') }}">Feeding</a></li>
                                            <li><a href="{{ url('/management') }}">Management</a></li>
                                            <li><a href="{{ url('/market') }}">Market</a></li>
                                            

                                        </ul>
                                    </li>

                                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 text-right d-none d-lg-block text-right text-xl-right">
                        <div class="login">
                            <ul>
                                <li><a href="#" class="menu-tigger"><i class="fal fa-search"></i></a></li>
                                <li>
                                    <div class="second-header-btn">
                                        <a href="tel:917052101786" class="btn">{!! $data->h_phone !!} </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="offcanvas-menu">
    <span class="menu-close"><i class="fas fa-times"></i></span>
    <form role="search" method="get" id="searchform" class="searchform"
        action="http://wordpress.zcube.in/xconsulta/">
        <input type="text" name="s" id="search" placeholder="Search" />
        <button><i class="fa fa-search"></i></button>
    </form>
    <div id="cssmenu3" class="menu-one-page-menu-container">
        <ul class="menu">
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/') }}">Home</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/about-us') }}">About Us</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/services') }}">Services</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/blogs') }}">Blogs </a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/contact') }}">Contact </a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="{{ url('/gallery') }}">Gallery</a>
            </li>

        </ul>
    </div>
    <div id="cssmenu2" class="menu-one-page-menu-container">
        <ul id="menu-one-page-menu-12" class="menu">
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>{!! $data->h_phone !!}</span></a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a
                    href="#howitwork"><span>{!! $mail->email !!}</span></a></li>
        </ul>
    </div>
</div>
<div class="offcanvas-overly"></div>
