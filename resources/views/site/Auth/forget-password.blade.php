@extends('site.layouts.master')
@section('page_name')
    مكاسـب | نسيت كلمة المرور
@endsection
@section('site_css')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/forgettpassword.css">
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
    <section class="fxt-template-animation fxt-template-layout31 loaded">
        <span class="fxt-shape fxt-animation-active"></span>
        <div class="fxt-content-wrap">
            <div class="fxt-heading-content">
                <div class="fxt-inner-wrap">
                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                        <h1 class="text-11 text-white mb-4 fs-1 fw-bold">Don't worry,</h1>
                        <p class="text-4 text-white lh-base mb-5">We are here help you to recover your
                            password.</p>
                    </div>
                </div>
            </div>
            <div class="fxt-form-content">
                <div class="fxt-main-form">
                    <div class="fxt-inner-wrap">
                        <h2 class="fxt-page-title">Reset Password</h2>
                        <p class="fxt-description">Enter the email address associated with your account.</p>
                            <label for="reset" class="fxt-label">Email</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" id="reset" class="form-control" name="reset" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button   class="mainButton2"  onclick="resetPassword()" id="resetPassword-now">Continue</button>
                                    </div>
                                </div>
                            </div>
                        <div class="fxt-switcher-description">Return to?<a href="{{route('/')}}" class="fxt-switcher-text ms-1">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .scrollTop{
            display: none !important;
        }
        .mainButton, .mainButton2 {
            font-size: 18px;
            display: inline-block;
            padding: 10px 15px;
            color: var(--blue-main);
        }
    </style>
@endsection

@section('site-js')

    <script>


        function resetPassword() {

            var email = $('#reset').val();

            if (email =='') {
                toastr.error('يرجي ادخال الايميل اولا');

            }
           else {

                $.ajax({
                    type:'GET',
                    url:"{{route('resetPassword')}}",
                    data:{
                        email:email,
                    },

                    success:function(res){
                        if(res['status']==true)
                        {

                            toastr.success('تم ارسال لينك تغير كلمة مرورك');


                        }
                        else if(res['status']==false)
                        {
                            toastr.error('يرجي ادخال ايميل مسجل لدينا  ');

                        }
                        else
                        {
                           location.reload();

                        }

                    },
                    error: function(data){
                        location.reload();
                    }
                });




            }

        }





    </script>


@endsection



