@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('experience', 'active')
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
                            class="brudcrumb-link-active">EXPERIENCE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">Enjoy an Array of Experiences</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
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
    @foreach ($experience as $item)
        @if ($no % 2 != 0)
            <section>
                <div class="container">
                    <div class="row display-flex">
                        <div class="col-md-6">
                            <div class="container">
                                <img src="{{ asset('images/' . $item->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                    alt="Image 1" class="full-width-image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <h6 class="text-size-title text-color-purple">{{ $item->title_experience }}</h6>
                                <p class="text-size-subtitle text-color-black">{{ $item->subtitle_experience }}</p>
                                <div class="description-experience">
                                    <p> {!! Str::limit(strip_tags($item->description_experience), 200) !!}
                                    </p>
                                </div>
                                <p>&nbsp;</p>
                                <a href="{{ route('experience.show', $item->id) }}" class="robotoflex link">EXPLORE MORE</a>
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
                                <h6 class="text-size-title text-color-purple">{{ $item->title_experience }}</h6>
                                <p class="text-size-subtitle text-color-black">{{ $item->subtitle_experience }}</p>
                                <div class="description-experience">
                                    <p>{!! Str::limit(strip_tags($item->description_experience), 200) !!}
                                    </p>
                                </div>
                                <p>&nbsp;</p>
                                <a href="{{ route('experience.show', $item->id) }}" class="robotoflex link">EXPLORE MORE</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <img src="{{ asset('images/' . $item->image) }}"
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

    <section>
        <div class="container">
            <div class="row display-flex">
                @if ($no % 2 != 1)
                    <div class="col-md-6">
                        <div class="container">
                            <h6 class="text-size-title text-color-purple">Resort</h6>
                            <p class="text-size-subtitle text-color-black">Sed ut perspiciatis unde omnis dolores</p>
                            <div class="description-experience">
                                <p>
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                    Neque porro quisquam est, qui dolorem.</p>
                            </div>
                            <p>&nbsp;</p>
                            <a href="{{ route('resort') }}" class="robotoflex link">EXPLORE MORE</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <img src="{{ asset('assets-web/img/Image Resort.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image" class="full-width-image">
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="container">
                            <img src="{{ asset('assets-web/img/Image Resort.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image" class="full-width-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <h6 class="text-size-title text-color-purple">Resort</h6>
                            <p class="text-size-subtitle text-color-black">Sed ut perspiciatis unde omnis dolores</p>
                            <div class="description-experience">
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                Neque porro quisquam est, qui dolorem.</div>
                            <p>&nbsp;</p>
                            <a href="{{ route('resort') }}" class="robotoflex link">EXPLORE MORE</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="text-size-title text-color-purple">ACTIVITIES</h6>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                @foreach ($activities as $item)
                    <div class="col-md-4">
                        <div class="container text-center">
                            <img src="img/activities/activities1.png"
                                onerror="this.onerror=null;this.src='{{ asset('images/' . $item->image_activiti) }}';"
                                alt="Image" class="full-width-image">
                            <p class="text-size-subtitle text-color-black text-bold">{{ $item->title_activiti }}
                            </p>
                            <p>{!! Str::limit(strip_tags($item->description_activiti), 100) !!} </p>
                            <a href="{{ route('activities.show', $item->id) }}" class="robotoflex link">DISCOVER MORE</a>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ route('activities') }}" class="btn-purple">SHOW ALL</a>
                </div>
            </div>
        </div>

    </section>


@endsection
