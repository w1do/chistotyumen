<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class ServiceSectionDto
{
    /**
     * @param  list<ServiceCardDto>  $cards
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public string $fidNumber,
        public string $fidTitle,
        public array $cards,
    ) {}
}
