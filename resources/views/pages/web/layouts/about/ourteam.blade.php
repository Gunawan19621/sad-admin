@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link">ABOUT</a> /
                        <a href="#" class="brudcrumb-link-active">OUR TEAM</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">Our Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        <br> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @foreach ($teams as $item)
                    <div class="col-md-3">
                        <img src="{{ asset('images/' . $item->image_team) }}" alt="Image" class="full-width-image">
                        <h6 class="text-size-team-title text-color-purple text-center ptserif">{{ $item->name_team }}</h6>
                        <p class="text-size-team-job text-center text-color-black roboto">{{ $item->job_team }}</p>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
