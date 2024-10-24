
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                            <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{Route('home')}}">Home</a></li>
                            <li class="{{ Request::routeIs('about_us') ? 'active' : '' }}"><a href="{{Route('about_us')}}">About Us</a></li>
                            <!-- <li><a href="./class-details.html">Classes</a></li> -->
                            <li class="{{ Request::routeIs('services') ? 'active' : '' }}"><a href="{{Route('services')}}">Services</a></li>
                            <li class="{{ Request::routeIs('team') ? 'active' : '' }}"><a href="{{Route('team')}}">Our Team</a></li>
                    
                            <li class="{{ Request::routeIs('calculator') ? 'active' : '' }}"><a href="{{Route('calculator')}}">Bmi calculate</a></li>
                            <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a href="{{Route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="{{ asset('frontend_assets/img/Cactus_logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{Route('home')}}">Home</a></li>
                            <li class="{{ Request::routeIs('about_us') ? 'active' : '' }}"><a href="{{Route('about_us')}}">About Us</a></li>
                            <!-- <li><a href="./class-details.html">Classes</a></li> -->
                            <li class="{{ Request::routeIs('services') ? 'active' : '' }}"><a href="{{Route('services')}}">Services</a></li>
                            <li class="{{ Request::routeIs('team') ? 'active' : '' }}"><a href="{{Route('team')}}">Our Team</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about-us.html">About us</a></li>
                                    <li><a href="./class-timetable.html">Classes timetable</a></li>
                                    <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                                    <li><a href="./team.html">Our team</a></li>
                                    <li><a href="./gallery.html">Gallery</a></li>
                                    <li><a href="./blog.html">Our blog</a></li>
                                    <li><a href="./404.html">404</a></li>
                                </ul>
                            </li> -->
                            <li class="{{ Request::routeIs('calculator') ? 'active' : '' }}"><a href="{{Route('calculator')}}">Bmi calculate</a></li>
                            <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a href="{{Route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <!-- <div class="to-search search-switch">
                            <i class="fa fa-search"></i>
                        </div> -->
                        <div class="to-social">
                            <a href="https://www.facebook.com/profile.php?id=61559913255064&mibextid=rS40aB7S9Ucbxw6v"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a> -->
                            <a href="https://www.instagram.com/cactus_fitness_?igsh=NzZ2c3NhbHZmd2Zx"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->