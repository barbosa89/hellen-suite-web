@extends('layouts.main')

@section('content')
    <div class="downloads-page">
        <header class="downloads-intro">
            <div class="downloads-container">
                <h1>{{ trans('downloads.title') }}</h1>
                <p>{{ trans('downloads.description') }}</p>
                <p>{{ trans('downloads.platform_availability') }}</p>
            </div>
        </header>

        <div class="downloads-container downloads-content">
            @if ($latest !== null)
            <section class="release-featured" aria-labelledby="latest-title">
                <div class="release-featured-copy">
                    <h2 id="latest-title">{{ trans('downloads.latest') }}</h2>
                    <p>{{ trans('downloads.latest_description') }}</p>
                    <div class="release-version"><span>{{ $latest['name'] }}</span></div>
                </div>
                <div class="release-installers">
                    <h3>Windows</h3>
                    <dl class="release-details">
                        <div><dt>{{ trans('downloads.system') }}</dt><dd>Windows</dd></div>
                        <div><dt>{{ trans('downloads.architecture') }}</dt><dd>x64</dd></div>
                        <div><dt>{{ trans('downloads.date') }}</dt><dd>{{ substr($latest['published_at'], 0, 10) }}</dd></div>
                        <div><dt>{{ trans('downloads.requirements') }}</dt><dd>{{ trans('downloads.pending') }}</dd></div>
                    </dl>
                    @foreach ($latest['assets'] as $asset)
                        <a class="button button-primary" href="{{ $asset['browser_download_url'] }}">{{ trans('downloads.download_windows') }} — {{ $asset['name'] }} ({{ round($asset['size'] / 1048576, 1) }} MiB)</a>
                    @endforeach
                </div>
            </section>

            <section class="release-history" aria-labelledby="previous-title">
                <div class="release-history-heading">
                    <h2 id="previous-title">{{ trans('downloads.previous') }}</h2>
                    <p>{{ trans('downloads.previous_description') }}</p>
                </div>
                @if ($previous === [])
                    <p>{{ trans('downloads.no_previous') }}</p>
                @else
                    @foreach ($previous as $release)
                        <div class="release-row"><div><h3>{{ $release['name'] }}</h3><span>{{ substr($release['published_at'], 0, 10) }}</span></div><div>
                            @foreach ($release['assets'] as $asset)
                                <a class="button button-dark" href="{{ $asset['browser_download_url'] }}">{{ trans('downloads.download_windows') }} — {{ $asset['name'] }} ({{ round($asset['size'] / 1048576, 1) }} MiB)</a>
                            @endforeach
                        </div></div>
                    @endforeach
                @endif
            </section>
            @else
                <p class="downloads-notice">{{ trans('downloads.no_releases') }}</p>
            @endif
            <section class="downloads-faq" aria-labelledby="faq-title">
                <h2 id="faq-title">{{ trans('downloads.faq_title') }}</h2>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_systems') }}</summary><p>{{ trans('downloads.platform_availability') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_install') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_data') }}</summary><p>{{ trans('downloads.faq_data_answer') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_offline') }}</summary><p>{{ trans('downloads.faq_offline_answer') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_backups') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
                <details class="downloads-faq-item"><summary>{{ trans('downloads.faq_contact') }}</summary><p>{{ trans('downloads.pending') }}</p></details>
            </section>
        </div>
    </div>
@endsection
