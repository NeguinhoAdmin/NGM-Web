<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MotorcycleController;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily updates including payment data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return (new MotorcycleController)->nextRentalPayment();
        return (new MotorcycleController)->createBill(59);

        return Command::SUCCESS;
    }
}
