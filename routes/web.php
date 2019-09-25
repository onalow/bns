<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Request;
use App\Events\SendTransactionCompletedSignal;
use App\Transaction;



/// test pusher here
Route::get('/verify', function () {
  return view('emails.verification');
});

// Route::get('/su', function () {
//   return view('success');
// });
// Route::get('/after', function () {
//   return view('after-sign-up');
// });

// Route::get('/404', function () {
//   return view('4042');
// });
// Route::get('/payout', function () {
//   return view('emails.payout');
// });

// Route::get('/cp', function () {
//   return view('vendor.coinpayment.create_payment');
// });

Route::get('/artisan', function () {
   //gets the artisan command from query string passed
   $data = Request::get('data');
   //executes the artisan command
   return shell_exec('php ../artisan '.$data);
});

/// test pusher here
Route::get('/pusher', function () {
  $transaction = Transaction::latest()->first();
  event(new SendTransactionCompletedSignal($transaction));
});

/// test pusher here
Route::get('/payment/success', function () {
  return view('success');
})->middleware('auth');

/// Deal////////////////////////////

Route::get('/', 'DealController@index')->name('welcome');
Route::get('/deal/{deal}', 'DealController@create')->name('deal');


// Route::get('/summary', function () {
//     return view('summary');
// });

Route::get('/contact', function () {
	return view('contact');
});

// Route::get('/checkout', function () {
//     return view('checkout');
// });

Route::get('/how-it-works', function () {
	return view('how-it-works');
});



Auth::routes();

Route::get('/account/verification/{token}', 'Auth\RegisterController@verify')->name('verify');

Route::get('/home', 'DealController@index');
Route::get('/change_password', 'HomeController@change_password');

Route::get('/view_hotel/{id}', 'HotelController@show');
Route::get('/update_hotel/{id}', 'HotelController@edit');
Route::post('/view_hotels_by_location', 'HotelController@hotels_by_location')->name('view_hotels_by_location');
Route::resource('/manage_deals', 'DealController');
Route::get('/update_deal/{id}', 'DealController@edit');
Route::post('deal/process/{deal}', 'DealController@store' )->name('process.deal');
Route::get('deal/checkout/{transaction}', 'DealController@checkout' )->name('deal.checkout');
Route::resource('/transactions', 'TransactionController');
Route::get('/my_transactions/{id}', 'TransactionController@my_transactions')->name('my_trxns');
Route::get('/user/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@updateProfile')->name('profile.update');
Route::post('/profile/update/wallet', 'HomeController@addAddress')->name('add.address');
Route::post('contact', 'HomeController@contact')->name('contact');
// Route::get('/update_profile', 'HomeController@update_profile');
// Route::get('/users', 'HomeController@users');
Route::get('/pending_payouts', 'TransactionController@pending_payouts');

//================Admin===================//

Route::group(['prefix'=> 'osondu'], function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/add_hotel', 'AdminController@showAddHotelForm')->name('add-hotel');
    Route::post('/add_hotel', 'AdminController@addHotel')->name('add.hotel');
    Route::get('/manage/hotels', 'AdminController@manageHotel')->name('manage-hotel');
    Route::get('/update_hotel/{id}', 'AdminController@showUpdateHotelForm')->name('update.hotel');
    Route::post('/update_hotel/{id}', 'AdminController@updateHotel')->name('hotel.update');
    Route::get('/view_hotel/{id}', 'AdminController@showHotel')->name('view-hotel');
    Route::get('/add_deal', 'DealController@add_deal')->name('add_deal');
    Route::get('/create_deal/{id}', 'DealController@create')->name('create_deal');
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    ///////////////////Deals/////////////

    Route::get('manage_deals', 'AdminController@manageDeal')->name('manage.deal');
    Route::get('select/hotel', 'AdminController@showHotels')->name('show.hotels');
    Route::get('create/deal' , 'AdminController@createDeal')->name('create.deal');
    Route::post('add/deal' , 'AdminController@addDeal')->name('add-deal');
    Route::get('update/deal/{deal}' , 'AdminController@showDealUpdateForm')->name('update_deal');
    Route::post('update/deal/{deal}' , 'AdminController@updateDeal')->name('update.deal');
    Route::get('delete/deal/{deal}' , 'AdminController@deleteDeal')->name('delete.deal');
    Route::get('close/deal/{deal}' , 'AdminController@closeDeal')->name('close.deal');
    Route::get('open/deal/{deal}' , 'AdminController@openDeal')->name('open.deal');
    Route::get('payments' , 'AdminController@payments')->name('payments');
    Route::get('payouts' , 'AdminController@payouts')->name('payouts');
    Route::get('delete/hotel/{hotel}' , 'AdminController@deleteHotel')->name('delete.hotel');
    Route::get('deal/hide/{deal}' , 'AdminController@hideDeal')->name('hide.deal');
    Route::get('confrim/manually/{id}' , 'AdminController@confirmManually')->name('confirm.manually');
    

    ////////////Users////////////

    Route::get('manage/users', 'AdminController@manageUsers')->name('admin.users');

    ////////////Transactions//////////////////

    Route::get('transactions', 'AdminController@transaction')->name('txn');

    /////////////////////////////Withdrawal//////////////////

    Route::get('withdrawal/{payout}', 'CoinPaymentController@createWithdrawal')->name('pay.user');
    Route::get('confirm/withdrawal/{payout}', 'CoinPaymentController@withdrawalTxInfo')->name('confirm.withdrawal');
});

///============End Admin====================//


//////////////////Coin Payment/////////////////////////
Route::group([
    'middleware' => [
      'web',
      'auth',
      Hexters\CoinPayment\Http\Middleware\listenConfigFileMiddleware::class
    ],
    'prefix' => 'coinpayment',
   
  ],
  function() {
      Route::get('/', function(){
        return abort(404);
      })->name('coinpayment.home');
      Route::get('/{serialize}', 'CoinPaymentController@index')->name('coinpayment.create.transaction');
      Route::get('/ajax/rates/{usd}', 'CoinPaymentController@ajax_rates')->name('coinpayment.ajax.rate.usd');
      Route::get('/ajax/transaction/histories', 'CoinPaymentController@transactions_list_any')->name('coinpayment.ajax.transaction.histories');
      Route::post('/ajax/maketransaction', 'CoinPaymentController@make_transaction')->name('coinpayment.ajax.store.transaction');
      Route::post('/ajax/trxinfo', 'CoinPaymentController@trx_info')->name('coinpayment.ajax.trxinfo');
      Route::post('/ajax/transaction/manual/check', 'CoinPaymentController@manual_check')->name('coinpayment.ajax.transaction.manual.check');
  
      Route::get('/transactions/histories', 'CoinPaymentController@transactions_list')->name('coinpayment.transaction.histories');
      Route::get('/transactions/get', 'CoinPaymentController@confirm')->name('trxns');

  });
  
  Route::group([
      
  ], function(){
    Route::post('/coinpayment/ipn', 'CoinPaymentController@receive_webhook')
      ->middleware('web')
      ->name('coinpayment.ipn.received');
  });
///////////////////////////////////////////////////  