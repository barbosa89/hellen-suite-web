@extends('layouts.main')

@section('content')
    <section class="hero" aria-labelledby="home-title">
        <div class="hero-inner">
            <h1 id="home-title">{{ trans('home.title') }}</h1>
            <p class="hero-description">{{ trans('home.description') }}</p>
            <div class="hero-actions">
                <a class="button button-primary" href="https://github.com/barbosa89/hellen-suite/releases">{{ trans('home.download') }} <span aria-hidden="true">↗</span></a>
                <a class="text-link" href="#about">{{ trans('home.discover') }} <span aria-hidden="true">↓</span></a>
            </div>
            <p class="status"><span class="status-dot" aria-hidden="true"></span>{{ trans('home.status') }}</p>
        </div>
        <div class="hero-mark" aria-hidden="true"><img src="{{ media('hellen-suite-icon.png') }}" alt="" width="512" height="512"></div>
        <div class="hero-bottom"><span>Hellen Suite</span><span>{{ trans('home.availability') }}</span></div>
    </section>
    <section class="intro section-wrap" id="about" aria-labelledby="about-title">
        <div class="section-label">Hellen Suite</div>
        <div>
            <h2 id="about-title">{{ trans('home.heading') }}</h2>
            <p>{{ trans('home.content') }}</p>
        </div>
    </section>
    <section class="download section-wrap" aria-labelledby="download-title">
        <div>
            <h2 id="download-title">{{ trans('home.download_heading') }}</h2>
            <p>{{ trans('home.download_content') }}</p>
        </div>
        <a class="button button-dark" href="https://github.com/barbosa89/hellen-suite/releases">{{ trans('home.download') }} <span aria-hidden="true">↗</span></a>
    </section>
@endsection
