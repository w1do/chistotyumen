@props(['data' => null])

<section class="pbmit-sticky-section pricing-five-bg pbminfotech-ele-ptable-style-2" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="pbmit-sticky-col">
                    <div class="pricing-five-head-area">
                        <div class="pbmit-heading-subheading animation-style4">
                            <h4 class="pbmit-subtitle">{{ $data->subtitle }}</h4>
                            <h2 class="pbmit-title">{{ $data->title }}</h2>
                            <div class="cty-pricing-headline-price" role="group" aria-label="{{ trim($data->headlinePricePrefix.' '.$data->headlinePriceAmount.' '.$data->headlinePriceSuffix) }}">
                                <span class="cty-pricing-headline-price__prefix">{{ $data->headlinePricePrefix }}</span>
                                <span class="cty-pricing-headline-price__amount">{{ $data->headlinePriceAmount }}</span>
                                @if (filled($data->headlinePriceSuffix))
                                    <span class="cty-pricing-headline-price__suffix">{{ $data->headlinePriceSuffix }}</span>
                                @endif
                            </div>
                            <div class="pbmit-heading-desc">
                                {{ $data->intro }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-8">
                <div class="pricing-five-area">
                    <div class="row">
                        @foreach ($data->plans as $plan)
                            <div class="pbmit-ptable-col col-md-12 @if ($plan->featured) pbmit-pricing-table-featured-col @endif">
                                <div class="pbmit-pricing-table-box">
                                    <div class="pbmit-head-wrap">
                                        <h3 class="pbminfotech-ptable-heading">{{ $plan->name }}</h3>
                                        <div class="pbminfotech-sep"></div>
                                        <div class="pbmit-price-wrapper">
                                            <div class="pbmit-ptable-price-w">
                                                <div class="pbminfotech-ptable-symbol"></div>
                                                <div class="pbminfotech-ptable-price">{{ $plan->price }}</div>
                                            </div>
                                            @if (filled($plan->period))
                                                <div class="pbminfotech-ptable-frequency">{{ $plan->period }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pbmit-ptable-inner">
                                        <div class="pbmit-ptable-lines-w">
                                            @foreach ($plan->lines as $line)
                                                <div class="pbmit-ptable-line">
                                                    @if ($line->hasCheckIcon)
                                                        <i class="fa ti-check" aria-hidden="true"></i>
                                                    @endif
                                                    {{ $line->text }}
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="pbminfotech-ptable-btn">
                                            <div class="pbmit-button">
                                                <a class="pbmit-button-inner" href="{{ $plan->ctaUrl }}">
                                                    <span class="pbmit-button-wrapper">
                                                        <span class="pbmit-button-text">{{ $plan->ctaLabel }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-4 small text-white-50">{{ $data->footnote }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
