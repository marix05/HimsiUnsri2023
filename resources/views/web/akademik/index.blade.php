@extends('layouts.web.index')

@section('content')

<section class="hero" id="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__title">Akademik</span>
            <p>Akademik merupakan halaman informasi yang berisikan info-info beasiswa, lomba, dan webinar
                yang telah dirangkum dan dikumpulkan oleh dinas Akademik HIMSI Fasilkom UNSRI`.</p>
            <a href="#akademik" class="button button--flex">
                Explore <i class="fa-solid fa-arrow-right fa-fade button__icon"></i>
            </a>
        </div>
    </div>
</section>

<section class="akademik" id="akademik">
    <div class="container">
        <div class="section__title">
            <span>
                Info Akademik
            </span>
        </div>

        <nav class="akademik__nav">
            <div class="grid__container">
                <a href="{{ route('akademik').'?category=Beasiswa#akademik' }}" class="akademik__nav-data {{ $nav['category'] == 'Beasiswa' ? 'active' : '' }}">
                    <i class="fa-solid fa-graduation-cap akademik__nav-icon"></i>
                    <h3 class="akademik__nav-title">Beasiswa</h3>
                </a>

                <a href="{{ route('akademik').'?category=Lomba#akademik' }}" class="akademik__nav-data {{ $nav['category'] == 'Lomba' ? 'active' : '' }}">
                    <i class="fa-solid fa-trophy akademik__nav-icon"></i>
                    <h3 class="akademik__nav-title">Lomba</h3>
                </a>

                <a href="{{ route('akademik').'?category=Webinar#akademik' }}" class="akademik__nav-data {{ $nav['category'] == 'Webinar' ? 'active' : '' }}">
                    <i class="fa-solid fa-comments akademik__nav-icon"></i>
                    <h3 class="akademik__nav-title">Webinar</h3>
                </a>
            </div>
        </nav>

        @if ($posts->isNotEmpty())
            <div class="akademik__content">
                @foreach ($posts as $post)
                    <div class="akademik__item">
                        <div class="grid__container">
                            <img src="{{ asset('assets/img/uploads/'.$post['thumbnail']) }}" alt="" class="akademik__img">

                            <div class="akademik__data">
                                <p style="color:var(--first-color)">{{ date('M d, Y', strtotime($post["created_at"])) }}</p>

                                <h2 class="akademik__title">
                                    {{ $post['title'] }}
                                </h2>

                                <p class="akademik__description">
                                    {{ \Illuminate\Support\Str::limit($post['trigger'], 180, '...')  }}
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
