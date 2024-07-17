{{-- @extends('layouts-web.master-web')
@section('title', 'Sumber Air Dewa')
@section('content')
    <div class="main">
        <!-- Animasi Lingkaran -->
        <div class="lingkaran-besar">
            <div class="lingkaran-sedang">
                <div class="lingkaran-kecil"></div>
            </div>
        </div>
        <div class="maincontent">
            <div class="row mb-4 mt-4">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets-web/img/logo-sad2.png') }}" alt="logo" class="img-fluid logo">
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="start-link">
                        <img src="{{ asset('assets-web/img/start.png') }}" alt="logo" class="img-fluid start"
                            id="start-image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Reset margin and padding for the image */
        #start-image {
            margin: 0;
            padding: 0;
            position: absolute;
            pointer-events: none;
            /* Prevent the image from interfering with cursor events */
            width: 100px;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            transform: translate(-50%, -50%);
            /* Center the image properly */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var startImage = document.getElementById('start-image');

            document.addEventListener('mousemove', function(e) {
                var halfWidth = startImage.offsetWidth / 2;
                var halfHeight = startImage.offsetHeight / 2;

                // Adjusting position based on mouse cursor
                startImage.style.left = (e.clientX - halfWidth) + 'px';
                startImage.style.top = (e.clientY - halfHeight) + 'px';
            });
        });
    </script>
@endsection --}}

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>SAD | Sumber Air Dewa</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: "colus";
            src: url("assets/Font/Colus-Regular.otf") format("opentype");
        }

        body {
            background-color: #FDF9EF;
            background-repeat: no-repeat;
            background-position: center 30px;
            background-size: 70%;
            font-family: "colus";
        }

        .main {
            margin-top: 30px;
            margin-right: 30px;
            margin-left: 30px;
            display: flex;
            justify-content: center;
            height: 750px;
            overflow: hidden;
            position: relative;
        }

        /* mengatur animasi Lingkaran besar */
        .lingkaran-besar {
            width: 1200px;
            height: 1200px;
            border-radius: 100%;
            position: absolute;
            animation: berputar-besar 150s linear infinite;
            border: 5px dotted #d0c7b5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes berputar-besar {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* mengatur animasi Lingkaran Sedang */
        .lingkaran-sedang {
            width: 1000px;
            height: 1000px;
            border-radius: 100%;
            position: absolute;
            animation: berputar-sedang 100s linear infinite;
            border: 5px dotted #d0c7b5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes berputar-sedang {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        /* mengatur animasi Lingkaran kecil */
        .lingkaran-kecil {
            width: 880px;
            height: 880px;
            border-radius: 100%;
            position: absolute;
            border: 5px dotted #d0c7b5;
            animation: berputar-kecil 100s linear infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes berputar-kecil {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Konten di dalam lingkaran kecil */
        .maincontent {
            position: absolute;
            text-align: center;
            width: 95%;
            height: 95%;
            bottom: 0;
            z-index: 1;
            color: white;
            font-size: 24px;
        }

        .logo {
            margin-top: 30px;
            width: 330px;
        }

        .start {
            width: 100px;
        }

        .sound {
            margin-right: 50px;
            width: 25px;
        }

        .list-inline {
            border-top: #B99B4E 2px solid;
            display: flex;
            font-size: 17px;
            justify-content: space-evenly;

        }

        .list-inline-item {
            position: relative;
            /* Untuk mengatur posisi garis */
            flex-grow: 1;
            /* Memastikan lebar antar menu sama */
            text-align: center;
            /* Untuk mengatur teks di tengah */
            padding-top: 10px;
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
            /* Menyesuaikan posisi garis */
            width: 2px;
            height: 100%;
            /* Panjang garis */
            background-color: #B99B4E;
            /* Warna garis */
            transform: translateY(-50%);
            /* Untuk posisi vertikal garis */
        }

        .start {
            width: 100px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="main">
        <!-- Animasi Lingkaran -->
        <div class="lingkaran-besar">
            <div class="lingkaran-sedang">
                <div class="lingkaran-kecil"></div>
            </div>
        </div>
        <div class="maincontent">
            <div class="row mb-4 mt-4">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets-web/img/logo-sad2.png') }}" alt="logo" class="img-fluid logo">
                </div>
                <div class="col-md-12 text-center">
                    <a href="{{ route('start') }}" class="start-link">
                        <img src="{{ asset('assets-web/img/start.png') }}" alt="logo" class="img-fluid start"
                            id="start-image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const startImage = document.getElementById('start-image');
        const lingkaranKecil = document.querySelector('.lingkaran-kecil');

        // Fungsi untuk memeriksa apakah titik (x, y) berada di dalam lingkaran kecil
        function isInsideCircle(x, y) {
            const circleRect = lingkaranKecil.getBoundingClientRect();
            const circleCenterX = circleRect.left + circleRect.width / 2;
            const circleCenterY = circleRect.top + circleRect.height / 2;
            const distance = Math.sqrt((x - circleCenterX) ** 2 + (y - circleCenterY) ** 2);
            return distance <= circleRect.width / 2;
        }

        // Atur posisi awal tombol "Start" ke posisi yang diinginkan
        startImage.style.left = '50%';
        startImage.style.top = '79%';

        // Tambahkan event listener untuk mendapatkan posisi kursor
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            // Cek apakah kursor berada di dalam lingkaran kecil
            if (isInsideCircle(mouseX, mouseY)) {
                // Ubah posisi elemen sesuai dengan posisi kursor
                startImage.style.left = `${mouseX}px`;
                startImage.style.top = `${mouseY}px`;
            } else {
                // Kursor keluar dari lingkaran kecil, atur kembali ke posisi semula
                startImage.style.left = '50%';
                startImage.style.top = '79%';
            }
        });

        // Tambahkan event listener untuk memantau saat kursor keluar dari layar
        document.addEventListener('mouseleave', () => {
            // Atur posisi elemen kembali ke posisi semula
            startImage.style.left = '50%';
            startImage.style.top = '79%';
        });
    </script>

</body>

</html>
