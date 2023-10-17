@extends('site.layouts.master')
@section('page_name')
    {{trans('site.my_site')}} | {{trans('site.makasb')}}
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
    <!--    --><?php //request()->headers->set('X-Frame-Options', 'SAMEORIGIN', false) ?>
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex">
        @include('site.HomePage.sidebar')
        <div class="Home Share">
            <div class="container sectionHight">
                <div class="row  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div><img src="{{asset('assets/site/img')}}/Smiley face-amico.svg" alt=""></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="shareBox">
                            <h3 class="fs-4 fw-bold TitlePage"> {{ trans_model($siteType, 'main_word') }}  </h3>
                            <h3 class="fs-5 fw-bold TitlePage2">  {{ trans_model($siteType, 'submain_word') }}</h3>
                            <p class="fs-6 mt-lg-3 lh-lg">

                                {{ trans_model($siteType, 'description') }}
                            </p>
                            <div>
                                <button class="mainButton"><a href="{{route('AddSite', $type)}}">
                                        {{ trans_model($siteType, 'button_word') }}
                                    </a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container sectionHight2">
                @if($data->count())
                    <div class="table">
                        <table class="table-bordered table">
                            <tr>
                                <th>{{trans('site.points')}}</th>
                                <th>{{trans('site.name')}}</th>
                                <th>{{ trans('site.actions') }}</th>
                            </tr>
                            @foreach($data as $row)
                                {{--                                {{dd($row)}}--}}
                                @if($row->points_for_click < $row->user->balance)
                                    <tr id="row{{$row->id}}">
                                        <td>{{$row->points_for_click}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <div class="text-center">
                                                <input type="hidden" id="time_out" name="" value="{{ $siteType->time_out_seconds }}"/>
                                                <button data-site-id={{$row->id}} data-url="{{$row->url}}"
                                                        class="Deletes customBtn StartBtn">
                                                    {{trans('site.start')}}
                                                </button>
                                                <button target="_blank" href="{{$row->share}}" data-site-id={{$row->id}} data-url="{{$row->share}}" data-user-id={{ auth()->user()->id }}
                                                        class="Deletes d-none customBtn myShareBtn"
                                                >{{trans('site.done')}}
                                                </button>
                                                <button class="Delete customBtn skipBtn"
                                                        onclick="HideFrame($(this).attr(('data-id')),$(this).attr('data-url'))"
                                                        data-url="{{$row->url}}"
                                                        data-id="{{$row->id}}">{{trans('site.skip')}}
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>

                        {!! $data->links() !!}
                    </div>
                    {{--                        <iframe id="frame" src="">--}}
                    {{--                        </iframe>--}}
                    <iframe src="" id="frame" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                @else
                    @include('site.layouts.empty_data')
                @endif
            </div>
            <style>
                .customBtn {
                    font-size: 18px;
                    display: inline-block;
                    padding: 10px 15px;
                    color: #fff;
                }

                iframe {
                    display: block; /* iframes are inline by default */
                    border: none; /* Reset default border */
                    height: 100vh; /* Viewport-relative units */
                    width: 84vw;
                }
            </style>
        </div>
    </div>

@endsection
@section('site_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    <script>
        $('.StartBtn').on('click', function (e) {
            var time = $('#time_out').val();
            var elem = $(this);
            var url = $(this).attr('data-url');

            window.open(url, "_blank");

            setTimeout(function () {
                toastr.error('تخطيت الوقت المسموح .. برجاء المحاولة مره اخري', {timeout: 1500});
                setTimeout(function () {
                    window.location.reload();
                },2000)
            }, {{($siteType->time_out_seconds + 10) * 1000}})

            var timerId = setInterval(countdown, 1000);

            function countdown() {
                if (time == -1) {
                    // clearTimeout(timerId);
                    elem.addClass('d-none');
                    elem.next('button').removeClass('d-none');
                } else {
                    elem.html(' @lang('site.Wait') ' + time);
                    elem.prop('disabled', true);
                    time--;
                }
            }
        })
    </script>
    @include('site.CustomScripts.handleViewScript')

    <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="top: 10%">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('site.upload_screenshot') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>{{ trans('site.Upload_Photo') }}</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ trans('site.close') }}</button>
                    <button type="button" class="btn btn-primary" id="saveImage">{{ trans('site.save_change') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

