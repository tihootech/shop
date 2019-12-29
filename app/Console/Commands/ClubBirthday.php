<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TextMessageController;
use App\Customer;

class ClubBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'club:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Customers club birthday gift';

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
        $current_day =  date('d', strtotime('now'));
        $current_month =  date('m', strtotime('now'));
        $customers = Customer::whereMonth('birthday', $current_month)->whereDay('birthday', $current_day)->get();
        foreach ($customers as $key => $customer) {
            $amount = website('club_birthday_gift');
            if ($amount) {
                $customer->assign_credit($amount);
                $tokens = [number_format($amount), '', '', website('title')];
                TextMessageController::lookup($customer->mobile, $tokens, 'clubbirthday' );
            }
        }
    }
}
