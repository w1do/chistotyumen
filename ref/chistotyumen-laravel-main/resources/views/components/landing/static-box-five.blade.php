@props(['data' => null])

<section class="section-xl pbmit-element-static-box-style-1">
    <div class="container">
        <div class="pbmit-heading-subheading text-center animation-style2">
            <h4 class="pbmit-subtitle">{{ $data->subtitle }}</h4>
            <h2 class="pbmit-title">{{ $data->title }}</h2>
        </div>
        <div class="pbmit-element-posts-wrapper row g-0">
            @foreach ($data->boxes as $box)
                <article class="pbmit-static-box-style-1">
                    <div class="pbmit-staticbox-wrapper">
                        <div class="pbmit-bg-imgbox" style="background-image: url({{ asset($box->backgroundImagePath) }})">
                            <div class="pbmit-img">
                                <img src="{{ asset($box->backgroundImagePath) }}" alt="{{ $box->foregroundImageAlt }}">
                            </div>
                            <div class="pbmit-box-number">{{ $box->number }}</div>
                            <h4 class="pbmit-static-box-title">{{ $box->title }}</h4>
                        </div>
                        <div class="pbmit-content-box">
                            <div class="pbmit-box-number">{{ $box->number }}</div>
                            <div class="pbmit-content-inner">
                                <h4 class="pbmit-static-box-title">{{ $box->title }}</h4>
                                <div class="pbmit-static-box-desc">{{ $box->description }}</div>
                            </div>
                            <div class="pbmit-static-btn">
                                <a class="pbmit-button-inner" href="{{ $box->buttonUrl }}">
                                    <span class="pbmit-button-wrapper">
                                        <span class="pbmit-button-text">{{ $box->buttonLabel }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <a class="pbmit-link" href="{{ $box->buttonUrl }}"></a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
