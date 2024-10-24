@extends('layouts.frontend')
@section('section')

@include('user_common.breadcrumb')
   <!-- Services Section Begin -->
   <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What we do?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 order-lg-1 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/personal_training.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-2 col-md-6 p-0">
                    <div class="ss-text">
                        <h4>Personal training</h4>
                        <p>Our personal training service offers tailored fitness plans designed to meet your unique goals, ensuring focused guidance and support. Achieve lasting results with customized workouts and one-on-one coaching.</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-3 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/cupping.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-4 col-md-6 p-0">
                    <div class="ss-text">
                        <h4>Cupping Therapy</h4>
                        <p>Cupping therapy is an ancient healing technique that uses suction cups to relieve pain, reduce inflammation, and improve blood flow..</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-8 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/cardio.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-7 col-md-6 p-0">
                    <div class="ss-text second-row">
                        <h4>Cardio</h4>
                        <p>Cardio exercise is a physical activity that increases heart rate and improves cardiovascular endurance.</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-6 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/strength.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-5 col-md-6 p-0">
                    <div class="ss-text second-row">
                        <h4>Strength training</h4>
                        <p>Build strength, improve endurance, and transform your body through personalized strength training sessions.</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 order-lg-1 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/yoga.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-2 col-md-6 p-0">
                    <div class="ss-text">
                        <h4>Yoga</h4>
                        <p>A yoga session harmonizes the body and mind through mindful movement, breath, and meditation..</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-3 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/zumba.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-4 col-md-6 p-0">
                    <div class="ss-text">
                        <h4>Zumba</h4>
                        <p>A Zumba session is an energetic dance workout that combines lively music and rhythmic movements to boost fitness and mood.</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-8 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/steam.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-7 col-md-6 p-0">
                    <div class="ss-text second-row">
                        <h4>Steam</h4>
                        <p>Experience a rejuvenating body steam service that detoxifies the skin, promotes relaxation, and enhances overall well-being.</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
                <div class="col-lg-3 order-lg-6 col-md-6 p-0">
                    <div class="ss-pic">
                        <img src="{{ asset('frontend_assets/img/services/crossfit.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 order-lg-5 col-md-6 p-0">
                    <div class="ss-text second-row">
                        <h4>CrossFit</h4>
                        <p>A CrossFit session is an intense, varied workout combining weightlifting, cardio, and functional movements to build strength and endurance..</p>
                        <!-- <a href="#">Explore</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

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
@endsection

<style>
    .ss-pic img{
        object-fit: cover !important;
    }
</style>
