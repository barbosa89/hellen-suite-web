@extends('layouts.main')

@section('content')
    <section class="hero" aria-labelledby="home-title">
        <div class="hero-inner">
            <h1 id="home-title">{{ trans('home.title') }}</h1>
            <p class="hero-description">{{ trans('home.description') }}</p>
            <div class="hero-actions">
                <a class="button button-primary" href="https://github.com/barbosa89/hellen-suite/releases">{{ trans('home.download') }} <span aria-hidden="true">↗</span></a>
                <a class="text-link" href="#features">{{ trans('home.discover') }} <span aria-hidden="true">↓</span></a>
            </div>
        </div>
        <div class="hero-mark" aria-hidden="true"><img src="{{ media('hellen-suite-icon.png') }}" alt="" width="512" height="512"></div>
        <div class="hero-bottom"><span>Hellen Suite</span><span>{{ trans('home.availability') }}</span></div>
    </section>
    <section class="intro section-wrap" aria-labelledby="about-title">
        <div class="section-label">Hellen Suite</div>
        <div>
            <h2 id="about-title">{{ trans('home.heading') }}</h2>
            <p>{{ trans('home.content') }}</p>
        </div>
    </section>
    <section class="features section-wrap" id="features" aria-labelledby="features-title">
        <div class="features-heading">
            <h2 id="features-title">{{ trans('home.features_title') }}</h2>
            <p>{{ trans('home.features_intro') }}</p>
        </div>
        <div class="feature-list">
            <article class="feature"><h3>{{ trans('home.reservations_title') }}</h3><p>{{ trans('home.reservations_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.rooms_title') }}</h3><p>{{ trans('home.rooms_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.finances_title') }}</h3><p>{{ trans('home.finances_content') }}</p></article>
        </div>
    </section>
    <section class="desktop section-wrap" id="desktop" aria-labelledby="desktop-title">
        <h2 id="desktop-title">{{ trans('home.desktop_title') }}</h2>
        <p>{{ trans('home.desktop_content') }}</p>
    </section>
    <section class="download section-wrap" id="download" aria-labelledby="download-title">
        <div>
            <h2 id="download-title">{{ trans('home.download_heading') }}</h2>
            <p>{{ trans('home.download_content') }}</p>
        </div>
        <a class="button button-dark" href="https://github.com/barbosa89/hellen-suite/releases">{{ trans('home.download') }} <span aria-hidden="true">↗</span></a>
    </section>
@endsection
