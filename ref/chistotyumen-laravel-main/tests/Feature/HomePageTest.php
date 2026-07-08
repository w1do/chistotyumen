<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_returns_ok_and_seo_heading(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSeeInOrder(['Химчистка мягкой мебели', 'в Тюмени'], false);
        $response->assertDontSee('Xinterio', false);
        $response->assertSee('Если остались вопросы', false);
    }
}
