<!-- Meta Data -->
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta content="مكاسب ,اعجابات فيسبوك ,الحصول علي متابعات ,تطبيق مكاسب, مشاهدات يوتيوب">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('page_name')</title>
<link rel="icon" href="{{asset('assets/site/img')}}/logo.png">
<link rel="stylesheet" href="{{asset('assets/site/css')}}/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset('assets/site/css')}}/all.min.css" />
<link rel="stylesheet" href="{{asset('assets/site/css')}}/normalize.css"/>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<link href="{{asset('assets/admin')}}/assets/css/icons.css" rel="stylesheet"/>
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />--}}

<!-- TOASTR CSS -->
@toastr_css
@yield('site_css')
