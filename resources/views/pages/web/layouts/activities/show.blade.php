@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('activiti', 'active')
@section('content')

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="{{ route('activities') }}" class="brudcrumb-link">ACTIVITIES</a> /
                        <a href="#" class="brudcrumb-link-active">{{ strtoupper($activiti->title_activiti) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">{{ strtoupper($activiti->title_activiti) }}
                    </h2>
                    <p>{!! $activiti->subtitle_activiti !!}</p>
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
                        {!! $activiti->description_activiti !!}

                        <div class="container-price">
                            <div class="row">
                                @foreach ($price as $item)
                                    <div class="col-md-6">
                                        <div class="price-group">{{ strtoupper($item->unit_activiti) }}</div>
                                        <div class="price">Rp. {{ number_format($item->price_activiti, 0, ',', '.') }}
                                        </div>
                                        <div class="price-unit">Per pax</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                <div class="slides">
                    @foreach ($image as $item)
                        <div class="slide"><img src="{{ asset('images/' . $item->image) }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image"></div>
                    @endforeach
                </div>
            </div>
            <button class="next btn-slider" onclick="nextSlide()">❯</button>
            <button class="prev btn-slider" onclick="prevSlide()">❮</button>
        </div>
    </section>


    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelector('.slides');
            const totalSlides = document.querySelectorAll('.slide').length;

            if (index >= totalSlides) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = totalSlides - 1;
            } else {
                currentSlide = index;
            }

            const offset = -currentSlide * 20;
            slides.style.transform = `translateX(${offset}%)`;
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Optional: Auto slide every 3 seconds
        // setInterval(nextSlide, 3000);
    </script>


@endsection
