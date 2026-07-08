<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class FaqItemDto
{
    public function __construct(
        public string $question,
        public string $answer,
    ) {}
}
