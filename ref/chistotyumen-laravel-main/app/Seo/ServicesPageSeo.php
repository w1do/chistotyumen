<?php

declare(strict_types=1);

namespace App\Seo;

final class ServicesPageSeo
{
    public const string TITLE = 'Услуги Пора Чистить — химчистка диванов и мягкой мебели с выездом в Тюмени';

    public const string DESCRIPTION = 'Выездная химчистка диванов, угловых, кресел и матрасов в Тюмени: протокол работы, сушка техникой мастера, согласование цены до визита. Пора Чистить.';

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function jsonLdGraph(string $pageUrl, string $siteUrl, string $brand, string $telephone): array
    {
        return [
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => self::TITLE,
                'description' => self::DESCRIPTION,
                'url' => $pageUrl,
                'inLanguage' => 'ru-RU',
                'isPartOf' => [
                    '@type' => 'WebSite',
                    'url' => $siteUrl,
                    'name' => $brand,
                ],
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => 'Химчистка мягкой мебели с выездом',
                'provider' => [
                    '@type' => 'Organization',
                    'name' => $brand,
                    'url' => $siteUrl,
                    'telephone' => $telephone,
                ],
                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Тюмень',
                ],
                'url' => $pageUrl,
            ],
        ];
    }
}
