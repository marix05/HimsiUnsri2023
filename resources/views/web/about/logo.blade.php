@extends('layouts.web.index')

@section('content')

<section class="logo" id="logo">
    <div class="container">
        <div class="section__title">
            <span>Makna Logo</span>
        </div>

        <div class="grid__container-2">
            <img
                src="{{ asset('assets/img/himsi-logo.png') }}"
                alt=""
                class="logo__img"
            />

            <div class="logo__data">
                <h2 class="logo__title">
                    LAMBANG HIMSI FASILKOM UNSRI
                </h2>

                <p class="logo__description">
                    Lambang HIMSI merupakan simbol organisasi HIMSI berbentuk
                    lingkaran berisikan tulisan SI (Sistem Informasi) di tengahnya, memiliki tulisan
                    Himpunan Mahasiswa Sistem Informasi berbentuk setengah lingkaran
                    yang berada diatas lingkaran serta pita bertuliskan HIMSI dibawah
                    lingkaran.
                </p>
            </div>
        </div>
    </div>
</section>


@endsection
