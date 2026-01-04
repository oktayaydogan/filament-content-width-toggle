<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Support;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ContentWidthResolver
{
    public const MODE_FULL = 'full';

    public const MODE_CENTERED = 'centered';

    public static function get(): string
    {
        if (config('cache.default') === 'array') {
            return self::MODE_CENTERED;
        }

        return Cache::get(self::key(), self::MODE_CENTERED);
    }

    public static function set(string $mode): void
    {
        Cache::put(self::key(), $mode, now()->addDays(30));
    }

    protected static function key(): string
    {
        $userId = Auth::id() ?? 'guest';

        return "filament_content_width:{$userId}";
    }
}
