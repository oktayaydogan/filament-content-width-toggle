<?php

namespace Oktayaydogan\FilamentContentWidthToggle\Commands;

use Illuminate\Console\Command;

class FilamentContentWidthToggleCommand extends Command
{
    public $signature = 'filament-content-width-toggle';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
