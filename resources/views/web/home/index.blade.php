@extends('layouts.web.index')

@section('content')

<!--==================== HOME ====================-->
<section class="home" id="home">
    <div class="container">
        <div class="grid__container-2">
            <div class="home__img swiper">
                <div class="swiper-wrapper">
                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Dhani.png') }}"
                            alt=""
                            class="decoration__img inti__img"
                        />
                        <h4 class="decoration__title">Muhammad Dhani Mubarock</h4>
                        <h6>Bupati HIMSI Fasilkom UNSRI 2023</h6>
                    </div>

                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Nouval.png') }}"
                            alt=""
                            class="decoration__img"
                        />
                        <h4 class="decoration__title">Ahmad Nouval Romadhan</h4>
                        <h6>
                            Wakil Bupati HIMSI <br />
                            Fasilkom UNSRI 2023</h6>
                    </div>

                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Siska.png') }}"
                            alt=""
                            class="decoration__img"
                        />
                        <h4 class="decoration__title">Siska Septiyanah</h4>
                        <h6>
                            Sekretaris Umum HIMSI <br />
                            Fasilkom UNSRI 2023
                        </h6>
                    </div>

                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Viola.png') }}"
                            alt=""
                            class="decoration__img"
                        />
                        <h4 class="decoration__title">Viola Meiriza</h4>
                        <h6>
                            Wakil Sekretaris Umum HIMSI <br />
                            Fasilkom UNSRI 2023
                        </h6>
                    </div>

                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Belia.png') }}"
                            alt=""
                            class="decoration__img"
                        />
                        <h4 class="decoration__title">Belia Citra</h4>
                        <h6>
                            Bendahara Umum HIMSI <br />
                            Fasilkom UNSRI 2023
                        </h6>
                    </div>

                    <div class="decoration__data swiper-slide">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Indah.png') }}"
                            alt=""
                            class="decoration__img"
                        />
                        <h4 class="decoration__title">Indah Arsita Putri</h4>
                        <h6>
                            Wakil Bendahara Umum HIMSI <br />
                            Fasilkom UNSRI 2023
                        </h6>
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination-bullets"></div>
            </div>

            <div class="home__data">
                <div class="home__title text-big">
                    HIMSI FASILKOM <br />
                    UNIVERSITAS SRIWIJAYA
                </div>
                <p class="home__description">
                    Salah satu HMJ (Himpunan Mahasiswa Jurusan) yang ada di Fakultas
                    Ilmu Komputer Universitas Sriwijaya yang berfokus pada kegiataan
                    kemahasiswaan yang membangun dan memajukan fakultas dan jurusan.
                </p>
                <a href="#about" class="button button--flex">
                    Explore <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                </a>
            </div>
        </div>

        <div class="home__social">
            <span class="home__social-follow">Follow Us</span>

            <div class="home__social-links">
                <a
                    href="https://www.youtube.com/channel/UCmyzeEb4Q1FCrGQ2kxeIiLQ"
                    target="_blank"
                    class="home__social-link"
                >
                    <i class="ri-youtube-line"></i>
                </a>
                <a
                    href="https://www.instagram.com/himsiunsri/"
                    target="_blank"
                    class="home__social-link"
                >
                    <i class="ri-instagram-line"></i>
                </a>
                <a
                    href="https://page.line.me/?accountId=himsiunsri"
                    target="_blank"
                    class="home__social-link"
                >
                    <i class="ri-line-line"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!--==================== ABOUT ====================-->
<section class="about" id="about">
    <div class="container">
        <div class="grid__container-2">
            <img
                src="{{ asset('assets/img/about-himsi.png') }}"
                alt=""
                class="about__img"
            />

            <div class="about__data">
                <h2 class="about__title">
                    Berintegrasi Penuh Dedikasi
                </h2>

                <p class="about__description">
                    <b style="color: var(--first-color)"
                        >#BerintegrasiPenuhDedikasi</b
                    >
                    merupakan tagline HIMSI 2022/2023 yang memiliki makna bahwa BPH HIMSI
                    akan selalu bersatu dan bersinergi serta memiliki komitmen dan semangat juang yang tinggi
                    terhadap tujuan HIMSI FASILKOM UNSRI yang sudah tertulis dalam <a href="{{ route('about-visiMisi') }}" style="color: var(--first-color)">visi dan misi</a>
                </p>

                <div class="about__details">
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Terdiri dari 8 Dinas beserta 6 Divisi.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        <span>
                            Terdapat banyak proker - proker keren! Cek
                            <a href="{{ route('about-proker') }}" class="button--link">disini</a>
                        </span>
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Sudah berdiri dan aktif beroperasi lebih dari 13 tahun.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Yang paling utama, HIMSI Fasilkom UNSRI Solid 🔥.
                    </p>
                </div>

                <a href="{{ route('about-logo') }}" class="button--link button--flex">
                    More About HIMSI
                    <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== FEATURES ==================== -->
