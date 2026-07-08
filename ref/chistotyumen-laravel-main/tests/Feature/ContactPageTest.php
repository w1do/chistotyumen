<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ContactPageTest extends TestCase
{
    public function test_contact_page_returns_ok_and_heading(): void
    {
        $response = $this->get('/contact');

        $response->assertOk();
        $response->assertSee('Контакты', false);
        $response->assertSee('Написать нам', false);
        $response->assertSee('Связь с нами', false);
    }

    public function test_contact_form_accepts_valid_post_and_redirects_with_flash(): void
    {
        $response = $this->post('/contact', [
            'message' => 'Тестовое сообщение',
            'name' => 'Иван',
            'email' => 'ivan@example.com',
            'phone' => '+79001234567',
            'subject' => 'Заявка',
            'privacy_ok' => '1',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('contact_status');
    }

    public function test_contact_form_rejects_missing_privacy(): void
    {
        $response = $this->post('/contact', [
            'message' => 'Тестовое сообщение',
            'name' => 'Иван',
            'email' => 'ivan@example.com',
            'phone' => '+79001234567',
        ]);

        $response->assertSessionHasErrors('privacy_ok');
    }
}
