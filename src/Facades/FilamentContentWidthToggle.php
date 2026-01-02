<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Oktayaydogan\FilamentContentWidthToggle\FilamentContentWidthToggle
 */
class FilamentContentWidthToggle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Oktayaydogan\FilamentContentWidthToggle\FilamentContentWidthToggle::class;
    }
}
