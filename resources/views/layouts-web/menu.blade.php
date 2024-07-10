<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('assets-web/img/logo.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link @yield('about')" href="{{ route('about') }}">
                    ABOUT
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('our_story') }}">OUR STORY</a>
                    <a class="dropdown-item" href="{{ route('our_team') }}">OUR TEAM</a>
                    <a class="dropdown-item" href="{{ route('our_vision') }}">OUR VISION</a>
                    <a class="dropdown-item" href="{{ route('awards') }}">AWARDS</a>
                    <a class="dropdown-item" href="{{ route('faq') }}">FAQ</a>
                    <a class="dropdown-item" href="{{ route('contact_us') }}">CONTACT US</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link @yield('experience')" href="{{ route('experience') }}">
                    EXPERIENCE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">WINERY TOUR</a>
                    <a class="dropdown-item" href="#">WINE & DINE</a>
                    <a class="dropdown-item" href="#">WINE SPA</a>
                    <a class="dropdown-item" href="#">RESORT</a>
                    <a class="dropdown-item" href="#">ACTIVITIES</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link @yield('products')" href="{{ route('products') }}">
                    PRODUCTS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">SUADE WINERY</a>
                    <a class="dropdown-item" href="#">SUADE DISTILLERY</a>
                    <a class="dropdown-item" href="#">SUADE BREWERY</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('distributors')" href="{{ route('distributors') }}">DISTRIBUTORS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('partners')" href="{{ route('partners') }}">PARTNERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('news-event')" href="{{ route('news-event') }}">NEWS & EVENT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('work-with-us')" href="{{ route('work-with-us') }}">WORK WITH US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('shop')" href="{{ route('shop') }}">SHOP</a>
            </li>
        </ul>
    </div>
</nav>
