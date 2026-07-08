<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class NavLinkDto
{
    public function __construct(
        public string $label,
        public string $url,
    ) {}
}
