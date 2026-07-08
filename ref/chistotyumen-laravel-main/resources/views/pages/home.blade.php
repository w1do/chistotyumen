<?php

use App\Application\Home\Queries\GetHomePageQuery;
use App\Seo\LandingHomeSeo;
use Artesaos\SEOTools\Facades\SEOTools;

use function Livewire\Volt\layout;
use function Livewire\Volt\mount;
use function Livewire\Volt\with;

layout('layouts.landing');

mount(function (): void {
    $pageUrl = url('/');
    $siteUrl = rtrim((string) config('site.site_url'), '/');
    if ($siteUrl === '') {
        $siteUrl = url('/');
    }
    $brand = (string) config('site.brand');
    $ogAbs = url()->to(asset('images/banner-slider-img/demo5-slide-03.png'));

    SEOTools::landingHome(
        LandingHomeSeo::TITLE,
        LandingHomeSeo::DESCRIPTION,
        $pageUrl,
        $ogAbs,
        LandingHomeSeo::jsonLdGraph($pageUrl, $siteUrl, $brand),
    );
});

with(fn (GetHomePageQuery $query) => [
    'page' => $query->execute(),
]);
?>

<div class="page-wrapper">
    <x-landing.header-slider :header="$page->header" :slides="$page->heroSlides" />
    <div class="page-content">
        <x-landing.service-five :data="$page->services" />
        <x-landing.marquee-section :items="$page->marquee" />
        <x-landing.about-five :data="$page->about" />
        <x-landing.ihbox-five :items="$page->ihboxItems" />
        <x-landing.portfolio-five :slides="$page->portfolioSlides" />
        <x-landing.static-box-five :data="$page->staticBoxes" />
        <x-landing.about-offer-five :data="$page->aboutOffer" />
        <x-landing.pricing-five :data="$page->pricing" />
        <x-landing.faq-section :data="$page->faq" />
        <x-landing.testimonial-five :data="$page->testimonials" />
        <x-landing.clients-five :logos="$page->clientLogos" />
        <x-landing.blog-five :data="$page->blog" />
    </div>
    <x-landing.footer-five :data="$page->footer" />
</div>