<section class="features" id="features">
    <div class="container">
        <div class="section__title">
            <span>Features</span>
        </div>

        <div class="grid__container">
            <a href="{{ route('pojokHimsi') }}" class="features__data">
                <i class="fa-regular fa-newspaper features__icon"></i>
                <h3 class="features__title">Pojok HIMSI</h3>
                <span class="button-link available">Lihat</span>
            </a>

            <a href="{{ route('akademik') }}" class="features__data">
                <i class="fa-solid fa-a features__icon"></i>
                <h3 class="features__title">Akademik</h3>
                <span class="button-link available">Lihat</span>
            </a>

            <a href="" class="features__data">
                <i class="fa-solid fa-microphone features__icon"></i>
                <h3 class="features__title">Ekspresi</h3>
                <span class="button-link available">Lihat</span>
            </a>

            <a href="https://baperan.himsiunsri.org/landing/" class="features__data">
                <i class="fa-regular fa-clipboard features__icon"></i>
                <h3 class="features__title">BAPERAN</h3>
                <span class="button-link available">Lihat</span>
            </a>

            <a href="" class="features__data">
                <i class="fa-solid fa-box features__icon"></i>
                <h3 class="features__title">ASPIRASI</h3>
                <span class="button-link coming-soon">Coming Soon</span>
            </a>

            <a href="" class="features__data">
                <i class="fa-solid fa-graduation-cap features__icon"></i>
                <h3 class="features__title">iMABA</h3>
                <span class="button-link coming-soon">Coming Soon</span>
            </a>
        </div>
    </div>
</section>

