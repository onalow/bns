<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $trxn;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trxn)
    {
        $this->trxn = $trxn;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transaction-received')
                    ->from(env('MAIL_ADDRESS_FROM'), env('SEND_FROM_NAME'))
                    ->subject('Payment  Confirmed - NextBeux');
    }
}
