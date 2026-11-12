@extends('layouts.main')

@section('content')
    <section class="hero" aria-labelledby="home-title">
        <div class="hero-inner">
            <h1 id="home-title">{{ trans('home.title') }}</h1>
            <p class="hero-description">{{ trans('home.description') }}</p>
            <div class="hero-actions">
                <a class="button button-primary" href="{{ route('downloads') }}">{{ trans('home.download') }}</a>
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
            <article class="feature"><h3>{{ trans('home.rooms_title') }}</h3><p>{{ trans('home.rooms_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.reservations_title') }}</h3><p>{{ trans('home.reservations_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.stays_title') }}</h3><p>{{ trans('home.stays_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.finances_title') }}</h3><p>{{ trans('home.finances_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.cash_title') }}</h3><p>{{ trans('home.cash_content') }}</p></article>
            <article class="feature"><h3>{{ trans('home.overview_title') }}</h3><p>{{ trans('home.overview_content') }}</p></article>
        </div>
    </section>
    <section class="showcase section-wrap" aria-labelledby="showcase-title">
        <div class="showcase-heading"><h2 id="showcase-title">{{ trans('home.screenshots_title') }}</h2><p>{{ trans('home.screenshots_intro') }}</p></div>
        <div class="showcase-grid">
            <figure><a href="{{ media('hotels.webp') }}" class="screenshot-link"><img src="{{ media('hotels.webp') }}" alt="{{ trans('home.screenshot_hotels') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_hotels') }}</figcaption></figure>
            <figure><a href="{{ media('overview.webp') }}" class="screenshot-link"><img src="{{ media('overview.webp') }}" alt="{{ trans('home.screenshot_overview') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_overview') }}</figcaption></figure>
            <figure><a href="{{ media('rooms.webp') }}" class="screenshot-link"><img src="{{ media('rooms.webp') }}" alt="{{ trans('home.screenshot_rooms') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_rooms') }}</figcaption></figure>
            <figure><a href="{{ media('check-in.webp') }}" class="screenshot-link"><img src="{{ media('check-in.webp') }}" alt="{{ trans('home.screenshot_check_in') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_check_in') }}</figcaption></figure>
            <figure><a href="{{ media('reservation.webp') }}" class="screenshot-link"><img src="{{ media('reservation.webp') }}" alt="{{ trans('home.screenshot_reservation') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_reservation') }}</figcaption></figure>
            <figure><a href="{{ media('settings.webp') }}" class="screenshot-link"><img src="{{ media('settings.webp') }}" alt="{{ trans('home.screenshot_settings') }}" loading="lazy" decoding="async"></a><figcaption>{{ trans('home.screenshot_settings') }}</figcaption></figure>
        </div>
        <dialog class="screenshot-dialog" aria-labelledby="screenshot-caption">
            <div class="screenshot-dialog-bar">
                <p id="screenshot-caption"></p>
                <div class="screenshot-dialog-actions"><a class="screenshot-original" target="_blank" rel="noopener">{{ trans('home.screenshot_original') }}</a><button type="button" class="screenshot-close" autofocus>{{ trans('home.screenshot_close') }}</button></div>
            </div>
            <div class="screenshot-dialog-image"><img src="{{ media('hotels.webp') }}" alt=""></div>
        </dialog>
    </section>
    <section class="download section-wrap" id="download" aria-labelledby="download-title">
        <div>
            <h2 id="download-title">{{ trans('home.download_heading') }}</h2>
            <p>{{ trans('home.download_content') }}</p>
        </div>
        <a class="button button-dark" href="{{ route('downloads') }}">{{ trans('home.download') }}</a>
    </section>
@endsection
