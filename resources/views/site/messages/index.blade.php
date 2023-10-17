@extends('site.layouts.master')
@section('page_name')
    {{trans('site.mySites')}}| {{trans('site.makasb')}}
@endsection
@section('site_css')
    <style>
        #toast-container > .toast-success {
            color: white;
            background-color: green;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css"/>
    @if(\Illuminate\Support\Facades\App::getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/Conis.css"/>
    @else
        <link rel="stylesheet" href="{{asset('assets/site/css')}}/conis_ar.css"/>
    @endif
@endsection
@section('content')
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex" style="position: relative; top: 100px;">
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
                                <h1 class="fw-bold d-flex justify-content-center">
                                    {{trans('site.notification')}}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mySiteDown">
                <div class="container sectionHight2">
                    {{--                                        {{dd($messages)}}--}}
                    @if($messages->count() > 0)
                        <div style="float: left" class="section m-5">
                            <button class="btn btn-primary MarkAllRead">
                                <i class="fa-solid fa-list-check"></i>
                                {{trans('site.mark_all_read')}}
                            </button>
                        </div>
                        <div class="table" style="overflow-y: auto;">
                            <table class="table-bordered table">
                                <tr>
                                    <th>  {{trans('site.messages')}}</th>
                                    <th>  {{trans('site.created_at')}}</th>
                                    <th></th>
                                </tr>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->message }} : {{ $message->body }}</td>
                                        <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <button class="btn btn-danger delMsg" type="button"
                                                    data-id="{{ $message->id }}" style="margin-bottom: 10px;"><i class="fa-solid fa-trash"></i>
                                            </button>
                                            @if($message->seen == 0)
                                                <button class="btn btn-primary MarkRead" type="button"
                                                        data-id="{{ $message->id }}"><i
                                                            class="fa-solid fa-bookmark"></i>
{{--                                                    Mark As Read--}}
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $messages->links() }}
                        </div>
                    @else
                        <h1>لا يوجد اشعارات</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('site_js')
    {{--    <script src="{{asset('assets/site/JS')}}/Conis.js"></script>--}}
    <script>
        $('.delMsg').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('messageDelete') }}',
                method: 'POST',
                _token: '{{ csrf_token() }}',
                data: {
                    'id': id,
                },
                success: function (data) {
                    if (data.success === true) {
                        toastr.success('تم الحذف بنجاح');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            })
        })

        $('.MarkRead').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('messageRead') }}',
                method: 'POST',
                _token: '{{ csrf_token() }}',
                data: {
                    'id': id,
                },
                success: function (data) {
                    if (data.success === true) {
                        toastr.success('Message read');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            })
        })

        $('.MarkAllRead').on('click', function () {
            // var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('messageAllRead') }}',
                method: 'POST',
                _token: '{{ csrf_token() }}',
                data: {
                    // 'id': id
                },
                success: function (data) {
                    if (data.success === true) {
                        toastr.success('تم تعليم الكل كمقروء');
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            })
        })

        // var auto_refresh = setInterval(
        //     function () {
        //         location.reload();
        //     }, 10000); // refresh every 5 seconds
    </script>
@endsection
