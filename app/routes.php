<?php

declare(strict_types=1);

use App\Controllers\DowndloadController;
use App\Controllers\WelcomeController;
use Arix\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/downloads', [DowndloadController::class, 'index'])->name('downloads');
