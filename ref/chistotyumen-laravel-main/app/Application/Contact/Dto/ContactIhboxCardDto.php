<?php

declare(strict_types=1);

namespace App\Application\Contact\Dto;

final readonly class ContactIhboxCardDto
{
    public function __construct(
        public string $iconClass,
        public string $title,
        public string $description,
        public string $readMoreUrl,
        public string $readMoreLabel = 'Подробнее',
    ) {}
}
