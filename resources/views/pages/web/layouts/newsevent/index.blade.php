@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('news-event', 'active')
@section('content')
    <div>
        <img src="{{ asset('images/' . $headers->image_header) }}" alt="Full Width Image" class="full-width-image">
    </div>

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link-active">NEWS & EVENTS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
