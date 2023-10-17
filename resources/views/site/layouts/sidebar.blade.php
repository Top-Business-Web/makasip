<div class="slideBar">
    <div class="iconHomeNav">
        <div class="iconHome">
            <a href="{{route('homepage')}}" class=""><i class="fa-solid fa-house"></i></a>
        </div>
        <div class="iconHome">
            <a href="{{route('profile')}}"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="iconHome">
            <a href="{{route('buyPoints')}}"><i class="fa-solid fa-cart-plus"></i></a>
        </div>
        <div class="iconHome">
            <ul class="fa-solid fa-arrow-right-from-bracket dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="fa-solid fa-arrow-right-from-bracket" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="iconHome">
            <a href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>

    </div>
</div>
