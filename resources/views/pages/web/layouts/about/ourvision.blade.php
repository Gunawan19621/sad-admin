@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')


    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> / <a href="#" class="brudcrumb-link">ABOUT</a> /
                        <a href="#" class="brudcrumb-link-active">OUR VISION</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">Our vision</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        <br> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                </div>
            </div>
        </div>
        </div>
    </section>


    @php
        $no = 1;
    @endphp
    @foreach ($vision as $item)
        @if ($no % 2 != 0)
            <section>
                <div class="container">
                    <div class="row display-flex">
                        <div class="col-md-6">
                            <div class="container">
                                <img src="{{ asset('images/' . $item->image_vision) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                    alt="Image 1" class="full-width-image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <p class="text-size-subtitle text-color-black">{{ $item->title_vision }}</p>
                                <div class="description-vision"> {!! $item->description_vision !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section>
                <div class="container">
                    <div class="row display-flex">

                        <div class="col-md-6">
                            <div class="container">
                                <p class="text-size-subtitle text-color-black">{{ $item->title_vision }}</p>
                                <div class="description-vision"> {!! $item->description_vision !!}
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <img src="{{ asset('images/' . $item->image_vision) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                    alt="Image" class="full-width-image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @php
            $no++;
        @endphp
    @endforeach

@endsection
