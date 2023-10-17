@extends('site.layouts.master')
@section('page_name')
    مكاسـب | تسجيل جديد
@endsection
@section('site_css')
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/style_ar.css"/>
    @endif
@endsection
@section('content')
@if(count($errors) > 0 )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="p-0 m-0" style="list-style: none;">
            @foreach($errors->all() as $error)
                <li><i class="fa fa-times-circle"></i> {{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
    body{
        overflow-y: hidden;
    }
</style>
    <section class="LoginPage">
        <div class="container">
            <div class="row  justify-content-between align-items-center">
                <div class="col-lg-6 col-md-12">

                    <div class="loginForm">
                        <h2 class="Mytitle fw-bold fs-4">Registration</h2>
                        <form action="{{route('UserRegistration')}}" method="post" id="Login">
                            @csrf
                            <input type="hidden" name="referral_code" value="{{ $referral_code }}">

                            <div class="InputForm">
                                <input type="text" placeholder="Name" name="user_name" required>
                            </div>
                            <div class="InputForm">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="InputForm">
                                <input type="text" placeholder="Phone" name="phone" required>
                            </div>
                            <div class="InputForm">
                                <select class="form-select mt-3 country form-control selectpicker" id="country" data-live-search="true"
                                        name="country"
                                >
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country[\Illuminate\Support\Facades\App::getLocale().'_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="InputForm position-relative">
                                <input type="password" placeholder="password" id="password" name="password" required>
                                <div class="eye">
                                    <i class="fa-solid fa-eye-slash toggleSvg" data-text="show"></i>
                                </div>
                            </div>
                            <div class="InputForm position-relative">
                                <input type="password" placeholder="Confirm Password" id="password2" required
                                       name="password_confirmation">
                                <div class="eye2">
                                    <i class="fa-solid fa-eye-slash toggleSvg2" data-text="show"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <style>
                                    .mainButton2 a{
                                        color: var(--blue-main) !important;
                                    }
                                    .mainButton2 a:hover{
                                        color: white !important;
                                    }
                                </style>
                                <button type="submit" class="mainButton2"><a>Sign
                                        UP</a></button>
                                <p class="outer-link">Already have an account? <a class="loginIn2" href="{{route('/')}}">
                                        Login Now</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 imgsLogin">
                    <div class="imgLogin">
                        <img src="{{asset('assets/site/img')}}/Online popularity.gif" class="ImgAnmitan fluid" alt="">
                    </div>
                    <div class="position-absolute LoginPageLogo">
                        <img src="{{asset('assets/site/img')}}/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
