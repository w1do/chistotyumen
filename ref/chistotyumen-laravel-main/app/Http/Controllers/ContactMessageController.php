<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ContactMessageController extends Controller
{
    public function __invoke(StoreContactMessageRequest $request): RedirectResponse
    {
        $data = $request->safe()->only(['message', 'name', 'email', 'phone', 'subject']);
        Log::channel('single')->info('contact.form', $data);

        return redirect()
            ->route('contact')
            ->with('contact_status', 'Спасибо, заявка отправлена. Мы свяжемся с вами в ближайшее время.');
    }
}
