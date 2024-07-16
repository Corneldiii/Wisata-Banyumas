<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIG Wisata Banyumas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <style>
        body {
            overflow-x: hidden;
            /* background-color: #c1c1c1; */
        }

        .jumbotron {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)), url('{{ asset('storage/img/index/bgJ.jpg') }}') no-repeat center center;
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
            width: 34%;
            left: 33%;
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
        }

        #map {
            height: 600px;
            width: 100%;

            transition: width 0.2s ease-in-out, transform 0.5s ease-in-out;
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

        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1055;
        }

        .toast {
            width: auto;
            max-width: 350px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .toast-header {
            background-color: #d4edda;
            border-bottom: 1px solid #c3e6cb;
            color: #155724;
        }

        .toast-body {
            color: #155724;
        }


        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        #scrollToTopBtn {
            display: block;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            width: 50px;
            height: 50px;
            background-color: #000000;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            font-size: 18px;
            opacity: 1;
            transform: translateY(100px);
            transition: transform 0.5s ease, display 0.3s ease-in-out;
        }

        #scrollToTopBtn.animate {
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translateY(-20px);
        }

        #scrollToTopBtn:hover {
            background-color: #242525;
        }

        #transport {
            transform: translateY(1px);
            transition: transform 0.5s ease-in-out, background 0.3s ease-in-out;
            cursor: pointer;
            border: #7d7d7d;
            border-style: solid;
        }

        #transport:hover {
            background: #a8a9a9;
            transform: translateY(5px);
        }

        #icons {
            transform: translateY(0px);
            transition: color 0.4s ease-in-out, transform 0.4s ease-in-out;
        }

        #icons:hover {
            transform: translateY(5px);
            color: rgb(117, 117, 115);
        }

        .copyright {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    {{-- @if (session('reservasi_success'))
        {{ dd(session('reservasi_success')) }}
    @endif --}}
    <nav class="navbar navbar-expand-lg navbar-dark mt-2 rounded-pill ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="display: flex; justify-content: space-between;">
                    <div class="d-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#data-wisata">Data Wisata</a>
                        </li>

                    </div>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="background: none; border: none;">
                                Welcome
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                            style="display: flex; align-items: center; justify-content: space-around;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-door-closed mr-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z" />
                                                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0" />
                                            </svg> Log Out</button>
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reservasi') }}">Reservasi Anda</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if (session('reservasi_success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header" style="display: flex; justify-content: space-around;">
                    <strong class="mr-auto">Success</strong>
                    <small>Just now</small>
                    <button type="button" class="ml-2 mb-1 close" style="border: none; background: none;"
                        data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Reservasi berhasil disimpan
                </div>
            </div>
        </div>
    @endif


    <div class="jumbotron jumbotron-fluid d-flex align-items-center justify-content-end">
        <div class="text-end w-50 m-5">
            <h1><strong>SISTEM INFORMASI GEOGRAFIS WISATA</strong></h1>
            <h2 class="mt-3"><strong>KABUPATEN BANYUMAS</strong></h2>
            <p class="lead mt-3">Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah
                Banyumas. Aplikasi ini memuat informasi dan lokasi dari tempat wisata di Banyumas.</p>
            <a class="btn btn-light btn-lg mt-3" href="#pembukaan" role="button" style="text-shadow: none;">Lihat
                Detail</a>
        </div>
    </div>

    {{-- pembukaan --}}
    <section style="width: 100%; height: fit-content" id="pembukaan">
        <div class="row d-flex flex-column align-items-center">
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
    <section style="margin-top: -22px; width: 100%; height: fit-content; background-color: #28A745;"
        class="d-flex flex-column justify-content-center align-items-center" id="data-wisata">
        <h2 class="m-2"><strong>Peta Lokasi Wisata</strong></h2>

        <div id="map-container" style="overflow: hidden;"
            class="container rounded shadow row bg-light d-flex justify-content-center align-items-center">
            <div class="col p-2 d-flex flex-column justify-content-center align-items-center ">
                <img src="" id="fotoCard" class="img img-thumbnail rounded-bottom"
                    style="width: 450px; height: 200px;" alt="Tour Image 1">
                <h5 class="text-center mt-2" id="titleCard">baturaden</h5>
                <div class="text-start d-flex flex-column gap-3">
                    <small>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis doloremque ad maiores!
                        Doloremque
                        et soluta incidunt perspiciatis ipsam eveniet enim recusandae possimus! Placeat corrupti
                        consequatur
                        sed, deserunt animi voluptates tenetur.
                    </small>
                    <small>
                        alamat
                    </small>
                    <small>
                        harga tiket
                    </small>
                    <div id="jenis-kendaraan" class="w-50 d-flex gap-3">
                        <div id="transport"
                            class="p-2 rounded-circle d-flex justify-content-center align-items-center">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <div id="transport"
                            class="p-2 rounded-circle d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-bus-front" viewBox="0 0 16 16">
                                <path
                                    d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0m8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2zm1-6c-1.876 0-3.426.109-4.552.226A.5.5 0 0 0 3 4.723v3.554a.5.5 0 0 0 .448.497C4.574 8.891 6.124 9 8 9s3.426-.109 4.552-.226A.5.5 0 0 0 13 8.277V4.723a.5.5 0 0 0-.448-.497A44 44 0 0 0 8 4m0-1c-1.837 0-3.353.107-4.448.22a.5.5 0 1 1-.104-.994A44 44 0 0 1 8 2c1.876 0 3.426.109 4.552.226a.5.5 0 1 1-.104.994A43 43 0 0 0 8 3" />
                                <path
                                    d="M15 8a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1V2.64c0-1.188-.845-2.232-2.064-2.372A44 44 0 0 0 8 0C5.9 0 4.208.136 3.064.268 1.845.408 1 1.452 1 2.64V4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v3.5c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2zM8 1c2.056 0 3.71.134 4.822.261.676.078 1.178.66 1.178 1.379v8.86a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 11.5V2.64c0-.72.502-1.301 1.178-1.379A43 43 0 0 1 8 1" />
                            </svg>
                        </div>
                        <div id="transport"
                            class="p-2 rounded-circle d-flex justify-content-center align-items-center" ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                <path
                                    d=" M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0
                            0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17
                            3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691
                            4H5.309a.5.5 0 0 0-.447.276" />
                        <path
                            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                        </svg>
                    </div>
                </div>
                <button class="btn btn-primary w-25" type="button" id="get-location">
                    Google Maps
                </button>
            </div>
        </div>
        <div class="col">

        </div>
        <div id="map" style="width:1100px;height:480px; position: absolute;" class="m-3 rounded shadow-lg">
        </div>

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

    <section id="booking" class="p-3" style="width: 100%; height: fit-content; background-color: #28A745;">
        <h2 class="mb-4 text-light ">Kunjungi Wisata Banyumas</h2>
        <div class="scrollable-cards ">
            @if ($count == 0)
                <div class="card mb-2 p-3" style="background-color: #F0F0F0; position: relative;">
                    <img src="/storage/img/index/blank.png" class="card-img-top img rounded-bottom"
                        style="height: 150px;" alt="Tour Image 1">
                    <div class="card-body"
                        style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <h5 class="card-title">Data not found</h5>
                            <p class="card-text mt-3">Tiket mulai dari Rp. - </p>
                        </div>
                        <a href="" class="btn btn-primary mt-3" style="align-self: flex-end;">Reserve</a>
                    </div>
                </div>
            @else
                @foreach ($data as $items)
                    <div class="card mb-2" style="background-color: #F0F0F0; position: relative;">
                        <img src="{{ $items->foto }}" class="card-img-top img rounded-bottom" style="height: 150px;"
                            alt="Tour Image 1">
                        <div class="card-body"
                            style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <h5 class="card-title">{{ $items->nama_wisata }}</h5>
                                <p class="card-text mt-3">Tiket mulai dari Rp.{{ $items->harga_tiket }}</p>
                            </div>
                            <a href="{{ route('reservasi') }}?id={{ $items->id }}&nama={{ $items->nama_wisata }}&harga={{ $items->harga_tiket }}&alamat={{ $items->alamat }}&foto={{ $items->foto }}&deskripsi={{ $items->deskripsi }}"
                                class="btn btn-primary mt-3" style="align-self: flex-end;">Reserve</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>


    <button id="scrollToTopBtn" class="btn btn-primary btn-lg rounded-circle" title="Go to top">
        ↑
    </button>

    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#28A745" fill-opacity="1"
                d="M0,96L34.3,106.7C68.6,117,137,139,206,154.7C274.3,171,343,181,411,165.3C480,149,549,107,617,106.7C685.7,107,754,149,823,144C891.4,139,960,85,1029,69.3C1097.1,53,1166,75,1234,106.7C1302.9,139,1371,181,1406,202.7L1440,224L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg>
        <div class="row p-5">
            <div class="col-4 d-flex justify-content-center">
                <img src="/storage/img/admin/dashboard/logoSIG.png" style="width: 200px ; opacity: 0.6;"
                    alt="">
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col text-dark ">
                        <h4 class="text-center"><strong>SIG Wisata</strong></h4>
                        <a href="#" style="text-decoration: none; color: #000; ">
                            <p><strong>Home</strong></p>
                        </a>
                        <a href="#pembukaan" style="text-decoration: none; color: #000;">
                            <p style=" margin-top: -10px;"><strong>Mengenai</strong></p>
                        </a>
                        <a href="#data-wisata" style="text-decoration: none; color: #000;">
                            <p style=" margin-top: -10px;"><strong>Data Wisata</strong></p>
                        </a>
                        <a href="#booking" style="text-decoration: none; color: #000;">
                            <p style=" margin-top: -10px;"><strong>Booking</strong></p>
                        </a>
                    </div>
                    <div class="col">
                        <h4 class="text-center mb-3"><strong>Kritik & Saran</strong></h4>
                        <form action="">
                            <input type="text" id="saran" placeholder="Kritik & saran"
                                class="w-100 form-control">
                            <button class="btn btn-info mt-2" type="submit">submit</button>
                        </form>
                    </div>
                    <div class="col">
                        <h4 class="text-center mb-3"><strong>Follow</strong></h4>
                        <div class="d-flex justify-content-center gap-4 mb-5">
                            <svg id="icons" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg>

                            <svg id="icons" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>

                            <svg id="icons" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                            </svg>

                            <svg id="icons" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path
                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="icon d-flex flex-column justify-content-center align-items-center">

            <div class="line mb-2 " style="background: rgb(171, 170, 170); width: 95%; height: 1px;  "></div>

            <div class="copyright p-2">
                &copy; 2024 Your Company Name. All rights reserved.
            </div>

        </div>

    </footer>


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
            var currentMarker = null;

            if (!data || !Array.isArray(data)) {
                console.error('Invalid data:', data);
                return;
            }

            data.forEach(function(item) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(item.latitude),
                        lng: parseFloat(item.longitude)
                    },
                    map: map,
                    title: item.nama_wisata
                });

                marker.addListener('click', function() {
                    console.log('Marker clicked:', item);

                    // Update map center and zoom
                    map.setCenter({
                        lat: parseFloat(item.latitude),
                        lng: parseFloat(item.longitude)
                    });
                    map.setZoom(20);
                    console.log('Map centered to:', item.latitude, item.longitude);

                    // Remove previous marker if exists
                    if (currentMarker) {
                        currentMarker.setMap(null);
                    }

                    // Add new marker
                    currentMarker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(item.latitude),
                            lng: parseFloat(item.longitude)
                        },
                        map: map,
                        title: item.nama_wisata
                    });
                    console.log('New marker added:', currentMarker);

                    document.getElementById('map').style.width = '40%';
                    document.getElementById('map').style.transform = 'translateX(55%)';
                    document.getElementById('fotoCard').src = item.foto;
                    document.getElementById('titleCard').innerText = item.nama_wisata;
                    document.querySelector('.text-start small').innerText = item.deskripsi;
                    document.querySelectorAll('.text-start small')[1].innerText = item.alamat;
                    document.querySelectorAll('.text-start small')[2].innerText = "Harga tiket Rp." + item
                        .harga_tiket;
                    document.querySelector('.bi-geo-alt-fill + small').innerText = item.alamat;



                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (typeof google !== 'undefined' && google.maps) {
                initMap();
            } else {
                console.error('Google Maps API gagal dimuat.');
            }
        });


        document.getElementById('get-location').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;
                    alert('User coordinates: Latitude: ' + userLat +
                        ', Longitude: ' + userLng);

                    // const googleMapsUrl =
                    //     `https://www.google.com/maps/dir/?api=1&origin=${userLat},${userLng}&destination=${-7.3098379612518105},${109.2396601746585}&travelmode=driving`;


                    // window.open(googleMapsUrl, '_blank');
                }, function(error) {
                    handleLocationError(error);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });




        function handleLocationError(error) {
            switch (error.code) {
                case 1:
                    alert("Error: User denied the request for Geolocation.");
                    break;
                case 2:
                    alert("Error: Location information is unavailable.");
                    break;
                case 3:
                    alert("Error: The request to get user location timed out.");
                    break;
                default:
                    alert("An unknown error occurred.");
                    break;
            }
        }



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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });


        window.addEventListener('scroll', function() {
            const box = document.getElementById('box');
            if (box) {
                box.classList.add('animate');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var scrollToTopBtn = document.getElementById('scrollToTopBtn');
            var rootElement = document.documentElement;

            function handleScroll() {
                var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
                if (rootElement.scrollTop / scrollTotal > 0.20) {
                    scrollToTopBtn.classList.add('animate');
                } else {
                    scrollToTopBtn.classList.remove('animate');
                }
            }

            function scrollToTop() {
                rootElement.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }

            scrollToTopBtn.addEventListener("click", scrollToTop);
            document.addEventListener("scroll", handleScroll);
        });
    </script>
</body>

</html>
