<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class BlogPostDto
{
    public function __construct(
        public string $imagePath,
        public string $imageAlt,
        public string $categoryLabel,
        public string $categoryUrl,
        public string $dateLabel,
        public string $authorLine,
        public string $title,
        public string $url,
        public string $excerpt,
    ) {}
}
