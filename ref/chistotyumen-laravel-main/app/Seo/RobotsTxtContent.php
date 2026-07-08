<?php

declare(strict_types=1);

namespace App\Seo;

final class RobotsTxtContent
{
    public static function build(string $sitemapAbsoluteUrl): string
    {
        $lines = [
            'User-agent: *',
            'Disallow:',
            '',
            'Sitemap: '.$sitemapAbsoluteUrl,
        ];

        return implode("\n", $lines)."\n";
    }
}
