<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentSent extends Mailable
{
    
    use Queueable, SerializesModels;
     

    public $payout;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payout)
    {
        $this->payout = $payout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails._payout')
                    ->subject('Payment Sent')
                    ->from(env('MAIL_ADDRESS_FROM'), env('SEND_FROM_NAME'));
    }
    
}
