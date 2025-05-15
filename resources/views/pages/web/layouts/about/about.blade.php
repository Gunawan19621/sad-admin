@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')

    <div>
        <img src="{{ asset('images/' . $headers->image_header) }}" alt="Full Width Image" class="full-width-image">
    </div>

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="{{ route('home') }}" class="brudcrumb-link">HOME</a> / <a href="#"
                            class="brudcrumb-link-active">ABOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">DON’T SETTLE FOR ORDINARY, IT’S TIME TO MAKE
                        BETTER
                    </h2>
                    <p>We aspire to be the premier choice for those seeking quality and innovation in alcoholic
                        beverages<br>
                        while evolving into a leading corporation in Indonesia.
                    </p>
                    <a href="{{ route('our_vision') }}"><button class="btn-purple">OUR VISION</button></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="bg-purple">
        <div class="container">
            <div class="row display-flex">
                <div class="col-md-6">
                    <div class="container">
                        <img src="{{ asset('assets-web/img/our-story.png') }}" alt="Image 1" class="full-width-image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <h6 class="text-size-title text-color-coklat">OUR STORY</h6>
                        <p>Established in Bali since 2022, we specialize in the production of premium wines, spirits, and
                            liqueurs, with beer soon to be introduced. Our mission is to elevate the drinking experience
                            through..
                        </p>
                        <a href="#" class="robotoflex link-coklat">DISCOVER MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="text-size-title text-color-purple">OUR TEAM</h6>
                    <h2 class="text-size-heading text-color-purple ptserif">Sed ut perspiciatis unde omnis</h2>
                    <p>Suade is powered by a team of dedicated professionals who bring expertise, vision, and passion to
                        <br> everything we do. Meet the people behind our craft:
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
            <div class="row">

                @foreach ($teams as $item)
                    <div class="col-md-3">
                        <img src="{{ asset('images/' . $item->image_team) }}"
                            onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                            alt="Image" class="full-width-image">
                        <h6 class="text-size-team-title text-color-purple text-center ptserif">{{ $item->name_team }}</h6>
                        <p class="text-size-team-job text-center text-color-black roboto">{{ $item->job_team }}</p>
                    </div>
                @endforeach

                <div class="col-md-12 text-center">
                    <a href="{{ route('our_team') }}"><button class="btn-coklat">SHOW ALL</button></a>
                </div>
            </div>
    </section>


    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="text-size-title text-color-purple">AWARDS</h6>
                    <div class="image-grid">
                        @foreach ($awards as $item)
                            <img src="{{ asset('images/' . $item->image_awards) }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="text-size-title text-color-purple">FAQ</h6>
                </div>
                <div class="col-md-12">

                    @foreach ($faqs as $item)
                        <div class="faq">
                            <button class="accordion">
                                {{ $item->question_faq }}
                                <i class="fa fa-plus"></i>
                            </button>
                            <div class="pannel">
                                <p>
                                    {{ $item->answer_faq }}
                                </p>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-md-12 text-center">
                    <br></br>
                    <a href="{{ route('faq') }}"><button class="btn-coklat">SHOW ALL</button></a>
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

                    <p><b>P.</b> {{ $contact->phone }} <br>
                        <b>F.</b> {{ $contact->fax }}<br>
                        <b>E.</b> {{ $contact->email }}
                    </p>
                    <a href="#">
                        <button class="btn-coklat">GET IN TOUCH</button></a>
                </div>
                <div class="col-lg-6">
                    {!! $contact->google_maps !!}
                </div>
            </div>
        </div>
    </section>

@endsection
