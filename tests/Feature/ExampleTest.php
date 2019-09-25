<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\CoinPaymentController as Coin;
use App\Transaction;
use App\Payout;

class ExampleTest extends TestCase
{  
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testStorePayout()
    {
        $tx = Transaction::where('payment_id', '!=', NULL)->first();
        $this->assertContainsOnlyInstancesOf(Payout::class, [(new Coin())->storePayout($tx)]);
    }
}
