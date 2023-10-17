<script src="{{asset('assets/site/JS')}}/popper.min.js"></script>
<script src="{{asset('assets/site/JS')}}/jquery-3.6.0.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>--}}

<script type="text/javascript">
    // $('.selectpicker').selectpicker();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{asset('assets/site/JS')}}/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/site/JS')}}/all.min.js"></script>
@toastr_js
@toastr_render
<script>
    {{--if (Notification.permission !== 'granted')--}}
    {{--    Notification.requestPermission();--}}
    {{--else {--}}
    {{--  var notification =   new Notification('مرحبا بك في موقع مكاسب', {--}}
    {{--        icon: 'https://makasip.com/assets/site/img/logo.png',--}}
    {{--        body: 'مرحبا بك في موقع مكاسب شكرا لك',--}}
    {{--    })--}}
    {{--    --}}{{--notification.onclick = function() {--}}
    {{--    --}}{{--    window.open({{url('/')}});--}}
    {{--    --}}{{--};--}}
    {{--}--}}
    window.addEventListener('online', () =>{
        // window.location.reload();
        toastr.success('تم استعادة الاتصال بالانترنت');
    });
    window.addEventListener('offline', () =>{
        toastr.error('انقطع الاتصال , يرجي التحقق من جودة الانترنت لديك');
    });

</script>
<script src="{{asset('assets/admin')}}/assets/iconfonts/eva.min.js"></script>
<script>
    $(document).on('click','.toggleBtn', function(){
        // alert('hi');
        $('.slideBar').toggleClass('d-none');
    })
</script>
@yield('site_js')
