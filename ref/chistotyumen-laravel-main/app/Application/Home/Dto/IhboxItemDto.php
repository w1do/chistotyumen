<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class IhboxItemDto
{
    public function __construct(
        public string $imagePath,
        public string $imageAlt,
        public string $title,
    ) {}
}
