<?php

namespace Oktayaydogan\FilamentContentWidthToggle;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentContentWidthTogglePlugin implements Plugin
{
    protected string $defaultWidth = '7xl';

    protected bool $displayToggleAction = true;

    public function getId(): string
    {
        return 'filament-content-width-toggle';
    }

    public function defaultWidth(string $width): static
    {
        $this->defaultWidth = $width;

        return $this;
    }

    public function displayToggleAction(bool $condition = true): static
    {
        $this->displayToggleAction = $condition;

        return $this;
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
