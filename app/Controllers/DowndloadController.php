<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Releases;
use Arix\Views\Contracts\View;

use function array_slice;

class DowndloadController
{
    public function index(): View
    {
        $releases = new Releases()->read();

        return view('downloads.index', [
            'title' => trans('downloads.title'),
            'description' => trans('downloads.description'),
            'latest' => $releases[0] ?? null,
            'previous' => array_slice($releases, 1),
        ]);
    }
}
