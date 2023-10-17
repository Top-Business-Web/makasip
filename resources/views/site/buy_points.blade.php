@extends('site.layouts.master')
@section('page_name')
{{trans('site.points')}} | {{trans('site.makasb')}}
@endsection
@section('site_css')
    {{--        <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css"/>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
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
        <div class=" Home buyPointsss">
            <!--  -->
            <div class="buyPointss">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div>
                                <img src="{{asset('assets/site/img')}}/Coins-rafiki.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="buyPointB">
                                <h3 class="fs-4 fw-bold">
                                    {{trans('site.boost Your promotion and save Your time')}}
                                </h3>
                                <p class="fs-6 mt-lg-3  mb-5 lh-base">

                                    {{trans('site.You can choose one of the available')}}
                                    <span class="number">30%</span>
                                    {{trans('site.Your bought (+Bonus) points will be added')}}



                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mainHeading text-center pb-5">
                        <h1>
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
                        </h1>
                    </div>
                </div>
                <div class="buyPointsPackage">
                    <div class="container  mySwiper">
                        <div class="swiper-wrapper">

                            @foreach($points as $point)
                            <div class="swiper-slide">
{{--                                <a href="{{route('pointsPrices',encrypt($point->id))}}">--}}
                                <a href="https://wa.me/+966583187789?text= اريد شراء عدد النقاط({{ $point->number_of_points }}) وايميلي هو({{ auth()->user()->email }}) ">
                                    <div class="buyPointsPackags">
                                        <div class="ObigetTitle ">
                                            <h2 class="Title">{{$point->price}}$</h2>
                                        </div>
                                        <div class="Prise PriseHover">
                                            <span class="prise">{{$point->number_of_points}}</span>
                                            <span class="Week">{{trans('site.points')}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection
@section('site_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            breakpoints: {
                450: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                991: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

@endsection
