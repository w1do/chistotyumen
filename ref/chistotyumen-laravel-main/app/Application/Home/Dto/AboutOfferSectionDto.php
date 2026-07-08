<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class AboutOfferSectionDto
{
    /**
     * @param  list<string>  $rotatingWords
     */
    public function __construct(
        public string $phoneDisplay,
        public string $phoneUrl,
        public string $subtitle,
        public string $titleBeforeRotate,
        public array $rotatingWords,
        public string $sideBadgeTitle,
    ) {}
}
