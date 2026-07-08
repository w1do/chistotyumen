<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class PricingSectionDto
{
    /**
     * @param  list<PricingPlanDto>  $plans
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public string $intro,
        public string $headlinePricePrefix,
        public string $headlinePriceAmount,
        public string $headlinePriceSuffix,
        public string $footnote,
        public array $plans,
    ) {}
}
