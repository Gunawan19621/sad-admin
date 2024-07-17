@extends('layouts-web.master-web')
@section('title', 'Sumber Air Dewa')
@section('content')
    <div style="height: 1500vh;">
        <div class="video-container" id="scrolly-video">
            <img src="{{ asset('assets-web/img/logo.png') }}" alt="logo" class="logo2">

            <div class="container">

                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-3 text-left">
                        <a href="#" onclick="toggleSound();">
                            <img src="{{ asset('assets-web/img/sound.png') }}" alt="logo" class="img-fluid sound"
                                id="sound-image"></a>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row">
                            <div class="col-md-12 text-center" id="discover">
                                <label class="discover"><svg width="12" height="12" viewBox="0 0 12 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="5.65686" y="11.3137" width="8" height="8"
                                            transform="rotate(-135 5.65686 11.3137)" fill="#C9AC62" />
                                    </svg> SCROLL TO DISCOVER
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="5.65686" y="11.3137" width="8" height="8"
                                            transform="rotate(-135 5.65686 11.3137)" fill="#C9AC62" />
                                    </svg></label>
                            </div>
                            <ul class="list-inline" id="menu">
                                <li class="list-inline-item">
                                    <a href="https://id.linkedin.com/company/sumberairdewa" target="_blank">
                                        LINKEDIN</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.jobstreet.co.id/id/companies/sumber-air-dewa-168554222585292"
                                        target="_blank">
                                        WORK WITH US
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-3" style="text-align:right;">
                        <a href="{{ route('home') }}" class="btn-coklat">
                            SKIP INTRO
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            var discover = document.getElementById('discover');
            var scrollPosition = window.scrollY;
            var windowHeight = window.innerHeight;

            // Atur opacity dan posisi berdasarkan posisi scroll
            if (scrollPosition < windowHeight) {
                discover.style.opacity = 1 - scrollPosition / windowHeight;
                discover.style.transform = `translateY(${scrollPosition}px)`;

            } else {
                discover.style.opacity = 0;
                discover.style.transform = `translateY(${windowHeight}px)`;
            }
        });
    </script>
    <script>
        const soundImage = document.getElementById('sound-image');
        const audio = new Audio("{{ asset('assets-web/img/audio.m4a') }}"); // Path to your audio file
        audio.play();
        audio.loop = true;
        // Fungsi untuk mengganti ikon suara dan mengatur audio
        function toggleSound() {
            if (soundImage.classList.contains('sound-on')) {
                soundImage.src = "{{ asset('assets-web/img/mute.png') }}";
                soundImage.classList.remove('sound-on');
                audio.pause(); // Pause the audio
            } else {
                soundImage.src = "{{ asset('assets-web/img/sound.png') }}";
                soundImage.classList.add('sound-on');
                audio.play(); // Play the audio
            }
        }
    </script>
@endsection
