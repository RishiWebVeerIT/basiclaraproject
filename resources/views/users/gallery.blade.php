@extends('layouts.frontend')
@section('section')

@include('user_common.breadcrumb')
<div class="gallery-section gallery-page">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_1.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_1.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_2.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_2.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_3.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_3.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_4.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_4.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_5.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_5.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_6.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_6.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_l_7.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_l_7.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_p_1.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_p_1.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="{{ asset('frontend_assets/img/gallary/gallary_p_2.webp')}}">
                <a href="{{ asset('frontend_assets/img/gallary/gallary_p_2.webp')}}" class="thumb-icon image-popup"><i class="fa fa-eye"></i></a>
            </div>
        </div>
    </div>
@endsection
