<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class PortfolioSlideDto
{
    public function __construct(
        public string $categoryLabel,
        public string $categoryUrl,
        public string $titleText,
        public string $titleUrl,
        public string $imagePath,
        public string $imageAlt,
    ) {}
}
