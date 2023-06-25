<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RunServer extends Command
{
    protected $signature = 'run';

    protected $description = 'Start the development server';

    public function handle()
    {
        $this->info('Starting the development server...');
        exec('php -S localhost:8000 -t public');
        Log::info("siteye giriş yapıldı");
    }
}
