<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Support;

class ContentWidthManager
{
    public const MODE_FULL = 'full';

    public const MODE_CENTERED = 'centered';

    public static function resolveMaxWidthClass(string $mode, string $centeredWidth): string
    {
        if ($mode === self::MODE_FULL) {
            return 'max-w-full';
        }

        // centered
        // Filament/Tailwind standard: max-w-7xl, max-w-6xl ...
        return 'max-w-' . $centeredWidth;
    }
}
