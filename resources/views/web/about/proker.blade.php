@extends('layouts.web.index')

@section('content')

<section class="proker" id="proker">
    <div class="container">
        <div class="section__title">
            <span>Program Kerja</span>
        </div>
        <div class="proker__container">
            @foreach ($prokers as $proker)
                <div class="proker__item">
                    <div class="proker__dot">
                        <?= $proker['icon'] ?>
                    </div>
                    <div class="proker__content">
                        <h3>{{ $proker['proker'] }}</h3>
                        <p class="proker__date">{{ date('d F Y', strtotime($proker['pelaksanaan'])) }}</p>
                        <button onclick="showSheet('proker{{ $proker['prokerID'] }}')" class="button">View Proker</button>
                    </div>
                </div>
            @endforeach
        </div>
        @foreach ($prokers as $proker)
            <div class="sheet proker{{ $proker['prokerID'] }}">
                <div class="sheet__overlay"></div>
                <div class="sheet__container container">
                    <div class="sheet__header">
                        <div class="drag-icon"><span></span></div>
                    </div>
                    <div class="sheet__content">
                        <h2 class="sheet__title">{{ $proker['proker'] }}</h2>
                        <div class="sheet__data">
                            <div>
                                <b>Target Sasaran</b> <br>
                                <p>{{ $proker['sasaran'] }}</p>
                            </div>
                            <div>
                                <b>Deskripsi</b> <br>
                                <p>{{ $proker['deskripsi'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
