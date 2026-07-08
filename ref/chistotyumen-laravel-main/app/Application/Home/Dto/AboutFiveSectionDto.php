<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class AboutFiveSectionDto
{
    /**
     * @param  list<string>  $paragraphs
     */
    public function __construct(
        public string $videoUrl,
        public string $videoLinkLabel,
        public string $subtitle,
        public string $title,
        public array $paragraphs,
        public string $signatureImagePath,
        public string $signatureImageAlt,
    ) {}
}
