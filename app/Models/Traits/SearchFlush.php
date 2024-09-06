<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Artisan;

trait SearchFlush
{
    public static function flushSearchIndex(): void
    {
        Artisan::call('scout:flush', [
            'model' => self::class,
        ]);

        Artisan::call('scout:import', [
            'model' => self::class,
        ]);
    }
}