<!-- ==================== POJOK HIMSI ==================== -->
<section class="pojokHimsi" id="pojokHimsi">
    <div class="container">
        <div class="section__title">
            <span>Program Kerja Himsi</span>
        </div>

        <div class="pojokHimsi__content swiper">
            <div class="swiper-wrapper">
                @foreach ($pojokHimsis as $pojokHimsi)
                    <div class="grid__container-2 swiper-slide">
                        <img src="{{ asset('assets/img/uploads/'.$pojokHimsi['thumbnail']) }}" class="pojokHimsi__img">

                        <div class="pojokHimsi__data">
                            <h2 class="pojokHimsi__title about__title">{{ $pojokHimsi['title'] }}</h2>

                            <div class="pojokHimsi__description">{{ substr($pojokHimsi['trigger'], 0, 180); }}</div>

                            <a onclick="showSheet('article{{ $pojokHimsi['postID'] }}')" class="button--link button--flex">
                                Read More
                                <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        @foreach ($pojokHimsis as $pojokHimsi)
                <div class="sheet article{{ $pojokHimsi['postID'] }}">
                    <div class="sheet__overlay"></div>
                    <div class="sheet__container container">
                        <div class="sheet__header">
                            <div class="drag-icon"><span></span></div>
                        </div>
                        <div class="sheet__content" style="display: block">
                            <div>
                                <h2 class="sheet__title">{{ $pojokHimsi['title'] }}</h2>
                                <p class="text-sm" style="margin-top: .5rem">Published on {{ date('M d, Y', strtotime($pojokHimsi["created_at"])) }} by {{ $pojokHimsi['author'] }}</p>
                                <hr style="border-color: var(--first-color); margin-top: .5rem">
                            </div> <br>
                            <div class="sheet__data">
                                <?= $pojokHimsi['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</section>

<!-- ==================== AKADEMIK ==================== -->
<section class="akademik" id="akademik">
    <div class="container">
        <div class="akademik__container">
            <h1 class="section__title">
                Web HIMSI Menyediakan <br/>
                Informasi Akademik
            </h1>

            <div class="grid__container">
                <a href="" class="akademik__card">
                    <h3 class="akademik__card-title">Beasiswa</h3>
                    <i class="fa-solid fa-graduation-cap akademik__card-icon"></i>
                    <p class="akademik__card-description">
                        Informasi terkait beasiswa - beasiswa yang sangat
                        menguntungkan.
                    </p>
                </a>

                <a href="" class="akademik__card">
                    <h3 class="akademik__card-title">Lomba</h3>
                    <i class="fa-solid fa-trophy akademik__card-icon"></i>
                    <p class="akademik__card-description">
                        Informasi terkait lomba - lomba tingkat mahasiswa baik
                        universitas maupun nasional.
                    </p>
                </a>

                <a href="" class="akademik__card">
                    <h3 class="akademik__card-title">Webinar</h3>
                    <i class="fa-solid fa-comments akademik__card-icon"></i>
                    <p class="akademik__card-description">
                        Informasi terkait Webinar yang sangat meaningfull dan
                        inspiratif.
                    </p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== GREETING ==================== -->
<section class="greeting" id="greeting">
    <div class="container">
        <div class="section__title">
            <span>
                Apa Kata Mereka?
            </span>
        </div>

        <div class="greeting__content swiper">
            <div class="swiper-wrapper">
                <div class="greeting__data swiper-slide">
                    <div class="greeting__header">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Dhani.png') }}"
                            class="greeting__img"
                        />
                        <div>
                            <b class="greeting__name">
                                Muhammad Dhani Mubarock
                            </b> <br>
                            <span class="greeting__level"
                                >Bupati HIMSI FASILKOM UNSRI 2022 / 2023</span
                            >
                        </div>
                    </div>

                    <p class="greeting__description">
                        HIMSI atau Himpunan Mahasiswa Sistem Informasi adalah salah
                        satu HMJ yang ada di Fakultas Ilmu Komputer Universitas
                        Sriwijaya. HIMSI hadir sebagi jembatan bagi mahasiswa dan
                        pihak jurusan dalam berbagai hal. Harapannya website ini
                        dapat membantu mahasiswa SI, khususnya dalam mencari dan
                        mengakses berbagai informasi terkait akademik, fakultas, dan
                        jurusan, serta sebagai sarana bagi HIMSI itu sendiri dalam
                        membagikan kegiatan-kegiatan yang dilakukan. Tentunya, kami
                        selalu membuka segala macam bentuk saran dan kritik demi
                        penyempurnaan website ini dan kebaikan untuk fakultas,
                        jurusan, dan HIMSI. Semoga website ini dapat bermanfaat
                        untuk kita semua dan semoga mahasiswa SI dapat memanfaatkan
                        serta memaksimalkan fungsi dari website ini dan dapat
                        membantu kita semua. Terima kasih dan semangat!
                        <b>#NyatakanAmbisiDenganAksi</b>
                    </p>
                </div>

                <div class="greeting__data swiper-slide">
                    <div class="greeting__header">
                        <img
                            src="{{ asset('assets/img/staffs/2023/INTI/Inti_Nouval.png') }}"
                            class="greeting__img"
                        />
                        <div>
                            <b class="greeting__name">
                                Ahmad Nouval Ramadhan
                            </b> <br>
                            <span class="greeting__level"
                                >Bupati HIMSI FASILKOM UNSRI 2022 / 2023</span
                            >
                        </div>
                    </div>

                    <p class="greeting__description">
                        HIMSI atau Himpunan Mahasiswa Sistem Informasi adalah salah
                        satu HMJ yang ada di Fakultas Ilmu Komputer Universitas
                        Sriwijaya. HIMSI hadir sebagi jembatan bagi mahasiswa dan
                        pihak jurusan dalam berbagai hal. Harapannya website ini
                        dapat membantu mahasiswa SI, khususnya dalam mencari dan
                        mengakses berbagai informasi terkait akademik, fakultas, dan
                        jurusan, serta sebagai sarana bagi HIMSI itu sendiri dalam
                        membagikan kegiatan-kegiatan yang dilakukan. Tentunya, kami
                        selalu membuka segala macam bentuk saran dan kritik demi
                        penyempurnaan website ini dan kebaikan untuk fakultas,
                        jurusan, dan HIMSI. Semoga website ini dapat bermanfaat
                        untuk kita semua dan semoga mahasiswa SI dapat memanfaatkan
                        serta memaksimalkan fungsi dari website ini dan dapat
                        membantu kita semua. Terima kasih dan semangat!
                        <b>#NyatakanAmbisiDenganAksi</b>
                    </p>
                </div>

                <div class="greeting__data swiper-slide">
                    <div class="greeting__header">
                        <img
                            src="{{ asset('assets/img/Fajrul.png') }}"
                            class="greeting__img"
                        />
                        <div>
                            <b class="greeting__name">
                                Muhammad Fajrul Azhim
                            </b> <br>
                            <span class="greeting__level"
                                >Bupati HIMSI FASILKOM UNSRI 2021 / 2022</span
                            >
                        </div>
                    </div>

                    <p class="greeting__description">
                        HIMSI atau Himpunan Mahasiswa Sistem Informasi adalah salah
                        satu HMJ yang ada di Fakultas Ilmu Komputer Universitas
                        Sriwijaya. HIMSI hadir sebagi jembatan bagi mahasiswa dan
                        pihak jurusan dalam berbagai hal. Harapannya website ini
                        dapat membantu mahasiswa SI, khususnya dalam mencari dan
                        mengakses berbagai informasi terkait akademik, fakultas, dan
                        jurusan, serta sebagai sarana bagi HIMSI itu sendiri dalam
                        membagikan kegiatan-kegiatan yang dilakukan. Tentunya, kami
                        selalu membuka segala macam bentuk saran dan kritik demi
                        penyempurnaan website ini dan kebaikan untuk fakultas,
                        jurusan, dan HIMSI. Semoga website ini dapat bermanfaat
                        untuk kita semua dan semoga mahasiswa SI dapat memanfaatkan
                        serta memaksimalkan fungsi dari website ini dan dapat
                        membantu kita semua. Terima kasih dan semangat!
                        <b>#NyatakanAmbisiDenganAksi</b>
                    </p>
                </div>

                <div class="greeting__data swiper-slide">
                    <div class="greeting__header">
                        <img
                            src="{{ asset('assets/img/Fahada.png') }}"
                            class="greeting__img"
                        />

                        <div>
                            <b class="greeting__name">
                                Muhammad Fahada Al Ghifary
                            </b> <br>
                            <span class="greeting__level"
                                >Wakil Bupati HIMSI FASILKOM UNSRI 2021 / 2022</span
                            >
                        </div>
                    </div>

                    <p class="greeting__description">
                        Perjalanan jauh yang diisi dengan kebersamaan pasti akan
                        terasa singkat dan menyenangkan. Kebersamaan adalah suatu
                        hal yang mahal dan tak ternilai harganya, maka beruntunglah
                        kita yang mampu mendapatkannya. Akan ada banyak sekali
                        kesempatan yang datang tetapi kesempatan hanya untuk orang
                        yang berani untuk mengambil kesempatan tersebut, orang yang
                        berani untuk memulai suatu proses. Di HIMSI, kita dapat
                        memanfaatkan kesempatan tersebut dan jangan lewatkan
                        kesempatan itu menjadi sebuah hal yang sia sia. Mari kita
                        rancang masa depan kita dari sekarang dan mari kita buat
                        mimpi-mimpi kita menjadi kenyataan di esok hari. Ingatlah,
                        suatu hal akan terihat tidak mungkin jika kita belum
                        menyelesaikannya. Selaku pemuda penerus bangsa, kita harus
                        mewarisi api semangat para pendahulu kita! Hidup Mahasiswa!
                    </p>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-greeting"></div>
        </div>
    </div>
</section>

<!--==================== INSTAGRAM ====================-->
<section class="instagram" id="instagram">
    <div class="container">
        <div class="grid__container-2">
            <div class="instagram__data" style="align-self: center">
                <h1 class="instagram__title">
                    Follow Our Instagram<br />
                    at @himsiunsri
                </h1>

                <a
                    href="https://www.instagram.com/himsiunsri/"
                    target="_blank"
                    class="button--link button--flex"
                >
                    Follow Us <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                </a>
            </div>

            <img
                src="{{ asset('assets/img/himsi-unsri-ig.png') }}"
                class="instagram__img follow-ig"
                width="350"
            />
        </div>
    </div>
</section>

<!--==================== FAQ ====================-->
<section class="faq section" id="faq">
    <div class="container">
        <div class="faq__container">
            <h1 class="section__title">
                FAQ <br />
                HIMSI Fasilkom UNSRI
            </h1>

            <div class="grid__container-2">
                <div class="faq__group">
                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Apa itu HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                Salah satu HMJ (Himpunan Mahasiswa Jurusan) yang ada di
                                Fakultas Ilmu Komputer Universitas Sriwijaya yang
                                berfokus pada kegiataan kemahasiswaan yang membangun dan
                                memajukan fakultas dan jurusan.
                            </p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Siapa Saja Yang Ada di HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                Mahasiswa Aktif Sistem Informasi Angkatan 2020 dan 2021
                                yang telah mengikuti rangkaian Open Recruitment.
                            </p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Bagaimana Cara Bergabung di HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                Untuk bergabung di HIMSI Fasilkom UNSRI, kalian harus
                                mengikuti rangkaian Open Recruitment yang diadakan di
                                awal periode baru HIMSI Fasilkom UNSRI tiap tahunnya.
                                Untuk Informasi Lebih lanjut dapat mengakses link
                                <a target="_blank" href="https://oprec.himsiunsri.org"
                                    >More Information</a
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq__group">
                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Berapa Dinas dalam HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                HIMSI Fasilkom UNSRI terdiri atas tujuh dinas, yang
                                bergerak di bidangnya masing - masing dengan tujuan
                                memajukan HIMSI Fasilkom UNSRI. Ada beberpa dinas yang
                                dipecah menjadi beberapa divisi, yang menangani tupoksi
                                lebih spesifik. Cari di bagian Profile jika anda ingin
                                mengenal lebih jauh dinas yang ada di HIMSI Fasilkom
                                UNSRI
                            </p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Apa Saja Program Kerja yang Telah Direncanakan oleh HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                Untuk mengetahui program-program kerja yang telah
                                direncanakan oleh Himsi Fasilkom Unsri pengguna anda dapat
                                mengakses informasi tersebut di bagian About Us pada website
                                HIMSI Fasilkom Unsri
                            </p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <div class="faq__header">
                            <i class="ri-add-line faq__icon"></i>
                            <p class="faq__item-title">
                                Apa Program Kerja Terbesar di HIMSI Fasilkom UNSRI?
                            </p>
                        </div>

                        <div class="faq__content">
                            <p class="faq__description">
                                SI FEST (Sistem Informasi Festival) di tahun ini. SI
                                FEST merupakan acara tahunan yang selalu berinovasi
                                untuk tetap berkontribusi aktif memberikan edukasi
                                khususnya di bidang teknologi. Adapun kegiatan yang akan
                                diadakan di SI FEST 2021 yaitu Lomba, Bazar, dan
                                Webinar. Kalau ingin tahu lebih banyak proker - proker
                                keren yang ada di HIMSI Fasilkom UNSRI, kunjungi halaman
                                <a href="/about/proker">Program Kerja</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==================== CONTACT ====================-->
<section class="contact" id="contact">
    <div class="container">
        <div class="grid__container-2">
            <div class="contact__box">
                <h1>
                    Berikan feedback dan kontak kami untuk informasi lebih
                </h1>

                <div class="contact__data">
                    <div class="contact__information">
                        <h4 class="contact__subtitle">Visit Our OA Line</h4>
                        <span class="contact__description">
                            <i class="ri-line-fill contact__icon"></i>
                            @himsiunsri
                        </span>
                    </div>

                    <div class="contact__information">
                        <h4 class="contact__subtitle">Write us by mail</h4>
                        <span class="contact__description">
                            <i class="ri-mail-line contact__icon"></i>
                            himsifasilkomunsri@gmail.com
                        </span>
                    </div>
                </div>
            </div>

            <form action="{{ route('storeContact') }}" method="POST" class="contact__form">
                @csrf

                <div class="alert">
                    @if(session()->has("error"))
                        <p style="color: var(--first-color)">
                            <span>{{ session('error') }}</span>
                            <span class="closebtn" onclick="this.parentElement.parentElement.style.display='none';" style="cursor: pointer"><b>&times;</b></span>
                        </p>
                    @elseif (session()->has("success"))
                        <p style="color: green">
                            <span>{{ session('success') }}</span>
                            <span class="closebtn" onclick="this.parentElement.parentElement.style.display='none';" style="cursor: pointer"><b>&times;</b></span>
                        </p>
                    @endif
                </div>

                <div class="contact__inputs">
                    <div class="contact__content">
                        <input
                            type="email"
                            class="contact__input"
                            name="email"
                            value="{{ old('email') }}"
                        />
                        <label class="contact__label">Email</label>
                    </div>
                    @error('email')
                        <p class="text-xsm error__msg" style="color: var(--first-color)">{{ $message }}</p>
                    @enderror

                    <div class="contact__content">
                        <input
                            type="text"
                            class="contact__input"
                            name="subject"
                            value="{{ old('subject') }}"
                        />
                        <label class="contact__label">Subject</label>
                    </div>
                    @error('subject')
                        <p class="text-xsm error__msg" style="color: var(--first-color)">{{ $message }}</p>
                    @enderror

                    <div class="contact__content contact__area">
                        <textarea
                            name="msg"
                            class="contact__input"
                        >{{ old('msg') }}</textarea>
                        <label class="contact__label">Message</label>
                    </div>
                    @error('msg')
                        <p class="text-xsm error__msg" style="color: var(--first-color)">{{ $message }}</p>
                    @enderror
                </div>

                <button class="button button--flex" type="submit" name="send">
                    Send Message
                    <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
