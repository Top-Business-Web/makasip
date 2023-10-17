@extends('site.layouts.master')
@section('page_name')
    {{trans('site.makasb')}} | {{trans('site.free_market')}}
@endsection
@section('site_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style.css" />
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style_ar.css" />
    @endif
@endsection
@section('content')

    <header>
    <nav class="navbar navbar-expand-lg navbar-light navTop">
        <div class="container">
            <a class="navbar-brand logo" href="#"><img class="LogoBrand" src="{{asset('assets/site/img')}}/logo.png" alt="" /></a>
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-3 mb-lg-0 navTopLink">
                    <li class="nav-item">
                        <a class="nav-link active me-3" data-scroll="Home" aria-current="page" href="#">{{trans('site.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" data-scroll="Services" href="#">{{trans('site.Services')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3" data-scroll="About" href="#">{{trans('site.About Us')}}</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" data-scroll="Features" href="#">{{trans('site.Features')}}</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" data-scroll="coins" href="#">{{trans('site.coins')}}</a>
                    </li>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{trans('site.lang')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['name'] }}
                                    </a>
                                </li>
                        @endforeach
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar nav2 forAll">
        <div class="container">
            <img class="LogoNav2" src="{{asset('assets/site/img')}}/logo.png" alt="" />
            <form action="{{route('postLogin')}}" method="post" class="Login">
                @csrf
                <div class="filedLogin">
                    <input type="email" required placeholder="{{trans('site.email')}}" name="email" id="email" />
                    <input type="password" required name="password" placeholder="{{trans('site.password')}}" />
                    <button type="submit" class="siadeButton"><a>{{trans('site.login')}} </a></button>
                </div>
                <div class="remember d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="rememberMe" id="remember" />
                        <label class="text-black-50" for="remember">{{trans('site.Remember')}}</label>
                    </div>
                    <a class="text-black-50" href="{{route('forgetPassword')}}">{{trans('site.Forget password?')}}</a>
                </div>
            </form>
            <div>
                <button class="mainButton X"><a href="{{route('register')}}">{{trans('site.Registration')}} </a></button>
            </div>
        </div>
    </nav>
    <!-- for Mobile W-769 -->
{{--    <div class="LoginRight">--}}
{{--        <div class="close">--}}
{{--            <i class="fa-solid fa-xmark"></i>--}}
{{--        </div>--}}
{{--     --}}
{{--        <form action="{{route('postLogin')}}" method="post" class="Login formRight"  >--}}
{{--            @csrf--}}
{{--            <div class="filedLogin">--}}
{{--                <input type="email" placeholder="Email" id="email" class="mb-2" />--}}
{{--                <input type="password" placeholder="Password" class="mb-1" />--}}
{{--                <div class="mb-3 ms-3">--}}
{{--                    <a class="text-black-50 fs-6" href="#">{{trans('site.Forget password?')}}</a>--}}
{{--                </div>--}}
{{--                <button type="submit"  class="siadeButton"><a>{{trans('site.login')}} </a></button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </div>--}}
{{--    --}}
        <nav class="navbar nav2 MobileNav">
        <div class="container">
            <div>
                <img class="LogoNav2" src="{{asset('assets/site/img')}}/logo.png" alt="" />
                <form action="{{route('postLogin')}}" method="post" class="Login row">
                    @csrf
                    <div class=" col-md-6 col-12">
                        <div class="filedLogin row">
                           <div class="col-md-6 col-12">
                               <input class="mb-2" type="email" required placeholder="{{trans('site.email')}}" name="email" id="email" />
                           </div>
                            <div class="col-md-6 col-12">
                                <input class="mb-2" type="password" required name="password" placeholder="{{trans('site.password')}}" />
                            </div>

                            <div class="col-md-6 col-12">
                            <button type="submit" class="siadeButton"><a>{{trans('site.login')}} </a></button>
                            </div>
                        </div>
                    </div>
                    <div class="remember d-flex">
                        <div>
                            <input class="mb-2" type="checkbox" name="rememberMe" id="remember" />
                            <label class="mb-2" class="text-black-50" for="remember">{{trans('site.Remember')}}</label>
                        </div>
                        <a class="text-black-50" href="{{route('forgetPassword')}}">{{trans('site.Forget password?')}}</a>
                    </div>
                </form>
            </div>

            <div>
{{--                <button class="mainButton"><a href="" class="showLoginRight">{{trans('site.login')}} </a></button>--}}
{{--                <span class="or fs-4 ms-2">or</span>--}}
                <button class="mainButton  ms-2"><a href="{{route('register')}}">{{trans('site.Registration')}} </a></button>
            </div>
        </div>
    </nav>
    <!--  -->
</header>
<section class="section" id="Home">
    <div id="carouselExampleDark" class="carousel carousel-dark slide container" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($data['sliders'] as $slider)
            <button type="button" {{($loop->first == 'true') ? 'class=active' : ''}} data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->iteration-1}}" aria-label="Slide {{$loop->iteration}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($data['sliders'] as $slider)
            <div class="row carousel-item {{($loop->first == 'true') ? 'active' : ''}} align-items-center justify-content-center" data-bs-interval="20000">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <img src="{{asset($slider->image)}}" alt="" />
                </div>
                <div class="col-md-6 col-sm-12 homeInfo">
{{--                    <h1 class="fs-4 fw-bold">--}}
{{--                        <span class="Makasb fs-2">Makasb</span> is a network that will--}}
{{--                        help you grow your social presence.--}}
{{--                    </h1>--}}
                    <p class="fs-6 mt-lg-3 lh-base">
                        {!! $slider['desc_'.\Illuminate\Support\Facades\App::getLocale()] !!}
                    </p>
                    <button class="mainButton mb-5 mt-lg-3">
                        <a href="{{$slider->btn_link}}">{{$slider['btn_title_'.\Illuminate\Support\Facades\App::getLocale()]}}</a>
                    </button>
                </div>
            </div>
            <!--  -->
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev"></button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next"></button>
    </div>
</section>
<section class="section" id="Services">
    <div class="container">
        <div class="mainHeading text-center">
            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
            <h1>
                <span>S</span>
                <span>E</span>
                <span>R</span>
                <span>V</span>
                <span>I</span>
                <span>C</span>
                <span>E</span>
                <span>S</span>
            </h1>
            @else
                <h1>
                الخدمات
                </h1>
            @endif
        </div>
        <style>
            .servicesBox i{
                font-size:50px;
                color: white;
            }
        </style>

        <div class="row">
            @foreach($data['services'] as $service)
            <div class="col-lg-4 col-md-6 col-sm-12 mt-5">
                <div class="servicesBox">
                    <div class="circle">
                        <i class="fa-solid fa-circle right"></i>
                        <i class="fa-solid fa-circle left"></i>
                    </div>
                    <div>
                        <div>
                            <i class="{{$service->icon}}"></i>
                            <h3>{{$service['title_'.\Illuminate\Support\Facades\App::getLocale()]}}</h3>
                        </div>
                        <p>
                            {{$service['desc_'.\Illuminate\Support\Facades\App::getLocale()]}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section" id="About">
    <div class="container">
        <div class="mainHeading text-center">
            @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
            <h1>
                <span>A</span>
                <span>B</span>
                <span>O</span>
                <span>U</span>
                <span>T</span>
                <span class="space"></span>
                <span>U</span>
                <span>S</span>
            </h1>
            @else
                <h1>
                    ماذا عنا
                </h1>
            @endif
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12">
                <img src="{{asset($data['about']['image'])}}" alt="" />
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="aboutBox">
                    <h4 class="fs-1">
                        {{$data['about']['title_'.\Illuminate\Support\Facades\App::getLocale()]}}
                    </h4>
                    <p class="fs-6 lh-base text-black-50">
                        {!! $data['about']['desc_'.\Illuminate\Support\Facades\App::getLocale()] !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="Features">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <img src="{{asset('assets/site/img')}}/Social networking-cuate.svg" alt="" />
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="FeaturesBox">
                    <div class="linkSocial">
                        <button class="mainButton3 active me-5 mb-3 " data-show="Facebook">{{trans('site.facebook')}}</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="Twitter">{{trans('site.twitter')}}</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="Instagram">{{trans('site.instagram')}}</button>
                        <button class="mainButton3  me-5 mb-3 " data-show="YouTube">{{trans('site.youtube')}}</button>
                    </div>
                    <div class="pt-3">
                        <div class="facebook active" id="Facebook">
                            <h2 class="fs-4">
                                {{trans('site.Get FREE Facebook Likes, Followers, Share')}}
                            </h2>
                            <p class="lh-base">
                                {{trans('site.facebook_is_fastest')}}
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i>
                                    {{trans('site.Facebook Likes Page or Post')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i>
                                    {{trans('site.facebookSharePage')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i>
                                    {{trans('site.facebookFollowers')}}
                                </li>
                            </ul>
                        </div>
                        <div class="Instagram" id="Instagram">
                            <h2 class="fs-4">
                                {{trans('site.Get FREE FInstagram Followers and Instagram Photo Likes')}}
                            </h2>
                            <p class="lh-base">
                                {{trans('site.insta_is_the_shortest')}}
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.Instagram_Followers')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.Instagram_PhotoLikes')}}
                                </li>
                            </ul>
                        </div>
                        <div class="Twitter" id="Twitter">
                            <h2 class="fs-4">
                                {{trans('site.Get_FREE_Twitter_Followers_Tweets_reTweets_and_Likes')}}
                            </h2>
                            <p class="lh-base">
                                {{trans('site.twitter_is_the_greatest')}}
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.twitter_followers')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.twitter_retweets')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.twitter_likes')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.twitter_tweets')}}
                                </li>
                            </ul>
                        </div>
                        <div class="YouTube" id="YouTube">
                            <h2 class="fs-4">
                               {{trans('site.Get FREE YouTube Views, Subscribers, Likes')}}
                            </h2>
                            <p class="lh-base">
                            {{trans('site.youtube_desc')}}
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.youtube_views')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.Youtube Subscribe')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="section FeaturesTwo">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <img src="{{asset('assets/site/img')}}/fomo-not-css.svg" alt="" />
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="FeaturesBox">
                    <div class="linkSocial">
                        <button class="mainButton3 active me-5 mb-3 " data-show="Pinterest"> {{trans('site.pinterest')}} </button>
                        <button class="mainButton3  me-5 mb-3 " data-show="SoundCloud">{{trans('site.soundcloud')}} </button>
                        <button class="mainButton3  me-5 mb-3 " data-show="VK">{{trans('site.vk')}}</button>
                    </div>
                    <div class="pt-3">
                        <div class="facebook" id="Pinterest">
                            <h2 class="fs-4">
                            {{trans('site.get')}}     <span class="social">{{trans('site.free')}}</span> {{trans('site.Pinterest Followers and Saves')}}
                            </h2>
                            <p class="lh-base">
                                {{trans('site.Pinterest is a tool for gathering and arranging things you are fond of')}}
                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.Get Pinterest Followers')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.Pinterest Save')}}
                                </li>
                            </ul>
                        </div>
                        <div class="Instagram" id="VK">
                            <h2 class="fs-4">
                                {{trans('site.get')}} <span class="social">{{trans('site.free')}}</span> {{trans('site.Instagram Followers and Instagram Photo Likes')}}
                            </h2>
                            <p class="lh-base">

                                {{trans('site.As we know, VK (Originally VKontakte, Russian: ВКонтакте) is the second biggest social network in')}}






                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i>
                                     {{trans('site.VK Page Followers')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i>
                                    {{trans('site.VK Group Members Likes')}}
                                </li>
                            </ul>
                        </div>
                        <div class="Twitter" id="SoundCloud">
                            <h2 class="fs-4">
                                {{trans('site.get')}} <span class="social">{{trans('site.free')}}</span> {{trans('site.SoundCloud Followers, Likes and Music Plays')}}
                            </h2>
                            <p class="lh-base">
                                {{trans('site.SoundCloud is the number one social sound platform where you have an opportunity to create your own')}}

                            </p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-square-check"></i>  {{trans('site.SoundCloud Followers')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i>  {{trans('site.SoundCloud Likes')}}
                                </li>
                                <li class="mt-2">
                                    <i class="fa-solid fa-square-check"></i> {{trans('site.SoundCloud Music Plays')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
{{--<section id="coins" class="section">--}}
{{--    <div class="container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-lg-6 col-sm-12">--}}
{{--                <img src="{{asset('assets/site/img')}}/Rocket-amico.svg" alt="" />--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 col-sm-12">--}}
{{--                <div class="coinsBox">--}}
{{--                    <h3 class="fs-4 lh-base">--}}
{{--                        {{trans('site.Easily Exchange Your Makasb Points for Valuable AMF Tokens - Do This TODAY Before Value Skyrockets')}}--}}

{{--                    </h3>--}}
{{--                    <p class="lh-base text-black-50">--}}
{{--                        {{trans('site.The world is rapidly transitioning to borderless cryptocurrency.')}}--}}

{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="coinsBox pt-3">--}}
{{--                    <h3 class="fs-4 lh-base">--}}
{{--                         {{trans('site.Makasb has made our new AMF Tokens extremely EASY to buy and use.')}}--}}

{{--                    </h3>--}}
{{--                    <p class="lh-base text-black-50">--}}
{{--                        {{trans('site.Tokens will rapidly increase in value as they are hotly promoted')}}--}}

{{--                    </p>--}}
{{--                </div>--}}
{{--                <button class="mainButton mb-5 mt-lg-3">--}}
{{--                    <a href="Registration.html">{{trans('site.Registration')}} </a>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

@endsection
@section('site_js')
    <script src="{{asset('assets/site/JS')}}/main.js"></script>
@endsection

