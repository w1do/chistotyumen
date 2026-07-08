<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class PricingLineDto
{
    public function __construct(
        public bool $hasCheckIcon,
        public string $text,
    ) {}
}
