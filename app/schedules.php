<?php

declare(strict_types=1);

use App\Services\Releases;
use Arix\Scheduling\Schedule;

return static function (Schedule $schedule): void {
    $schedule->call('releases:sync', static function (): void {
        new Releases()->sync();
    })->hourly();
};
