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
                    <div class="release-version"><span>{{ trans('downloads.pending_version') }}</span></div>
                </div>
                <div class="release-installers">
                    <h3>{{ trans('downloads.platforms') }}</h3>
                    <dl class="release-details">
                        <div><dt>{{ trans('downloads.system') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                        <div><dt>{{ trans('downloads.architecture') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                        <div><dt>{{ trans('downloads.date') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                        <div><dt>{{ trans('downloads.size') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                        <div><dt>{{ trans('downloads.requirements') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                    </dl>
                    <button type="button" disabled>{{ trans('downloads.unavailable') }}</button>
                </div>
            </section>

            <section class="release-history" aria-labelledby="previous-title">
                <div class="release-history-heading">
                    <h2 id="previous-title">{{ trans('downloads.previous') }}</h2>
                    <p>{{ trans('downloads.previous_description') }}</p>
                </div>
                <div class="release-row"><div><h3>{{ trans('downloads.pending_version') }}</h3><span>{{ trans('downloads.example') }}</span></div><button type="button" disabled>{{ trans('downloads.unavailable') }}</button></div>
            </section>
            <section class="downloads-faq" aria-labelledby="faq-title">
                <h2 id="faq-title">{{ trans('downloads.faq_title') }}</h2>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_systems') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_install') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_data') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_offline') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_backups') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_contact') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
            </section>
        </div>
    </div>
@endsection
