<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class HeroSlideDto
{
    /**
     * @param  list<string>  $titleLines
     * @param  list<string>  $descriptionLines
     */
    public function __construct(
        public string $backgroundImage,
        public bool $isPrimaryHeading,
        public array $titleLines,
        public array $descriptionLines,
        public string $ctaLabel,
        public string $ctaUrl,
    ) {}
}
