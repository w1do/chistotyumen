<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Seo\RobotsTxtContent;
use Illuminate\Http\Response;

final class RobotsTxtController extends Controller
{
    public function __invoke(): Response
    {
        $sitemapUrl = rtrim(config('app.url'), '/').'/sitemap.xml';

        return response(
            RobotsTxtContent::build($sitemapUrl),
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8']
        );
    }
}
