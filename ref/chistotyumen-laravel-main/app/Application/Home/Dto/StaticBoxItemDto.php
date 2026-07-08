<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class StaticBoxItemDto
{
    public function __construct(
        public string $number,
        public string $title,
        public string $description,
        public string $backgroundImagePath,
        public string $foregroundImageAlt,
        public string $buttonLabel,
        public string $buttonUrl,
    ) {}
}
