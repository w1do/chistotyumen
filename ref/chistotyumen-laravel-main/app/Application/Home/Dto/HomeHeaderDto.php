<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class HomeHeaderDto
{
    /**
     * @param  list<NavLinkDto>  $navItems
     */
    public function __construct(
        public string $logoPath,
        public string $logoAlt,
        public string $homeUrl,
        public array $navItems,
        public string $primaryCtaLabel,
        public string $primaryCtaUrl,
    ) {}
}
