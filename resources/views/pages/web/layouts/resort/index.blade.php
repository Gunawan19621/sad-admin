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
                        <a href="#" class="brudcrumb-link-active">RESORT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">Resort</h2>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                        Neque porro quisquam est, qui dolorem.</p>
                </div>
            </div>
        </div>
        </div>
    </section>



    @foreach ($resort as $item)
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-size-title text-color-purple">{{ $item->title_resort }}</h6>
                        <p class="text-size-subtitle text-color-black">{{ $item->subtitle_resort }}</p>
                    </div>
                </div>
                <div class="container-experience">
                    <div class="row">
                        <div class="col-md-12">
                            {!! $item->description_resort !!}


                            <p>&nbsp;</p>
                            <a href="#" class="btn-purple">RESERVE</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-slider">
            <div>
                <div class="slider">
                    <div class="slides slides-image{{ $item->id }}">
                        @foreach ($item->category as $item2)
                            <div class="slide slide-image{{ $item->id }}"><img
                                    src="{{ asset('images/' . $item2->image_resort) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                    alt="Image"></div>
                        @endforeach
                    </div>
                </div>
                <button class="next btn-slider" onclick="nextSlide{{ $item->id }}()">❯</button>
                <button class="prev btn-slider" onclick="prevSlide{{ $item->id }}()">❮</button>
            </div>
        </section>


        <script>
            let currentSlide{{ $item->id }} = 0;

            function showSlide{{ $item->id }}(index) {
                const slides = document.querySelector('.slides-image{{ $item->id }}');
                const totalSlides = document.querySelectorAll('.slide-image{{ $item->id }}').length;

                if (index >= totalSlides) {
                    currentSlide{{ $item->id }} = 0;
                } else if (index < 0) {
                    currentSlide{{ $item->id }} = totalSlides - 1;
                } else {
                    currentSlide{{ $item->id }} = index;
                }

                const offset = -currentSlide{{ $item->id }} * 20;
                slides.style.transform = `translateX(${offset}%)`;
            }

            function nextSlide{{ $item->id }}() {
                showSlide{{ $item->id }}(currentSlide{{ $item->id }} + 1);
            }

            function prevSlide{{ $item->id }}() {
                showSlide{{ $item->id }}(currentSlide{{ $item->id }} - 1);
            }

            // Optional: Auto slide every 3 seconds
            // setInterval(nextSlide, 3000);
        </script>
    @endforeach









@endsection
