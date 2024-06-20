<header class="header-area header">
    <div id="header-sticky" class="menu-area">
      <div class="container">
          <div class="second-menu">
              <div class="row align-items-center">
                   <div class="col-xl-3 col-lg-3">
                      <div class="logo">
                          <a href="index.html"><img src="img/logo/logo.png" alt="logo"></a>
                      </div>
                  </div>
                 <div class="col-xl-6 col-lg-6">

                      <div class="main-menu text-right text-xl-right">
                          <nav id="mobile-menu">
                                 <ul>

                                   <li><a href="{{ url('/') }}">Home</a></li>

                                   <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                   <li><a href="{{ url('/services') }}">Services</a></li>
                                   <li><a href="{{ url('/blogs') }}">Blogs</a></li>


                                   <li class="has-sub">
                                      <a href="#">Pages</a>
                                      <ul>
                                            <li><a href="{{ url('/breeding') }}">Breeding</a></li>
                                            <li><a href="{{ url('/feeding') }}">Feeding</a></li>
                                            <li><a href="{{ url('/management') }}">Management</a></li>
                                            <li><a href="{{ url('/market') }}">Market</a></li>
                                            <li><a href="{{ url('/government-support') }}">Government Support</a></li>
                                             <li><a href="{{ url('/youth-engagement') }}">Youth Engagement</a></li>
                                             <li><a href="{{ url('/cattle-farming-potential') }}">Cattle Farming Potential</a></li>
                                             <li><a href="{{ url('/government-support') }}">Gallery</a></li>

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
                                     <a href="tel:917052101786" class="btn">+91-7052-101-786 </a>
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
    <form role="search" method="get" id="searchform"   class="searchform" action="http://wordpress.zcube.in/xconsulta/">
       <input type="text" name="s" id="search" placeholder="Search"/>
       <button><i class="fa fa-search"></i></button>
    </form>
    <div id="cssmenu3" class="menu-one-page-menu-container">
       <ul  class="menu">
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.html">Home</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="about.html">About Us</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="services.html">Services</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="pricing.html">Pricing </a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="team.html">Team </a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="projects.html">Cases Study</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="blog.html">Blog</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="contact.html">Contact</a></li>
       </ul>
    </div>
    <div id="cssmenu2" class="menu-one-page-menu-container">
       <ul id="menu-one-page-menu-12" class="menu">
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+8 12 3456897</span></a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@example.com</span></a></li>
       </ul>
    </div>
 </div>
 <div class="offcanvas-overly"></div>
