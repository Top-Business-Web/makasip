@extends('site.layouts.master')
@section('page_name')
    {{trans('site.other')}} | {{trans('site.makasb')}}
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
        <div class="Home Followers">
            <div class="container sectionHight">
                <div class="row  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div><img src="{{asset('assets/site')}}/img/Influencer-amico.svg" alt=""></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="shareBox">
                            <h3 class="fs-4 fw-bold TitlePage"> OK.ru Group Join</h3>
                            <h3 class="fs-5 fw-bold TitlePage2">{{trans('site.get FREE points by liking')}}   </h3>
                            <p class="fs-6 mt-lg-3 lh-lg">
                                {{trans('site.o get free points by join others Odnoklassniki Groups click on the "join" button')}}

                            </p>
                            <div>
                                <button class="mainButton GroupJoin"><a href="{{route('AddSite', 'type')}}">
                                     {{trans('site.Get OK.ru Group Join')}}
                                    </a></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @if($data->count() > 0)
            <div class="container sectionHight2">
                <h3 class="fs-4 fw-bold TitlePage"> {{trans('site.Wait 9-10 seconds')}}  </h3>
                @if($data->count())
                    <div class="table GroupJoins">
                        <table class="table-bordered table">
                            <tr>
                                <th>{{trans('site.points')}}</th>
                                <th>{{trans('site.name')}}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($data as $row)
                                @if($row->points_for_click < $row->user->balance)
                                    <tr id="row{{$row->id}}">
                                        <td>{{$row->points_for_click}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>
                                            <div class="text-center">
                                                <button data-site-id={{$row->id}} data-url="{{$row->url}}"
                                                        class="Deletes GroupJoin customBtn StartBtn">
                                                    {{trans('site.start')}}
                                                </button>
                                                <button data-site-id={{$row->id}} data-url="{{$row->url}}" data-user-id={{ auth()->user()->id }}
                                                        class="Deletes d-none GroupJoin customBtn myShareBtn">{{trans('site.done')}}
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <button class="Delete GroupJoin customBtn skipBtn"
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
            @else
                <h3 class="fs-4 fw-bold TitlePage">{{trans('site.Wait 9-10 seconds')}}
                </h3>
                @include('site.layouts.empty_data')
            @endif
        </div>
    </div>

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
@section('site_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>
    @include('site.CustomScripts.handleViewScript')
@endsection

