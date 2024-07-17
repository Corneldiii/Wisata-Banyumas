<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Admin</title>
    <style>
        body {
            padding-top: 56px;
            /* Adjust this value if the height of the navbar changes */
        }

        #dashboard {
            width: 100%;
            height: 100vh;
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
    </style>
</head>

<body>
    {{-- {{ dd($data) }} --}}

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <a class="navbar-brand" href="#">
            <img src="/storage/img/admin/dashboard/logoSIG.png" style="width: 30px; border: none" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftar_wisata') }}">Daftar Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tambah_wisata') }}">Tambah Wisata</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex justify-content-center align-items-center" href="#"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false"
                        style="background: none; border: none;">

                        <img src="{{ $data->foto_akun }}" alt="Profile Picture" class="rounded-circle mr-3"
                            width="30" height="30">
                        <p class="mb-0">{{ $data->email }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        <li><a class="dropdown-item" href="{{ route('index') }}">Cek Websitte</a></li>
                        <li><button type="button" class="dropdown-item btn" data-toggle="modal"
                                data-target="#ModalEdit" href="{{ route('pesanan_reservasi') }}">Edit Profil</button>
                        </li>

                        <!-- Modal -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateProfileForm" method="POST" enctype="multipart/form-data"
                    action="{{ route('edit_profile') }}">
                    @csrf
                    <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                        <div class="profile-picture d-flex justify-content-center align-items-center">
                            <img src="{{ $data->foto_akun }}" alt="Profile Picture" class="rounded-circle mb-3"
                                id="profilePic" width="100" height="100" style="cursor: pointer;">
                        </div>
                        <input type="file" id="fileInput" name="foto_akun" style="display: none;"
                            accept="image/*">

                        <div class="line mb-2" style="background: rgb(171, 170, 170); width: 100%; height: 1px;">
                        </div>

                        <div class="info-pribadi">
                            <p>Email : {{ $data->email }}</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if (session('login_success'))
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
                    {{ session('login_success') }}
                </div>
            </div>
        </div>
    @endif

    {{-- dashboard --}}
    <section id="dashboard" class="d-flex justify-content-center align-items-center">
        <img src="/storage/img/admin/dashboard/logoSIG.png" class="img-thumbnail w-25 h-50"
            style="opacity: 0.5; border: none" alt="">
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>

    <script>
        document.getElementById('profilePic').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
    </script>



    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>
