<?php

use App\Application\Services\Queries\GetServicesPageQuery;
use App\Seo\ServicesPageSeo;
use Artesaos\SEOTools\Facades\SEOTools;
use function Livewire\Volt\{layout, mount, with};

layout('layouts.landing');

mount(function (): void {
    $pageUrl = route('uslugi');
    $siteUrl = rtrim((string) config('site.site_url'), '/');
    if ($siteUrl === '') {
        $siteUrl = url('/');
    }
    $brand = (string) config('site.brand');
    $phoneTel = (string) config('site.phone_tel');
    $ogAbs = url()->to(asset('images/homepage-5/service/service-01.jpg'));

    SEOTools::landingHome(
        ServicesPageSeo::TITLE,
        ServicesPageSeo::DESCRIPTION,
        $pageUrl,
        $ogAbs,
        ServicesPageSeo::jsonLdGraph($pageUrl, $siteUrl, $brand, $phoneTel),
    );
});

with(fn (GetServicesPageQuery $query) => [
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
        :trail-items="$page->breadcrumbTrail"
        :current-label="$page->breadcrumbCurrentLabel"
    />
    <div class="page-content">
        <x-landing.service-details-section :data="$page" />
    </div>
    <x-landing.footer-five :data="$page->footer" />
</div>
