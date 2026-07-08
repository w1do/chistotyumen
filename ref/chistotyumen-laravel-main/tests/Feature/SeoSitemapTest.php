<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SeoSitemapTest extends TestCase
{
    public function test_robots_txt_is_ok_and_points_to_sitemap(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $base = rtrim(config('app.url'), '/');
        $response->assertSee('Sitemap: '.$base.'/sitemap.xml', false);
    }

    public function test_sitemap_command_writes_urls_for_public_routes(): void
    {
        Artisan::call('seo:generate-sitemap');

        $path = public_path('sitemap.xml');
        $this->assertFileExists($path);

        $xml = file_get_contents($path);
        $this->assertNotFalse($xml);
        $this->assertStringContainsString(route('home', [], true), $xml);
        $this->assertStringContainsString(route('uslugi', [], true), $xml);
        $this->assertStringContainsString(route('contact', [], true), $xml);
    }
}
