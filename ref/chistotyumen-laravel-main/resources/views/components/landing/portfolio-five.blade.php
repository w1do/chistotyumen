@props(['slides' => []])

<section class="pbmit-element-portfolio-style-4 portfolio-section-five" id="portfolio">
    <div class="container-fluid p-0">
        <div class="pbmit-main-hover-faded">
            <div class="pbmit-content-box">
                <div class="swiper-slider swiper-hover-slide-nav" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="false" data-columns="3" data-margin="0" data-effect="slide">
                    <div class="swiper-wrapper">
                        @foreach ($slides as $s)
                            <div class="swiper-slide">
                                <div class="pbmit-content-box-inner">
                                    <div class="pbmit-titlebox-wrap">
                                        <div class="pbmit-titlebox">
                                            <div class="pbmit-port-cat">
                                                <a href="{{ $s->categoryUrl }}" rel="tag">{{ $s->categoryLabel }}</a>
                                            </div>
                                            <h3 class="pbmit-portfolio-title">
                                                <a href="{{ $s->titleUrl }}">{{ $s->titleText }}</a>
                                            </h3>
                                        </div>
                                        <div class="pbmit-portfolio-btn">
                                            <a href="{{ $s->titleUrl }}" aria-label="{{ $s->titleText }}">
                                                <i class="pbmit-base-icon-pbmit-up-arrow" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-hover-slide-images">
                <div class="swiper-slider pbmit-hover-image-faded">
                    <div class="swiper-wrapper">
                        @foreach ($slides as $s)
                            <div class="swiper-slide">
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="{{ asset($s->imagePath) }}" class="img-fluid" alt="{{ $s->imageAlt }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
