<?php

declare(strict_types=1);

namespace App\Application\Services\Dto;

use App\Application\Home\Dto\FaqItemDto;
use App\Application\Home\Dto\FooterDto;
use App\Application\Home\Dto\HomeHeaderDto;
use App\Application\Home\Dto\NavLinkDto;

final readonly class ServicesPageDto
{
    /**
     * @param  list<NavLinkDto>  $breadcrumbTrail
     * @param  list<string>  $bulletColumnLeft
     * @param  list<string>  $bulletColumnRight
     * @param  list<ServiceDetailStatDto>  $stats
     * @param  list<FaqItemDto>  $faqItems
     * @param  list<NavLinkDto>  $sidebarServiceLinks
     * @param  list<NavLinkDto>  $downloadLinks
     */
    public function __construct(
        public HomeHeaderDto $header,
        public string $titleBarHeading,
        public string $headerPhoneDisplay,
        public string $headerPhoneTelHref,
        public string $breadcrumbHomeLabel,
        public string $breadcrumbHomeUrl,
        public array $breadcrumbTrail,
        public string $breadcrumbCurrentLabel,
        public string $featureImagePath,
        public string $featureImageAlt,
        public string $contentTitle,
        public string $leadParagraph,
        public array $bulletColumnLeft,
        public array $bulletColumnRight,
        public string $galleryLeftPath,
        public string $galleryLeftAlt,
        public string $galleryRightPath,
        public string $galleryRightAlt,
        public string $bodyParagraph,
        public array $stats,
        public string $faqSectionTitle,
        public string $faqIntro,
        public array $faqItems,
        public string $sidebarServicesTitle,
        public array $sidebarServiceLinks,
        public string $sidebarCtaSubheading,
        public string $sidebarCtaSubtitle,
        public string $sidebarCtaTitle,
        public string $sidebarCtaPhoneDisplay,
        public string $sidebarCtaButtonLabel,
        public string $sidebarCtaButtonUrl,
        public string $sidebarDownloadsTitle,
        public array $downloadLinks,
        public FooterDto $footer,
    ) {}
}
