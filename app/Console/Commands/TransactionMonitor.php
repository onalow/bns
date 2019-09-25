<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Hexters\CoinPayment\Jobs\webhookProccessJob;
use App\Jobs\coinPaymentCallbackProccedJob;

use Hexters\CoinPayment\Entities\cointpayment_log_trx as logs;
use Carbon\Carbon;
use CoinPayment;
use App\Payout;

use Route;

class TransactionMonitor extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'payment:transaction-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking transaction status';

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
     
        // Parameter hook
        $this->info('======================= CHECKING STARTING =======================');

        logs::whereIn('status', [0, 1, 100])->where('expired', '>', Carbon::now())
          ->chunk(100, function($transactions){
            foreach($transactions as $trx){
              $this->async_proccess($trx, function($check) use ($trx){

                if($check['error'] == 'ok'){
                  $data = $check['result'];
                  $this->info('Address: ' . $data['payment_address']);
                  if($data['status'] > 0 || $data['status'] < 0){
                  
                    $data['payment_id'] = $trx->payment_id;

                    $trx->update([
                      'status_text' => $data['status_text'],
                      'status' => $data['status'],
                      'confirmation_at' => ((INT) $data['status'] == 100) ? date('Y-m-d H:i:s', $data['time_completed']) : null
                    ]);
                    
                    /////////////////////////////////
                    // if ($data['status'] === 100) {
                        
                    //     $user_tx = Transaction::where(['payment_id' => $trx->payment_id, 'status'=> 'pending'])->first();
                    //     if ($user_tx) {
                    //         $user_tx->status = 'completed';
                    //         $user_tx->save();

                    //         $this->storePayout($user_tx);
                    //     }
                        
                    //     ////////////store payout
                       
                    // }
                    /////////////////////////
                    $this->info('Status : ' . $data['status_text']);

                    // Send hook
                    $this->info('======================= SENDING WEBHOOK =======================');
                    // $data['payload'] = (Array) json_decode($trx->payload, true);
                    $data['request_type'] = 'schedule_transaction';
                    // $data['payment_id'] = $trx->payment_id;
                    if(Route::has('coinpayment.webhook')){
                      dispatch(new webhookProccessJob($data));
                    }
                    dispatch(new coinPaymentCallbackProccedJob($data));
                  }
                }
                
              });
            }
          });
    }

    private function async_proccess($trx, $callback){
        
        $check = CoinPayment::api_call('get_tx_info', [
          'txid' => $trx->payment_id
        ]);
        return $callback($check);
    }

    public function storePayout($tx)
    { 
      
      $due = Carbon::parse($tx->created_at)->addDays($tx->deal->nights);
      
      ///update deal
      $this->updateDeal($tx);
      //////////////////////
       return Payout::create([
                'tx_id' => $tx->id,
                'recipient_id' => $tx->user_id,
                'amount' => $tx->roi,
                'due_at' => $due,

              ]);
    }

    public function updateDeal($tx)
    {
      $deal = $tx->deal;
      $rem = $deal->remaining_rooms;
      $rooms_booked = $tx->rooms;
      $current_rem = $rem - $rooms_booked;
      $deal->remaining_rooms = $current_rem > 0 ? $current_rem : 0;
      $deal->closed = $current_rem > 0 ? 0 : 1;
      return $deal->save();
    }
}
