<?php

declare(strict_types=1);

namespace App\Application\Home\Dto;

final readonly class BlogSectionDto
{
    /**
     * @param  list<BlogPostDto>  $posts
     */
    public function __construct(
        public string $subtitle,
        public string $title,
        public array $posts,
        public string $seeAllLabel,
        public string $seeAllUrl,
    ) {}
}
