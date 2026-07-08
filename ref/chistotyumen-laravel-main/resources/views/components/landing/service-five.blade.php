@props(['data' => null])

<section class="service-section-five" id="services">
    <div class="container pbmit-col-stretched-yes pbmit-col-right">
        <div class="pbmit-col-stretched-right">
            <div class="row g-0">
                <div class="col-md-12 col-lg-3">
                    <div class="service-five-header-area">
                        <div class="pbmit-heading-subheading animation-style4">
                            <h4 class="pbmit-subtitle">{{ $data->subtitle }}</h4>
                            <h2 class="pbmit-title">{{ $data->title }}</h2>
                        </div>
                        <div class="service-five-arrow swiper-btn-custom d-inline-flex flex-row-reverse"></div>
                        <div class="fid-style-area">
                            <div class="pbminfotech-ele-fid-style-6">
                                <div class="pbmit-fld-contents">
                                    <div class="pbmit-fld-wrap">
                                        <h4 class="pbmit-fid-inner">
                                            <span class="pbmit-fid-before"></span>
                                            <span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="{{ $data->fidNumber }}" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">{{ $data->fidNumber }}</span>
                                            <span class="pbmit-fid"><span></span></span>
                                        </h4>
                                        <span class="pbmit-fid-title">{!! nl2br(e($data->fidTitle)) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9 service-five-right-col">
                    <div class="swiper-slider" data-arrows-class="service-five-arrow" data-autoplay="false" data-loop="true" data-dots="false" data-arrows="true" data-columns="2.6" data-margin="30" data-effect="slide">
                        <div class="swiper-wrapper">
                            @foreach ($data->cards as $card)
                                <article
                                    class="pbmit-ele-service pbmit-service-style-1 swiper-slide"
                                    role="link"
                                    tabindex="0"
                                    onclick="window.location.href='tel:{{ config('site.phone_tel') }}'"
                                    onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();window.location.href='tel:{{ config('site.phone_tel') }}'}"
                                    style="cursor: pointer;"
                                >
                                    <div class="pbminfotech-post-item">
                                        <div class="pbmit-box-content-wrap">
                                            <div class="pbmit-service-image-wrapper">
                                                <div class="pbmit-featured-img-wrapper">
                                                    <div class="pbmit-featured-wrapper">
                                                        <img src="{{ asset($card->imagePath) }}" class="img-fluid" alt="{{ $card->imageAlt }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbmit-service-icon elementor-icon">
                                                <i class=""></i>
                                            </div>
                                            <div class="pbmit-box-content-inner">
                                                <div class="pbmit-content-box">
                                                    <div class="pbminfotech-box-number">{{ $card->number }}</div>
                                                    <div class="pbmit-serv-cat">
                                                        <span>{{ $card->category }}</span>
                                                    </div>
                                                    <h3 class="pbmit-service-title">
                                                        <a href="tel:{{ config('site.phone_tel') }}">{{ $card->title }}</a>
                                                    </h3>
                                                    <div class="pbmit-service-description">
                                                        <p>{{ $card->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="pbmit-service-btn" href="tel:{{ config('site.phone_tel') }}" title="{{ $card->title }}">
                                            <span class="pbmit-button-icon">
                                                <i class="pbmit-base-icon-pbmit-up-arrow" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
