<?php

declare(strict_types=1);

namespace App\Seo;

final class LandingHomeSeo
{
    public const string TITLE = 'Химчистка мягкой мебели в Тюмени цена от 5000 ₽ | Пора Чистить';

    public const string DESCRIPTION = 'Профессиональная химчистка дивана и мягкой мебели с выездом в Тюмени. Сушка осушителем, безопасная химия, ориентиры по ценам после фото. Заказать выезд по оценке фото';

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function jsonLdGraph(string $pageUrl, string $siteUrl, string $brand): array
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
                '@type' => 'Organization',
                'name' => $brand,
                'url' => $siteUrl,
            ],
        ];
    }
}
