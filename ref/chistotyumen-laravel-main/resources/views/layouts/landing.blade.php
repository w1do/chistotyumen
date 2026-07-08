<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chistotyumen-landing.css') }}">
    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}
</head>
<body>
    {{ $slot }}

    <div class="pbmit-search-overlay">
        <div class="pbmit-icon-close">
            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163">
                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
            </svg>
        </div>
        <div class="pbmit-search-outer">
            <form class="pbmit-site-searchform" action="#" method="get">
                <input type="search" class="form-control field searchform-s" name="s" placeholder="Поиск по сайту…" title="Поиск">
                <button type="submit" aria-label="Искать"></button>
            </form>
        </div>
    </div>

    <div class="pbmit-progress-wrap">
        <svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102" aria-hidden="true">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/gsap.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('js/SplitText.js') }}"></script>
    <script src="{{ asset('js/magnetic.js') }}"></script>
    <script src="{{ asset('js/morphext.min.js') }}"></script>
    <script src="{{ asset('js/gsap-animation.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @if(filled(config('analytics.yandex_metrika_id')))
        <x-analytics.yandex-metrika :counter-id="(int) config('analytics.yandex_metrika_id')" />
    @endif
</body>
</html>
