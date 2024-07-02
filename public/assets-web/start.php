<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sumber Air Dewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    @font-face {
        font-family: "colus";
        src: url("assets/Font/Colus-Regular.otf") format("opentype");
    }

    body {
        background-color: #FDF9EF;
        font-family: "colus";
    }

    .container {
        margin-top: 100px;
    }

    .logo {
        width: 150px;
    }

    .sound {
        width: 25px;
    }

    .list-inline {
        border-top: #B99B4E 2px solid;
        display: flex;
        justify-content: space-evenly;

    }

    .list-inline-item {
        position: relative;
        /* Untuk mengatur posisi garis */
        flex-grow: 1;
        /* Memastikan lebar antar menu sama */
        text-align: center;
        /* Untuk mengatur teks di tengah */
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
        /* Menyesuaikan posisi garis */
        width: 2px;
        height: 100%;
        /* Panjang garis */
        background-color: #B99B4E;
        /* Warna garis */
        transform: translateY(-50%);
        /* Untuk posisi vertikal garis */
    }

    .discover {
        padding: 10px;
        font-size: 14px;
        color: #B99B4E;
    }

    .skip {
        color: #B99B4E;
        text-decoration: none;
        border-radius: 20px;
        border: 1px solid #B99B4E;
        padding: 10px 20px;
    }

    .video-container {
        position: relative;
        width: 50%;
        overflow: hidden;
    }

    .video-container img.logo {
        position: absolute;
        top: 10%;
        /* Posisi vertikal logo di tengah */
        left: 10%;
        /* Posisi horizontal logo di tengah */
        transform: translate(-50%, -50%);
        /* Untuk mengatur posisi logo di tengah */
        z-index: 10;
        /* Untuk menempatkan logo di atas video */
    }

    .video-container .container {
        position: absolute;
        top: 75%;
        /* Posisi vertikal logo di tengah */
        left: 50%;
        /* Posisi horizontal logo di tengah */
        transform: translate(-50%, -50%);
        /* Untuk mengatur posisi logo di tengah */
        z-index: 10;
        /* Untuk menempatkan logo di atas video */
    }

    .hide-container {
        animation: fade 1.5s ease-in-out infinite;
        display: none;
    }

    

    @keyframes fade {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
    }
    
    #menu {
        visibility:hidden;
    }
    </style>
</head>

<body>
    <div>
        <div style="height: 1500vh;">
            <div class="video-container" id="scrolly-video">
                <img src="assets/img/sad.png" alt="logo" class="logo">

                <div class="container" >
                    
                    <div class="row" style="display: flex; align-items: center;">
                        <div class="col-md-3 text-right">
                            <img src="assets/Logo/icons/sound.png" alt="logo" class="img-fluid sound" id="sound-image"
                                onclick="toggleSound()">
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="row" >
                                <div class="col-md-12 text-center" id="discover">
                                    <label class="discover">* SCROLL TO DISCOVER *</label>
                                </div>
                                <ul class="list-inline" id="menu">
                                    <li class="list-inline-item"><a
                                            href="https://id.linkedin.com/company/sumberairdewa" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LINKEDIN&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://www.jobstreet.co.id/id/companies/sumber-air-dewa-168554222585292" target="_blank">WORK WITH US</a></li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="col-md-3" style="text-align:right;">
                            <a href="index.php" class="skip">
                                SKIP INTRO
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/scrolly-video@latest/dist/scrolly-video.js"></script>
    <script type="text/javascript">
    new ScrollyVideo({
        scrollyVideoContainer: "scrolly-video",
        cover: true,
        sticky: true,
        full: true,
        trackScroll: true,
        transitionSpeed: 1,
        frameThreshold: 0.001,
        useWebCodecs: true,
        debug: false,
        // src: "assets/SAD Intro 02.mov",
        src: "assets/video.mp4",

    });

    // Tampilkan menu ketika mencapai akhir halaman
    window.addEventListener('scroll', function() {
        var discover = document.getElementById('discover');
        var menu = document.getElementById('menu');
        var windowHeight = window.innerHeight;
        var bodyHeight = document.body.offsetHeight;
        var scrollPosition = window.scrollY;

        // Tampilkan menu hanya ketika scroll berada di awal atau akhir halaman
        if (scrollPosition === 0) {
            discover.classList.remove('hide-container');
        } else {
            discover.classList.add('hide-container');
        }
        
        // Tampilkan menu hanya ketika scroll berada di akhir halaman
        if (scrollPosition + windowHeight >= bodyHeight) {
            menu.style.visibility = 'visible';
        } else {
            menu.style.visibility = 'hidden';
        }
    });
    </script>

    <!-- Script untuk mengatur suara -->
    <script>
    // Tangkap elemen ikon suara
    const soundImage = document.getElementById('sound-image');
    const audio = new Audio('assets/audio.m4a'); // Path to your audio file
    audio.play();
    audio.loop = true;
    // Fungsi untuk mengganti ikon suara dan mengatur audio
    function toggleSound() {
        if (soundImage.classList.contains('sound-on')) {
            soundImage.src = 'assets/Logo/icons/mute.png';
            soundImage.classList.remove('sound-on');
            audio.pause(); // Pause the audio
        } else {
            soundImage.src = 'assets/Logo/icons/sound.png';
            soundImage.classList.add('sound-on');
            audio.play(); // Play the audio
        }
    }
    </script>
</body>

</html>