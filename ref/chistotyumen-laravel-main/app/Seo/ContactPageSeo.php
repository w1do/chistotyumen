<?php

declare(strict_types=1);

namespace App\Seo;

final class ContactPageSeo
{
    public const string TITLE = 'Контакты Пора Чистить — химчистка дивана с выездом в Тюмени';

    public const string DESCRIPTION = 'Связь с Пора Чистить: телефон, MAX и форма заявки. Закажите выезд мастера по химчистке дивана и мягкой мебели в Тюмени и области.';

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function jsonLdGraph(string $pageUrl, string $siteUrl, string $brand, string $telephone): array
    {
        return [
            [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
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
                'telephone' => $telephone,
            ],
        ];
    }
}
