<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <!-- Logo -->
            <div class="header-left">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('home/assets/img/logo/logo.png') }}" alt=""></a>
                </div>
                <div class="menu-wrapper  d-flex align-items-center">
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav> 
                            <ul id="navigation">                                                                                          
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="home/about.html">About</a></li>
                                <li><a href="{{ route('user.view.services') }}">Services</a></li>
                                {{-- <li><a href="home/blog.html">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog_details.html">Blog Details</a></li>
                                        <li><a href="home/elements.html">Element</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="home/contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> 
            <div class="header-right d-none d-lg-block">
                {{-- <a href="#" class="btn btn-primary"><img src="home/assets/img/icon/call.png" alt=""> (09) 123 581 661</a> --}}
                @auth
                <a href="{{ route('user.view.cart') }}" class="btn btn-primary">Cart</a>
                <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
    
                @else
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
    
                
                
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
    </header>