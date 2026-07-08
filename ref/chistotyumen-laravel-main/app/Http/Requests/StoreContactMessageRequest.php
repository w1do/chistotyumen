<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:5000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:64'],
            'subject' => ['nullable', 'string', 'max:255'],
            'privacy_ok' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'message' => 'сообщение',
            'name' => 'имя',
            'email' => 'email',
            'phone' => 'телефон',
            'subject' => 'тема',
            'privacy_ok' => 'согласие на обработку данных',
        ];
    }
}
