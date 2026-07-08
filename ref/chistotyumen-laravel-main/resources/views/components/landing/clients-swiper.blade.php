@props(['logos' => []])

<section class="client-three">
    <div class="container">
        <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="6" data-margin="0" data-effect="slide">
            <div class="swiper-wrapper">
                @foreach ($logos as $logo)
                    <article class="pbmit-client-style-1 swiper-slide">
                        <div class="pbmit-border-wrapper">
                            <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                                <h4 class="pbmit-hide">{{ $logo->visuallyHiddenTitle }}</h4>
                                <div class="pbmit-client-hover-img">
                                    <img src="{{ asset($logo->hoverImagePath) }}" class="img-fluid" alt="{{ $logo->alt }}">
                                </div>
                                <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                        <img src="{{ asset($logo->greyImagePath) }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
