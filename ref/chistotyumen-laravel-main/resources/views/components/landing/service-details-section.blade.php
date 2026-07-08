@props([
    'data' => null,
])

<section class="site-content service-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 service-right-col">
                <div class="pbmit-service-feature-image">
                    <img
                        src="{{ asset($data->featureImagePath) }}"
                        class="img-fluid w-100"
                        width="1200"
                        height="675"
                        alt="{{ $data->featureImageAlt }}"
                        loading="eager"
                        decoding="async"
                    >
                </div>
                <div class="pbmit-entry-content">
                    <div class="pbmit-service-content">
                        <div class="pbmit-heading mb-3 animation-style2">
                            <h2 class="pbmit-title">{{ $data->contentTitle }}</h2>
                        </div>
                        <p class="pbmit-firstletter">{{ $data->leadParagraph }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-borderless">
                                    @foreach ($data->bulletColumnLeft as $line)
                                        <li class="list-group-item">
                                            <span class="pbmit-icon-list-icon" aria-hidden="true">
                                                <i class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
                                            </span>
                                            <span class="pbmit-icon-list-text">{{ $line }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-borderless">
                                    @foreach ($data->bulletColumnRight as $line)
                                        <li class="list-group-item">
                                            <span class="pbmit-icon-list-icon" aria-hidden="true">
                                                <i class="pbmit-xinterio-icon pbmit-xinterio-icon-tick-mark"></i>
                                            </span>
                                            <span class="pbmit-icon-list-text">{{ $line }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="service-det-img">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="pbmit-animation-style1">
                                        <img
                                            src="{{ asset($data->galleryLeftPath) }}"
                                            class="img-fluid"
                                            width="600"
                                            height="400"
                                            alt="{{ $data->galleryLeftAlt }}"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="pbmit-animation-style2">
                                        <img
                                            src="{{ asset($data->galleryRightPath) }}"
                                            class="img-fluid"
                                            width="600"
                                            height="400"
                                            alt="{{ $data->galleryRightAlt }}"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>{{ $data->bodyParagraph }}</div>
                        <div class="fid-style-rea">
                            <div class="row">
                                @foreach ($data->stats as $stat)
                                    <div class="col-md-4">
                                        <div class="pbminfotech-ele-fid-style-3">
                                            <div class="pbmit-fld-contents">
                                                <div
                                                    class="pbmit-circle-outer"
                                                    data-digit="{{ $stat->digit }}"
                                                    data-fill="#bb9a65"
                                                    data-emptyfill=""
                                                    data-before=""
                                                    data-after="<span>%</span>"
                                                    data-thickness="1.5"
                                                    data-size="153"
                                                >
                                                    <div class="pbmit-circle">
                                                        <div class="pbmit-fid-inner">
                                                            <span class="pbmit-fid-before"></span>
                                                            <span
                                                                class="pbmit-number-rotate numinate"
                                                                data-appear-animation="animateDigits"
                                                                data-from="0"
                                                                data-to="{{ $stat->digit }}"
                                                                data-interval="5"
                                                                data-before=""
                                                                data-before-style=""
                                                                data-after=""
                                                                data-after-style=""
                                                            >{{ $stat->digit }}</span>
                                                            <span class="pbmit-fid"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pbmit-fid-sub">
                                                    <h3 class="pbmit-fid-title">{{ $stat->title }}</h3>
                                                    <div class="pbmit-heading-desc">{{ $stat->description }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pbmit-heading mb-3 animation-style2">
                            <h2 class="pbmit-title">{{ $data->faqSectionTitle }}</h2>
                        </div>
                        <p>{{ $data->faqIntro }}</p>
                        <x-landing.faq-accordion accordion-id="service-uslugi-faq" :items="$data->faqItems" />
                    </div>
                </div>
            </div>
            <div class="col-lg-3 service-left-col sidebar">
                <aside class="service-sidebar">
                    <aside class="widget post-list">
                        <h2 class="widget-title">{{ $data->sidebarServicesTitle }}</h2>
                        <div class="all-post-list">
                            <ul>
                                @foreach ($data->sidebarServiceLinks as $link)
                                    <li><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <aside class="widget pbmit-service-ad">
                        <div class="textwidget">
                            <div class="pbmit-service-ads">
                                <h5 class="pbmit-ads-subheding">{{ $data->sidebarCtaSubheading }}</h5>
                                <h4 class="pbmit-ads-subtitle">{{ $data->sidebarCtaSubtitle }}</h4>
                                <h3 class="pbmit-ads-title">{{ $data->sidebarCtaTitle }}</h3>
                                <div class="pbmit-ads-desc">
                                    <i class="pbmit-base-icon-phone-call-1" aria-hidden="true"></i>{{ $data->sidebarCtaPhoneDisplay }}
                                </div>
                                <a class="pbmit-btn pbmit-btn-hover-white" href="{{ $data->sidebarCtaButtonUrl }}">
                                    <span class="pbmit-button-content-wrapper">
                                        <span class="pbmit-button-text">{{ $data->sidebarCtaButtonLabel }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget pbmit-download-content">
                        <h2 class="widget-title">{{ $data->sidebarDownloadsTitle }}</h2>
                        <div class="textwidget">
                            <div class="download">
                                @foreach ($data->downloadLinks as $dl)
                                    <div class="item-download">
                                        <a href="{{ $dl->url }}" @if($dl->url !== '#') target="_blank" rel="noopener noreferrer" @endif>
                                            <span class="pbmit-download-content">
                                                <i class="pbmit-base-icon-pdf-file-format-symbol-1" aria-hidden="true"></i> {{ $dl->label }}
                                            </span>
                                            <span class="pbmit-download-item">
                                                <i class="pbminfotech-base-icons pbmit-righticon pbmit-base-icon-download" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </aside>
            </div>
        </div>
    </div>
</section>
