<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class TestimonialSectionDto
{
    /**
     * @param  list<TestimonialDto>  $items
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public array $items,
        public string $ratingValue,
        public string $ratingCaption,
    ) {}
}
