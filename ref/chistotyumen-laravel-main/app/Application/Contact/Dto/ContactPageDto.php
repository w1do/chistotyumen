<?php

declare(strict_types=1);

namespace App\Application\Contact\Dto;

use App\Application\Home\Dto\ClientLogoDto;
use App\Application\Home\Dto\FooterDto;
use App\Application\Home\Dto\HomeHeaderDto;

final readonly class ContactPageDto
{
    /**
     * @param  list<ContactIhboxCardDto>  $ihboxCards
     * @param  list<ClientLogoDto>  $clientLogos
     */
    public function __construct(
        public HomeHeaderDto $header,
        public string $headerPhoneDisplay,
        public string $headerPhoneTelHref,
        public string $titleBarHeading,
        public string $breadcrumbHomeLabel,
        public string $breadcrumbHomeUrl,
        public string $breadcrumbCurrentLabel,
        public array $ihboxCards,
        public string $contactSubtitle,
        public string $contactTitle,
        public string $contactIntro,
        public string $formHeading,
        public array $clientLogos,
        public string $mapEmbedUrl,
        public string $mapIframeTitle,
        public FooterDto $footer,
    ) {}
}
