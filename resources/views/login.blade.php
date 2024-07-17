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
            background: url('/storage/img/login/bgLogin.jpg') no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
        }

        .content-wrapper {
            margin-top: 100px;
            position: relative;
            overflow: hidden;
            width: 65%;
        }

        .img-container {
            position: absolute;
            top: 0;
            left: 0%;
            padding: 0;
            width: 460px;
            height: 100%;
            transition: transform 0.5s ease, left 0.5s ease;
            z-index: 1;
        }

        .img-container img {
            width: 100%;
            height: auto;
        }

        .form-container {
            display: flex;
            justify-content: space-around;
            position: relative;
            z-index: 0;
        }

        .move-right {
            left: 45%;
        }

        .move-left {
            left: 0;
        }
    </style>
</head>

<body>

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}


    <div class="bg-light shadow content-wrapper">
        <div class="row p-3">
            <div class="col img-container bg-dark d-flex justify-content-center align-items-center">
                <a href="https://id.lovepik.com/images/png-1041078.html">
                    <img src="/storage/img/login/20.jpg" class="img-thumbnail" style="border: none;"
                        alt="loginGrafis.png">
                </a>
            </div>
            <div class="col form-container">
                <div class="sign-up-container d-flex flex-column justify-content-center align-items-center">
                    <h3>Welcome!</h3>
                    <p>Sign up your admin account</p>
                    <form class="p-3" action="{{ route('signup') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control h-25 @error('emailSign') is-invalid @enderror"
                                id="email" name="emailSign" aria-describedby="emailHelp"
                                value="{{ old('emailSign') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="passwordSign" class="form-control h-25" id="passwordSign">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" name="passwordVer" class="form-control h-25" id="passwordVer">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <small>Sudah punya akun? <a href="#" id="signInBtn">Sign In</a></small>
                </div>
                <div class="login-container d-flex flex-column justify-content-center align-items-center">
                    <h3>Welcome!</h3>
                    <p>Sign in your admin account</p>
                    <form class="p-3" action="{{ route('auth') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <small>Don't have an account? <a href="#" id="signUpBtn">Sign Up</a></small>
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

    <script>
        document.getElementById('signUpBtn').addEventListener('click', function() {
            document.querySelector('.img-container').classList.remove('move-left');
            document.querySelector('.img-container').classList.add('move-right');
        });

        document.getElementById('signInBtn').addEventListener('click', function() {
            document.querySelector('.img-container').classList.remove('move-right');
            document.querySelector('.img-container').classList.add('move-left');
        });
    </script>
</body>

</html>
