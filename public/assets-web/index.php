<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Air Dewa</title>
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
    </style>
</head>

<body>
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
                    <img src="assets/img/logo.png" alt="logo" class="img-fluid logo">
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="start-link">
                        <img src="assets/img/start.png" alt="logo" class="img-fluid start" id="start-image">
                    </a>
                </div>
            </div>

            <div class="row">
                <!--<div class="col-md-3 text-right">-->
                <!--    <img src="assets/Logo/icons/sound.png" alt="logo" class="img-fluid sound" id="sound-image"-->
                <!--        onclick="toggleSound()">-->
                <!--</div>-->
                <!--<div class="col-md-6 text-center ">-->
                <!--    <ul class="list-inline">-->
                <!--        <li class="list-inline-item">-->
                <!--            <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LINKEDIN&nbsp;&nbsp;&nbsp;&nbsp;</a>-->
                <!--        </li>-->
                <!--        <li class="list-inline-item">-->
                <!--            <a href="#">WORK WITH US</a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Script untuk mengatur suara -->
    <script>
    // Tangkap elemen ikon suara
    const soundImage = document.getElementById('sound-image');
    const audio = new Audio('assets/audio.m4a'); // Path to your audio file
    // audio.play();
    // audio.loop = true;
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
    
    
    // Tambahkan event listener untuk tombol start
    document.getElementById('start-image').addEventListener('click', function() {
        const startAudio = new Audio('assets/click.mp3'); // Path to your start sound file
        startAudio.play();
        window.location="start.php";
    });
    </script>
</body>

</html>