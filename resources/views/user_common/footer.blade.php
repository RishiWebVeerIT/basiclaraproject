 <!-- Get In Touch Section Begin -->
<div class="gettouch-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-map-marker"></i>
                    <p>Plot no. 5, Cactus Fitness, Chhaya Colony,<br />Parvati Nagar, Akoli Road Amravati</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-mobile"></i>
                    <ul>
                        <li>+91 7758877153</li>
                        <!-- <li>125-668-886</li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text email">
                    <i class="fa fa-envelope"></i>
                    <p>Support.cactusfitness@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Get In Touch Section End -->
 <!-- Footer Section Begin -->
  <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo logo">
                            <a href="#"><img src="{{ asset('frontend_assets/img/Cactus_logo.png')}}" alt=""></a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Useful links</h4>
                        <ul>
                        <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{Route('home')}}">Home</a></li>
                            <li class="{{ Request::routeIs('about_us') ? 'active' : '' }}"><a href="{{Route('about_us')}}">About Us</a></li>
                            <!-- <li><a href="./class-details.html">Classes</a></li> -->
                            <li class="{{ Request::routeIs('services') ? 'active' : '' }}"><a href="{{Route('services')}}">Services</a></li>
                            
                            <li class="{{ Request::routeIs('calculator') ? 'active' : '' }}"><a href="{{Route('calculator')}}">Bmi calculate</a></li>
                            <li class="{{ Request::routeIs('gallery') ? 'active' : '' }}"><a href="{{Route('gallery')}}">Gallery</a></li>
                      
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Support</h4>
                        <ul>
                        <li class="{{ Request::routeIs('team') ? 'active' : '' }}"><a href="{{Route('team')}}">Our Team</a></li>
                        <li class="{{ Request::routeIs('contact') ? 'active' : '' }}"><a href="{{Route('contact')}}">Contact</a></li>
                        <li class="{{ Request::routeIs('rules') ? 'active' : '' }}"><a href="{{Route('rules')}}">Rules</a></li>
                        <li class="{{ Request::routeIs('policies') ? 'active' : '' }}"><a href="{{Route('policies')}}">Policies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget fs-about">
                        <h4>Tips & Guides</h4>
                     
                        <p style="text-align: justify;">Stay consistent with your workouts by setting a schedule and treating it like an appointment. Focus on form over weight to prevent injuries, and mix strength training with cardio for balanced fitness. Don't forget to fuel your body with nutritious foods and hydrate properly!</p>
                        <div class="fa-social">
                            <a href="https://www.facebook.com/profile.php?id=61559913255064&mibextid=rS40aB7S9Ucbxw6v"><i class="fa fa-facebook"></i></a>
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
                            <!-- <a href="#"><i class="fa fa-youtube-play"></i></a> -->
                            <a href="https://www.instagram.com/cactus_fitness_?igsh=NzZ2c3NhbHZmd2Zx"><i class="fa fa-instagram"></i></a>
                            <!-- <a href="#"><i class="fa  fa-envelope-o"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->