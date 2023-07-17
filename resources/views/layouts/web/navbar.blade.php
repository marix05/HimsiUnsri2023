    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <div class="wrapper">
            <div class="container">

                <nav class="nav" id="nav">
                    <!-- =================== NAV IMAGE ==================== -->
                    <a href="" class="nav__logo">
                        <img src="{{ asset('assets/img/himsi-unsri.png') }}"
                        alt="HIMSI & Universitas Sriwijaya LOGO" />
                    </a>

                    <!-- ==================== NAV MENU ==================== -->
                    <div class="nav__menu" id="nav__menu">
                        <ul class="nav__list">
                            <!-- ==================== HOME ==================== -->
                            <li class="nav__item">
                                <a href="{{ route('home') }}" class="nav__link {{ $nav["active"] === "Home" ? "active-link" : "" }}">Home</a>
                            </li>

                            <!-- ================== ABOUT US ================== -->
                            <li class="nav__item nav__dropdown">
                                <a href="#" class="nav__link dropdown__link {{ $nav["active"] === "About Us" ? "active-link" : "" }}">About Us <i class="bx bx-chevron-down dropdown__icon"></i></a>

                                <ul class="dropdown__menu">
                                    <li class="dropdown__item">
                                        <a href="{{ route('about-logo') }}" class="nav__link {{ $title === "Logo" ? "active-link-dropdown" : "" }}">Logo</a>
                                    </li>
                                    <li class="dropdown__item">
                                        <a href="{{ route('about-visiMisi') }}" class="nav__link {{ $title === "Visi Misi" ? "active-link-dropdown" : "" }}">Visi & Misi</a>
                                    </li>
                                    <li class="dropdown__item">
                                        <a href="{{ route('about-proker') }}" class="nav__link {{ $title === "Proker" ? "active-link-dropdown" : "" }}">Program Kerja</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- ================ PROFILE DINAS =============== -->
                            <li class="nav__item nav__dropdown">
                                <a href="#" class="nav__link dropdown__link {{ $nav["active"] === "Profile" ? "active-link" : "" }}">Profile <i class="bx bx-chevron-down dropdown__icon"></i></a>

                                <ul class="dropdown__menu">
                                    @foreach ($nav['profiles'] as $dinas)
                                    <li class="dropdown__item">
                                        <a href="{{ route('profile', $dinas['dinasID']) }}" class="nav__link {{ $title === $dinas['dinas'] ? "active-link-dropdown" : "" }}">{{ $dinas["kepanjangan"] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <!-- ================= POJOK HIMSI ================ -->
                            <li class="nav__item">
                                <a href="{{ route('pojokHimsi') }}" class="nav__link {{ $nav["active"] === "Pojok Himsi" ? "active-link" : "" }}">Pojok HIMSI</a>
                            </li>

                            <!-- =================== AKADEMIK ================= -->
                            <li class="nav__item">
                                <a href="{{ route('akademik') }}" class="nav__link {{ $nav["active"] === "Akademik" ? "active-link" : "" }}">Akademik</a>
                            </li>

                            <!-- ================== EKSPRESI ================ -->
                            <li class="nav__item">
                                <a href="{{ route('ekspresi') }}" class="nav__link {{ $nav["active"] === "Ekspresi" ? "active-link" : "" }}">Ekspresi</a>
                            </li>

                            <!-- ==================== IMABA =================== -->
                            <li class="nav__item">
                                <a href="{{ route('imaba') }}" class="nav__link {{ $nav["active"] === "IMaba" ? "active-link" : "" }}">iMaba</a>
                            </li>
                        </ul>
                    </div>

                    <!-- ================== NAV BUTTONS =================== -->
                    <div class="nav__btns">
                        <!-- Theme change button -->
                        <i class="change-theme" id="theme-button"></i>
                        <!-- ri-moon-line -->

                        <div class="nav__toggle" id="nav__toggle">
                            <i class="ri-menu-line"></i>
                        </div>
                        <div class="nav__close" id="nav__close">
                            <i class="ri-close-line"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
