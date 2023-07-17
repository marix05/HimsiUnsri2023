@extends('layouts.web.index')

@section('content')

<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__title">Pojok Himsi</span>
            <p>Pojok HIMSI merupakan halaman informasi terkait program - program
            kerja beserta event atau kegiatan yang telah dilaksanakan di HIMSI
            Fasilkom UNSRI.</p>
            <a href="#pojokHimsi" class="button button--flex">
                Explore <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
            </a>
        </div>
    </div>
</section>

<section class="pojokHimsi" id="pojokHimsi">
    <div class="container">
        <div class="section__title">
            <span>Periode</span>
            <nav class="periode__nav">
                <a href="{{ route('pojokHimsi').'?periode=2023#pojokHimsi' }}" class="button--link {{ $nav['periode'] == '2023' ? 'active' : '' }}">2023</a>
            </nav>
        </div>
        @if ($posts->isNotEmpty())
            <div class="pojokHimsi__content">
                @foreach ($posts as $post)
                    <div class="pojokHimsi__item">
                        <div class="grid__container">
                            <img src="{{ asset('assets/img/uploads/'.$post['thumbnail']) }}" alt="" class="pojokHimsi__img">

                            <div class="pojokHimsi__data">
                                <p style="color:var(--first-color)">{{ date('M d, Y', strtotime($post["created_at"])) }}</p>

                                <h2 class="pojokHimsi__title">
                                    {{ $post['title'] }}
                                </h2>

                                <p class="pojokHimsi__description">
                                    {{ mb_strimwidth($post['trigger'], 0, 180, '...') }}
                                </p>

                                <a onclick="showSheet('article{{ $post['postID'] }}')" class="button--link button--flex">
                                    Read More
                                    <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination"></div>

            @foreach ($posts as $post)
                <div class="sheet article{{ $post['postID'] }}">
                    <div class="sheet__overlay"></div>
                    <div class="sheet__container container">
                        <div class="sheet__header">
                            <div class="drag-icon"><span></span></div>
                        </div>
                        <div class="sheet__content" style="display: block">
                            <div>
                                <h2 class="sheet__title">{{ $post['title'] }}</h2>
                                <p class="text-sm" style="margin-top: .5rem">Published on {{ date('M d, Y', strtotime($post["created_at"])) }} by {{ $post['author'] }}</p>
                                <hr style="border-color: var(--first-color); margin-top: .5rem">
                            </div> <br>
                            <div class="sheet__data">
                                <?= $post['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h1 class="section__title" style="color: var(--first-color)">NOT FOUND<h1/>
        @endif
    </div>
</section>

@endsection
