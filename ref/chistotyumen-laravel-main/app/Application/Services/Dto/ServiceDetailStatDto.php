<?php

declare(strict_types=1);

namespace App\Application\Services\Dto;

final readonly class ServiceDetailStatDto
{
    public function __construct(
        public int $digit,
        public string $title,
        public string $description,
    ) {}
}
