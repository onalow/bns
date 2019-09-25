<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\SendTransactionCompletedSignal;
use App\Events\CheckTransaction;
use Mail;
use App\Mail\TransactionReceived;
use App\Transaction;
use App\Test;
use GuzzleHttp\Client;

class PaymentFeedBack implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->data['status'] == 0) {

            $this->notifyPayment($this->data);
            
        }
        
    }

    private function notifyPayment($data)
    {
        
        $url = 'https://chain.api.btc.com/v3/address/'.$data['payment_address'];

        try{
           
            $trxn = Transaction::where('payment_id', $data->payment_id)->first();
            // dd($trxn);
            if ( ! $trxn->notified) {
                $client = new Client();

                $response = $client->get($url);

                $result = json_decode($response->getBody()->getContents());
                
                if (! is_null($result->data)) {
                    $trxn->notified = 1;
                    $trxn->save();
                   
                    event(new SendTransactionCompletedSignal($trxn));
                    Mail::to( $trxn->user)->send(new TransactionReceived($trxn));
               
                }
            }

        }catch(\Exception $e) {

            throw $e;
        }

            
    }
}
