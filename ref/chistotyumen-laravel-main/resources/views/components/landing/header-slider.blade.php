@props([
    'header' => null,
    'slides' => [],
])

<header class="site-header header-style-5">
    <div class="pbmit-header-overlay">
        <div class="pbmit-main-header-area">
            <div class="container-fluid">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <div class="pbmit-header-content-wrapper d-flex justify-content-between align-items-center">
                        <div class="site-branding">
                            <div class="site-title">
                                <a href="{{ $header->homeUrl }}">
                                    <img class="logo-img" src="{{ asset($header->logoPath) }}" width="160" height="48" alt="{{ $header->logoAlt }}">
                                </a>
                            </div>
                        </div>
                        <div class="pbmit-menuarea">
                            <div class="site-navigation">
                                <nav class="main-menu navbar-expand-xl navbar-light" aria-label="Основное меню">
                                    <div class="navbar-header">
                                        <button class="navbar-toggler" type="button" aria-expanded="false" aria-controls="pbmit-menu" aria-label="Открыть меню">
                                            <i class="pbmit-base-icon-menu-1" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="pbmit-mobile-menu-bg"></div>
                                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                        <div class="pbmit-menu-wrap">
                                            <span class="closepanel">
                                                <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163" aria-hidden="true">
                                                    <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                                                    <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
                                                </svg>
                                            </span>
                                            <ul class="navigation clearfix">
                                                @foreach ($header->navItems as $item)
                                                    <li>
                                                        <a href="{{ $item->url }}">{{ $item->label }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pbmit-button-box-second pbmit-btn-color-blackish">
                        <a class="pbmit-btn pbmit-btn-outline" href="{{ $header->primaryCtaUrl }}">
                            <span class="pbmit-button-content-wrapper">
                                <span class="pbmit-button-text">{{ $header->primaryCtaLabel }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-slider-area pbmit-slider-five">
        <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg" style="background-image: url({{ asset($slide->backgroundImage) }});"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-12 col-lg-7"></div>
                                    <div class="col-md-12 col-lg-5 pbmit-right-col">
                                        <div class="pbmit-slider-content">
                                            @if ($slide->isPrimaryHeading)
                                                <h1 class="pbmit-title transform-left transform-delay-3">
                                                    @foreach ($slide->titleLines as $i => $line)
                                                        @if ($i > 0)<br>@endif{{ $line }}
                                                    @endforeach
                                                </h1>
                                            @else
                                                <h2 class="pbmit-title transform-left transform-delay-3">
                                                    @foreach ($slide->titleLines as $i => $line)
                                                        @if ($i > 0)<br>@endif{{ $line }}
                                                    @endforeach
                                                </h2>
                                            @endif
                                            <p class="pbmit-desc transform-left transform-delay-4">
                                                @foreach ($slide->descriptionLines as $i => $line)
                                                    @if ($i > 0)<br>@endif{{ $line }}
                                                @endforeach
                                            </p>
                                            <div class="pbmit-button-wrap transform-left transform-delay-5">
                                                <a class="pbmit-btn pbmit-btn-global" href="{{ $slide->ctaUrl }}">
                                                    <span class="pbmit-button-content-wrapper">
                                                        <span class="pbmit-button-text">{{ $slide->ctaLabel }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</header>
