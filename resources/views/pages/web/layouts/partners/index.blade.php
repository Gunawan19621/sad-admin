@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('partners', 'active')
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
                        <a href="#" class="brudcrumb-link-active">PARTNERS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                @foreach ($partners as $item)
                    <div class="col-md-4">
                        <div class="partner">
                            <div class="partner-logo">
                                <img src="{{ asset('images/' . $item->image_partner) }}" alt="Logo">
                            </div>
                            <div class="partner-body">
                                <h5 class="partner-title">{{ $item->name_partner }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>




@endsection
