<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Tour Reservation</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{ $foto }}" class="card-img-top" alt="Tour Image">
                    <div class="card-body">
                        <h5 class="card-title">About</h5>
                        <p class="card-text">{{ $deskripsi }}</p>
                        <p class="card-text"><strong>From Rp. {{ $harga }}</strong> per orang dewasa</p>
                        <p class="card-text"><small class="text-muted">Lowest price guarantee • Reserve now & pay later • Free cancellation</small></p>
                        <ul class="list-inline d-flex flex-column">
                            <li class="list-inline-item"><strong>Umur:</strong> 1-70</li>
                            <li class="list-inline-item"><strong>Jangka Waktu:</strong> 1 hari</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservasi Sekarang</h5>
                        <form>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="guests">Guests</label>
                                <input type="number" class="form-control" id="guests" value="1">
                            </div>
                            <div class="form-group">
                                <label>Available Options</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="option1" name="tourOption" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="option1">1 hari - {{ $nama }}</label>
                                </div>
                            </div>
                            <p><strong>Pengunjung : <span id="total-guest">0</span></strong></p>
                            <p id="totalLive"><strong>Live Total Price: Rp <span id="totalLivePrice">0</span></strong></p>
                            <button type="button" class="btn btn-warning btn-block">Reserve Now</button>
                        </form>
                    </div>
                </div>
            </div>
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

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let guestsInput = document.getElementById('guests');
            let totalGuests = document.getElementById('total-guest');
            let totalLivePriceDisplay = document.getElementById('totalLivePrice');
            let harga = {{ $harga }};

            function updateTotalPrice() {
                let guests = parseInt(guestsInput.value);
                let totalPrice = guests * harga;
                totalGuests.innerText = guests + ' Orang';
                totalLivePriceDisplay.innerText = totalPrice;
            }

            guestsInput.addEventListener('input', updateTotalPrice);

            // Initial calculation
            updateTotalPrice();
        });
    </script>
</body>

</html>
