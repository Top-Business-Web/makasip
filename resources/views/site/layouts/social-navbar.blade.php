<style>
    .hide{
        display:none;
    }
</style>
<header>
    <nav class="navbar navbar-expand-xxl navbar-light navTop homenav">
        <div class="container ">
            <a class="navbar-brand logo ms-3" href="{{ route('homepage') }}"
            ><img class="LogoBrand" src="{{asset('assets/site/img')}}/logo.png" alt=""
                /></a>
            <button
                    class="navbar-toggler togglers"
                    id="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fa-solid fa-bars"></i>

            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-3 mb-lg-0 navTopLink  ">
                    <li class="nav-item ">
                        <a
                                class="nav-link me-3"
                                data-scroll="Home"
                                aria-current="page"
                                href="{{route('MySites')}}"
                        >{{trans('site.my_sites')}}</a
                        >
                    </li>
                    {{--                    <li class="nav-item me-3 ">--}}
                    {{--                        <a class="nav-link" data-scroll="Features" href="{{route('subscription')}}">{{trans('site.subscription')}}</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item me-3 ">--}}
                    {{--                        <a class="nav-link" data-scroll="coins" href="{{route('buyPoints')}}"> {{trans('site.buy_points')}}</a>--}}
                    {{--                    </li>--}}

                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle Facebook"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-facebook-square me-1"></i>{{trans('site.facebook')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item {{(!site_available(25)? 'hide':"")}}"
                                   href="{{route('facebookShare')."?site_type=25"}}"> {{trans('site.facebook_share')}} </a></li>
                            <li>
                                <a class="dropdown-item {{(!site_available(26)? 'hide':"")}}"
                                   href="{{route('facebookFollowers')."?site_type=26"}}"> {{trans('site.facebook_followers')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(27)? 'hide':"")}}"
                                   href="{{route('facebookPostLike')."?site_type=27"}}"> {{trans('site.facebook_post_like')}}  </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(24)? 'hide':"")}}"
                                   href="{{route('facebookPostShare')."?site_type=24"}}">{{trans('site.facebook_post_share')}}  </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle Instagram"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-instagram me-1"></i> {{trans('site.instagram')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item {{(!site_available(31)? 'hide':"")}}"
                                   href="{{route('instagram.followers')."?site_type=31"}}">{{trans('site.instagram_followers')}}  </a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(1)? 'hide':"")}}"
                                   href="{{route('instagram.likes')."?site_type=1"}}">{{trans('site.instagram_like')}}  </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle Twitter"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-twitter me-1"></i>{{trans('site.twitter')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item {{(!site_available(1)? 'hide':"")}}"
                                   href="{{route('twitter.tweets')."?site_type=1"}}"> {{trans('site.twitter_tweets')}}    </a></li>
                            <li>
                                <a class="dropdown-item {{(!site_available(1)? 'hide':"")}}"
                                   href="{{route('twitter.followers')."?site_type=1"}}">{{trans('site.twitter_followers')}}  </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(6)? 'hide':"")}}"
                                   href="{{route('twitter.retweets')."?site_type=6"}}">{{trans('site.twitter_retweets')}}  </a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(8)? 'hide':"")}}"
                                   href="{{route('twitter.likes')."?site_type=8"}}">{{trans('site.twitter_likes')}}  </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle YouTube"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-youtube me-1"></i>{{trans('site.youtube')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item {{(!site_available(9)? 'hide':"")}}"
                                   href="{{route('youtube.index','subscribe')."?site_type=9"}}">{{trans('site.youtube_subscribe')}}  </a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(10)? 'hide':"")}}"
                                   href="{{route('youtube.index','likes')."?site_type=10"}}">{{trans('site.youtube_likes')}}  </a></li>
                            <li><a class="dropdown-item {{(!site_available(11)? 'hide':"")}}"
                                   href="{{route('youtube.index','views')."?site_type=11"}}">{{trans('site.youtube_views')}} </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle TikTok"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-tiktok me-1"></i>{{trans('site.tiktok')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item {{(!site_available(2)? 'hide':"")}}"
                                   href="{{route('tiktok.index','followers')."?site_type=2"}}">{{trans('site.tiktok_followers')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(3)? 'hide':"")}}"
                                   href="{{route('tiktok.index','likes')."?site_type=3"}}">{{trans('site.tiktok_video_likes')}}  </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle SoundCloud"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <i class="fa-brands fa-soundcloud me-1"></i>{{trans('site.soundcloud')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item {{(!site_available(17)? 'hide':"")}}"
                                   href="{{route('soundcloud.index','likes')."?site_type=17"}}">{{trans('site.soundcloud_likes')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item  {{(!site_available(18)? 'hide':"")}}"
                                   href="{{route('soundcloud.index','follows')."?site_type=18"}}">{{trans('site.soundcloud_follow')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(19)? 'hide':"")}}"
                                   href="{{route('soundcloud.index','plays')."?site_type=19"}}">{{trans('site.soundcloud_plays')}} </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            {{trans('site.other')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item  {{(!site_available(29)? 'hide':"")}}"
                                   href="{{route('otherSites.index','redditUpvotes')."?site_type=29"}}">{{ trans('site.reddit-upvotes') }}</a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(30)? 'hide':"")}}"
                                   href="{{route('otherSites.index','redditMembers')."?site_type=30"}}">{{ trans('site.reddit-members') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(28)? 'hide':"")}}"
                                   href="{{route('otherSites.index','telegram')."?site_type=28"}}">{{trans('site.telegram_channels')}}  </a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(14)? 'hide':"")}}"
                                   href="{{route('otherSites.index','pinterestSave')."?site_type=14"}}">{{ trans('site.pinterest-save') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(15)? 'hide':"")}}"
                                   href="{{route('otherSites.index','pinterestFollowers')."?site_type=15"}}">{{ trans('site.pinterest-followers') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(20)? 'hide':"")}}"
                                   href="{{route('otherSites.index','vkontakteGroups')."?site_type=20"}}">{{ trans('site.vkontakte-groups') }}</a>
                            </li>
                            <li><a class="dropdown-item {{(!site_available(21)? 'hide':"")}}"
                                   href="{{route('otherSites.index','vkontaktePages')."?site_type=21"}}">{{ trans('site.vkontakte-pages') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(22)? 'hide':"")}}"
                                   href="{{route('otherSites.index','okGroup')."?site_type=22"}}">{{ trans('site.oK.ru-group-join') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{(!site_available(23)? 'hide':"")}}"
                                   href="{{route('otherSites.index','Reverbnation')."?site_type=23"}}">{{ trans('site.reverbnation-fans') }}</a>
                            </li>
                            <li>
                                <?php
                                    $sites_new = \App\Models\SiteType::where('type', 'new')->latest()->get();
                                ?>
                                @foreach($sites_new as $site_new)
                                    <a class="dropdown-item {{(!site_available($site_new->id)? 'hide':"")}}" href="{{ route('SiteTypeController', $site_new->id) }}">{{ trans_model($site_new, 'title') }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                        >
                            {{trans('site.lang')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div>

            <?php $ballance = auth()->user()->balance ?>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                <input type="number" class="form-control" value="{{ $ballance }}" aria-label="Balance" disabled>
            </div>


        </div>
    </nav>
</header>
<div class="container" style="position: relative; top: 50px;display: flex;justify-content: end;">
    <button class="mt-4 d-block d-sm-none toggleBtn"
            style="background-color:transparent; @if(Route::currentRouteName() == 'messagesIndex') margin-top: 90px !important; @endif border: 1px solid gainsboro; border-radius:5px; padding:5px 10px;">
        <i class="fa-solid fa-bars-staggered"></i>
    </button>
</div>

{{--aya--}}
{{--<div class="container">--}}
{{--    <button class="mt-4 d-block d-sm-none toggleBtn" style="background-color:transparent; border: 1px solid gainsboro; border-radius:5px; padding:5px 10px;">--}}
{{--        <i class="fa-solid fa-bars-staggered"></i>--}}
{{--    </button>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $(document).on('click','.toggleBtn', function(){--}}
{{--        alert('hi');--}}
{{--        $('.slideBar').removeClass('d-none');--}}
{{--    })--}}
{{--</script>--}}
