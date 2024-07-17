@extends('layouts-web.master-web')
@section('title', 'Sumber Air Dewa')
@section('content')


    <style>
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


        .start {
            width: 100px;
            position: absolute;
            z-index: 9999;
        }
    </style>


    <div class="main">
        <div class="lingkaran-besar">
            <div class="lingkaran-sedang">
                <div class="lingkaran-kecil">

                </div>
            </div>
        </div>
        <div class="maincontent">
            <div class="row mb-4 mt-4">
                <div class="col-md-12 text-center">

                    <img src="{{ asset('assets-web/img/logo-sad2.png') }}" alt="logo" class="img-fluid logo">
                    <a href="#" class="start-link">
                        <img src="{{ asset('assets-web/img/start.png') }}" alt="logo" class="img-fluid start"
                            id="start-image">
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Fungsi untuk mengikuti gerakan mouse
        // document.addEventListener('mousemove', function(e) {
        //     var startImage = document.getElementById('start-image');
        //     var mouseX = e.pageX - (startImage.width / 2); // Menyesuaikan untuk memusatkan gambar di kursor
        //     var mouseY = e.pageY - (startImage.height / 2); // Menyesuaikan untuk memusatkan gambar di kursor

        //     startImage.style.left = `${mouseX-50}px`;
        //     startImage.style.top = `${mouseY-70}px`;
        // });


        document.addEventListener('mousemove', function(e) {
            var startImage = document.getElementById('start-image');
            var lingkaranKecil = document.querySelector('.lingkaran-kecil');
            var lingkaranRect = lingkaranKecil.getBoundingClientRect();

            var lingkaranCenterX = lingkaranRect.left + lingkaranRect.width / 2;
            var lingkaranCenterY = lingkaranRect.top + lingkaranRect.height / 2;
            var radius = lingkaranRect.width / 2;

            var imageWidth = startImage.offsetWidth;
            var imageHeight = startImage.offsetHeight;

            var mouseX = e.clientX - imageWidth / 2;
            var mouseY = e.clientY - imageHeight / 2;

            var distanceX = mouseX + imageWidth / 2 - lingkaranCenterX;
            var distanceY = mouseY + imageHeight / 2 - lingkaranCenterY;
            var distance = Math.sqrt(distanceX * distanceX + distanceY * distanceY);

            if (distance + Math.max(imageWidth, imageHeight) / 2 <= radius) {
                startImage.style.left = `${mouseX-40}px`;
                startImage.style.top = `${mouseY+40}px`;
            } else {
                var angle = Math.atan2(distanceY, distanceX);
                startImage.style.left =
                    `${lingkaranCenterX + (radius - imageWidth / 2) * Math.cos(angle) - imageWidth / 2 -40}px`;
                startImage.style.top =
                    `${lingkaranCenterY + (radius - imageHeight / 2) * Math.sin(angle) - imageHeight / 2 -40}px`;
            }
        });
    </script>
@endsection
