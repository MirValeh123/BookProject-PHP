<?php

namespace App\Console\Commands;
use App\Jobs\UseJob;
use App\Models\User;
use Illuminate\Console\Command;

class DelNormalUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting Users Who have not permission...';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        // $x=User::where('permission','!=',1)->delete();
        UseJob::dispatch();
        return Command::SUCCESS;
    }
}
