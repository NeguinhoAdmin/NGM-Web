<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MotorcycleController;

class newBill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:bill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic creation of new rental payment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
