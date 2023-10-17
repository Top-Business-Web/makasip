@extends('site.layouts.master')
@section('page_name')
    {{trans('site.mySites')}}| {{trans('site.makasb')}}
@endsection
@section('site_css')
    {{--    <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css"/>--}}
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
        <div class="Home mySite">
            <div class="mySiteTop">
                <div class="container sectionHight">
                    <div class="row align-items-center">
                        <div class="cpl-lg-6 col-md-6 col-sm-12">
                            <div>
                                <img src="{{asset('assets/site/img')}}/Site Stats-amico.svg" alt=""/>
                            </div>
                        </div>
                        <div class="cpl-lg-6 col-md-6 col-sm-12">
                            <div class="mySiteBox">
                                <h3 class="fs-4 fw-bold">
                                    {{trans('site.how_site')}}
                                    {{trans('site.how_to_add_your_site')}}
                                </h3>
                                <p class="fs-6 mt-lg-3 lh-lg">
                                    {{trans('site.how_to_add_your_site_message')}}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mySiteDown">
                <div class="container sectionHight2">
                    <div class="text-center section">
                        <button class="mainButton"><a href="{{route('AddSite', $type)}}">+{{trans('site.sites_add')}} </a>
                        </button>
                    </div>
                    @if($sites->count())
                        <div class="table">
                            <table class="table-bordered table">
                                <tr>
                                    <th> {{trans('site.sites')}} </th>
                                    <th>  {{trans('site.sites_name')}}</th>
                                    <th>{{ trans('site.points') }}</th>
                                    <th>{{ trans('site.actions') }}</th>
                                </tr>
{{--                                @php(dd($sites))--}}
                                @foreach($sites as $site)
                                    <tr id="row{{$site->id}}">
{{--                                        @php(dd($site->type))--}}
                                        <td>{{$site->type['title_'.\Illuminate\Support\Facades\App::getLocale()]}}</td>
                                        <td>
                                            {{$site->title}}
                                            @if($site->status == '0')
                                                <span class="badge bg-danger">{{trans('site.unactive')}} </span>
                                            @else
                                                <span class="badge bg-success">{{trans('site.active')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group">

                                                <!-- declaration for first field -->
                                                <div class="col-lg-6 col-12">
                                                <label for="">{{ trans('site.points-used') }}</label> :
                                                {{--                                                @foreach($points_used as $point)--}}
                                                <input type="text" class="form-control
                                                input-sm" disabled style="text-align: center"
                                                       value="{{ $site->total_clicks_limit }}"/>
                                                {{--                                                @endforeach--}}
                                                <!-- reducong the gap between them to zero -->
                                                <span class="input-group-btn"
                                                      style="width:0px;"></span>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                            <!-- declaration for second field -->
                                            <label for="">{{ trans('site.remaining-points') }}</label> :

                                            <input type="text" class="form-control
                                                input-sm" style="text-align: center" disabled
                                                   value="{{ $site->needed_clicks }}"/>
                                        </div>

                        </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <button class="myStartBtn btn btn-success mb-2" style="opacity: 1;"
                                        {{ ($site->client_status == 1) ? 'disabled' : '' }}
                                        data-id="{{$site->id}}" data-status="1" id="start">Start <i
                                            class="iconStart fa fa-play"></i></button>
                                <button class="myStopBtn btn btn-warning mb-2"
                                        {{ ($site->client_status == 0) ? 'disabled' : '' }}
                                        data-id="{{$site->id}}" data-status="0" id="stop">Stop <i
                                            class="iconStop fa fa-stop"></i></button>
                                <button class="myDeleteBtn btn btn-danger" data-id="{{$site->id}}">Delete <i
                                            class= fa fa-trash"></i></button>
                            </div>

                        </td>
                        </tr>
                        @endforeach
                        </table>
                </div>
                @else
                    @include('site.layouts.empty_data')
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@section('site_js')
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })

        $('.myDeleteBtn').on('click', function () {
            var id = $(this).attr('data-id');
            $(this).html('<span style="margin-left: 4px;">wait..</span><span class="spinner-border spinner-border-sm mr-2"></span> ').attr('disabled', true);
            $.ajax({
                url: "{{route('deleteMySite')}}",
                type: 'POST',
                data: {"id": id},
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success('تم الحذف بنجاح');
                        $('#row' + id).hide();
                        var audio = new Audio("{{asset('assets/uploads/success.mp3')}}");
                        audio.play();
                    } else {
                        toastr.error(data.message);
                    }
                    $(this).html(`Delete <i class="fa fa-trash"></i>`).attr('disabled', false);

                },
                error: function (data) {
                    if (data.status === 500) {
                        $(this).html(`Delete <i class="fa fa-trash"></i>`).attr('disabled', false);
                        toastr.error('هناك خطأ ما');
                    } else if (data.status === 422) {
                        $(this).html(`Delete <i class="fa fa-trash"></i>`).attr('disabled', false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value);
                                });
                            }
                        });
                    } else {
                        $(this).html(`Delete <i class="fa fa-trash"></i>`).attr('disabled', false);
                        toastr.error('هناك خطأ ما ...');
                    }
                },//end error method
            });
        });

        // Button Start Mission
        $(".myStartBtn").on('click', function () {
            $(this).prop('disabled', 'true');
            $(this).css('cursor', 'not-allowed');
            var id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url : "{{ route('activeMySite') }}",
                type : 'Put',
                _token: "{{ csrf_token() }}",
                data : {
                    'id' : id,
                    'status' : status,
                },
                success : function (data) {
                    if(data.status === 200) {
                        toastr.success('The Mission has started!');
                        setTimeout(function () {
                            location.reload();
                        },1000);
                    }
                }
            })
        })
        // End Button Start Mission

        // Button Stop Mission
        $(".myStopBtn").on('click', function () {
            $(this).prop('disabled', 'true');
            $(this).css('cursor', 'not-allowed');
            var id = $(this).data('id');
            var status = $(this).data('status');
            $.ajax({
                url : "{{ route('activeMySite') }}",
                type : 'Put',
                _token: "{{ csrf_token() }}",
                data : {
                    'id' : id,
                    'status' : status,
                },
                success : function (data) {
                    if(data.status === 200) {
                        toastr.success('The Mission has Stoped!');
                        setTimeout(function () {
                            location.reload();
                        },1000);
                    }
                }
            })
        })
        // End Button Stop Mission

    </script>
@endsection
