<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class PricingPlanDto
{
    /**
     * @param  list<PricingLineDto>  $lines
     */
    public function __construct(
        public string $name,
        public string $price,
        public string $period,
        public array $lines,
        public string $ctaLabel,
        public string $ctaUrl,
        public bool $featured,
    ) {}
}
