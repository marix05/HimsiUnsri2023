@extends('layouts.web.index')

@section('content')

<!-- DINAS -->
<section class="dinas" id="dinas">
    <div class="container">
        <div class="section__title">
            <span>
                {{ $dinas['kepanjangan'] }}
            </span>
        </div>

        <div class="grid__container-2">
            <img
                src="{{ asset('assets/img/logo-profile/'.$dinas['logo']) }}"
                alt=""
                class="dinas__img"
            />

            <div class="dinas__data">
                <h2 class="dinas__title">
                    Tentang Kami
                </h2>

                <p class="dinas__description">
                    <?= $dinas['deskripsi'] ?>
                </p>
            </div>

        </div>
    </div>
</section>

<!-- DIVISI -->
@if ($divisis->isNotEmpty())
    <section class="divisi" id="divisi">
        <div class="container">
            <div class="divisi__container">
                <h1 class="section__title">
                    Divisi Dinas {{ $dinas['dinas'] }}
                </h1>

                <div class="grid__container">
                    @foreach ($divisis as $divisi)
                        <div class="divisi__card">
                            <?= $divisi['icon'] ?>
                            <h3 class="divisi__card-title">{{ $divisi['divisi'] }}</h3>
                            <p class="divisi__card-description">
                                <?= $divisi['deskripsi'] ?>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

<!-- STAFF -->
<section class="staff" id="staff">
    <div class="container">
        @if ($dinas['dinas'] == 'INTI')
            @foreach ($staffs as $staff)
                @if (preg_match('/Bupati/i', $staff['jabatan']))
                    <div class="staff__container">
                        <div class="section__title">
                            <span>{{ $staff['jabatan'] }}</span>
                        </div>
                        <div class="staff__box">
                            <div class="staff__card">
                                <img
                                    src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                    class="staff__img"
                                    onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                />
                                <div>
                                    <b class="staff__name">{{ $staff['nama'] }}</b>
                                    <br>
                                    <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="staff__container">
                <div class="section__title">
                    <span>Sekretaris Umum</span>
                </div>
                <div class="staff__box">
                    @foreach ($staffs as $staff)
                        @if (preg_match('/Sekretaris/i', $staff['jabatan']))
                            <div class="staff__card">
                                <img
                                    src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                    class="staff__img"
                                    onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                />
                                <div>
                                    <b class="staff__name">{{ $staff['nama'] }}</b>
                                    <br>
                                    <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="staff__container">
                <div class="section__title">
                    <span>Bendahara Umum</span>
                </div>
                <div class="staff__box">
                    @foreach ($staffs as $staff)
                        @if (preg_match('/Bendahara/i', $staff['jabatan']))
                            <div class="staff__card">
                                <img
                                    src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                    class="staff__img"
                                    onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                />
                                <div>
                                    <b class="staff__name">{{ $staff['nama'] }}</b>
                                    <br>
                                    <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            @foreach ($staffs as $staff)
                @if (preg_match('/Dinas/i', $staff['jabatan']))
                    <div class="staff__container">
                        <div class="section__title">
                            <span>{{ $staff['jabatan'] }}</span>
                        </div>
                        <div class="staff__box">
                            <div class="staff__card">
                                <img
                                    src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                    class="staff__img"
                                    onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                />
                                <div>
                                    <b class="staff__name">{{ $staff['nama'] }}</b>
                                    <br>
                                    <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if ($divisis->isNotEmpty())
                <div class="staff__container">
                    <div class="section__title">
                        <span>Kepala Divisi</span>
                    </div>
                    <div class="staff__box">
                        @foreach ($staffs as $staff)
                            @if (preg_match('/Divisi/i', $staff['jabatan']))
                                <div class="staff__card">
                                    <img
                                        src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                        class="staff__img"
                                        onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                    />
                                    <div>
                                        <b class="staff__name">{{ $staff['nama'] }}</b>
                                        <br>
                                        <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($dinas['dinas'] == 'KASTRAD')
                <div class="staff__container">
                    <div class="section__title">
                        <span>Staff Khusus</span>
                    </div>
                    <div class="staff__box">
                        @foreach ($staffs as $staff)
                            @if ($staff['jabatan'] == 'Staff Khusus')
                                <div class="staff__card">
                                    <img
                                        src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                        class="staff__img"
                                        onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                    />
                                    <div>
                                        <b class="staff__name">{{ $staff['nama'] }}</b>
                                        <br>
                                        <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="staff__container">
                <div class="section__title">
                    <span>Staff</span>
                </div>
                <div class="staff__box">
                    @foreach ($staffs as $staff)
                        @if ($staff['jabatan'] == 'Staff')
                            <div class="staff__card">
                                <img
                                    src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}"
                                    class="staff__img"
                                    onclick="showSheet('staff{{ $staff['staffID'] }}')"
                                />
                                <div>
                                    <b class="staff__name">{{ $staff['nama'] }}</b>
                                    <br>
                                    <span class="staff__level">{{ $staff['jabatan'] }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<!-- PROKER -->
@if ($prokers->isNotEmpty())
    <section class="proker" id="proker">
        <div class="container">
            <div class="proker__container">
                <h1 class="section__title">
                    Proker Dinas {{ $dinas['dinas'] }}
                </h1>

                <div class="flex__container">
                    <div class="flex__content">
                        @foreach ($prokers as $proker)
                            <div class="proker__card">
                                <h3 class="proker__card-title">{{ $proker['proker'] }}</h3>
                                <p class="proker__card-description">
                                    <?= $proker['deskripsi'] ?>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


@foreach ($staffs as $staff)
    <div class="sheet staff{{ $staff['staffID'] }}">
        <div class="sheet__overlay"></div>
        <div class="sheet__container container" style="max-width: 600px">
            <div class="sheet__header">
                <div class="drag-icon"><span></span></div>
            </div>
            <div class="sheet__content">
                <div class="sheet__data">
                    <img src="{{ asset('assets/img/staffs/'.$periode.'/'.$dinas['dinas'].'/'.$staff['foto']) }}" style="max-width: 350px; margin: 0 auto" class="sheet__img">
                    <div style="text-align: center">
                        <h3 class="sheet__title"> {{ $staff['nama'] }} </h3>
                        {{ ucwords($staff['tempat_lahir']) . ", " . date('d F Y', strtotime($staff['tanggal_lahir'])) }}
                    </div>
                    <div style="text-align: center">
                        <a href="mailto:{{ $staff['email'] }}"
                        style="color: var(--first-color); display: inline-flex; gap: .25rem">
                            <i class="ri-mail-send-line m1"></i> {{ $staff['email'] }}
                        </a> <br>

                        <a href="https://instagram.com/{{ $staff['instagram'] }}"
                        style="color: var(--first-color); display: inline-flex; gap: .25rem">
                            <i class="ri-instagram-line m1"></i> {{ $staff['instagram'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
