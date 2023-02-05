<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>SIMASET - @yield('title')</title>
    
    {{-- css file style --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
    {{-- icon --}}
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome/css/solid.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    @yield('login')
    @auth
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('includes.navbar')
            </div>
        </div>
        <div class="row konten">
            <div class="col-1">
                @include('includes.sidebar')
            </div>
            <div class="col-10">
                @include('komponen.pesan')
                @yield('main')
            </div>
            <div class="col-1">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @yield('laporan')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
               @include('includes.footer')
            </div>
        </div>
    </div>
    @endauth
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
