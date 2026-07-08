@props(['data' => null])

<footer class="site-footer footer-style-1 pbmit-bg-color-secondary">
    <div class="footer-wrap pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
                        <ul>
                            @foreach ($data->columnOne as $link)
                                <li><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="widget">
                        <div class="textwidget">
                            <div class="pbmit-footer-logo">
                                <img src="{{ asset($data->logoPath) }}" width="120" height="120" alt="{{ $data->logoAlt }}">
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="widget pbmit-two-column-menu">
                        <ul>
                            @foreach ($data->columnTwo as $link)
                                <li><a href="{{ $link->url }}">{{ $link->label }}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-instagram-area">
        <div class="container">
            <div class="row">
                <div class="pbmit-footer-instagram-wrapper">
                    <div class="sb-instagram">
                        <div class="sbi-images">
                            @foreach ($data->instagram as $item)
                                <div class="sbi-item">
                                    <div class="sbi-photo-wrap">
                                        <a class="sbi-photo" href="{{ $item['url'] }}">
                                            <img src="{{ asset($item['imagePath']) }}" alt="{{ $item['alt'] }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-big-area-wrapper">
        <div class="footer-wrap pbmit-footer-big-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 pbmit-footer-left">
                        <span class="pbmit-email-text"><a href="{{ $data->emailUrl }}">{{ $data->email }}</a></span>
                        <span class="pbmit-phone-number"> {{ $data->phoneDisplay }}</span>
                    </div>
                    <div class="col-md-4 pbmit-footer-right">
                        <span class="pbmit-address"> {!! $data->addressHtml !!}</span>
                    </div>
                    <div class="col-md-4 pbmit-footer-right-social">
                        <ul class="pbmit-social-links">
                            <li class="pbmit-social-li pbmit-social-facebook">
                                <a title="Facebook" href="{{ $data->facebookUrl }}" target="_blank" rel="noopener noreferrer">
                                    <span><i class="pbmit-base-icon-facebook-f" aria-hidden="true"></i></span>
                                </a>
                            </li>
                            <li class="pbmit-social-li pbmit-social-instagram">
                                <a title="MAX" href="{{ $data->telegramUrl }}" target="_blank" rel="noopener noreferrer">
                                    <span><i class="pbmit-base-icon-paper-plane" aria-hidden="true"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-text-area">
        <div class="container">
            <div class="pbmit-footer-text-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pbmit-footer-copyright-text-area">{{ $data->copyrightLine }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
