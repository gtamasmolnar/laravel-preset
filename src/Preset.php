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
        static::updatePhpFiles();
        static::updateCss();
        static::updateUserModel();
        static::updateStubs();
        static::updateRoutes();
    }

    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('sass'));
    }

    public static function createDirectories()
    {
        File::makeDirectory(resource_path('css'));
        File::makeDirectory(app_path('Services'));
        File::makeDirectory(app_path('Console/Commands'));
        File::makeDirectory(resource_path('views/tag'));
        File::makeDirectory(resource_path('views/role'));
        File::makeDirectory(resource_path('views/user'));
    }

    public static function updatePackageArray($packages)
    {
        return Arr::except($packages, [
            'popper.js',
            'lodash',
        ]);
    }

    // copy to base_path
    public static function updateMix()
    {
        File::copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }
    public static function updateRoutes()
    {
        File::copy(__DIR__.'/stubs/web.php', base_path('routes/web.php'));
        File::copy(__DIR__ . '/stubs/api_0.php', base_path('routes/api.php'));
    }
    public static function updateStubs()
    {
        File::copy(__DIR__.'/stubs/controller.api.stub', base_path('stubs/controller.api.stub'));
        File::copy(__DIR__.'/stubs/controller.model.api.stub', base_path('stubs/controller.model.api.stub'));
        File::copy(__DIR__.'/stubs/controller.model.stub', base_path('stubs/controller.model.stub'));
        File::copy(__DIR__.'/stubs/controller.nested.api.stub', base_path('stubs/controller.nested.api.stub'));
        File::copy(__DIR__.'/stubs/controller.nested.stub', base_path('stubs/controller.nested.stub'));
        File::copy(__DIR__.'/stubs/controller.plain.stub', base_path('stubs/controller.plain.stub'));
        File::copy(__DIR__.'/stubs/controller.stub', base_path('stubs/controller.stub'));
        File::copy(__DIR__.'/stubs/factory.stub', base_path('stubs/factory.stub'));
        File::copy(__DIR__.'/stubs/middleware.stub', base_path('stubs/middleware.stub'));
        File::copy(__DIR__.'/stubs/migration.create.stub', base_path('stubs/migration.create.stub'));
        File::copy(__DIR__.'/stubs/migration.stub', base_path('stubs/migration.stub'));
        File::copy(__DIR__.'/stubs/migration.update.stub', base_path('stubs/migration.update.stub'));
        File::copy(__DIR__.'/stubs/model.pivot.stub', base_path('stubs/model.pivot.stub'));
        File::copy(__DIR__.'/stubs/model.stub', base_path('stubs/model.stub'));
        File::copy(__DIR__.'/stubs/request.stub', base_path('stubs/request.stub'));
        File::copy(__DIR__.'/stubs/seeder.stub', base_path('stubs/seeder.stub'));
    }

    // copy to app_path
    public static function updateUserModel()
    {
        File::copy(__DIR__.'/stubs/User.php', app_path('User.php'));
    }

    // copy to resource_path
    public static function updateCss()
    {
        File::copy(__DIR__.'/stubs/mycss.css', resource_path('css/mycss.css'));
    }
    public static function updateScripts()
    {
        File::copy(__DIR__.'/stubs/app_0.js', resource_path('js/app.js'));
        File::copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
        File::copy(__DIR__.'/stubs/ExampleComponent_0.vue', resource_path('js/components/ExampleComponent.vue'));
    }
    public static function updatePhpFiles()
    {
        File::copy(__DIR__ . '/stubs/home_0.blade.php', resource_path('views/home.blade.php'));
        File::copy(__DIR__.'/stubs/app.blade.php', resource_path('views/layouts/app.blade.php'));
        File::copy(__DIR__.'/stubs/secure.php', app_path('Console/Commands/secure.php'));
    }

}
