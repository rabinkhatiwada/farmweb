<div id="sidebar"  class="js-sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">ADMIN DASHBOARD</a>
        </div>
        <ul class="sidebar-nav" >

            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index',['type'=>'blog']) }}" class="sidebar-link">
                    <i class="fa fa-edit"></i>
                    Blogs
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.gallery.index') }}" class="sidebar-link">
                    <i class="fa fa-edit"></i>
                    Gallery
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.messages.index') }}" class="sidebar-link">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    Messages
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link">
                    <i class="fa fa-edit"></i>
                    Testimonials
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'faq']) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    FAQ
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'objective'   ]) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Objectives
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'breeding'   ]) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Breeding Details-Page
                </a>
            </li>


            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'feeding'   ]) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Feeding Details-Page
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'management'   ]) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Mangement Details-Page
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.blogs.index', ['type' => 'market'   ]) }}" class="sidebar-link">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    Market Information-Page
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>
                </i>
                    Front Settings
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.home') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.sliders.index') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Slider Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.blogs.index', ['type' => 'feature']) }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Features</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.about') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> About Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.service') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Service Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.blog') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Blog Page</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.page') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Other Pages</a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('admin.blogs.index', ['type' => 'brand']) }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Brand</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.blogs.index', ['type' => 'team']) }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Team</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.footer') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Footer</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.setting.contact') }}" class="sidebar-link mx-2"><i class="fa fa-wrench" aria-hidden="true"></i> Contact</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Log Out
                </a>
            </li>
        </ul>
    </div>
</div>
