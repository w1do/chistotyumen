<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class ClientLogoDto
{
    public function __construct(
        public string $hoverImagePath,
        public string $greyImagePath,
        public string $visuallyHiddenTitle,
        public string $alt,
    ) {}
}
