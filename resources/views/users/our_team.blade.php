@extends('layouts.frontend')
@section('section')
@include('user_common.breadcrumb')
    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
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
                <div class="col-lg-4 col-sm-6 m-a">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Gauri Agrahari</h4>
                            <span>Founder</span>
                            <div class="tt_social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa  fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 m-a">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Mayur Rode</h4>
                            <span>CEO (Managing Director)</span>
                            <div class="tt_social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa  fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm- m-a">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Zin Anuradha Wathodkar</h4>
                            <span>Zumba Instructor</span>
                            <div class="tt_social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa  fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 m-a">
                    <div class="ts-item set-bg" data-setbg="{{ asset('frontend_assets/img/team/team-3.jpg')}}">
                        <div class="ts_text">
                            <h4>Neetu Jhangid</h4>
                            <span>Yoga Instructor</span>
                            <div class="tt_social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa  fa-envelope-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
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
    .m-a{
        margin: 0 auto;
    }

    .team-section p{
    font-size: 16px;
    padding-left: 100px;
    padding-right: 100px;
}
</style>
@endpush