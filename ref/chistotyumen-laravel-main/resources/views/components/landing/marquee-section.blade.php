@props(['items' => []])

<section class="section-lgx">
    <div class="container-fluid p-0">
        <div class="swiper-slider marquee">
            <div class="swiper-wrapper">
                @foreach ($items as $item)
                    <article class="pbmit-marquee-effect-style-1 swiper-slide">
                        <div class="pbmit-tag-wrapper">
                            <h2 class="pbmit-element-title" data-text="{{ $item->text }}">
                                {{ $item->text }}
                            </h2>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
