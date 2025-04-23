@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')

    <div>
        <img src="{{ asset('images/' . $headers->image_header) }}" alt="Full Width Image" class="full-width-image">
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">DRINK FROM THE FOUNTAIN OF GODS</h2>
                    <p>Welcome to Sumber Air Dewa, where every glass tells a story of craftsmanship. <br>
                        Explore our curated collection and indulge in a refined drinking experience.
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="row display-flex">
            <div class="col-md-6">
                <div class="container">
                    <img src="{{ asset('images/' . $about->image) }}" alt="Image"
                        onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                        class="full-width-image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h6 class="text-size-title text-color-purple">{{ $about->title }}</h6>
                    <p class="text-size-subtitle text-color-black">{{ $about->subtitle }}</p>
                    <div class="description-about"> {!! $about->description !!}
                    </div>
                    </p>&nbsp;</p>
                    <a href="{{ route('about') }}" class="robotoflex link">DISCOVER MORE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-coklat">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center">
                    <h2 class="text-color-white text-size-heading ptserif">ENJOY AN ARRAY OF EXPERIENCES</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt magni
                        <br>dolores eos qui ratione voluptatem sequi nesciunt ut labore
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </section>

    <div class="masonry">
        @foreach ($gallery as $item)
            <div class="masonry-item">
                <img src="{{ asset('images/' . $item->image) }}" alt="Image"
                    onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';">
                <div class="caption ptserif">{{ $item->title }}</div>
            </div>
        @endforeach

    </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="text-size-title text-color-purple">OUR PRODUCT</h4>
                    <h2 class="text-heading text-color-purple ptserif">QUALITY AND CONSISTENCY IN EVERY BOTTLE</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="carousel-container">
                        <div class="product-slider owl-carousel">

                            @foreach ($products as $item)
                                <div class="single-box text-center">
                                    <div class="img-area"><img alt="" class="img-fluid move-animation"
                                            src="{{ asset('images/' . $item->image_product) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('products') }}"><button class="btn-purple">SEE ALL PRODUCTS</button></a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row display-flex">
                <div class="col-lg-6">
                    <h4 class="text-size-title text-color-purple">CONTACT US</h4><br>
                    <h6 class="roboto text-bold text-color-black">ADDRESS</h6><br>
                    <p>{!! $contact->address !!}</p><br>
                    <H6 class="roboto text-bold text-color-black">OPERATING HOURS</H6><br>
                    <p>{!! $contact->operating_hours !!}</p>
                    <a href="#">
                        <button class="btn-coklat">GET IN TOUCH</button></a>
                </div>
                <div class="col-lg-6">
                    {!! $contact->google_maps !!}
                </div>
            </div>
        </div>
    </section>


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


@endsection
