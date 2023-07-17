@extends('layouts.web.index')

@section('content')

<section class="visiMisi" id="visiMisi">
    <div class="container">
        <div class="section__title">
            <span>Visi & Misi</span>
        </div>

        <div class="grid__container-2">
            <img
                src="{{ asset('assets/img/visi-misi.png') }}"
                alt=""
                class="visiMisi__img"
            />

            <div class="visiMisi__data">
                <div class="visi__data">
                    <h3 class="visi__title">
                        Visi
                    </h3>

                    <p class="visi__description">
                        Menjadikan HIMSI Fasilkom Unsri sebagai himpunan yang berkualitas,
                        memiliki integritas dan mengedepankan profesionalitas dengan berlandaskan asas kekeluargaan dan kebersamaan demi
                        meningkatkan peran HIMSI Fasilkom Unsri untuk jurusan Sistem Informasi

                    </p>
                </div>

                <div class="misi__data">
                    <h3 class="misi__title">
                        Misi
                    </h3>

                    <div class="misi__description">
                        <ol>
                            <li>Mewujudkan hubungan yang harmonis antar BPH HIMSI dengan semangat kekeluargaan dan kebersamaan.</li>
                            <li>Membangun koordinasi dan komunikasi yang baik dengan seluruh elemen civitas akademika Jurusan Sistem Informasi.</li>
                            <li>Menjadi wadah aspirasi yang responsif dan solutif bagi mahasiswa Jurusan Sistem Informasi demi kesejahteraan bersama.</li>
                            <li>Menciptakan program kerja yang mampu meningkatkan kemampuan dan prestasi mahasiswa Jurusan Sistem Informasi di bidang akademik maupun non akademik.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
