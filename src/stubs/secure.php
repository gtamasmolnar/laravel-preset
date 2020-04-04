<?php

namespace App\Console\Commands;

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
        File::copy(__DIR__ . '/stubs/api.php', base_path('routes/api.php'));
        File::copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        File::copy(__DIR__.'/stubs/home.blade.php', resource_path('views/home.blade.php'));
        $this->info('Api user info has been removed.');
    }
}
