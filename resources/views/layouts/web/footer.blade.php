<footer class="footer">
    <div class="wrapper">
        <div class="container">
            <div class="grid__container-4">
                <div class="footer__content">
                    <a href="/" class="footer__logo">
                        <img
                            src="{{ asset('assets/img/himsi-unsri.png') }}"
                            alt="HIMSI & Universitas Sriwijaya LOGO"
                        />
                    </a>

                    <h3>
                        HIMSI Fasilkom Universitas Sriwijaya
                    </h3>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Address</h3>

                    <ul class="footer__data">
                        <li class="footer__information">Gedung F Lantai 1 Ruang F1.2</li>
                        <li class="footer__information">Fakultas Ilmu Komputer</li>
                        <li class="footer__information">Universitas Sriwijaya</li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Contact Us</h3>

                    <ul class="footer__data">
                        <li class="footer__information">
                            <a
                                href="mailto:himsifasilkomunsri@gmail.com"
                                class="footer__link"
                                >himsifasilkomunsri@gmail.com</a
                            >
                        </li>

                        <div class="footer__social">
                            <a
                                href="https://www.youtube.com/channel/UCmyzeEb4Q1FCrGQ2kxeIiLQ"
                                class="footer__link"
                            >
                                <i class="ri-youtube-fill"></i>
                            </a>
                            <a
                                href="https://www.instagram.com/himsiunsri/"
                                class="footer__link"
                            >
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a
                                href="https://page.line.me/?accountId=himsiunsri"
                                class="footer__link"
                            >
                                <i class="ri-line-fill"></i>
                            </a>
                        </div>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Navigations</h3>

                    <ul class="footer__data">
                        <li class="footer__information">
                            <a href="{{ route('home') }}" class="footer__link {{ $nav['active'] == 'Home' ? 'active-link' : '' }}"> Home </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('about-visiMisi') }}" class="footer__link {{ $nav['active'] == 'About Us' ? 'active-link' : '' }}">
                                About Us
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('profile', '1') }}" class="footer__link {{ $nav['active'] == 'Profile' ? 'active-link' : '' }}">
                                Profile
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('pojokHimsi') }}" class="footer__link {{ $nav['active'] == 'Pojok Himsi' ? 'active-link' : '' }}">
                                Pojok HIMSI
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('akademik') }}" class="footer__link {{ $nav['active'] == 'Akademik' ? 'active-link' : '' }}">
                                Akademik
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('ekspresi') }}" class="footer__link {{ $nav['active'] == 'Ekspresi' ? 'active-link' : '' }}">
                                Ekspresi
                            </a>
                        </li>
                        <li class="footer__information">
                            <a href="{{ route('imaba') }}" class="footer__link {{ $nav['active'] == 'IMaba' ? 'active-link' : '' }}">
                                IMaba
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="footer__copyright mt20 mb4">
            Copyright © 2023 All Rights Reserved by DINAS RISTEK.
        </p>
    </div>
</footer>
