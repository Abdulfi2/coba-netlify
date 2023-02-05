<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>SIMASET - @yield('title')</title>
    
    {{-- css file style --}}
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/login.css')}}">
    {{-- icon --}}
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/solid.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="main">
        <div class="col-md-6 box brand">
            <div class="brand">
                <div class="brand-image">
                    <img src="{{asset('asset/images/logo-cycle.png')}}" alt="brand-logo">
                </div>
                <div class="brand-desc">
                    <h2 class="brand-name">SIMASET</h2>
                    <p class="brand-text">Sistem Informasi Manajemen Aset</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 box login" id="formLogin">
            <h2>Form Login</h2>
            <form class="form-login" method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password" class="form-control" id="password" value="{{ old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
                <div class="note">
                    <span>Form ini Hanya bisa digunakan oleh User yang terdaftar</span>
                    <!-- <span>Belum Punya Akun silahkan <a class="login-button" href="#" onclick="openLogin()">Register disini</a></span> -->
                </div>
                <div class="mb-3">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>
</body>

</html>
