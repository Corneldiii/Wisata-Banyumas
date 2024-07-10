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
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <a class="navbar-brand" href="/admin">
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
                    <a class="nav-link" href="#">Daftar Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tambah_wisata') }}">Tambah Wisata</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="/path/to/profile-pic.jpg" alt="Profile Picture" class="rounded-circle" width="30"
                            height="30">
                        Nama Akun
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- daftarWisata -->
    <section id="daftarWisata" class="mt-3 mb-3 d-flex justify-content-center align-items-center">
        <div class="container shadow">
            <div class="row">
                <div class="col">
                    <table id="example" class="table table-hover mb-5">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($data as $items)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td><img src="{{ $items->foto }}" class="img-thumbnail" style="border: none;"
                                            alt=""></td>
                                    <td>{{ $items->nama_wisata }}</td>
                                    <td>{{ $items->alamat }}</td>
                                    <td>{{ $items->latitude }}</td>
                                    <td>{{ $items->longitude }}</td>
                                    <td>
                                        {{-- form update --}}
                                        <a
                                            href="{{ route('update_wisata') }}?id={{ $items->id }}&nama={{ $items->nama_wisata }}&harga={{ $items->harga_tiket }}&alamat={{ $items->alamat }}&latitude={{ $items->latitude }}&longitude={{ $items->longitude }}&deskripsi={{ $items->deskripsi }}">
                                            <button class="btn btn-primary mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25"
                                                    fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                </svg>
                                            </button>
                                        </a>

                                        {{-- form delete --}}
                                        <form action="{{ route('delete_wisata', $items->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $items->id }}">
                                            <button class="btn btn-danger" name="delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}

                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7xD7Wf8XZ5T0K9HE4i1XnA8hL7boPBrk4Y5" crossorigin="anonymous">
    </script>
</body>

</html>
