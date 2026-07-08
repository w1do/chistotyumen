<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class MarqueeItemDto
{
    public function __construct(
        public string $text,
    ) {}
}
