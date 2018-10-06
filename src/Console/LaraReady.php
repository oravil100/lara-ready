<?php

namespace Oravil\LaraReady\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class LaraReady extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laraReady';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Laravel Installer With Laravel Admin';

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
        $this->call('vendor:publish --tag=laravelinstaller');
    }
}
