@extends('layouts.main')

@section('content')
    <div class="downloads-page">
        <header class="downloads-intro">
            <div class="downloads-container">
                <h1>{{ trans('downloads.title') }}</h1>
                <p>{{ trans('downloads.description') }}</p>
            </div>
        </header>

        <div class="downloads-container downloads-content">
            <p class="downloads-notice">{{ trans('downloads.example_notice') }}</p>

            <section class="release-featured" aria-labelledby="latest-title">
                <div class="release-featured-copy">
                    <h2 id="latest-title">{{ trans('downloads.latest') }}</h2>
                    <p>{{ trans('downloads.latest_description') }}</p>
                    <div class="release-version"><span>3.0.0</span><span>{{ trans('downloads.version') }}</span></div>
                </div>
                <div class="release-installers">
                    <h3>{{ trans('downloads.platforms') }}</h3>
                    <button type="button" disabled>{{ trans('downloads.unavailable') }}</button>
                </div>
            </section>

            <section class="release-history" aria-labelledby="previous-title">
                <div class="release-history-heading">
                    <h2 id="previous-title">{{ trans('downloads.previous') }}</h2>
                    <p>{{ trans('downloads.previous_description') }}</p>
                </div>
                <div class="release-row"><div><h3>2.0.0</h3><span>{{ trans('downloads.example') }}</span></div><button type="button" disabled>{{ trans('downloads.unavailable') }}</button></div>
                <div class="release-row"><div><h3>1.0.0</h3><span>{{ trans('downloads.example') }}</span></div><button type="button" disabled>{{ trans('downloads.unavailable') }}</button></div>
            </section>
        </div>
    </div>
@endsection
