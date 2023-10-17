@extends('site.layouts.master')
@section('page_name')
    مكاسـب |                 {{$product->number_of_points}} نقطة
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
<style>
    .cnpBillingCheckoutWrapper {position:relative;}
    .cnpBillingCheckoutHeader {width:100%;border-bottom: 1px solid #c0c0c0;margin-bottom:10px;}
    .cnpBillingCheckoutLeft {width:240px;margin-left: 5px;margin-bottom: 10px;border: 1px solid #c0c0c0;display:inline-block;vertical-align: top;padding:10px;}
    .cnpBillingCheckoutRight {width:50%;margin-left: 5px;border: 1px solid #c0c0c0;display:inline-block;vertical-align: top;padding:10px;}
    .cnpBillingCheckoutOrange {font-size:110%;color: rgb(255, 60, 22);font-weight:bold;}
    div.wpwl-wrapper, div.wpwl-label, div.wpwl-sup-wrapper { width: 100% }
    div.wpwl-group-expiry, div.wpwl-group-brand { width: 30%; float:left }
    div.wpwl-group-cvv { width: 68%; float:left; margin-left:2% }
    div.wpwl-group-cardHolder, div.wpwl-sup-wrapper-street1, div.wpwl-group-expiry { clear:both }
    div.wpwl-sup-wrapper-street1 { padding-top: 1px }
    div.wpwl-wrapper-brand { width: auto }
    div.wpwl-sup-wrapper-state, div.wpwl-sup-wrapper-city { width:32%;float:left;margin-right:2% }
    div.wpwl-sup-wrapper-postcode { width:32%;float:left }
    div.wpwl-sup-wrapper-country { width: 66% }
    div.wpwl-wrapper-brand, div.wpwl-label-brand, div.wpwl-brand { display: none;}
    div.wpwl-group-cardNumber { width:60%; float:left; font-size: 20px;  }
    div.wpwl-group-brand { width:35%; float:left; margin-top:28px }
    div.wpwl-brand-card  { width: 65px }
    div.wpwl-brand-custom  { margin: 0px 5px; background-image: url("https://eu-test.oppwa.com/v1/paymentWidgets/img/brand.png") }

</style>
@section('content')
    @include('site.layouts.social-navbar')
    <div class="MainPage d-flex">
        @include('site.HomePage.sidebar')
        <div class=" Home" style="margin-top: 11%">
            <p class="text-center">
                {{$product->number_of_points}}
                نقطة

                بسعر
                {{$product->price}}$

            </p>
            <!--  -->
            <form action="{{route('checkPay')}}" class="paymentWidgets" id="payForm" data-brands="VISA MASTER AMEX">
{{--                <input type="hidden" value="{{$product->id}}" name="product_id">--}}
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
@section('site_js')
<script>
    var wpwlOptions = {
        locale: "{{\Illuminate\Support\Facades\App::getLocale()}}"
    }
</script>

    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{($responseData->id) ?? ''}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var wpwlOptions = {
            style: "plain",
            forceCardHolderEqualsBillingName: true,
            showCVVHint: true,
            brandDetection: true,
            onReady: function(){
                $(".wpwl-group-cardNumber").after($(".wpwl-group-brand").detach());
                $(".wpwl-group-cvv").after( $(".wpwl-group-cardHolder").detach());
                var visa = $(".wpwl-brand:first").clone().removeAttr("class").attr("class", "wpwl-brand-card wpwl-brand-custom wpwl-brand-VISA")
                var master = $(visa).clone().removeClass("wpwl-brand-VISA").addClass("wpwl-brand-MASTER");
                $(".wpwl-brand:first").after( $(master)).after( $(visa));
            },
            onChangeBrand: function(e){
                $(".wpwl-brand-custom").css("opacity", "0.3");
                $(".wpwl-brand-" + e).css("opacity", "1");
            }
        }

        $("#navbar-toggler").on("click", function () {
            $(".navTop").toggleClass("active")
        })
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            breakpoints: {
                450: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                991: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

@endsection
