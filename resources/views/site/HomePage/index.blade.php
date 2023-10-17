@extends('site.layouts.master')
@section('page_name')
    مكاسـب | الصفحة الرئيسية
@endsection
@section('site_css')
    <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.css"/>
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/homePage.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/homepage_ar.css"/>
    @endif
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/Conis.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/conis_ar.css"/>
    @endif
@endsection
@section('content')
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex">
        @include('site.HomePage.sidebar')
        <div class="Home">
            <div class="container">
                <div class="HomePageDetails">
                    <div class="welcomeMassage">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="typier">
                                    <h2> {{trans('site.Welcome')}}</h2>
                                    <span class="fs-5 text-black-50">{{trans('site.To')}}</span>
                                    <h3 class="typierEffect active" data-typier="{{trans('site.Makasb')}}"></h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div>
                                    <img src="{{asset('assets/site/img')}}/Enthusiastic-amico.svg" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pointsFree section">
                    <div class="mainHeading text-center">
                        <h1>
                            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                            <span class="red">F</span>
                            <span class="red">R</span>
                            <span class="red">E</span>
                            <span class="red">E</span>
                            <span class="space"></span>
                            <span>P</span>
                            <span>O</span>
                            <span>I</span>
                            <span>N</span>
                            <span>T</span>
                            <span>S</span>
                            @else
                            نقاط مجانية
                            @endif
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-right-left"></i>
                                        <h3>{{ app()->getLocale() == 'ar' ? $setting_points_1->title_ar : $setting_points_1->title_en }}</h3>
                                    </div>
                                    <p>
                                        {{ app()->getLocale() == 'ar' ? $setting_points_1->body_ar : $setting_points_1->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-hand-point-down"></i>
                                        <h3>{{ app()->getLocale() == 'ar' ? $setting_points_2->title_ar : $setting_points_2->title_en }}</h3>
                                    </div>
                                    <p>
                                        {{ app()->getLocale() == 'ar' ? $setting_points_2->body_ar : $setting_points_2->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-user-plus"></i>
                                        <h3>{{ app()->getLocale() == 'ar' ? $setting_points_3->title_ar : $setting_points_3->title_en }}</h3>
                                    </div>
                                    <p>
                                        {{ app()->getLocale() == 'ar' ? $setting_points_3->body_ar : $setting_points_3->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pointsBuy section">
                    <div class="mainHeading text-center">
                        @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
                        <h1>
                            <a href="{{route('buyPoints')}}">
                                <span class="red">B</span>
                                <span class="red">U</span>
                                <span class="red">Y</span>
                                <span class="space"></span>
                                <span>P</span>
                                <span>O</span>
                                <span>I</span>
                                <span>N</span>
                                <span>T</span>
                                <span>S</span>
                            </a>

                        </h1>
                        @else
                            <h1>
                                <a href="{{route('buyPoints')}}">    شراء نقاط</a>

                            </h1>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-money-bill-trend-up"></i>
                                        <h3>{{ app()->getLocale() == 'ar' ? $setting_points_4->title_ar : $setting_points_4->title_en }}</h3>
                                    </div>
                                    <p>
                                        {{ app()->getLocale() == 'ar' ? $setting_points_4->body_ar : $setting_points_4->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                            <div class="servicesBox">
                                <div class="circle">
                                    <i class="fa-solid fa-circle right"></i>
                                    <i class="fa-solid fa-circle left"></i>
                                </div>
                                <div>
                                    <div>
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                        <h3>{{ app()->getLocale() == 'ar' ? $setting_points_5->title_ar : $setting_points_5->title_en }}</h3>
                                    </div>
                                    <p>
                                        {{ app()->getLocale() == 'ar' ? $setting_points_5->body_ar : $setting_points_5->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('site_js')
    <script src="{{asset('assets/site/JS')}}/homePage.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })
    </script>
@endsection
