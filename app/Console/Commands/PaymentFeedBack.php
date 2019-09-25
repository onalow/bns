<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\PaymentFeedBack as FeedBack;
use Hexters\CoinPayment\Entities\cointpayment_log_trx as Logs;


class PaymentFeedBack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:feedback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give instant response to user after payment';

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
        // $latest = Logs::where('status', 0)->first();
        $latest = Logs::latest()->first();

        dispatch(new FeedBack($latest));
    }
}
