<?php

use App\Application\Contact\Queries\GetContactPageQuery;
use App\Seo\ContactPageSeo;
use Artesaos\SEOTools\Facades\SEOTools;
use function Livewire\Volt\{layout, mount, with};

layout('layouts.landing');

mount(function (): void {
    $pageUrl = route('contact');
    $siteUrl = rtrim((string) config('site.site_url'), '/');
    if ($siteUrl === '') {
        $siteUrl = url('/');
    }
    $brand = (string) config('site.brand');
    $phoneTel = (string) config('site.phone_tel');
    $ogAbs = url()->to(asset('images/banner-slider-img/demo5-slide-03.png'));

    SEOTools::landingHome(
        ContactPageSeo::TITLE,
        ContactPageSeo::DESCRIPTION,
        $pageUrl,
        $ogAbs,
        ContactPageSeo::jsonLdGraph($pageUrl, $siteUrl, $brand, $phoneTel),
    );
});

with(fn (GetContactPageQuery $query) => [
    'page' => $query->execute(),
]);
?>

<div class="page-wrapper">
    <x-landing.header-service-details
        :header="$page->header"
        :phone-display="$page->headerPhoneDisplay"
        :phone-tel-href="$page->headerPhoneTelHref"
    />
    <x-landing.title-bar
        :heading="$page->titleBarHeading"
        :home-label="$page->breadcrumbHomeLabel"
        :home-url="$page->breadcrumbHomeUrl"
        :current-label="$page->breadcrumbCurrentLabel"
    />
    <div class="page-content">
        <x-landing.contact-ihbox-swiper :cards="$page->ihboxCards" />
        <x-landing.contact-form-section
            :subtitle="$page->contactSubtitle"
            :title="$page->contactTitle"
            :intro="$page->contactIntro"
            :form-heading="$page->formHeading"
        />
        <x-landing.clients-swiper :logos="$page->clientLogos" />
        <x-landing.map-embed :embed-url="$page->mapEmbedUrl" :title="$page->mapIframeTitle" />
    </div>
    <x-landing.footer-five :data="$page->footer" />
</div>
