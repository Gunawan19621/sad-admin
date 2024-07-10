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
                        <a href="#" class="brudcrumb-link-active">AWARDS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">AWARDS</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        <br> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="image-grid">
                        @foreach ($awards as $item)
                            <img src="{{ asset('images/' . $item->image_awards) }}" alt="Image">
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
