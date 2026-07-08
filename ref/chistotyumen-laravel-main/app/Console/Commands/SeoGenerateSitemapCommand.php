<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

final class SeoGenerateSitemapCommand extends Command
{
    protected $signature = 'seo:generate-sitemap';

    protected $description = 'Write public/sitemap.xml with static public URLs (Spatie)';

    public function handle(): int
    {
        $now = Carbon::now();

        $entries = [
            ['route' => 'home', 'priority' => 1.0, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'uslugi', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'contact', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];

        $sitemap = Sitemap::create();

        foreach ($entries as $entry) {
            $sitemap->add(
                Url::create(route($entry['route']))
                    ->setLastModificationDate($now)
                    ->setChangeFrequency($entry['freq'])
                    ->setPriority($entry['priority'])
            );
        }

        $path = public_path('sitemap.xml');
        $sitemap->writeToFile($path);

        $this->info('Sitemap written to '.$path);

        return self::SUCCESS;
    }
}
