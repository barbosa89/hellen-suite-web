<nav class="desktop-navigation" aria-label="{{ trans('nav.label') }}">
    <a href="{{ url('/') }}#features">{{ trans('nav.features') }}</a>
    <a class="nav-download" href="{{ route('downloads') }}">{{ trans('home.download') }}</a>
</nav>
<details class="mobile-menu">
    <summary class="menu-toggle"><svg aria-hidden="true" viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg><span>{{ trans('nav.menu') }}</span></summary>
    <nav class="mobile-navigation" aria-label="{{ trans('nav.label') }}">
        <a href="{{ url('/') }}#features">{{ trans('nav.features') }}</a>
        <a class="nav-download" href="{{ route('downloads') }}">{{ trans('home.download') }}</a>
    </nav>
</details>
