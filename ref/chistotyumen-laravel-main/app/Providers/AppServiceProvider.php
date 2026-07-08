<?php

declare(strict_types=1);

namespace App\Providers;

use Artesaos\SEOTools\SEOTools as SEOToolsRoot;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (config('app.force_https')) {
            URL::forceScheme('https');
        }

        SEOToolsRoot::macro('landingHome', function (
            string $title,
            string $description,
            string $canonical,
            string $ogImageAbsoluteUrl,
            array $jsonLdGraph,
        ): void {
            /** @var SEOToolsRoot $this */
            $this->setTitle($title, false);
            $this->setDescription($description);
            $this->setCanonical($canonical);
            $this->addImages($ogImageAbsoluteUrl);
            $this->opengraph()->setUrl($canonical);
            $this->metatags()->setRobots('index, follow');

            $multi = $this->jsonLdMulti();
            foreach ($jsonLdGraph as $index => $block) {
                if ($index > 0) {
                    $multi->newJsonLd();
                } else {
                    $multi->select(0);
                }
                $type = (string) ($block['@type'] ?? '');
                $multi->setType($type);
                foreach ($block as $key => $value) {
                    if (in_array($key, ['@context', '@type'], true)) {
                        continue;
                    }
                    $multi->addValue((string) $key, $value);
                }
            }
        });
    }
}
