<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class ServiceCardDto
{
    public function __construct(
        public string $number,
        public string $category,
        public string $title,
        public string $description,
        public string $imagePath,
        public string $imageAlt,
        public string $detailUrl,
    ) {}
}
