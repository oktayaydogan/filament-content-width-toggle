<?php

namespace Oktayaydogan\FilamentContentWidthToggle;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthManager;
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthResolver;

class FilamentContentWidthTogglePlugin implements Plugin
{
    protected string $defaultWidth = '7xl';

    protected bool $displayToggleAction = true;

    protected string $defaultMode = ContentWidthManager::MODE_CENTERED;

    protected string $toggleActionHook = PanelsRenderHook::TOPBAR_END;

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

    public function defaultMode(string $mode): static
    {
        $this->defaultMode = $mode;

        return $this;
    }

    public function toggleActionHook(string $hook): static
    {
        $this->toggleActionHook = $hook;

        return $this;
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        if (! $this->displayToggleAction) {
            return;
        }

        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_PROFILE_AFTER,
            fn (): string => Blade::render("@livewire('filament-content-width-toggle')")
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            function () {
                $mode = ContentWidthResolver::get();

                return <<<HTML
                <script>
                    document.documentElement.dataset.fcwt = "{$mode}";
                </script>
                HTML;
            }
        );
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
