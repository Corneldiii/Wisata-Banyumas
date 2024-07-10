<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIG Wisata Banyumas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }

        .jumbotron {
            height: 100vh;
            background: url('/storage/img/index/bgHero.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            position: relative;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 40%;
            left: 30%;
            top: 0;
            z-index: 10;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .container h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .container p {
            font-size: 1.25rem;
        }

        .container {
            margin-top: 80px;
            /* Adjust this value if needed to avoid overlapping with the navbar */
        }

        /* Additional styles for the map */
        #map {
            height: 600px;
            width: 100%;
        }

        #map-container {
            margin-top: 20px;
        }

        #char {
            position: absolute;
            margin-top: 160px;
        }

        #box {
            opacity: 1;
            transform: none;
            border-radius: 0;
            transition: transform 1s ease;
        }

        #box.animate {
            transform: translateY(-100px);
        }

        .scrollable-cards {
            overflow-x: scroll;
            display: flex;
            flex-wrap: nowrap;

        }

        .card {
            min-width: 250px;
            margin-right: 20px;
        }

        /* Custom scrollbar styles */
        .scrollable-cards::-webkit-scrollbar {
            height: 8px;

        }

        .scrollable-cards::-webkit-scrollbar-track {
            background: #cccaca;
            border-radius: 25px;
        }

        .scrollable-cards::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .scrollable-cards::-webkit-scrollbar-thumb:hover {
            background: #555;
        }


        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
            /* Warna scrollbar */
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mt-2 rounded-pill ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#data-wisata">Data Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container text-start">
            <h1>SISTEM INFORMASI GEOGRAFIS WISATA</h1>
            <h2 class="mt-3">KABUPATEN BANYUMAS</h2>
            <p class="lead mt-3">Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah
                Banyumas. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Banyumas.</p>
            <a class="btn btn-warning btn-lg mt-3" href="#pembukaan" role="button">Lihat Detail</a>
        </div>
    </div>

    {{-- pembukaan --}}
    <section style="width: 100%; height: fit-content" id="pembukaan">
        <div class="row d-flex flex-column align-items-center" >
            <div class="row text-center" style="margin-top: 170px">
                <div class="col d-flex flex-column align-items-center" id="box">
                    <img src="/storage/img/index/hotel.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">B</h1>
                </div>
                <div class="col d-flex flex-column align-items-center">
                    <img src="/storage/img/index/Baturraden.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">A</h1>
                </div>
                <div class="col d-flex flex-column align-items-center" id="box">
                    <img src="/storage/img/index/curugK.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">N</h1>
                </div>
                <div class="col d-flex flex-column align-items-center">
                    <img src="/storage/img/index/Gslamet.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">Y</h1>
                </div>
                <div class="col d-flex flex-column align-items-center" id="box">
                    <img src="/storage/img/index/jalan.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">U</h1>
                </div>
                <div class="col d-flex flex-column align-items-center">
                    <img src="/storage/img/index/limpakuwus.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light" style="opacity: 0.8;">M</h1>
                </div>
                <div class="col d-flex flex-column align-items-center" id="box">
                    <img src="/storage/img/index/teratai.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">A</h1>
                </div>
                <div class="col d-flex flex-column align-items-center">
                    <img src="/storage/img/index/waterfall.jpg" class="img img-thumbnail" alt=""
                        style="border: none">
                    <h1 id="char" class="text-light">S</h1>
                </div>
            </div>
            <p class="text-dark text-center w-50" style="margin-top: 80px;">
                Website ini di perutuntukan untuk mengenalkan destinasi wisata yang indah serta seru untuk dikunjungi
                oleh pada wisatawan di daerah Banyumas. Dengan menyediakan layanan informasi dari setiap wisata secara
                lengkap dan jelas.
            </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#28A745" fill-opacity="1"
                d="M0,64L21.8,101.3C43.6,139,87,213,131,256C174.5,299,218,309,262,298.7C305.5,288,349,256,393,240C436.4,224,480,224,524,202.7C567.3,181,611,139,655,138.7C698.2,139,742,181,785,165.3C829.1,149,873,75,916,80C960,85,1004,171,1047,197.3C1090.9,224,1135,192,1178,165.3C1221.8,139,1265,117,1309,128C1352.7,139,1396,181,1418,202.7L1440,224L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- Map Section -->
    <section style="margin-top: -22px; width: 100%; height: fit-content; background-color: #28A745;" id="data-wisata">
        <div id="map-container" class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="m-2">Peta Lokasi Wisata</h2>
            <div id="map" style="width:100%;height:480px;" class="m-3"></div>
        </div>
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="row m-5">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <h2 class="text-light"><strong>Jangkauan Peta</strong></h2>
                    <p class="w-75 text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                        reprehenderit
                        libero earum expedita
                        omnis accusamus iste sit. Vero soluta dolores nostrum maiores. Dignissimos corporis repudiandae
                        placeat, sapiente soluta odio molestias.</p>
                </div>
            </div>
            <div class="row m-5">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <h2 class="text-light"><strong>Jumlah Tempat Wisata</strong></h2>
                    <h3 class="text-light mt-3 w-50 text-center"><strong>{{ $count }}</strong></h3>
                </div>
            </div>
        </div>
    </section>

    {{-- booking --}}

    <section class="p-3" style="width: 100%; height: 100vh; background-color: #28A745;">
        <h2 class="mb-4 text-light">Kunjungi Wisata Banyumas</h2>
        <div class="scrollable-cards">
            @foreach ($data as $items)
                <div class="card mb-2" style="background-color: #F0F0F0; position: relative;">
                    <img src="{{ $items->foto }}" class="card-img-top img rounded-bottom" style="height: 150px;" alt="Tour Image 1">
                    <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <h5 class="card-title">{{ $items->nama_wisata }}</h5>
                            <p class="card-text mt-3">Tiket mulai dari Rp.{{ $items->harga_tiket }}</p>
                        </div>
                        <a href="{{ route('reservasi') }}?id={{ $items->id }}&nama={{ $items->nama_wisata }}&harga={{ $items->harga_tiket }}&alamat={{ $items->alamat }}&foto={{ $items->foto }}&deskripsi={{ $items->deskripsi }}" class="btn btn-primary mt-3" style="align-self: flex-end;">Reserve</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    <script type="text/javascript">
        function initMap() {
            var mapOptions = {
                zoom: 13,
                center: {
                    lat: -7.3098379612518105,
                    lng: 109.2396601746585
                },
                disableDefaultUI: false
            };

            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);


            var data = @json($data);

            data.forEach(function(item) {
                console.log(item);
                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(item.latitude),
                        lng: parseFloat(item.longitude)
                    },
                    map: map,
                    title: item.nama_wisata
                });
            });

        }

        google.maps.event.addDomListener(window, 'load', initMap);

        // Scroll Animation
        window.addEventListener('scroll', function() {
            const thumbnails = document.querySelectorAll('#box');
            thumbnails.forEach(img => {
                if (img.getBoundingClientRect().top < window.innerHeight) {
                    img.classList.add('animate');
                } else {
                    img.classList.remove('animate');
                }
            });
        });
    </script>
</body>

</html>
