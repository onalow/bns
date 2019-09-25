<?php

namespace App\Http\Controllers;
use App\Deal;
use App\Transaction;
use CoinPayment;

use Illuminate\Http\Request;
use Alert;

class DealController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['deals']  = Deal::with('hotel')
       ->where('major', 0)
       ->where('hidden', 0)
       ->orderBy('updated_at','DESC')
       ->get();
       $data['hot_deals'] = Deal::with('hotel')
       ->where( 'major', 1)
       ->where('hidden', 0)
       ->orderBy('updated_at','DESC')
       ->get();
     // dd(auth()->user()->transactions[2]->coinpayment_trx);
       
       return view('welcome', $data);
   }

   public function home (){
    $data['deals']  = Deal::with('hotel')
    ->where( 'major', 0)
    ->get();
    $data['hot_deals'] = Deal::with('hotel')
    ->where( 'major', 1)
    ->get();

    return view('home', $data);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req, Deal $deal)
    {
       return view('deal', compact('deal'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Deal $deal)
    {
        $this->validate($request, [

            'rooms' => 'required'
        ], [
            'rooms.required' => 'Specify the number of rooms you want to buy'
        ]);

        $rooms_wanted = abs((int)$request->rooms);
        $rooms_available = $deal->remaining_rooms;



        if ($rooms_wanted >  $rooms_available ) {

            Alert::error('You\'ve specified more than the available rooms')->persistent('OK');
            return back();
        }
        elseif ($rooms_wanted < 1 ) {

            Alert::error('The value you entered is invalid')->persistent('OK');
            return back();
        }
        else{

            $nights = $deal->nights;

            // $deal->buying is the cost of 1 room per 1 night
            $buying  = $nights * $rooms_wanted * $deal->buying;
            $selling = $nights * $rooms_wanted * $deal->selling;
            // $roi =   ($selling - $buying) + $buying; //gain + capital

            // $roi = ($deal->discount/100) * $deal->selling;

            // $total_roi = $roi * $nights * $rooms_wanted;

            $tx = $deal->transactions()->create([
                'user_id' => auth()->id(),
                'amount'  => $buying,
                'rooms'  => $rooms_wanted,
                'roi'    => $selling,
            ]);
            
            if ($tx) {

                $description = 'Payment for '. $tx->rooms. ' for '. $tx->deal->nights.
                ' Night'. $tx->deal->nights >1 ? 's' : ''. 'Booking';
                
                
                        $trx['amountTotal'] = $tx->amount; // USD
                        $trx['note'] = $description;
                        
                        /*
                        *   @required true
                        *   @example first item
                        */
                        $trx['items'][0] = [
                            'descriptionItem' => $description,
                            'priceItem' => $tx->deal->buying, // USD
                            'qtyItem' => $tx->rooms,
                            'subtotalItem' => ($tx->deal->buying * $tx->deal->nights),  // USD
                            'nights' => $tx->deal->nights.' Night(s)'
                        ];
                        
                        /*
                        *   @example secound item
                        */
                        // $trx['items'][1] = [
                        //     'descriptionItem' => 'Product two',
                        //     'priceItem' => 10, // USD
                        //     'qtyItem' => 3,
                        //     'subtotalItem' => 30 // USD
                        // ];
                        
                        /*
                        *   if you want to remember your data at a later date, you can add the parameter below
                        */
                        // $trx['payload'] = [
                        //     // your cusotm array here
                        //     'foo' => [
                        //         'foo' => 'bar'
                        //     ]
                        // ];
                        
                        $link_transaction = CoinPayment::url_payload($trx);
                        
                        

                        // return view('portal.payment.checkout', compact('link_transaction'));
                        

                        return view('summary', compact('tx', 'link_transaction' ));
                    }

                }

            }

            public function checkout(Request $request, Transaction $transaction)
            {
                $amount = $transaction->amount;

                $description = 'Payment for '. $transaction->rooms. ' for '. $transaction->deal->nights.
                ' Night'. $transaction->deal->nights >1 ? 's' : ''. 'Booking';
                
                
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.update_deal");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add_deal()
    {
        return view("admin.add_deals");
    }
}
