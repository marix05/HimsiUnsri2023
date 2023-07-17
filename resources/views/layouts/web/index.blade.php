<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Website HIMSI Fasilkom UNSRI">
    <meta name="keywords" content="UNSRI, HIMSI, Sistem Informasi, Himpunan Mahasiswa, Program Kerja">
    <meta name="author" content="RISTEK PTI HIMSI Fasilkom UNSRI">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('assets/img/himsi-logo.png') }}" type="image/x-icon">

    <!-- UNICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- BOX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

    <!-- REMIX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- CSS -->

    @if ($nav['active'] == 'Home')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/home/home.css') }}">
    @elseif ($nav['active'] == 'About Us')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/about/about.css') }}">
    @elseif ($nav['active'] == 'Profile')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/profile/profile.css') }}">
    @elseif ($nav['active'] == 'Pojok Himsi')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/pojok-himsi/pojok-himsi.css') }}">
    @elseif ($nav['active'] == 'Akademik')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/akademik/akademik.css') }}">
    @elseif ($nav['active'] == 'Ekspresi')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/ekspresi/ekspresi.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/venobox/venobox.css') }}">
    @elseif ($nav['active'] == 'iMaba')
        <link rel="stylesheet" href="{{ asset('assets/scss/web/iMaba/iMaba.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/scss/web/main.css') }}">

    <!-- TITLE -->
    <title>{{ strtoupper($title) }} | HIMSI FASILKOM UNSRI</title>
</head>
<body>
    @include('layouts.web.preloader')

    @include('layouts.web.navbar')

    <main class="wrapper main my20">
        @yield('content')

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scrollup">
            <i class="ri-arrow-up-fill scrollup__icon"></i>
        </a>
    </main>

    @include('layouts.web.footer')

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/41cd166ad0.js" crossorigin="anonymous"></script>

    <!-- SWIPER -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>

    <!-- JS -->
    @if ($nav['active'] == 'Home')
        <script src="{{ asset('assets/js/web/home.js') }}"></script>
    @elseif ($nav['active'] == 'Pojok Himsi')
        <script src="{{ asset('assets/js/web/pojok-himsi.js') }}"></script>
    @elseif ($nav['active'] == 'Akademik')
        <script src="{{ asset('assets/js/web/akademik.js') }}"></script>
    @elseif ($nav['active'] == 'Ekspresi')
        <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
        <script src="{{ asset('assets/js/web/ekspresi.js') }}"></script>
    @elseif ($nav['active'] == 'iMaba')
        <script src="{{ asset('assets/js/web/iMaba.js') }}"></script>
    @endif

    <script src="{{ asset('assets/js/web/main.js') }}"></script>

    {{-- <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool'></script> --}}
</body>
</html>
