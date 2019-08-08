<?php

namespace App\Console\Commands;

use App\Customer;
use App\Notifications\AlertExpiryNotification;
use App\Website;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AlertExpiryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:alertexpiry';

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
        $websites = Website::query()
            ->where('expires_on', '>', Carbon::now()->subWeeks(2))
            ->get();
        if ($websites !== null) {
            foreach ($websites as $website) {
                $customer = Customer::query()->findOrFail($website->customer_id);
                $customer->notify(new AlertExpiryNotification($website));
            }
        }
    }
}
