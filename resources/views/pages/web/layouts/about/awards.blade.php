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
                    <p>We take pride in the recognition we've earned for excellence and innovation. <br>
                        These awards are a testament to our commitment to setting industry <br>
                        standards and delivering superior quality.
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
