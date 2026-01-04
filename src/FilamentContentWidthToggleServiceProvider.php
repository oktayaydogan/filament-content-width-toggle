<?php

namespace Oktayaydogan\FilamentContentWidthToggle;

use Livewire\Livewire;
use Oktayaydogan\FilamentContentWidthToggle\Livewire\ContentWidthToggle;
use Illuminate\Support\Facades\View;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Facades\FilamentView;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Oktayaydogan\FilamentContentWidthToggle\Commands\FilamentContentWidthToggleCommand;
use Oktayaydogan\FilamentContentWidthToggle\Testing\TestsFilamentContentWidthToggle;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentContentWidthToggleServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-content-width-toggle';

    public static string $viewNamespace = 'filament-content-width-toggle';

    public function boot(): void
    {
        View::addNamespace(
            'filament-content-width-toggle',
            __DIR__ . '/../resources/views'
        );
        FilamentView::registerRenderHook(
            'panels::main.start',
            fn () => view('filament-content-width-toggle::layout-width')
        );
        FilamentView::registerRenderHook(
            'panels::head.end',
            fn () => view('filament-content-width-toggle::style')
        );
        Livewire::component('filament-content-width-toggle', ContentWidthToggle::class);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('oktayaydogan/filament-content-width-toggle');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-content-width-toggle/{$file->getFilename()}"),
                ], 'filament-content-width-toggle-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentContentWidthToggle);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'oktayaydogan/filament-content-width-toggle';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-content-width-toggle', __DIR__ . '/../resources/dist/components/filament-content-width-toggle.js'),
            Css::make('filament-content-width-toggle-styles', __DIR__ . '/../resources/dist/filament-content-width-toggle.css'),
            Js::make('filament-content-width-toggle-scripts', __DIR__ . '/../resources/dist/filament-content-width-toggle.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentContentWidthToggleCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-content-width-toggle_table',
        ];
    }
}
