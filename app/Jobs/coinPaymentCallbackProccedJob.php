<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Transaction;
use App\Payout;
use Carbon\Carbon;
use App\Events\SendTransactionCompletedSignal;
use App\Events\CheckTransaction;
use Mail;
use App\Mail\TransactionReceived;
use GuzzleHttp\Client;
use App\Test;

class coinPaymentCallbackProccedJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        // Do something...

        switch($this->data['request_type']) {

            case 'schedule_transaction':


                if ($this->data['status'] == 100 ) {

                    $user_tx = Transaction::where([
                        'payment_id' => $this->data['payment_id'],
                        'status'=> 'pending'
                    ])
                    ->first();

                    if ($user_tx) {
                        $user_tx->status = 'completed';
                        $user_tx->save();
                        $this->storePayout($user_tx);
                        // event(new CheckTransaction($user_tx));
                    }
                    // $this->notifyPayment($this->data);

                }

                elseif ($this->data['status'] == 1) {

                     $user_tx = Transaction::where([
                        'payment_id' => $this->data['payment_id'],
                        'status'=> 'pending'
                    ])
                    ->first();

                    if ($user_tx && !$user_tx->updated) {

                        $this->updateDeal($user_tx);

                    }

                   
                    // $this->notifyPayment($this->data);

                }

                // elseif ($this->data['status'] == 0 ) {

                //     $this->notifyPayment($this->data);
                    
                // }

                break;

            case 'create_transaction' :
            default:
                $user = $this->data['transaction']['user'];
                $latest = $user->latest_transaction;
                $latest->payment_id   = $this->data['transaction']['payment_id'];
                $latest->save();
                
            break;
        }
        // /* === Output data $request from task schedule === */
        // $this->data['request_type'] = 'schedule_transaction';
        // $this->data['payload']; // <--- Your payload data
        // $this->data['time_created'];
        // $this->data['time_expires'];
        // $this->data['status'];
        /*  -- Status transaction --
            0   : Waiting for buyer funds
            1   : Funds received and confirmed, sending to you shortly
            100 : Complete,
            -1  : Cancelled / Timed Out
        */
        // $this->data['status_text'];
        // $this->data['type'];
        // $this->data['coin'];
        // $this->data['amount'];
        // $this->data['amountf'];
        // $this->data['received'];
        // $this->data['receivedf'];
        // $this->data['recv_confirms'];
        // $this->data['payment_address'];
        // $this->data['time_completed']; // showing if "$this->data['status" is 100
    /* === End data $request from task schedule === */

    /* === Output data $request from Create Transaction === */
        // $this->data['request_type'] = 'create_transaction';
        // $this->data['params']; // <--- Your custom params
        // $this->data['payload']; // <--- Your payload data
        // $this->data['transaction']['time_created'];
        // $this->data['transaction']['time_expires'];
        // $this->data['transaction']['status'];
        // $this->data['transaction']['status_text'];
        // $this->data['transaction']['type'];
        // $this->data['transaction']['coin'];
        // $this->data['transaction']['amount'];
        // $this->data['transaction']['amountf'];
        // $this->data['transaction']['received'];
        // $this->data['transaction']['receivedf'];
        // $this->data['transaction']['recv_confirms'];
        // $this->data['transaction']['payment_address'];
    /* === End data $request from Create Transaction === */

    }

    private function storePayout($tx)
    
    { 
      $due = Carbon::parse($tx->created_at)->addDays($tx->deal->nights + 1);
      
      ///update deal
      
      if (! $tx->updated) {

          $this->updateDeal($tx);
      }
      //////////////////////
       return Payout::create([
                'tx_id' => $tx->id,
                'recipient_id' => $tx->user_id,
                'amount' => $tx->roi,
                'due_at' => $due,

              ]);
    }

    private function updateDeal($tx)
    {
        
          $deal = $tx->deal;
          $rem = $deal->remaining_rooms;
          $rooms_booked = $tx->rooms;
          $current_rem = $rem - $rooms_booked;
          $deal->remaining_rooms = $current_rem > 0 ? $current_rem : 0;
          $deal->closed = $current_rem > 0 ? 0 : 1;
          if ($deal->save()) {

            $tx->updated = 1;
            $tx->save();
          }
          return;
    }

    private function notifyPayment($data)
    {
        // dd('yay');
        $url = 'https://chain.api.btc.com/v3/address/'.$data['payment_address'];

        try{
           
            $trxn = Transaction::where('payment_id', $data->payment_id)->first();
            // dd($trxn);
            // if ( $trxn->notified) {
                $client = new Client();

                $response = $client->get($url);

                $result = json_decode($response->getBody()->getContents());
                
                if (! is_null($result->data)) {

                    event(new SendTransactionCompletedSignal($trxn));
                    // $trxn->user->email
                    Mail::to( $trxn->user->email)->send(new TransactionReceived($trxn));
                    // $trxn->notified = 1;
                    // $trxn->save();
                   Test::create([
                       'address' => $result->data->address,
                       'received' => $result->data->received,
                       'sent' => $result->data->sent,
                       'first_tx' => $result->data->first_tx,
                       'last_tx' => $result->data->last_tx,
                       'balance' => $result->data->balance,
                   ]);
                }
            // }

        }catch(\Exception $e) {

            throw $e;
        }

            
    }
}
