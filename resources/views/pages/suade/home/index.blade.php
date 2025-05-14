@extends('layouts-suade.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')

    <style>
        .navbar-right-section {
            display: flex;
            align-items: center;
            gap: 5px;
            row-gap: 5px;
            column-gap: 5px;
            position: absolute;
            top: 15%;
            right: 10px;
        }

        .navbar-left-section {
            display: flex;
            align-items: center;
            gap: 5px;
            row-gap: 5px;
            column-gap: 5px;
            position: absolute;
            top: 15%;
            left: 10px;
        }

        .cart-badge {
            background-color: #f6ead8;
            color: #BFA16C;
            font-size: 14px;
            border-radius: 50%;
            padding: 5px 10px;
            margin-left: 13px;
        }
    </style>

    <style>
        @keyframes slideFadeIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }


        .menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background-color: #365168;
            z-index: 9999;
            display: none;
            flex-direction: column;
            padding: 40px;
            color: white;
            transition: all 0.3s ease-in-out;
            animation: none;
            opacity: 0;
            pointer-events: none;
        }

        .menu.menu-open {
            display: flex !important;
            animation: slideFadeIn 0.4s ease forwards;
            pointer-events: auto;
            opacity: 1;
        }

        .menu-close {
            align-self: flex-end;
            font-size: 30px;
            font-weight: bold;
            color: #BFA16C;
            cursor: pointer;
            margin-right: 30px;
        }


        .menu-item a {
            font-size: 16px;
            font-family: 'roboto', sans-serif;
            letter-spacing: 2px;
            color: white;
            text-decoration: none;
            text-align: left;
            display: block;
        }

        .menu-item a:hover {
            color: #BFA16C;
        }

        .btn-transparent {
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>


    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="navbar-left-section hidden-xs">
            <a href="{{ route('login') }}" id="btn-menu-toggle" class="btn-transparent">
                <img src="{{ asset('assets-web/img/line.png') }}">
            </a>

            <div class="menu">

                <div class="menu-close">&times;</div>

                <div class="menu-header">
                    <img src="{{ asset('assets-web/img/Suade BW Black Transprnt 2.png') }}" alt="Logo">
                </div>

                <div class="menu-item">
                    <a href="#" class="btn-transparent">ABOUT</a>
                </div>
                <div class="menu-item">
                    <a href="#" class="btn-transparent">PRODUCT</a>
                </div>
                <div class="menu-item">
                    <a href="#" class="btn-transparent">EXPERIENCE</a>
                </div>
                <div class="menu-item">
                    <a href="#" class="btn-transparent">NEWS & EVENT</a>
                </div>
                <div class="menu-item">
                    <a href="#" class="btn-transparent">CLUB</a>
                </div>
                <div class="menu-item">
                    <a href="#" class="btn-transparent">SHOP</a>
                </div>
            </div>
        </div>

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets-web/img/Suade BW Black Transprnt 1.png') }}" alt="Logo">
        </a>

        <!-- Right: Login + Cart -->
        <div class="navbar-right-section hidden-xs">
            <a href="{{ route('login') }}" class="btn-navbar">
                <img src="{{ asset('assets-web/img/user.png') }}">
                LOGIN
            </a>
            <a href="" class="btn-navbar">
                <img src="{{ asset('assets-web/img/shop.png') }}"> CART
                <span class="cart-badge">2</span>
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link @yield('winnery')" href="#">WINNERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('distillery')" href="#">DISTILLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('brewery')" href="#">BREWERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('shop')" href="{{ route('shop') }}">SHOP</a>
                </li>
            </ul>
        </div>
    </nav>


    <div>
        <img src="{{ asset('assets-web/img/hero suade.png') }}" alt="Full Width Image" class="full-width-image">
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">OUR BESTSELLERS</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                        <br>
                        magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="carousel-container">
                        <div class="product-slider owl-carousel">
                            <div class="single-box text-center">
                                <div class="img-area"><img alt="" class="img-fluid move-animation"
                                        src="{{ asset('assets-web/img/product/p1.png') }}">
                                </div>
                            </div>
                            <div class="single-box text-center">
                                <div class="img-area"><img alt="" class="img-fluid move-animation"
                                        src="{{ asset('assets-web/img/product/p2.png') }}">
                                </div>
                            </div>
                            <div class="single-box text-center">
                                <div class="img-area"><img alt="" class="img-fluid move-animation"
                                        src="{{ asset('assets-web/img/product/p3.png') }}">
                                </div>
                            </div>
                            <div class="single-box text-center">
                                <div class="img-area"><img alt="" class="img-fluid move-animation"
                                        src="{{ asset('assets-web/img/product/p4.png') }}">
                                </div>
                            </div>
                            <div class="single-box text-center">
                                <div class="img-area"><img alt="" class="img-fluid move-animation"
                                        src="{{ asset('assets-web/img/product/p5.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="#"><button class="btn-purple">DISCOVER ALL</button></a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-purple">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center">
                    <h2 class="text-color-coklat text-size-heading ptserif">OUR COLLECTIONS</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt magni <br>
                        dolores eos qui ratione voluptatem sequi nesciunt ut labore
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </section>

    <div class="masonry">
        <div class="masonry-item">
            <img src="{{ asset('assets-web/img/aurora.png') }}" alt="Image"
                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';">
            <div class="caption ptserif">aurora</div>
        </div>
        <div class="masonry-item">
            <img src="{{ asset('assets-web/img/twilight.png') }}" alt="Image"
                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';">
            <div class="caption ptserif">twilight</div>
        </div>
        <div class="masonry-item">
            <img src="{{ asset('assets-web/img/eve.png') }}" alt="Image"
                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';">
            <div class="caption ptserif">eve</div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row display-flex">
                <div class="col-md-6">
                    <div class="container">
                        <img src="{{ asset('assets-web/img/Image Wine Tour.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                            alt="Image 1" class="full-width-image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <h6 class="text-size-title text-color-purple">Winery Tour</h6>
                        <p class="text-size-subtitle text-color-black">Sed ut perspiciatis unde omnis</p>
                        <div class="description-experience">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem.
                            </p>
                        </div>
                        <p>&nbsp;</p>
                        <a href="#"><button class="btn-purple">EXPLORE MORE</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row display-flex">

                <div class="col-md-6">
                    <div class="container">
                        <h6 class="text-size-title text-color-purple">OUR STORY</h6>
                        <p class="text-size-subtitle text-color-black">Sed ut perspiciatis unde omnis</p>
                        <div class="description-experience">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem.
                            </p>
                        </div>
                        <p>&nbsp;</p>
                        <a href="#"><button class="btn-purple">EXPLORE MORE</button></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <img src="{{ asset('assets-web/img/our-story.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                            alt="Image" class="full-width-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h6 class="text-size-title text-color-purple">FOLLOW US ON INSTAGRAM
                        <a href="#"><button class="btn-coklat">@SUADEWINERY</button></a>
                    </h6>
                </div>
            </div>
        </div>
    </section>

    <div class="carousel-container">
        <div class="product-slider owl-carousel">
            <div class="single-box text-center">
                <div class="img-area"><img alt="" class="img-fluid move-animation"
                        src="{{ asset('assets-web/img/Mask group1.png') }}">
                </div>
            </div>
            <div class="single-box text-center">
                <div class="img-area"><img alt="" class="img-fluid move-animation"
                        src="{{ asset('assets-web/img/Mask group2.png') }}">
                </div>
            </div>
            <div class="single-box text-center">
                <div class="img-area"><img alt="" class="img-fluid move-animation"
                        src="{{ asset('assets-web/img/Mask group3.png') }}">
                </div>
            </div>
            <div class="single-box text-center">
                <div class="img-area"><img alt="" class="img-fluid move-animation"
                        src="{{ asset('assets-web/img/Mask group4.png') }}">
                </div>
            </div>
            <div class="single-box text-center">
                <div class="img-area"><img alt="" class="img-fluid move-animation"
                        src="{{ asset('assets-web/img/Mask group5.png') }}">
                </div>
            </div>

        </div>
    </div>



    <script>
        $('.product-slider').owlCarousel({
            loop: true,
            nav: true,
            navText: [
                '<span class="owl-prev"><i class="fa fa-angle-left"></i></span>',
                '<span class="owl-next"><i class="fa fa-angle-right"></i></span>'
            ],
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 450,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 5
                },
                1920: {
                    items: 5
                }
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.btn-transparent').on('click', function(e) {
                e.preventDefault();
                $('.menu').toggleClass('menu-open');
            });

            $('.menu-close').on('click', function() {
                $('.menu').removeClass('menu-open');
            });

            $('.menu-item a').on('click', function() {
                $('.menu').removeClass('menu-open');
            });
        });
    </script>



@endsection
