<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class StaticBoxesSectionDto
{
    /**
     * @param  list<StaticBoxItemDto>  $boxes
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public array $boxes,
    ) {}
}
