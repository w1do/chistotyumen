<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class UslugiPageTest extends TestCase
{
    public function test_uslugi_page_returns_ok_and_core_content(): void
    {
        $response = $this->get('/uslugi');

        $response->assertOk();
        $response->assertSee('Химчистка мягкой мебели', false);
        $response->assertSee('Частые вопросы', false);
        $response->assertDontSee('Xinterio', false);
    }
}
