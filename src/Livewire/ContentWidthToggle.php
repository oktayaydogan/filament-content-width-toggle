<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Livewire;

use Livewire\Component;
use Oktayaydogan\FilamentContentWidthToggle\Support\ContentWidthResolver;

class ContentWidthToggle extends Component
{
    public function toggle(): void
    {
        $current = ContentWidthResolver::get();

        $next = $current === ContentWidthResolver::MODE_FULL
            ? ContentWidthResolver::MODE_CENTERED
            : ContentWidthResolver::MODE_FULL;

        ContentWidthResolver::set($next);

        // SPA'da anında uygula
        $this->dispatch('fcwt-updated', mode: $next);
    }

    public function render()
    {
        return view('filament-content-width-toggle::components.toggle');
    }
}
