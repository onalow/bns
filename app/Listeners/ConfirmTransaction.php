<?php

namespace App\Listeners;

use App\Events\CheckTransaction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Mail;
use App\Mail\TransactionReceived;

class ConfirmTransaction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckTransaction  $event
     * @return void
     */
    public function handle(CheckTransaction $event)
    {
        $tx = $event->data;

        $to = $tx->user->email;
        // $to = 'oriebizline@gmail.com';

        Mail::to($to)->send(new TransactionReceived($tx));

    }
}
