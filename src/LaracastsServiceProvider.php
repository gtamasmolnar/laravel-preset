<?php

namespace Laracasts\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class LaracastsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('lara', function($command) {
            Preset::install();
        });
    }
}