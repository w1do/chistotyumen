<?php

declare(strict_types=1);

return [
    'brand' => 'Пора Чистить',
    'site_url' => env('SITE_URL', 'https://chistotyumen.ru'),
    'phone' => env('SITE_PHONE', '+7 (908) 878-20-55'),
    'phone_tel' => env('SITE_PHONE_TEL', '+79088782055'),
    'telegram_url' => env(
        'SITE_MAX_URL',
        env('SITE_TELEGRAM_URL', 'https://max.ru/u/f9LHodD0cOL7oZPY9V0RcziBrFtDyicuiLZqjrOupQa0L66kRJ2Zb7hPK-E'),
    ),
    'maps_embed_url' => env(
        'SITE_MAPS_EMBED_URL',
        'https://maps.google.com/maps?q=%D0%A2%D1%8E%D0%BC%D0%B5%D0%BD%D1%8C&t=m&z=11&output=embed&iwloc=near',
    ),
];
