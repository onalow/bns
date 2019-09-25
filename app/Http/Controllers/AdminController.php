<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Deal;
use App\User;
use App\Payout;
use App\Transaction;
use Carbon\Carbon;
use Hexters\CoinPayment\Entities\cointpayment_log_trx as Tx;
use Mail;
use App\Mail\TransactionReceived;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        return view('admin.dashboard');

    }

    public function showAddHotelForm()
    {
        return view("admin.add_hotel");
    }

    public function addHotel(Request $req)
    {
        $this->validate($req, [

            'name' => 'required',
            'location' => 'required',
            'price'   => 'required',
            'photo' => 'required|mimetypes:image/jpeg,image/png,image/jpg',
            
        ]);
            
        $destination = public_path().'/hotels/';

        $file = $req->file('photo');
         $filename = $this->imageName($req);

         try {
               $file->move($destination,$filename );
         }
         catch (\Exception $e){

            throw $e->getMessage();
         }

        $hotel =  Hotel::create([
            'name' => $req->name,
            'location' => $req->location,
            'price' => $req->price,
            'address' =>$req->address,
            'country' => $req->country,
            'picture_url' => asset('hotels/'.$filename),
        ]);

        if ($hotel)
        {
            return redirect()->back()->with('success', 'successful');
        }
        return redirect()->back()->with('error', 'upload failed');
    }

    public function imageName($req)
    {
        $file = $req->file('photo');

        return str_slug(strtolower($req->name)).'_'.time().'.'.$file->clientExtension();
        
    }

    public function manageHotel()
    {   
        $hotels = Hotel::latest()->get([
            'id', 'name', 'location', 'price', 
            'country', 'address'
        ]);

        
        return view("admin.manage_hotel", compact('hotels'));
    }

    public function showHotel($id)
    {    
        $hotel = Hotel::findOrFail($id);
        return view('admin.view_hotel', compact('hotel'));
    }

    public function showUpdateHotelForm($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.update_hotel', compact('hotel'));
    }

    public function updateHotel(Request $req, $id)
    {
        $this->validate($req, [

            'name' => 'required',
            'location' => 'required',
            'price'   => 'required',
            'photo' => 'required|mimetypes:image/jpeg,image/png,image/jpg',
        ]);
        $filename = '';
        $hotel = Hotel::findOrFail($id);

        if (! $hotel) return redirect()->back()->with('error', 'Hotel Not Found!');

        if ($req->hasFile('photo')){

            $destination = public_path().'/hotels/';

            $file = $req->file('photo');
            $filename = $this->imageName($req);

         try {
               $file->move($destination,$filename );
                                                                                            
         }
         catch (\Exception $e){

            throw $e->getMessage();
         }
        }

        $hotel_u = $hotel->update([
           
            'name' => $req->name ?: $hotel->name,
            'location' => $req->location ?: $hotel->location,
            'price' => $req->price ?: $hotel->price,
            'picture_url' => $req->hasFile('photo') ? asset('hotels/'.$filename) : $hotel->picture_url,
        ]);

        if ($hotel_u){
            return redirect()->back()->with('success', 'Successful');
        }
        return redirect()->back()->with('error', 'Failed to update');

    }

    public function manageDeal()
    {   
        $deals  = Deal::latest()->get();
        return view('admin.manage_deals',  compact('deals'));
    }

    public function showHotels()
    {   

        $hotels = Hotel::where('dealed', 0)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('admin.hotel_lists', compact('hotels'));
    }

    public function createDeal(Request $req)
    {
        $hotel = Hotel::find($req->hotel_id);

        return view('admin.create-deal', compact('hotel'));
    }

    public function addDeal(Request $req)
    {
        
        $this->validate($req, [
            'discount' => 'required',
            'nights' => 'required',
            'rooms' => 'required',
        ]);
            
        $hotel = Hotel::find($req->hotel_id);
        $deal = $hotel->deals()->create(
            [
                'total_rooms' => abs($req->rooms),
                'remaining_rooms' => abs($req->rooms),
                'discount' => $req->discount,
                'nights' => $req->nights,
                'major'  => $req->major,
            ]);

        if ($deal) {
            $hotel->dealed = 1;
            $hotel->save();
            return redirect()->back()->with('success', 'Added!');
        }
        return redirect()->back()->with('error', 'Failed!');

    }

    public function showDealUpdateForm(Deal $deal)
    {
        return view('admin.update_deal', compact('deal'));
    }

    public function updateDeal(Request $req, Deal $deal)
    {
        $update = $deal->update($req->all());

        if ($update) return redirect()->back()->with('success', 'Updated');
       return redirect()->back()->with('error', 'Failed!');

    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteDeal(Deal $deal )
    {
        if ($deal->delete()) return redirect()->back()->with('success', 'Deleted');

        return redirect()->back()->with('error', 'Failed to delete');
    }

    public function transaction()
    {
        $txs = Transaction::all();
        return view('admin.transactions', compact('txs'));
    }
    

    public function payments()
    {
        $txs = Tx::all();

        return view('admin.payment', compact('txs'));
    }

    public function payouts()
    {
        $payouts = Payout::all();
        return view('admin.pending_payouts', compact('payouts'));
    }

    public function deleteHotel(Hotel $hotel)
    {
        $hotel_id = $hotel->id;
        $hotel_ = $hotel->delete();

        if ($hotel_) {
            $deals = Deal::where('hotel_id', $hotel_id)->get();
            $deals->each(function($d){
                Transaction::where('deal_id', $d->id)->delete();
            });
            Deal::where('hotel_id', $hotel_id)->delete();
            return back()->with('success', 'Done');
        }
        else {
            return back()->with('error', 'Failed');

        }
    }

    public function hideDeal(Deal $deal)
    {
        $deal->hidden = 1;
        $deal->save();

        return back()->with('success', 'Hidden');
    }
     public function closeDeal(Deal $deal)
    {
        $deal->remaining_rooms = 0;
        $deal->closed = 1;
        $deal->save();

        return back()->with('success', 'Closed');
    }

    public function openDeal(Deal $deal)
    {
        $deal->remaining_rooms = $deal->total_rooms;
        $deal->closed = 0;
        $deal->save();

        return back()->with('success', 'Closed');
    }


     private function storePayout($tx)
    
    { 
      $due = Carbon::parse($tx->created_at)->addDays($tx->deal->nights + 1);
      
      ///update deal
      
      if (! $tx->updated) {

          $this->updateDealManually($tx);
      }
      //////////////////////
       return Payout::create([
                'tx_id' => $tx->id,
                'recipient_id' => $tx->user_id,
                'amount' => $tx->roi,
                'due_at' => $due,

              ]);
    }

    private function updateDealManually($tx)
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

    public function confirmManually($id)
    {
        $coin_trx = Tx::find($id);

        $trx = Transaction::where('payment_id', $coin_trx->payment_id)->first();

        if (!$trx) abort(404);

        $coin_trx->status = 200;
        $coin_trx->status_text = 'Confirmed Manually';
        $coin_trx->save();

        $payout = $this->storePayout($trx);

        if ($payout) {

            $trx->status = 'completed';
            $trx->save();
            Mail::to($trx->user)->send(new TransactionReceived($trx));
            return back()->with('success', 'Done');
        }
        return back()->with('error', 'Failed');

    }


}
