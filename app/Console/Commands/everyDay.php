<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MotorcycleController;
use App\Models\User;
use App\Mail\RentalDue;
use App\Models\Motorcycle;
use App\Models\RentalPayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

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
    public function handle(): void
    {
        info("Cron Job running at " . now());

        /**
         * Find and create all nextRentalPayments
         */
        // Date calculations
        $today = Carbon::now('Europe/London');
        $tomorrow = $today->addDay();
        $nextPayDate = Carbon::now()->addDays(7);

        // Find motocycles due for rental payment next day
        $motorcycles = Motorcycle::where('next_payment_date', '=', $tomorrow->toDateString())->get();

        // if (!empty($motorcycles)) {
        foreach ($motorcycles as $key => $motorcycle) {
            // Set next payment date
            Motorcycle::findOrFail($motorcycle->id)->update([
                'next_payment_date' => Carbon::now()->addDays(8),
            ]);

            // Send renter email reminder for next day payment
            $user = User::where('id', $motorcycle->user_id)->first();
            Mail::to($user->email)->send(new RentalDue($user));

            // Create following weeks bill
            $rentalPrice = $motorcycle->rental_price;
            // $nextPayDate = $motorcycle->next_payment_date;

            $payment = new RentalPayment();
            $payment->payment_type = 'rental';
            $payment->payment_due_date = $nextPayDate;
            $payment->payment_date = null;
            $payment->rental_price = $rentalPrice;
            $payment->registration = $motorcycle->registration;
            $payment->received = 0.00;
            $payment->outstanding = $rentalPrice;
            $payment->user_id = $motorcycle->user_id;
            $payment->created_at = $today;
            $payment->motorcycle_id = $motorcycle->id;
            $payment->save();

            // Apply late payment fees if applicaable
            // Day 1 £10
            // Day 2 £30
            // Day 3 £50
            // Day 4 £70
            // Day 5 £90
            // Day 6 £110
            // Day 7 130
        }
    }
}
