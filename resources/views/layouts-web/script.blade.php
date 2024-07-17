    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Script untuk mengatur suara -->
    <script>
        // Tambahkan event listener untuk tombol start
        document.getElementById('start-image').addEventListener('click', function() {
            const startAudio = new Audio(
                '{{ asset('assets-web/img/click.mp3') }}'); // Path to your start sound file
            startAudio.play();
            window.location = "{{ route('start') }}";
        });
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
            src: "{{ asset('assets-web/img/video.mp4') }}",

        });

        // Tampilkan menu ketika mencapai akhir halaman
        window.addEventListener('scroll', function() {
            var discover = document.getElementById('discover');
            var menu = document.getElementById('menu');
            var windowHeight = window.innerHeight;
            var bodyHeight = document.body.offsetHeight;
            var scrollPosition = window.scrollY;

            // Tampilkan menu hanya ketika scroll berada di awal atau akhir halaman
            // if (scrollPosition === 200) {
            //     discover.classList.remove('hide-container');
            // } else {
            //     discover.classList.add('hide-container');
            // }

            // Tampilkan menu hanya ketika scroll berada di akhir halaman
            if (scrollPosition + windowHeight >= bodyHeight) {
                menu.style.visibility = 'visible';
            } else {
                menu.style.visibility = 'hidden';
            }
        });
    </script>





    <script>
        // $(document).ready(function () {
        // $('.nav-link').on('click', function () {
        //     $('.nav-link').removeClass('active'); // Remove active class from all links
        //     $(this).addClass('active'); // Add active class to the clicked link
        // });
        // });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.nav-item.dropdown');

            dropdowns.forEach(function(dropdown) {
                dropdown.addEventListener('mouseover', function() {
                    const dropdownMenu = this.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.style.display = 'block';
                    }
                });

                dropdown.addEventListener('mouseout', function() {
                    const dropdownMenu = this.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.style.display = 'none';
                    }
                });
            });
        });
    </script>


    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                this.parentElement.classList.toggle("active");

                var pannel = this.nextElementSibling;

                if (pannel.style.display === "block") {
                    pannel.style.display = "none";
                } else {
                    pannel.style.display = "block";
                }
            });
        }
    </script>
