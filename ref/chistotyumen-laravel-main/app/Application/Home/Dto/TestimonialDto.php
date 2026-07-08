<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class TestimonialDto
{
    public function __construct(
        public string $quote,
        public string $authorName,
        public string $authorDetail,
        public string $imagePath,
        public string $imageAlt,
    ) {}
}
