<?php

declare(strict_types=1);

namespace App\Controllers;

use Arix\Views\Contracts\View;

class DowndloadController
{
    public function index(): View
    {
        return view('downloads.index', [
            'title' => trans('downloads.title'),
            'description' => trans('downloads.description'),
        ]);
    }
}
