@props(['data' => null])

<section class="about-five-bg">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-6">
                <div class="about-five-left-box">
                    <div class="ihbox-style-area">
                        <div class="pbmit-ihbox-style-20">
                            <div class="pbmit-ihbox-headingicon">
                                <a class="pbmin-lightbox-video d-flex align-items-center" href="{{ $data->videoUrl }}">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
                                            <i class="pbmit-base-icon-play-button-1" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <h3 class="pbmit-element-title">{{ $data->videoLinkLabel }}</h3>
                                </a>
                                <div class="pbmit-ihbox-contents"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="about-five-rightbox">
                    <div class="pbmit-heading-subheading animation-style2">
                        <h4 class="pbmit-subtitle">{{ $data->subtitle }}</h4>
                        <h2 class="pbmit-title">{{ $data->title }}</h2>
                    </div>
                    <div class="about-five-content">
                        @foreach ($data->paragraphs as $p)
                            <p>{{ $p }}</p>
                        @endforeach
                        <div class="pbmit-animation-style1">
                            <img src="{{ asset($data->signatureImagePath) }}" class="img-fluid" alt="{{ $data->signatureImageAlt }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
