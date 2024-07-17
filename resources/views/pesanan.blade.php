<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reservasi Anda</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background: url('/storage/img/index/bgJB.jpg') center center;
        }
    </style>
</head>

<body>

    {{-- {{ dd($data) }} --}}
    <div class="container">
        <div class="top mt-2 d-flex" style="justify-content: space-between; align-items: center;">
            <h1 class="text-light">Pesanan Reservasi anda</h1>

            <a href="{{ route('index') }}">
                <button type="submit" class="bg-light rounded-circle d-flex flex-column justify-content-center align-items-center" style="overflow:hidden; width: 40px; height: 40px;" >
                    &LeftArrow;
                    <small style="font-size: 10px; margin-top: -10px;">back</small>
                </button>
            </a>
        </div>

        <div class="row p-5">
            @empty($data)
                <h5 class="text-dark">anda blom reservasi apa ap</h5>
            @else
                @foreach ($data as $items)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="{{ $items->foto }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $items->nama_wisata }}</h5>
                                <p class="card-text">{{ Str::limit($items->deskripsi, 50) }}</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modal{{ $items->id }}">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $items->id }}" tabindex="-1"
                        aria-labelledby="modalLabel{{ $items->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $items->id }}">{{ $items->nama_wisata }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <img src="{{ $items->foto }}" class="img-fluid mb-3" alt="...">
                                    <p>{{ $items->deskripsi }}</p>
                                    <div class="line mb-2"
                                        style="background: rgb(171, 170, 170); width: 100%; height: 1px;  ">
                                    </div>
                                    <p>Lokasi: {{ $items->alamat }}</p>
                                    <div class="line mb-2 "
                                        style="background: rgb(171, 170, 170); width: 100%; height: 1px;  ">
                                    </div>
                                    <p>Harga Tiket: {{ $items->harga_tiket }}</p>
                                    <div class="line mb-2 "
                                        style="background: rgb(171, 170, 170); width: 100%; height: 3px;  ">
                                    </div>

                                    <h5 class="text-center">Detail Pribadi</h5>

                                    <p>Nama : {{ $items->nama }}</p>
                                    <div class="line mb-2 "
                                        style="background: rgb(171, 170, 170); width: 100%; height: 1px;  ">
                                    </div>
                                    <p>Tanggal booking : {{ $items->tanggal }}</p>
                                    <div class="line mb-2 "
                                        style="background: rgb(171, 170, 170); width: 100%; height: 1px;  ">
                                    </div>
                                    <p>Jumlah Visitors : {{ $items->visitor }} orang</p>
                                    <div class="line mb-4 "
                                        style="background: rgb(171, 170, 170); width: 100%; height: 3px;  ">
                                    </div>
                                    <p>Total Pembayaran : <strong>Rp.{{ $items->total_harga }}</strong></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endempty
        </div>
    </div>



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
    -->
</body>

</html>
