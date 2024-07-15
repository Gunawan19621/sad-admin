@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('experience', 'active')
@section('content')

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="{{ route('experience') }}" class="brudcrumb-link">EXPERIENCE</a> /
                        <a href="#" class="brudcrumb-link-active">{{ strtoupper($experience->title_experience) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">{{ strtoupper($experience->title_experience) }}
                    </h2>
                    <p>{!! $experience->subtitle_experience !!}</p>
                </div>
            </div>
        </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="container-experience">
                <div class="row">
                    <div class="col-md-12">
                        {!! $experience->description_experience !!}

                        <div class="container-price">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="price-group">GROUP</div>
                                    <div class="price">Rp. 225.000</div>
                                    <div class="price-unit">Per pax</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="price-group">COUPLE</div>
                                    <div class="price">Rp. 455.000</div>
                                    <div class="price-unit">Per pax</div>
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <a href="#" class="btn-purple">RESERVE</a>
                        <a href="#" class="btn-coklat">VIEW MENU</a>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
