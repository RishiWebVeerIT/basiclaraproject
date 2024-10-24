@extends('layouts.frontend')
@section('section')

@include('user_common.breadcrumb')

     <!-- Contact Section Begin -->
     <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>Contact Us</span>
                        <h2>GET IN TOUCH</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>Plot no. 5, Cactus Fitness, Chhaya Colony,<br />Parvati Nagar, Akoli Road Amravati</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                            <li>+91 7758877153</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>Support.cactusfitness@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="{{route('user.enquiry')}}" enctype='multipart/form-data'>
                            @csrf
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="text" name="mobile" placeholder="Mobile No." required>
                            <input type="text" name="age" placeholder="Age" required>
                            <textarea placeholder="Address" name="address" required></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.9695233341868!2d77.73790737525343!3d20.91354578070709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd6bb90c13e2e37%3A0xd023460309a34285!2sCactus%20Fitness!5e0!3m2!1sen!2sin!4v1728048229596!5m2!1sen!2sin"
                    height="550" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection