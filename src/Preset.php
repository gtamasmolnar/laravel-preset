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
        static::updateViews();
        static::updateCss();
        static::updateModels();
        static::updateStubs();
        static::updateRoutes();
        static::updateMigrations();
        static::updateControllers();
        static::updateCommands();
        static::updateSeeds();
    }
    public static function cleanSassDirectory()
    {
//        File::cleanDirectory(resource_path('sass'));
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
    public static function updateMix()
    {
        File::copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }
    public static function updateRoutes()
    {
        File::copy(__DIR__ . '/stubs/routes/web.php', base_path('routes/web.php'));
        File::copy(__DIR__ . '/stubs/routes/api_0.php', base_path('routes/api.php'));
    }
    public static function updateStubs()
    {
        File::copy(__DIR__ . '/stubs/stubs/controller.api.stub', base_path('stubs/controller.api.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.model.api.stub', base_path('stubs/controller.model.api.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.model.stub', base_path('stubs/controller.model.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.nested.api.stub', base_path('stubs/controller.nested.api.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.nested.stub', base_path('stubs/controller.nested.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.plain.stub', base_path('stubs/controller.plain.stub'));
        File::copy(__DIR__ . '/stubs/stubs/controller.stub', base_path('stubs/controller.stub'));
        File::copy(__DIR__ . '/stubs/stubs/factory.stub', base_path('stubs/factory.stub'));
        File::copy(__DIR__ . '/stubs/stubs/middleware.stub', base_path('stubs/middleware.stub'));
        File::copy(__DIR__ . '/stubs/stubs/migration.create.stub', base_path('stubs/migration.create.stub'));
        File::copy(__DIR__ . '/stubs/stubs/migration.stub', base_path('stubs/migration.stub'));
        File::copy(__DIR__ . '/stubs/stubs/migration.update.stub', base_path('stubs/migration.update.stub'));
        File::copy(__DIR__ . '/stubs/stubs/model.pivot.stub', base_path('stubs/model.pivot.stub'));
        File::copy(__DIR__ . '/stubs/stubs/model.stub', base_path('stubs/model.stub'));
        File::copy(__DIR__ . '/stubs/stubs/request.stub', base_path('stubs/request.stub'));
        File::copy(__DIR__ . '/stubs/stubs/seeder.stub', base_path('stubs/seeder.stub'));
    }
    public static function updateModels()
    {
        File::copy(__DIR__ . '/stubs/app/User.php', app_path('User.php'));
        File::copy(__DIR__ . '/stubs/app/Role.php', app_path('Role.php'));
        File::copy(__DIR__ . '/stubs/app/RoleUser.php', app_path('RoleUser.php'));
    }
    public static function updateControllers()
    {
        File::copy(__DIR__ . '/stubs/app/Http/Controllers/Md5Controller.php', app_path('Http/Controllers/Md5Controller.php'));
        File::copy(__DIR__ . '/stubs/app/Http/Controllers/Auth/RegisterController.php', app_path('Http/Controllers/Auth/RegisterController.php'));
    }
    public static function updateMigrations()
    {
        File::copy(__DIR__ . '/stubs/database/migrations/2014_10_12_000000_create_users_table.php', base_path('database/migrations/2014_10_12_000000_create_users_table.php'));
    }
    public static function updateSeeds()
    {
        File::copy(__DIR__ . '/stubs/database/seeds/DatabaseSeeder.php', base_path('database/migrations/DatabaseSeeder.php'));
        File::copy(__DIR__ . '/stubs/database/seeds/RoleSeeder.php', base_path('database/migrations/RoleSeeder.php'));
        File::copy(__DIR__ . '/stubs/database/seeds/RoleUserSeeder.php', base_path('database/migrations/RoleUserSeeder.php'));
        File::copy(__DIR__ . '/stubs/database/seeds/UserSeeder.php', base_path('database/migrations/UserSeeder.php'));
    }
    public static function updateCss()
    {
        File::copy(__DIR__ . '/stubs/resources/css/mycss.css', resource_path('css/mycss.css'));
    }
    public static function updateScripts()
    {
        File::copy(__DIR__ . '/stubs/resources/js/_app.js', resource_path('js/app.js'));
        File::copy(__DIR__ . '/stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
        File::copy(__DIR__ . '/stubs/resources/js/components/_ExampleComponent.vue', resource_path('js/components/ExampleComponent.vue'));
    }
    public static function updateViews()
    {
        File::copy(__DIR__ . '/stubs/resources/views/_home.blade.php', resource_path('views/home.blade.php'));
        File::copy(__DIR__ . '/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        File::copy(__DIR__ . '/stubs/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
    }
    public static function updateCommands()
    {
        File::copy(__DIR__ . '/stubs/app/Console/Commands/Secure.php', app_path('Console/Commands/Secure.php'));
    }
}
