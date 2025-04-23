@extends('layouts-web.master-web')
@section('title', 'Sumber Air Dewa')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Google Fonts - Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .image-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        #current-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-overlay {
            position: absolute;
            color: white;
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            z-index: 10;
        }

        .scroll-content {
            height: 5000vh;
            background: url('png/00001.png') no-repeat center center fixed;
            background-size: cover;
        }

        .logo {
            width: 150px;
        }

        img.logo {
            position: absolute;
            top: 10%;
            left: 10%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10 20px;
        }

        .btn-coklat {
            background-color: transparent;
            border: #B99B4E solid 2px;
            color: #B99B4E;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 14px;
            font-family: 'roboto', sans-serif;
            margin-top: 10px;
            letter-spacing: 2px;
        }

        .btn-coklat:hover {
            background-color: rgba(161, 157, 74, 0.2);
            text-decoration: none;
            color: #B99B4E;
        }

        .list-inline {
            border-top: #B99B4E 2px solid;
            display: flex;
            font-size: 17px;
            justify-content: space-evenly;
            width: 100%;

        }

        .list-inline-item {
            position: relative;
            flex-grow: 1;
            text-align: center;
            padding-top: 20px;
        }

        .list-inline-item a {
            color: #B99B4E;
            text-decoration: none;
            width: 100%;
        }

        .list-inline-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 20px;
            right: -5px;
            width: 2px;
            height: 100%;
            background-color: #B99B4E;
            transform: translateY(-50%);
        }

        #menu {
            visibility: hidden;
            opacity: 0;
            transform: translateY(30px);
            /* Initially positioned below */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        #menu.visible {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
            /* Reset position when visible */
        }

        .discover {
            padding: 10px;
            font-size: 14px;
            color: #B99B4E;
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .row {
            display: contents;
            justify-content: space-between;
            align-items: center;
        }

        @media only screen and (max-width: 600px) {
            .logo {
                width: 100px;
            }

            img.logo {
                top: 5%;
                left: 20%;
            }

            .container {
                bottom: 10px;
            }

            .col-md-8 {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                width: 100%;
            }

            .discover {
                font-size: 12px;
                padding: 10px;
                width: 200px;
                left: -15%;
                position: relative;
            }

            #menu {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                width: max-content;
                left: -15%;
                position: relative;
            }

            .list-inline {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .list-inline-item {
                padding-top: 10px;
                width: 100%;
            }

            .list-inline-item:not(:last-child)::after {
                display: none;
            }

            .list-inline-item a {
                color: #B99B4E;
                text-decoration: none;
                width: 100%;
                font-size: 12px;
            }
        }
    </style>


    <div class="scroll-content"></div>
    <div class="image-container">
        <img id="current-image" src="{{ asset('png/00001.png') }}" alt="">

        <img src="{{ asset('assets-web/img/logo.png') }}" alt="logo" class="logo">

        <div class="container">
            <div class="row">
                <div class="col-md-2 text-left">
                    <a href="#" onclick="toggleSound();">
                        <img src="{{ asset('assets-web/img/sound.png') }}" alt="logo" class="img-fluid sound"
                            id="sound-image"></a>
                </div>
                <div class="col-md-8 text-center">
                    <div class="row">
                        <div class="col-md-12 text-center" id="discover">
                            <label class="discover"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                    <!-- <a href="{{ route('home') }}" class="btn-coklat">
                                                                                                                                                                                    SKIP INTRO
                                                                                                                                                                                </a> -->
                </div>
            </div>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const basePath = @json(asset('png')); // Mengambil URL path dari Laravel

            if (!basePath) {
                console.error("Base path tidak ditemukan.");
                return;
            }

            const images = [];
            for (let i = 1; i <= 2407; i++) {
                const paddedNumber = String(i).padStart(5, "0"); // Format nama file 00001.png
                images.push(`${basePath}/${paddedNumber}.png`);
            }

            const currentImage = document.getElementById("current-image");
            const menu = document.getElementById("menu");

            if (!currentImage) {
                console.error("Element #current-image tidak ditemukan.");
                return;
            }

            let lastIndex = -1;

            function preloadImages(startIndex, count = 50) {
                for (let i = startIndex; i < startIndex + count && i < images.length; i++) {
                    const img = new Image();
                    img.src = images[i];
                }
            }

            function updateImage() {
                const scrollPosition = window.scrollY;
                const maxScroll = document.body.scrollHeight - window.innerHeight;
                const scrollFraction = scrollPosition / maxScroll;

                const imageIndex = Math.floor(scrollFraction * (images.length - 1));

                if (imageIndex !== lastIndex && images[imageIndex]) {
                    currentImage.src = images[imageIndex];
                    lastIndex = imageIndex;

                    // Preload gambar berikutnya
                    preloadImages(imageIndex + 1);
                }

                // Tampilkan menu jika mendekati bagian bawah
                if (scrollPosition >= maxScroll - window.innerHeight / 2) {
                    menu?.classList.add("visible");
                } else {
                    menu?.classList.remove("visible");
                }
            }

            let ticking = false;
            window.addEventListener("scroll", function() {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        updateImage();
                        ticking = false;
                    });
                    ticking = true;
                }
            });

            // Preload lebih banyak gambar pertama kali
            preloadImages(0, 100);
        });
    </script>

    <script>
        window.addEventListener('scroll', function() {
            var discover = document.getElementById('discover');
            var menu = document.getElementById('menu');
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
