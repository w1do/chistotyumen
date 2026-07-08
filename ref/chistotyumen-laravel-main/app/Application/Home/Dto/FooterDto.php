<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class FooterDto
{
    /**
     * @param  list<NavLinkDto>  $columnOne
     * @param  list<NavLinkDto>  $columnTwo
     * @param  list<array{url: string, imagePath: string, alt: string}>  $instagram
     */
    public function __construct(
        public array $columnOne,
        public array $columnTwo,
        public string $logoPath,
        public string $logoAlt,
        public array $instagram,
        public string $email,
        public string $emailUrl,
        public string $phoneDisplay,
        public string $addressHtml,
        public string $copyrightLine,
        public string $facebookUrl,
        public string $telegramUrl,
    ) {}
}
