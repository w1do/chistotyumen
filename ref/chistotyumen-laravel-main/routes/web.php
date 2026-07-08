<?php

declare(strict_types=1);

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\RobotsTxtController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/robots.txt', RobotsTxtController::class)->name('robots');

Volt::route('/', 'home')->name('home');
Volt::route('/uslugi', 'uslugi')->name('uslugi');
Volt::route('/contact', 'contact-us')->name('contact');

Route::post('/contact', ContactMessageController::class)
    ->middleware('throttle:8,1')
    ->name('contact.submit');
