@extends('site.layouts.master')
@section('page_name')
    مكاسـب | حسابي
@endsection
@section('site_css')
    {{--            <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css"/>--}}
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
        @include('site.layouts.sidebar')
        <div class="Home profile">
            <div class="card" style="z-index: -999">
                <div class="iconProfile">
                    <a class="active" href="#" data-show="Basic"><i class="fa-solid fa-user"></i></a>
                    <a href="#" data-show="ChangePassword"><i class="fa-solid fa-lock"></i></a>
                    <a href="#" data-show="DeleteEmail"><i class="fa-solid fa-trash"></i></a>
                </div>
 @php
        $user=auth()->user();


 @endphp



                <div class="Bro">
                    <form method="post" action="{{route('admin.edit.myProfile')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body active" id="Basic">
                        <h4 class="card-title TitleBasic"> {{trans('site.Basic_Information')}}</h4>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img"><img src="{{asset(''.$user->image)}}" alt="User" class="hoverZoomLink">
                                        </div>
                                        <div class="upload-img">
                                            <div class="change-photo-btn"><span><i class="fa fa-upload"></i>
                                                    {{trans('site.Upload_Photo')}}

                                                </span><input type="file" name="image" class="upload"></div><small
                                                class="form-text text-muted">
                                                {{trans('site.allow_image')}}
                                              </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label>  {{trans('site.user_name')}} <span class="text-danger">*</span></label><input
                                        type="text"  id="Username" required name="user_name" value="{{$user->user_name}}" class="form-control"  ></div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label> {{trans('site.email')}} <span class="text-danger">*</span></label><input
                                        type="email" class="form-control" required  name="email" value="{{$user->email}}" id="Email" ></div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label> {{trans('site.phone')}} <span class="text-danger">*</span></label><input
                                        type="text" class="form-control" required  name="phone" value="{{$user->phone}}" id="Phone" ></div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label> {{trans('site.country')}} <span class="text-danger">*</span></label>
                                    <select class="form-select  form-control selectpicker" id="country" data-live-search="true" name="country">
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{($user->country == $country->id)? "selected" :""}}>{{$country[\Illuminate\Support\Facades\App::getLocale().'_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label>{{trans('site.balance')}}  <span class="text-danger">*</span></label><input
                                        type="email" class="form-control" value="{{$user->balance}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group"><label> {{trans('site.join_date')}}  <span
                                            class="text-danger" >*</span></label><input type="email" class="form-control" value="{{$user->created_at->diffForHumans()}}" disabled>
                                </div>
                            </div>


                            <div class="mt-2">
                                <button type="submit" name="submit" value="submit" class="mainButton submitButton">{{trans('site.save_change')}}  </button>
                            </div>
                            <div class="mt-2">
                                <a  style="float: {{(App::getLocale() == 'en')? "right":"left"}};" class="mainButton submitButton" href="https://wa.me/+966583187789?text= اريد تحويل عدد النقاط({{ $user->balance }}) وايميلي هو({{ $user->email }}) ">
                                    {{trans('site.make_point_money')}}
                                </a>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary" type="button" onclick="copyToClipboard('{{url('/register/'.$referral_code)}}')">نسخ الرابط للمشاركة<i class="fa-solid fa-copy"></i></button>
                            </div>
                            <style>
                                .submitButton{
                                    font-size: 18px;
                                    display: inline-block;
                                    padding: 10px 15px;
                                    color: var(--blue-main);
                                }
                                .submitButton:hover{
                                    color: white;;
                                }

                            </style>
                        </div>
                    </div>
                    </form>
                    <div class="card-body" id="ChangePassword">
                        <h4 class="card-title TitleBasic"> {{trans('site.change_password')}}</h4>
                        <div class="row form-row">

                            <div class="col-md-12">
                                <div class="form-group"><label> {{trans('site.new_password')}} <span class="text-danger">*</span></label><input
                                      id="newPassword"  type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label>    {{trans('site.confirm_password')}} <span
                                            class="text-danger">*</span></label><input   id="confirmPassword"  type="password" class="form-control">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="mainButton submitButton" onclick="changePassword()" id="changePassword"> {{trans('site.save_change')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="DeleteEmail">
                        <h4 class="card-title TitleBasic">{{trans('site.delete_email')}}</h4>
                        <div class="row form-row">
                            <div class="col-md-12">
                                <p class="lh-lg">

                                {{trans('site.delete_message')}}
                            </div>

                        </div>
                        <div class="mt-2">
                            <a href="{{route('admin.deleteMyProfile')}}" class="mainButton submitButton">{{trans('site.delete')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
@section('site_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>

        <script>

            function changePassword(){

                var newPassword=$('#newPassword').val();
                var confirmPassword=$('#confirmPassword').val();

                if(newPassword==null || confirmPassword==null) {
                    toastr.error('يرجي ادخال جميع الحقول');
                }
                else {
                    if(newPassword==confirmPassword){


                        if(newPassword.length<6){
                            toastr.error('الحد الادني لكلمة المرور ستة احرف');

                        }
                        else {


                            $.ajax({
                                type:'POST',
                                url:"{{route('admin.edit.myPassword')}}",
                                data:{
                                    password:newPassword,
                                    password_confirmation:confirmPassword
                                },

                                success:function(res){
                                    if(res['status']==true)
                                    {

                                        toastr.success('تمت تعديل كلمة المرور بنجاح')


                                    }
                                    else if(res['status']==422) {
                                        var errors = $.parseJSON(data.responseText);
                                        $.each(errors, function (key, value) {
                                            if ($.isPlainObject(value)) {
                                                $.each(value, function (key, value) {
                                                    toastr.error(value, 'خطأ');
                                                });
                                            }
                                        })

                                    }
                                    else
                                        location.reload();

                                },
                                error: function(data){
                                    location.reload();
                                }
                            });






                        }

                    }
                    else {
                        toastr.error('كلمة المرور غير متطابقة');

                    }
                }
            }

            function copyToClipboard(text) {
                const textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                toastr.success('تم نسخ الرابط');
            }

    </script>


    @include('site.CustomScripts.handleViewScript')
@endsection

