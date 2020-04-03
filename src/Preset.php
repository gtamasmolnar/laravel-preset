<?php


namespace Laracasts\LaravelPreset;

use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset as LaravelPreset;
use Illuminate\Support\Arr;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::cleanSassDirectory();
        static::createDirectories();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::updateBladeFiles();
        static::updateCss();
    }

    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
    }

    public static function createDirectories()
    {
        File::makeDirectory(resource_path('css'));
        File::makeDirectory(app_path('Services'));
    }

    public static function updatePackageArray($packages)
    {
        return Arr::except($packages, [
            'popper.js',
            'lodash',
        ]);
    }

    public static function updateMix()
    {
        File::copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        File::copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        File::copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateBladeFiles()
    {
        File::copy(__DIR__.'/stubs/home.blade.php', resource_path('views/home.blade.php'));
        File::copy(__DIR__.'/stubs/app.blade.php', resource_path('views/layouts/app.blade.php'));
    }

    public static function updateCss()
    {
        File::copy(__DIR__.'/stubs/mycss.css', resource_path('css/mycss.css'));
    }

    public static function platzhalter()
    {
        //
    }
}
