<?php

namespace App\Console\Commands;

use App\Models\Motorcycle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DvlaCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dvla:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $motorcycles = Motorcycle::where('availability', '=', 'for rent');

        $motorcycles = Motorcycle::whereNull('mot_expiry_date');

        foreach ($motorcycles as $motorcycle) {
            $response = Http::withHeaders([
                'x-api-key' => '5i0qXnN6SY3blfoFeWvlu9sTQCSdrf548nMS8vVO',
                'Content-Type' => 'application/json',
            ])->post('https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles', [
                'registrationNumber' => $motorcycle->registration,
            ]);

            $request = json_decode($response->body());

            Motorcycle::findOrFail($motorcycle->id)->update([
                'tax_status' => $request->taxStatus,
                'tax_due_date' => $request->taxDueDate,
                'mot_status' => $request->motStatus,
                'mot_expiry_date' => $request->motExpiryDate,
            ]);
        }
    }
}
