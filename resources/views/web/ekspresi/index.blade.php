@extends('layouts.web.index')

@section('content')

<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__title">Ekspresi</span>
            <p> Ekspresi (Eksplor Bareng HIMSI) adalah podcast official yang dikelola oleh Dinas Media dan Informasi HIMSI,
                bertujuan untuk menyebarkan informasi ke khalayak luar dengan mengundang narasumber dari dalam maupun luar HIMSI yang ekspert dibidangnya.</p>
            <a href="#ekspresi" class="button button--flex">
                Explore <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
            </a>
        </div>
    </div>
</section>

<section class="ekspresi" id="ekspresi">
    <div class="container">
        @foreach ($categories as $category)
            <div style="ekspresi__container">
                <div class="section__title">
                    <span>
                        {{ $category['category'] }}
                    </span>
                </div>

                <div class="ekspresi__content">
                    <div class="grid__container-2">
                    @foreach ($posts as $post)
                        @if ($post['category'] == $category['category'])
                            <div class="ekspresi__item">
                                <img src="{{ asset('assets/img/uploads/'.$post['thumbnail']) }}" alt="">
                                <a href="{{ $post["link"] }}" class="venobox ekspresi__link" data-autoplay="true" data-vbtype="video" data-gall="myGallery">
                                    <i class="fas fa-play-circle"></i>
                                    <span class="ekspresi__title">{{ $post['title'] }}</span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
