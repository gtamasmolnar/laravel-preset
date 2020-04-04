<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class secure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:secure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        File::copy(base_path('vendor/tamas/preset/src/stubs/routes/api.php'), base_path('routes/api.php'));
        File::copy(base_path('vendor/tamas/preset/src/stubs/resources/js/app.js'), resource_path('js/app.js'));
        File::copy(base_path('vendor/tamas/preset/src/stubs/resources/views/home.blade.php'), resource_path('views/home.blade.php'));
        File::copy(base_path('vendor/tamas/preset/src/stubs/resources/js/components/ExampleComponent.vue'), resource_path('js/components/ExampleComponent.vue'));

        $this->info('Api user info has been removed.');
    }
}
