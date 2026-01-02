<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class ContentWidthResolver
{
    public static function resolve(): string
    {
        if (Cache::has(self::cacheKey())) {
            return Cache::get(self::cacheKey());
        }

        if (Request::has('_content_width')) {
            return Request::get('_content_width');
        }

        return 'centered';
    }

    protected static function cacheKey(): string
    {
        return 'filament_content_width';
    }
}
