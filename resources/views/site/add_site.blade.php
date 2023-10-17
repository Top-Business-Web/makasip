@extends('site.layouts.master')
@section('page_name')
    مكاسـب | اضافة
@endsection
@section('site_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
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
        <div class=" Home AddSite">
            <div class="AddSiteTop">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div>
                                <img src="{{asset('assets/site/img')}}/Add tasks-rafiki.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="div">
                                <h3 class="fs-4 fw-bold">{{ trans('site.Here_you_can') }}</h3>
                                <p class="fs-6 mt-lg-3 lh-lg">
                                    {{ trans('site.The_higher_the_cpc') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="addSiteDown">
                <form action="{{route('publishMySite')}}" id="SiteForm">
                    @csrf
                    <div>
                        <select class="form-select social" aria-label="Default select example" name="site_type">
                            @foreach($sites as $site)
                                <option value="{{$site->id}}" {{ $site->id == $type ? 'selected' : '' }}>{{$site['title_'.\Illuminate\Support\Facades\App::getLocale()]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select class="form-select mt-3 country form-control" id="country"
                                multiple="multiple"
                                name="country[]"

                        >
                            <option value="all">all</option>
                            @foreach($countries as $country)

                                <option value="{{$country->id}}">{{$country[\Illuminate\Support\Facades\App::getLocale().'_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 texts">
                        <input type="text" placeholder="set title for site - page" class="titlePage" name="title">
                    </div>
                    <div class="mt-3 texts">
                        <input type="text" placeholder="for page Url" class="titlePage" name="url"
                               @if(in_array($type, [24, 25, 26, 27]))
                                   pattern="^https:\/\/(www\.)?facebook\.com\/.+" title="Please enter a valid Facebook link."
                               @elseif(in_array($type, [9, 10, 11]))
                                   pattern="^https:\/\/(www\.)?youtube\.com\/.+" title="Please enter a valid YouTube link."
                               @elseif(in_array($type, [1, 31]))
                                   pattern="^https:\/\/(www\.)?instagram\.com\/.+" title="Please enter a valid Instagram link."
                               @elseif(in_array($type, [1, 6, 8]))
                                   pattern="^https:\/\/(www\.)?twitter\.com\/.+" title="Please enter a valid Twitter link."
                               @elseif(in_array($type, [2, 3]))
                                   pattern="^https:\/\/(www\.)?tiktok\.com\/.+" title="Please enter a valid TikTok link."
                               @elseif(in_array($type, [17, 18, 19]))
                                   pattern="^https:\/\/(www\.)?soundcloud\.com\/.+" title="Please enter a valid SoundCloud link."
                                @endif
                        >
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <input type="number" required name="total_clicks_limit" onkeyup="checkBalancePoints()"
                               id="frist">

                        {{--                        <i id="on" class="fa-solid fa-toggle-on ms-2 fs-1"></i>--}}
                        {{--                        <i id="off" class="fa-solid fa-toggle-off active ms-2 fs-1"></i>--}}
                        <span class="ms-2">     <sub>Total clicks limit</sub>
                        </span>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <input type="number" name="daily_clicks_limit" id="second">
                        <i id="on1" class="fa-solid fa-toggle-on ms-2 fs-1"></i>
                        <i id="off1" class="fa-solid fa-toggle-off active ms-2 fs-1"></i>
                        <span class="ms-2"><sub>Daily clicks limit
                           </sub>
                       </span>
                    </div>
                    <div class="mt-3 d-flex align-items-center">
                        <input type="number" name="points_for_click" id="cpc" min="5" max="50" value="25">
                        <span class="ms-2"><sub>Cost/Points Per Click
                                (from 5 to 50)
                            </sub>
                        </span>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="mainButton submitBtn" id="saveBtn" type="submit">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <style>
        .submitBtn {
            font-size: 18px;
            display: inline-block;
            padding: 10px 15px;
            color: var(--blue-main);
        }

        .submitBtn:hover {
            color: white;
        }
    </style>
@endsection
@section('site_js')
    <script>
        $("form#SiteForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#SiteForm').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#saveBtn').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">wait ...</span>').attr('disabled', true);

                },
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success('موقعك بانتظار الموافقة من الادارة الان');
                        toastr.success('تم خصم من رصيد نقاطك قيمة نشر موقعك');
                        var audio = new Audio("{{asset('assets/uploads/success.mp3')}}");
                        audio.play();
                        $('#SiteForm').trigger("reset");
                    } else {
                        toastr.error(data.message);
                    }
                    $('#saveBtn').html(`Save Change`).attr('disabled', false);

                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#saveBtn').html(`Save Change`).attr('disabled', false);
                        toastr.error('هناك خطأ ما');
                    } else if (data.status === 422) {
                        $('#saveBtn').html(`Save Change`).attr('disabled', false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    } else {
                        $('#saveBtn').html(`Save Change`).attr('disabled', false);
                        toastr.error('هناك خطأ ما ...');
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });

        function checkBalancePoints() {

            var to_publish_points = document.getElementById("frist");
            if (to_publish_points.value > {{Auth::guard('user')->user()->balance}}) {
                // alert('ddd');
                to_publish_points.value = {{Auth::guard('user')->user()->balance}};
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })
    </script>
@endsection
