<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class FaqSectionDto
{
    /**
     * @param  list<FaqItemDto>  $leftColumn
     * @param  list<FaqItemDto>  $rightColumn
     */
    public function __construct(
        public string $anchorId,
        public string $leftAccordionId,
        public string $rightAccordionId,
        public string $subtitle,
        public string $title,
        public string $intro,
        public array $leftColumn,
        public array $rightColumn,
    ) {}
}
