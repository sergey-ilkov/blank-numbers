<header class="header">
    <div class="container">
        <div class="header__items">

            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img class="logo" width="60" height="60" src="{{ asset('images/logo.svg') }}" alt="Логотип">
                </a>

            </div>


            <nav id="nav-menu" class="nav-menu">
                <ul class="header-menu">
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="{{ route('home') }}/#who">{{ __( 'menu.who' ) }}</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="{{ route('home') }}/#what">{{ __('menu.what') }}</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="{{ route('home') }}/#how-works">{{ __('menu.works') }}</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="{{ route('home') }}/#consultations">{{ __('menu.consultations')
                            }}</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="{{ route('home') }}/#reviews">{{ __('menu.reviews') }}</a>
                    </li>
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="{{ route('pythagoras') }}">{{ __('menu.pythagoras') }}</a>
                    </li>
                    {{-- <li class="header-menu__item">
                        <a class="header-menu__link" href="{{ route('celebrities') }}">{{ __('menu.celebrities') }}</a>
                    </li> --}}
                    <li class="header-menu__item">
                        <a class="header-menu__link link-anchor" href="#footer">{{ __('menu.contacts') }}</a>
                    </li>
                </ul>

                <x-languages></x-languages>

            </nav>

            <button id="burger-menu" class="burger-menu" type="button" aria-label="burger menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>