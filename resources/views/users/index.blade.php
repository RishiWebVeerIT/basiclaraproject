@extends('layouts.frontend')
@section('section')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="video-container">
        <video autoplay muted loop>
            <source src="{{asset('assets/img/videoplayback.mp4')}}" type="video/mp4" />
        </video>
        <div class="caption">
            <!-- .................................................... -->

            <div class="hs-slider owl-carousel caption">
                <div class="hs-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <div class="hi-text">
                                    <span>Shape your body</span>
                                    <h1>Be <strong>strong</strong> traning hard</h1>
                                    <a href="{{Route('contact')}}" class="primary-btn">Get info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hs-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Shape your body</span>
                            <h1>Be <strong>strong</strong> traning hard</h1>
                            <a href="{{Route('contact')}}" class="primary-btn">Get info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            </div>

            <!-- .................................................... -->
        </div>
    </div>
    <div class="hs-slider owl-carousel caption d-none">
        <div class="hs-item set-bg" data-setbg="{{ asset('frontend_assets/img/hero/hero-1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Shape your body</span>
                            <h1>Be <strong>strong</strong> traning hard</h1>
                            <a href="{{Route('contact')}}" class="primary-btn">Get info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="{{ asset('frontend_assets/img/hero/hero-2.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Shape your body</span>
                            <h1>Be <strong>strong</strong> traning hard</h1>
                            <a href="{{Route('contact')}}" class="primary-btn">Get info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Why chose us?</span>
                    <h2>PUSH YOUR LIMITS FORWARD</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-034-stationary-bike"></span>
                    <h4>Modern equipment</h4>
                    <p>The gym offers modern equipment designed for efficient and versatile workouts.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-033-juice"></span>
                    <h4>Healthy nutrition plan</h4>
                    <p>A gym healthy nutrition plan focuses on balanced meals rich in protein, complex carbs, and
                        healthy fats to fuel workouts and promote recovery.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-002-dumbell"></span>
                    <h4>Professional training plan</h4>
                    <p>A professional gym training plan focuses on tailored exercises, proper technique, and progression
                        to achieve specific fitness goals efficiently.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-014-heart-beat"></span>
                    <h4>Unique to your needs</h4>
                    <p>Tailored fitness routines at the gym, designed to meet your personal goals and needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- Classes Section Begin -->
<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Classes</span>
                    <h2>WHAT WE CAN OFFER</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/strength.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>STRENGTH</span> -->
                        <h5>STRENGTH</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/cardio.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Cardio</span> -->
                        <h5>Cardio</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/cupping.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>CuppingCupping</span> -->
                        <h5>Cupping</h5>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/yoga.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Yoga</span> -->
                        <h5>Yoga</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/crossfit.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Cross-fit</span> -->
                        <h5>Cross-fit</h5>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/steam.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Steam</span> -->
                        <h5>Steam</h5>
                        
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/personal_training.jpg')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Personal Training</span> -->
                        <h4>Personal Training</h4>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('frontend_assets/img/services/zumba.png')}}" alt="">
                    </div>
                    <div class="ci-text">
                        <!-- <span>Training</span> -->
                        <h4>Zumba</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- Banner Section Begin -->
<section class="banner-section set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_2.webp')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bs-text">
                    <h2>registration now to get more deals</h2>
                    <div class="bt-tips">Where health, beauty and fitness meet.</div>
                    <a href="{{Route('contact')}}" class="primary-btn  btn-normal">Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Pricing Section Begin -->
<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Plan</span>
                    <h2>Choose your pricing plan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>Monthly</h3>
                    <div class="pi-price">
                        <h2>1500.00 Rs.</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <!-- <a href="#" class="primary-btn pricing-btn">Enroll now</a> -->
                    <!-- <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>Quaterly</h3>
                    <div class="pi-price">
                        <h2>4000.00 Rs.</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <!-- <a href="#" class="primary-btn pricing-btn">Enroll now</a> -->
                    <!-- <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>Half Yearly</h3>
                    <div class="pi-price">
                        <h2>7000.00 Rs.</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <!-- <a href="#" class="primary-btn pricing-btn">Enroll now</a> -->
                    <!-- <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing Section End -->

<!-- Gallery Section Begin -->
<div class="gallery-section">
    <div class="gallery">
        <div class="grid-sizer"></div>
        <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_1.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_1.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_5.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_5.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_6.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_6.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_7.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_7.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_4.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_4.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
        <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_2.webp')}}">
            <a href="{{ asset('frontend_assets/img/gallary/gallary_l_2.webp')}}" class="thumb-icon image-popup"><i
                    class="fa fa-eye"></i></a>
        </div>
    </div>
</div>
<!-- Gallery Section End -->


<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Why chose us?</span>
                    <h2>Facilities</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="fa fa-shower" aria-hidden="true"></span>
                    <h4>Shower , Steam Room</h4>
                    <p>Our gym features refreshing shower and steam facilities, providing a relaxing way to unwind after an intense workout.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="fa fa-unlock-alt" aria-hidden="true"></span>
                    <h4>Lockers Available</h4>
                    <p>The gym features locker facilities for a convenient and comfortable workout experience.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span  class="fa fa-car" aria-hidden="true"></span>
                    <h4>Parking Available</h4>
                    <p>Our gym offers ample parking facilities to ensure a convenient and hassle-free experience for all members.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="fa fa-smile-o" aria-hidden="true"></span>
                    <h4>Resting Place Balcony</h4>
                    <p>The gym features a comfortable rest facility for members to relax and recharge between workouts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->
 

<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>TRAIN WITH EXPERTS</h2>
                    </div>
                    <a href="{{Route('contact')}}" class="primary-btn btn-normal appoinment-btn">appointment</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Gauri Agrahari</h4>
                            <span>Founder</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Mayur Rode</h4>
                            <span>CEO (Managing Director)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Zin Anuradha Wathodkar</h4>
                            <span>Zumba Instructor</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Neetu Jangid</h4>
                            <span>Yoga Instructur</span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
            <p>Our gym boasts a dedicated team of seven members, including three male trainers and two female trainers, who are committed to helping clients achieve their fitness goals through personalized training and support.</p>
            </div>
            
        </div>
    </div>
</section>
<!-- Team Section End -->



@endsection

@push('style')
<style>
.video-container {
    width: 100%;
    height: 760px;
    overflow: hidden;
    position: relative;
}
.choseus-section .fa{
    font-size: 45px;
}

.class-item .ci-pic img {
    min-width: 100%;
    height: 300px;
}

.video-container video {
    min-width: 100%;
    min-height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}

.team-section p{
    font-size: 16px;
    padding-left: 100px;
    padding-right: 100px;
}

/* Just styling the content of the div, the *magic* in the previous rules */
.video-container .caption {
    z-index: 1;
    position: relative;
}
</style>
@endpush